<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController
 *
 * @package   App\Controller
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2004-present Agence Dn'D
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
class IndexController extends AbstractController
{
    /**
     * Description index function
     *
     * @param int $max
     *
     * @Route("/number/{max}", name="index")
     *
     * @return Response
     */
    public function index(int $max): Response
    {
        /** @var int $number */
        $number = random_int(0, $max);

        return $this->render('index/index.html.twig', [
            'number' => $number
        ]);
    }
}
