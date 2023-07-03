<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
       $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i=0; $i <=5 ; $i++) { 
            # code...
            $user = new User();
            $user->setName($this->faker->name())
                 ->setFirstName($this->faker->word())
                 ->setAges(mt_rand(0, 100))
                 ->setRoles($this->faker->randomElements(['a', 'b', 'c', 'd', 'e'], 3))
                 ->setPassword($this->faker->password())
                 ->setPicture($this->faker->word(5))
                 ->setBirthDate($this->faker->dateTime())
                 ->setEmail($this->faker->word());

     
             $manager->persist($user);
        }

        $manager->flush();
    }
}
