<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setName('user ' . $i);
            $user->setEmail('user' . $i . '@email.com');
            $user->setPassword('PassowrdUser' . $i);
            $user->setBiography('Biograpy user' . $i);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
