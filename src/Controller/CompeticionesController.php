<?php

namespace App\Controller;

use App\Entity\Competiciones;
use App\Form\CompeticionesType;
use App\Repository\CompeticionesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/competiciones")
 */
class CompeticionesController extends AController
{
    /**
     * @Route("/", name="competiciones_index")
     * @Method("GET")
     */
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $loggedin_username = $request->getSession()->get(Security::LAST_USERNAME);
        $competiciones = $em->getRepository('App:Competiciones')->findCompeticionesFromDeportistas($loggedin_username);

        return $this->render('competiciones/index.html.twig', [
            'competiciones' => $competiciones,
        ]);
    }

    /**
     * @Route("/new", name="competiciones_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $competicione = new Competiciones();
        $form = $this->createForm(CompeticionesType::class, $competicione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($competicione);
            $entityManager->flush();

            return $this->redirectToRoute('competiciones_index');
        }

        return $this->render('competiciones/new.html.twig', [
            'competicione' => $competicione,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="competiciones_show", methods={"GET"})
     */
    public function show(Competiciones $competicione): Response
    {
        return $this->render('competiciones/show.html.twig', [
            'competicione' => $competicione,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="competiciones_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Competiciones $competicione): Response
    {
        $form = $this->createForm(CompeticionesType::class, $competicione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('competiciones_index');
        }

        return $this->render('competiciones/edit.html.twig', [
            'competicione' => $competicione,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="competiciones_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Competiciones $competicione): Response
    {
        if ($this->isCsrfTokenValid('delete'.$competicione->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($competicione);
            $entityManager->flush();
        }

        return $this->redirectToRoute('competiciones_index');
    }
}
