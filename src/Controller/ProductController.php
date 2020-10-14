<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
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
    protected EntityManagerInterface $manager;
    /**
     * Description $productRepository field
     *
     * @var ProductRepository $productRepository
     */
    protected ProductRepository $productRepository;

    /**
     * ProductController constructor
     *
     * @param EntityManagerInterface $manager
     * @param ProductRepository      $productRepository
     */
    public function __construct(
        EntityManagerInterface $manager,
        ProductRepository $productRepository
    ) {
        $this->manager = $manager;
        $this->productRepository = $productRepository;
    }

    /**
     * Description index function
     *
     * @Route("/", name="product_index", methods={"GET"})
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
     * Description new function
     *
     * @param Request $request
     *
     * @Route("/new", name="product_new", methods={"GET","POST"})
     *
     * @return Response
     */
    public function new(Request $request): Response
    {
        /** @var Product $product */
        $product = new Product();
        /** @var FormInterface $form */
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->persist($product);
            $this->manager->flush();

            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Description show function
     *
     * @param Product $product
     *
     * @Route("/{id}", name="product_show", methods={"GET"})
     *
     * @return Response
     */
    public function show(Product $product): Response
    {
        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * Description edit function
     *
     * @param Request $request
     * @param Product $product`
     *
     * @Route("/{id}/edit", name="product_edit", methods={"GET","POST"})
     *
     * @return Response
     */
    public function edit(Request $request, Product $product): Response
    {
        /** @var FormInterface $form */
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->flush();

            return $this->redirectToRoute('product_index');
        }

        return $this->render('product/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Description delete function
     *
     * @param Request $request
     * @param Product $product
     *
     * @Route("/{id}", name="product_delete", methods={"DELETE"})
     *
     * @return Response
     */
    public function delete(Request $request, Product $product): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $this->manager->remove($product);
            $this->manager->flush();
        }

        return $this->redirectToRoute('product_index');
    }
}
