<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use CMEN\GoogleChartsBundle\GoogleCharts\Charts\LineChart;
use \DateTime;

/**
 * @Route("/rapport")
 */
class RapportController extends AbstractController
{
    /**
     * @Route("/", name="rapport_index")
     */
    public function index()
    {

    	$chart = new \CMEN\GoogleChartsBundle\GoogleCharts\Charts\Material\LineChart();
        $chart->getData()->setArrayToDataTable([
            ['Mois', 'Achats', 'Ventes'],
            [new DateTime('2014-01'),  .5,  5.7],
		    [new DateTime('2014-02'),   .4,  8.7],
		    [new DateTime('2014-03'),   .5,   12],
		    [new DateTime('2014-04'),  2.9, .3],
		    [new DateTime('2014-05'),  6.3, .6],
		    [new DateTime('2014-06'),    9, .9],
		    [new DateTime('2014-07'), 10.6, .8],
		    [new DateTime('2014-08'), 10.3, .6],
		    [new DateTime('2014-09'),  7.4, 13.3],
		    [new DateTime('2014-10'),  4.4,  9.9],
		    [new DateTime('2014-11'), 1.1,  6.6],
		    [new DateTime('2014-12'), .2,  4.5]
        ]);

        $chart->getOptions()->getChart()
            ->setTitle('Evolution des stocks en nombre');
        $chart->getOptions()
            ->setHeight(400)
            ->setWidth(900);

        return $this->render('rapport/index.html.twig', [
        	'linechart' => $chart
        ]);
    }
}
