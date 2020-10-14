<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductController
 *
 * @package   App\Controller
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2004-present Agence Dn'D
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 *
 * @Route("/products")
 */
class ProductController extends AbstractController
{
    /**
     * Description $manager field
     *
     * @var EntityManagerInterface $manager
     */
    protected $manager;
    /**
     * Description $productRepository field
     *
     * @var ProductRepository $productRepository
     */
    private $productRepository;

    /**
     * ProductController constructor
     *
     * @param EntityManagerInterface $manager
     */
    public function __construct(
        EntityManagerInterface $manager
    ) {
        $this->manager = $manager;
        $this->productRepository = $manager->getRepository(Product::class);
    }

    /**
     * Description index function
     *
     * @Route("/", name="product_index")
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'products' => $this->productRepository->findAll(),
        ]);
    }

    /**
     * Description show function
     *
     * @param int $id
     *
     * @Route("/show/{id}", name="product_show")
     *
     * @return Response
     */
    public function show(int $id): Response
    {
        return $this->render('product/show.html.twig', [
            'product' => $this->productRepository->find($id),
        ]);

    }

    /**
     * Description create function
     *
     * @Route("/create", name="product_create")
     *
     * @return Response
     */
    public function create(): Response
    {
        /** @var Product $product */
        $product = new Product();
        $product->setSku('AZER')
            ->setTitle('Product')
            ->setCurrency('€')
            ->setIsEnabled(true)
            ->setPrice(12.2);

        $this->manager->persist($product);
        $this->manager->flush();

        return new Response(sprintf('Saved new product with id %s', $product->getId()));
    }
}
