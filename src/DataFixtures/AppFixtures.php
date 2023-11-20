<?php

namespace App\DataFixtures;

use App\Factory\MessageFactory;
use App\Factory\TrickFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createMany(5);
        MessageFactory::createMany(20);
    }

    public function getDependencies()
    {
        return [
            TrickFixtures::class, // because MessageFactory needs a random trick
        ];
    }
}
