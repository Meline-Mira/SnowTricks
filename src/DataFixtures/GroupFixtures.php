<?php

namespace App\DataFixtures;

use App\Factory\GroupFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GroupFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $this->addReference('grabs', GroupFactory::createOne(['name' => 'Les grabs'])->object());
        $this->addReference('slides', GroupFactory::createOne(['name' => 'Les slides'])->object());
        $this->addReference('oldSchool', GroupFactory::createOne(['name' => 'Old school'])->object());
    }
}