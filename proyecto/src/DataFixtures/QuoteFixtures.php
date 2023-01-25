<?php

namespace App\DataFixtures;

use App\Entity\Quote;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class QuoteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $quote = new Quote();
            $quote->setName('quote ' . $i);
            $quote->setDescription('Description ' . $i);
            $manager->persist($quote);
        }

        $manager->flush();
    }
}
