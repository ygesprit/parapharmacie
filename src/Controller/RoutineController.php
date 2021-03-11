<?php

namespace App\Controller;

use App\Entity\Routine;
use App\Entity\RoutineProducts;
use App\Form\RoutineType;
use App\Repository\ProductRepository;
use App\Repository\RoutineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class RoutineController extends AbstractController
{
    /**
     * @Route("/routine", name="routine")
     */
    public function index(): Response
    {
        return $this->render('routine/index.html.twig', [
            'controller_name' => 'RoutineController',
        ]);
    }
    /**
     * @Route("/showprduct",name="showproduct")
     */
    public function ShowProducts(ProductRepository $repository, RoutineRepository $reporoutine)
    {   $routines=$reporoutine->findAll();
        $products=$repository->findAll();
        return $this->render('routine/index.html.twig', [
            'products'=>$products,
            'routines'=>$routines
        ]);
    }
    /**
     * @Route("/showroutine", name="routines")
     */
    public function ShowRoutine(RoutineRepository $repository)
    {
        $routines=$repository->findAll();
        return $this->render('routine/routines.html.twig', [
            'routines'=>$routines
        ]);
    }



    /**
     * @param Request $request
     * @return Response
     * @Route("/addroutine", name="addroutine")
     */
    public function AddRoutine(Request $request): Response
    {
        $routine = new Routine();
        $form = $this->createForm(RoutineType::class, $routine);
        $form->handleRequest($request);
        dump($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($routine);
            $entityManager->flush();
            return $this->redirectToRoute('routines');

        }
        return $this->render('routine/addroutine.html.twig', [
            'routine' => $routine,
            'form' => $form->createView(),
        ]);

    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/removeroutine/{id}", name="remove_routine")
     */
    public function RemoveRoutine($id,RoutineRepository $repo)
    {

        $routine=$repo->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($routine);
        $em->flush();
        return $this->redirectToRoute('routines');

    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/faza/{idr}/{idp}", name="addprodrout")
     */
    public function ajouterProduitRoutine($idr,$idp,RoutineRepository $repo, ProductRepository $repoprod)
    {

        /*$routine=$repo->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($routine);
        $em->flush();
        return $this->redirectToRoute('routines');
*/
        $product=$repoprod->find($idp);
        $routine=$repo->find($idr);
        $routine->addProduct($product);
        $em=$this->getDoctrine()->getManager();
        $em->flush();
        return $this->redirectToRoute('showproduct');
    }

}
