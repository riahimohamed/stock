<?php

namespace App\Controller;

use App\Entity\CommandProvider;
use App\Form\CommandProviderType;
use App\Repository\CommandProviderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/command/provider")
 */
class CommandProviderController extends AbstractController
{
    /**
     * @Route("/", name="command_provider_index", methods={"GET"})
     */
    public function index(CommandProviderRepository $commandProviderRepository): Response
    {
        return $this->render('command_provider/index.html.twig', [
            'command_providers' => $commandProviderRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="command_provider_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $commandProvider = new CommandProvider();
        $form = $this->createForm(CommandProviderType::class, $commandProvider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('image')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the image file must be processed only when a file is uploaded
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                //$safeFilename = $slugger->slug($originalFilename);
                $newFilename = uniqid().'.'.$imageFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $imageFile->move(
                        $this->getParameter('provider_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'imageFilename' property to store the image file name
                // instead of its contents
                $client->setImage($newFilename);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($commandProvider);
            $entityManager->flush();

            return $this->redirectToRoute('command_provider_index');
        }

        return $this->render('command_provider/new.html.twig', [
            'command_provider' => $commandProvider,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="command_provider_show", methods={"GET"})
     */
    public function show(CommandProvider $commandProvider): Response
    {
        return $this->render('command_provider/show.html.twig', [
            'command_provider' => $commandProvider,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="command_provider_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CommandProvider $commandProvider): Response
    {
        $form = $this->createForm(CommandProviderType::class, $commandProvider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('command_provider_index');
        }

        return $this->render('command_provider/edit.html.twig', [
            'command_provider' => $commandProvider,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="command_provider_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CommandProvider $commandProvider): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commandProvider->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($commandProvider);
            $entityManager->flush();
        }

        return $this->redirectToRoute('command_provider_index');
    }
}
