<?php

namespace App\Controller;

use App\Entity\Competiciones;
use App\Entity\Deportistas;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $competiciones = $this->getDoctrine()
                ->getRepository(Competiciones::class)
                ->findAllActive();
        return $this->render('default/index.html.twig', [
            'competiciones' => $competiciones,
        ]);
    }
}
