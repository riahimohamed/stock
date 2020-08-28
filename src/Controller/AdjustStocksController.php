<?php

namespace App\Controller;

use App\Entity\AdjustStocks;
use App\Form\AdjustStocksType;
use App\Repository\AdjustStocksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adjust/stocks")
 */
class AdjustStocksController extends AbstractController
{
    /*
     * @Route("/", name="adjust_stocks_index", methods={"GET"})
     
    public function index(AdjustStocksRepository $adjustStocksRepository): Response
    {
        return $this->render('adjust_stocks/index.html.twig', [
            'adjust_stocks' => $adjustStocksRepository->findAll(),
        ]);
    }*/
    

    /**
     * @Route("/new", name="adjust_stocks_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $adjustStock = new AdjustStocks();
        $form = $this->createForm(AdjustStocksType::class, $adjustStock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adjustStock);
            $entityManager->flush();

            return $this->redirectToRoute('adjust_stocks_new');
        }

        return $this->render('adjust_stocks/new.html.twig', [
            'adjust_stock' => $adjustStock,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adjust_stocks_show", methods={"GET"})
     */
    public function show(AdjustStocks $adjustStock): Response
    {
        return $this->render('adjust_stocks/show.html.twig', [
            'adjust_stock' => $adjustStock,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="adjust_stocks_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AdjustStocks $adjustStock): Response
    {
        $form = $this->createForm(AdjustStocksType::class, $adjustStock);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('adjust_stocks_index');
        }

        return $this->render('adjust_stocks/edit.html.twig', [
            'adjust_stock' => $adjustStock,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="adjust_stocks_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AdjustStocks $adjustStock): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adjustStock->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adjustStock);
            $entityManager->flush();
        }

        return $this->redirectToRoute('adjust_stocks_index');
    }
}
