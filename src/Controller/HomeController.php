<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Client;
use App\Entity\Category;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(){

    	$repository = $this->getDoctrine()->getRepository(Product::class);
    	$products = $repository->findAll();

    	$repository = $this->getDoctrine()->getRepository(Client::class);
    	$Clients = $repository->findAll();

    	$repository = $this->getDoctrine()->getRepository(Category::class);
    	$Categories = $repository->findAll();

        return $this->render('home/index.html.twig',[
        	'products' => $products,
        	'clients' => $Clients,
        	'categories' => $Categories,
        ]);
    }
}
