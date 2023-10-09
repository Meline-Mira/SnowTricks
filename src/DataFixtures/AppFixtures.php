<?php

namespace App\DataFixtures;

use App\Entity\Group;
use App\Entity\Media;
use App\Entity\Message;
use App\Entity\Trick;
use App\Entity\User;
use App\Factory\GroupFactory;
use App\Factory\MediaFactory;
use App\Factory\MessageFactory;
use App\Factory\TrickFactory;
use App\Factory\UserFactory;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $grabs = GroupFactory::createOne(['name' => 'Les grabs']);
        $slides = GroupFactory::createOne(['name' => 'Les slides']);
        $oldSchool = GroupFactory::createOne(['name' => 'Old school']);

        $switchRodeoCinqTailGrab = TrickFactory::createOne([
            'name' => 'Switch rodeo cinq tail grab',
            'slug' => 'switch-rodeo-cinq-tail-grab',
            'description' => "Le switch rodeo cinq tail grab est un saut dans lequel le rider part de son côté non 
            naturel, fait une rotation horizontale d'un tour et demi avec un désaxage de type rodeo, et attrape 
            l'arrière de sa planche pendant la rotation.",
            'groupTrick' => $grabs,
        ]);
        $switch270ToRail = TrickFactory::createOne([
            'name' => 'Switch 270 to rail',
            'slug' => 'switch-270-to-rail',
            'description' => "Le switch 270 to rail est le fait de glisser sur une barre de slide où le rideur part du 
            côté non naturel, qu'il effectue trois quarts de tour avant de slider normalement sur la barre, puis qu'il 
            sort avec un quart de tour. ",
            'groupTrick' => $slides,
        ]);
        $backsideAir = TrickFactory::createOne([
            'name' => 'Backside Air',
            'slug' => 'backside-air',
            'description' => "Le backside air est le seul trick que l'on ne peux pas faire en ski. Ensuite, c’est sans 
            doute le trick qui marque le plus la personnalité du pratiquant, car il y a 10.000 manières de le faire. 
            Enfin, pour un trick 'simple', il est tout de même assez technique. Il faut l’envoyer en avançant le buste 
            au pop, et vraiment s’engager dans les airs pour pouvoir bien grabber comme il se doit.",
            'groupTrick' => $oldSchool,
        ]);
        $mistyTroisSixMute = TrickFactory::createOne([
            'name' => 'Misty trois six mute',
            'slug' => 'misty-trois-six-mute',
            'description' => "Le misty trois six mute est un saut dans lequel le rider part de son côté naturel, fait 
            une rotation d'un tour complet avec un désaxage de type misty, et saisie de la carre frontside de la 
            planche entre les deux pieds avec la main avant.",
            'groupTrick' => $grabs,
        ]);
        $corkSeptDeuxIndy = TrickFactory::createOne([
            'name' => 'Cork sept deux indy',
            'slug' => 'cork-sept-deux-indy',
            'description' => "Le cork sept deux indy est un saut dans lequel le rider part de son côté naturel, fait 
            une rotation de deux tours complet avec un désaxage de type cork, et saisie de la carre frontside de la 
            planche, entre les deux pieds, avec la main arrière.",
            'groupTrick' => $grabs,
        ]);
        $switchMistyCinqQuatreStalefish = TrickFactory::createOne([
            'name' => 'Switch misty cinq quatre stalefish',
            'slug' => 'switch-misty-cinq-quatre-stalefish',
            'description' => "Le switch misty cinq quatre stalefish est un saut dans lequel le rider part de son côté 
            non naturel, fait une rotation de un tour et demi avec un désaxage de type misty, et saisie de la carre 
            backside de la planche entre les deux pieds avec la main arrière.",
            'groupTrick' => $grabs,
        ]);
        $quatreCentCinquanteToNoseSlide = TrickFactory::createOne([
            'name' => '450 to nose slide',
            'slug' => '450-to-nose-slide',
            'description' => "Le 450 to nose slide est le fait de glisser sur une barre de slide où le rideur part du 
            côté naturel, qu'il effectue un tour et un quart avant de slider à l'avant de la planche sur la barre, puis 
            qu'il sort avec un quart de tour.",
            'groupTrick' => $slides,
        ]);
        $tailSlideTo270 = TrickFactory::createOne([
            'name' => 'Tail slide to 270',
            'slug' => 'tail-slide-to-270',
            'description' => "Le tail slide to 270 est le fait de glisser sur une barre de slide où le rideur part du 
            côté naturel, qu'il effectue un quart de tour avant de slider à l'arrière de la planche sur la barre, puis 
            qu'il sort avec trois quarts de tour.",
            'groupTrick' => $slides,
        ]);
        $switchNoseSlideTo630 = TrickFactory::createOne([
            'name' => 'Switch nose slide to 630',
            'slug' => 'switch-nose-slide-to-630',
            'description' => "Le switch nose slide to 630 est le fait de glisser sur une barre de slide où le rideur 
            part du côté non naturel, qu'il effectue un quart de tour avant de slider à l'avant de la planche sur la 
            barre, puis qu'il sort avec un tour et trois quarts.",
            'groupTrick' => $slides,
        ]);
        $rodeoCinqQuatreJapanAir = TrickFactory::createOne([
            'name' => 'Rodeo cinq quatre japan air',
            'slug' => 'rodeo-cinq-quatre-japan-air',
            'description' => "Le rodeo cinq quatre japan air est un saut dans lequel le rider part de son côté naturel, 
            fait une rotation horizontale d'un tour et demi avec un désaxage de type rodeo, et saisie de l'avant de la 
            planche, avec la main avant, du côté de la carre frontside.",
            'groupTrick' => $oldSchool,
        ]);

        MediaFactory::createOne([
            'description' => 'Snowboarder en train de sauter',
            'path' => 'https://www.snow-fr.com/uploads/default/original/2X/c/c886d3ec65236e8a0017194f9db45888d6eaacca.jpeg',
            'trick' => $switchRodeoCinqTailGrab,
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de sauter et tourner en même temps',
            'path' => 'https://www.youtube.com/embed/AepLCXn30Ww',
            'trick' => $switchRodeoCinqTailGrab,
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de glisser sur une barre',
            'path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQoILkOoGXupG2-_ySp0e1MlBOgRjQq6Vdei4XJI5IaO_KwiGlMZb9K0ctleeitJ3lsrvw&usqp=CAU',
            'trick' => $switch270ToRail,
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Tuto expliquant comment faire un 270',
            'path' => 'https://www.youtube.com/embed/fweKH6XAduY',
            'trick' => $switch270ToRail,
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'décomposition des mouvement de la figure',
            'path' => 'https://2.bp.blogspot.com/-LDh9GhEQ3sU/Tlfh9NMfbZI/AAAAAAAAAz8/pr-6FCwl-fQ/s280/backside_air.jpg',
            'trick' => $backsideAir,
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Tuto expliqaund comment faire un backside air',
            'path' => 'https://www.youtube.com/embed/_CN_yyEn78M',
            'trick' => $backsideAir,
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de sauter',
            'path' => 'https://upload.wikimedia.org/wikipedia/commons/7/70/Picswiss_VD-44-23.jpg',
            'trick' => $mistyTroisSixMute,
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de faire la figure',
            'path' => 'https://www.youtube.com/embed/Opg5g4zsiGY',
            'trick' => $mistyTroisSixMute,
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'décomposition des mouvement de la figure',
            'path' => 'https://img.redbull.com/images/c_limit,w_1500,h_1000,f_auto,q_auto/redbullcom/2013/03/14/1331583803984_1/snowboard-triple-cork-marcus-kleveland',
            'trick' => $corkSeptDeuxIndy,
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Vidéo de la figure',
            'path' => 'https://www.youtube.com/embed/hm68sxK0We4',
            'trick' => $corkSeptDeuxIndy,
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de faire la figure',
            'path' => 'https://snowboardaddiction.com/cdn/shop/articles/Basic-Grabs-On-A-Snowboard.jpg?v=1517794316',
            'trick' => $switchMistyCinqQuatreStalefish,
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Vidéo sur comment améliorer sa figure',
            'path' => 'https://www.youtube.com/embed/f0PyFsOcnIw',
            'trick' => $switchMistyCinqQuatreStalefish,
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de faire la figure',
            'path' => 'https://cdn.shopify.com/s/files/1/0230/2239/files/4_9d4969df-3c51-46bd-93aa-f3254e1e8db7_large.jpg?v=1507503360',
            'trick' => $quatreCentCinquanteToNoseSlide,
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Vidéo sur comment faire la figure',
            'path' => 'https://www.youtube.com/embed/KqSi94FT7EE',
            'trick' => $quatreCentCinquanteToNoseSlide,
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de faire la figure',
            'path' => 'https://cdn.shopify.com/s/files/1/0230/2239/files/4_a07f3e1e-b8ba-4fa9-8e2d-6ea458d66fb2_large.jpg?v=1531937219',
            'trick' => $tailSlideTo270,
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Vidéo sur comment faire la figure',
            'path' => 'https://www.youtube.com/embed/HRNXjMBakwM',
            'trick' => $tailSlideTo270,
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de faire la figure',
            'path' => 'https://cdn.outsideonline.com/wp-content/uploads/2023/01/snowboard-accessories-test-lead_h-1024x579.jpg?width=1200',
            'trick' => $switchNoseSlideTo630,
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Vidéo sur comment faire la figure',
            'path' => 'https://www.youtube.com/embed/oAK9mK7wWvw',
            'trick' => $switchNoseSlideTo630,
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de faire la figure',
            'path' => 'https://fis-cloudinary.corebine.com/image/upload/c_fit,dpr_3.0,f_webp,g_center,h_430,q_auto,w_768/v1/fis-prod/Dawsy_March20_Aspen_GrandPrix_Finals_SS_Snow-1-45',
            'trick' => $rodeoCinqQuatreJapanAir,
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Vidéo sur d\'un snowboarder en train de faire la figure',
            'path' => 'https://www.youtube.com/embed/n6POX-LeGnE',
            'trick' => $rodeoCinqQuatreJapanAir,
            'type' => Media::TYPE_VIDEO,
        ]);

        UserFactory::createMany(5);

        MessageFactory::createMany(20);

        $manager->flush();
    }
}
