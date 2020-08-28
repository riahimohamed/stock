<?php

namespace App\Controller;

use App\Entity\CommandClient;
use App\Form\CommandClientType;

use App\Entity\Product;

use App\Repository\CommandClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/command/client")
 */
class CommandClientController extends AbstractController
{
    /**
     * @Route("/", name="command_client_index", methods={"GET"})
     */
    public function index(CommandClientRepository $commandClientRepository): Response
    {
        return $this->render('command_client/index.html.twig', [
            'command_clients' => $commandClientRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="command_client_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commandClient = new CommandClient();
        
        $form = $this->createForm(CommandClientType::class, $commandClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $var = $commandClient->getProducts();

            foreach ($var as $key =>$value) {
                var_dump($value);
            }

            die();

            $entityManager->persist($commandClient);
            $entityManager->flush();

            return $this->redirectToRoute('command_client_index');
        }

        return $this->render('command_client/new.html.twig', [
            'command_client' => $commandClient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="command_client_show", methods={"GET"})
     */
    public function show(CommandClient $commandClient): Response
    {
        return $this->render('command_client/show.html.twig', [
            'command_client' => $commandClient,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="command_client_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CommandClient $commandClient): Response
    {
        $form = $this->createForm(CommandClientType::class, $commandClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('command_client_index');
        }

        return $this->render('command_client/edit.html.twig', [
            'command_client' => $commandClient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="command_client_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CommandClient $commandClient): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commandClient->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commandClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('command_client_index');
    }
}
