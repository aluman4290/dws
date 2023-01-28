<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {

                $user = new User();
        $user->setName('admin');
        $user->setEmail('admin@email.com');
        $user->setPassword('Admin1234');
        $user->setBiography('Biograpy admin');
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setName('user ' . $i);
            $user->setEmail('user' . $i . '@email.com');
            $user->setPassword('Admin1234');
            $user->setBiography('Biograpy user' . $i);
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
