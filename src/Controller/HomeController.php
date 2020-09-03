<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Client;
use App\Entity\Category;
use App\Entity\Provider;

use App\Entity\CommandClient;
use App\Entity\CommandProvider;
use App\Entity\Location;

use CMEN\GoogleChartsBundle\GoogleCharts\Charts\LineChart;
use \DateTime;

use App\Repository\CommandClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(CommandClientRepository $cmdClient): Response{

    	$repository = $this->getDoctrine()->getRepository(Product::class);
    	$products = $repository->findAll();

    	$repository = $this->getDoctrine()->getRepository(Client::class);
    	$clients = $repository->findAll();

    	$repository = $this->getDoctrine()->getRepository(Category::class);
    	$categories = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Category::class);
        $providers = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(CommandClient::class);
        $cmdclients = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(CommandProvider::class);
        $cmdProviders = $repository->findAll();

        $repository = $this->getDoctrine()->getRepository(Location::class);
        $locations = $repository->findAll();

        $data = [['Mois', 'Achats', 'Ventes']];

        for ($i = 1; $i < 13; $i++) {
            $currMonth =  $cmdClient->getTotalPrice('2020', '0'+$i);
            $lastMonth = $cmdClient->getTotalPrice('2020', '0'+ ($i-1));

            if($lastMonth == 0){
                $lastMonth = 1;
                $currMonth = 1;
            }
            
            $array = (abs($currMonth - $lastMonth) / $lastMonth) * 100;

            $data[] = array(new DateTime('2020-'.$i),  $array, 0);
        }
        
       $chart = new \CMEN\GoogleChartsBundle\GoogleCharts\Charts\Material\LineChart();
        $chart->getData()->setArrayToDataTable(
            $data
        );

        $chart->getOptions()->getChart()
            ->setTitle('Chiffres d\'affaires par mois 2020');
        $chart->getOptions()
            ->setHeight(400)
            ->setWidth(900);

        return $this->render('home/index.html.twig',[
        	'products' => $products,
        	'clients' => $clients,
            'providers' => $providers,
            'cmdclients' => $cmdclients,
            'cmdproviders' => $cmdProviders,
            'locations' => $locations,
        	'categories' => $categories,
            'linechart' => $chart
        ]);
    }

    /**
     * @Route("/step", name="step_index")
     */
    public function step(){

        return $this->render('home/step.html.twig');
    }
}
