<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $categories = ["sports","arts","musique","cuisine"];
        for($i=0;$i<count($categories);$i++) {
            $categorie = new Categorie();
            $categorie->setLibelle($categories[$i]);
            $manager->persist($categorie);
        

        for($j=1;$j<=mt_rand(1,10);$j++) {
            $article = new Article();
            $article->setTitre("Article N°".$j);
            $article->setCorps("bla bla bla");
            $article->setCategorie($categorie);
            $article->setCreatedAt(new \DateTime());
            $article->setAuteur("Sullivan");
            $manager->persist($article);
        }
    }
        $manager->flush();
    }
}
