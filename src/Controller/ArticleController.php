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
	public $arrayPrice = [];

    /**
     * @Route("/", name="article_index", methods={"GET"})
     */
    public function index(ArticleRepository $ar): Response
    {
    	for ($i = 1; $i < 13; $i++) {
    		$currMonth =  $ar->getTotalPrice('2020', $i);
    		$lastMonth = $ar->getTotalPrice('2020', $i-1);

    		if($lastMonth == 0){
    			$lastMonth = 1;
                $currMonth = 1;
    		}
    		
    		$this->arrayPrice[] = (abs($currMonth - $lastMonth) / $lastMonth) * 100;
    	}
    	

        return $this->render('article/index.html.twig',[
        	'articles' => $ar->findAll(),
        	'totalprices' => $this->arrayPrice
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
