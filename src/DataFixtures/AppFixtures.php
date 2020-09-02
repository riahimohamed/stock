<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($count = 0; $count < 50; $count++) {
            $article = new Article();
            $article->setTitle("Titre " . $count);
            $article->setPrice(mt_rand(10, 100));
            
	        $article->setCreatedAt(new \DateTime(sprintf('-%d month', rand(1, 100))));
	        
            $manager->persist($article);
        }

        $manager->flush();
    }
}
