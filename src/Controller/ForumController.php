<?php

namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForumController extends AbstractController
{
    /**
     * @Route("/forum", name="forum")
     */
    public function index()
    {
        return $this->render('forum/index.html.twig', [
            'controller_name' => 'ForumController',
        ]);
    }

    /**
     * @Route("/ajout", name="ajout")
     */
    public function ajout(Request $request)
    {
        $question = new Question();
        $form = $this->createForm(QuestionType::class, $question, [
            'action'=> $this->generateUrl('forum')
            ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush();
        }

        return $this->render('forum/ajout.html.twig', [
            'form'=> $form->createView(),
        ]);
    }
}
