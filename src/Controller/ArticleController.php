<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $ar): Response
    {
        return $this->render('article/index.html.twig',[
        	'articles' => $ar->findAll(),
        ]);
    }

	/**
	 * @Route("/new", name="article_new", methods={"GET","POST"})
	 */
	public function new(Request $request): Response{
		$article = new Article();

		$form = $this->createForm(ArticleType::class, $article);
		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$em->persist($article);
			$em->flush();

			return $this->redirectToRoute('article_index');
		}

		return $this->render('article/new.html.twig', [
			'form' => $form->createView(),
		]);
	}
}
