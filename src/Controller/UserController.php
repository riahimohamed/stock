<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\User;
use App\Form\RegistrationType;

class UserController extends AbstractController
{
    private $isSuccess = false;

    /**
     * @Route("/register", name="security_register")
     */
    public function registration(Request $reqeust, UserPasswordEncoderInterface $encoder)
    {
    	$user = new User();
    	$form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($reqeust);

        if($form->isSubmitted() && $form->isValid()){

            $hash = $encoder->encodePassword( $user , $user->getPassword());
            $user->setPassword($hash);
            $user->setRoles(['ROLE_ADMIN']);

            $this->addFlash(
                'success',
                 true
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('user/register.html.twig', [
        	'form' => $form->createView()
        ]);
    }
}
