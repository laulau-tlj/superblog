<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //On charge le générateur de Faker pour créer des fausses données
        $faker = Factory::create('fr_FR');
        //On lance une boucle pour la création des 10 catégories
        for ($i=0; $i < 10; $i++) {
            //On instancie l'entité Category pour générer une nouvelle catégorie
            $category = new Category;
            //on donne un nom à la catégorie générée
            $category->setName($faker->words(3, true));
            //On met en file d'attente la categorie pour qu'elle soit enregistrée en BDD
            $manager->persist($category);
        }

        //Une fois les catégories générées on flush pour exécuter les requettes en attente
        $manager->flush();
    }
}
