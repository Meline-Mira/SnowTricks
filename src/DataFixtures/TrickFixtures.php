<?php

namespace App\DataFixtures;

use App\Factory\TrickFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TrickFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
       $this->addReference('switch-rodeo-cinq-tail-grab', TrickFactory::createOne([
            'name' => 'Switch rodeo cinq tail grab',
            'slug' => 'switch-rodeo-cinq-tail-grab',
            'description' => "Le switch rodeo cinq tail grab est un saut dans lequel le rider part de son côté non 
            naturel, fait une rotation horizontale d'un tour et demi avec un désaxage de type rodeo, et attrape 
            l'arrière de sa planche pendant la rotation.",
            'groupTrick' => $this->getReference('grabs'),
        ])->object());
        $this->addReference('switch-270-to-rail', TrickFactory::createOne([
            'name' => 'Switch 270 to rail',
            'slug' => 'switch-270-to-rail',
            'description' => "Le switch 270 to rail est le fait de glisser sur une barre de slide où le rideur part du 
            côté non naturel, qu'il effectue trois quarts de tour avant de slider normalement sur la barre, puis qu'il 
            sort avec un quart de tour. ",
            'groupTrick' => $this->getReference('slides'),
        ])->object());
        $this->addReference('backside-air', TrickFactory::createOne([
            'name' => 'Backside Air',
            'slug' => 'backside-air',
            'description' => "Le backside air est le seul trick que l'on ne peux pas faire en ski. Ensuite, c’est sans 
            doute le trick qui marque le plus la personnalité du pratiquant, car il y a 10.000 manières de le faire. 
            Enfin, pour un trick 'simple', il est tout de même assez technique. Il faut l’envoyer en avançant le buste 
            au pop, et vraiment s’engager dans les airs pour pouvoir bien grabber comme il se doit.",
            'groupTrick' => $this->getReference('oldSchool'),
        ])->object());
        $this->addReference('misty-trois-six-mute', TrickFactory::createOne([
            'name' => 'Misty trois six mute',
            'slug' => 'misty-trois-six-mute',
            'description' => "Le misty trois six mute est un saut dans lequel le rider part de son côté naturel, fait 
            une rotation d'un tour complet avec un désaxage de type misty, et saisie de la carre frontside de la 
            planche entre les deux pieds avec la main avant.",
            'groupTrick' => $this->getReference('grabs'),
        ])->object());
        $this->addReference('cork-sept-deux-indy', TrickFactory::createOne([
            'name' => 'Cork sept deux indy',
            'slug' => 'cork-sept-deux-indy',
            'description' => "Le cork sept deux indy est un saut dans lequel le rider part de son côté naturel, fait 
            une rotation de deux tours complet avec un désaxage de type cork, et saisie de la carre frontside de la 
            planche, entre les deux pieds, avec la main arrière.",
            'groupTrick' => $this->getReference('grabs'),
        ])->object());
        $this->addReference('switch-misty-cinq-quatre-stalefish', TrickFactory::createOne([
            'name' => 'Switch misty cinq quatre stalefish',
            'slug' => 'switch-misty-cinq-quatre-stalefish',
            'description' => "Le switch misty cinq quatre stalefish est un saut dans lequel le rider part de son côté 
            non naturel, fait une rotation de un tour et demi avec un désaxage de type misty, et saisie de la carre 
            backside de la planche entre les deux pieds avec la main arrière.",
            'groupTrick' => $this->getReference('grabs'),
        ])->object());
        $this->addReference('450-to-nose-slide', TrickFactory::createOne([
            'name' => '450 to nose slide',
            'slug' => '450-to-nose-slide',
            'description' => "Le 450 to nose slide est le fait de glisser sur une barre de slide où le rideur part du 
            côté naturel, qu'il effectue un tour et un quart avant de slider à l'avant de la planche sur la barre, puis 
            qu'il sort avec un quart de tour.",
            'groupTrick' => $this->getReference('slides'),
        ])->object());
        $this->addReference('tail-slide-to-270', TrickFactory::createOne([
            'name' => 'Tail slide to 270',
            'slug' => 'tail-slide-to-270',
            'description' => "Le tail slide to 270 est le fait de glisser sur une barre de slide où le rideur part du 
            côté naturel, qu'il effectue un quart de tour avant de slider à l'arrière de la planche sur la barre, puis 
            qu'il sort avec trois quarts de tour.",
            'groupTrick' => $this->getReference('slides'),
        ])->object());
        $this->addReference('switch-nose-slide-to-630', TrickFactory::createOne([
            'name' => 'Switch nose slide to 630',
            'slug' => 'switch-nose-slide-to-630',
            'description' => "Le switch nose slide to 630 est le fait de glisser sur une barre de slide où le rideur 
            part du côté non naturel, qu'il effectue un quart de tour avant de slider à l'avant de la planche sur la 
            barre, puis qu'il sort avec un tour et trois quarts.",
            'groupTrick' => $this->getReference('slides'),
        ])->object());
        $this->addReference('rodeo-cinq-quatre-japan-air', TrickFactory::createOne([
            'name' => 'Rodeo cinq quatre japan air',
            'slug' => 'rodeo-cinq-quatre-japan-air',
            'description' => "Le rodeo cinq quatre japan air est un saut dans lequel le rider part de son côté naturel, 
            fait une rotation horizontale d'un tour et demi avec un désaxage de type rodeo, et saisie de l'avant de la 
            planche, avec la main avant, du côté de la carre frontside.",
            'groupTrick' => $this->getReference('oldSchool'),
        ])->object());
    }

    public function getDependencies()
    {
        return [
            GroupFixtures::class,
        ];
    }
}