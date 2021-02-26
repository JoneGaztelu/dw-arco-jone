<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Deportistas;
use App\Entity\Competiciones;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Creamos 10 ctos.
        for($i = 0; $i < 10; $i++){
            $competicionFaker = Faker\Factory::create();
            
            //Deportistas
            $deportista = new Deportistas();
            /*$deportista->setUsername("deportista_$i");
            $deportista->setEmail("deportista_$i@gmail.com");
            $deportista->setPassword("tiroconarco");*/
            
            $deportista->setName($competicionFaker->name);
            $deportista->setSurname($competicionFaker->name);
            $deportista->setPhone($competicionFaker->phoneNumber);
            $deportista->setMail($competicionFaker->email);
            
            $manager->persist($deportista);
            
            $competicion = new Competiciones();
            $competicion->setPlace("Madrid $i");
            $competicion->setDate(new \DateTime("2018-6-$i"));
            
            /*$competicion->setDeportista($deportista);*/
            $manager->persist($competicion);
            
        }
        

        $manager->flush();
    }
}
