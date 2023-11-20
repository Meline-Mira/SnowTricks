<?php

namespace App\DataFixtures;

use App\Entity\Media;
use App\Factory\MediaFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MediaFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de sauter',
            'path' => 'https://www.snow-fr.com/uploads/default/original/2X/c/c886d3ec65236e8a0017194f9db45888d6eaacca.jpeg',
            'trick' => $this->getReference('switch-rodeo-cinq-tail-grab'),
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de sauter et tourner en même temps',
            'path' => 'https://www.youtube.com/embed/AepLCXn30Ww',
            'trick' => $this->getReference('switch-rodeo-cinq-tail-grab'),
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de glisser sur une barre',
            'path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQoILkOoGXupG2-_ySp0e1MlBOgRjQq6Vdei4XJI5IaO_KwiGlMZb9K0ctleeitJ3lsrvw&usqp=CAU',
            'trick' => $this->getReference('switch-270-to-rail'),
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Tuto expliquant comment faire un 270',
            'path' => 'https://www.youtube.com/embed/fweKH6XAduY',
            'trick' => $this->getReference('switch-270-to-rail'),
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'décomposition des mouvement de la figure',
            'path' => 'https://2.bp.blogspot.com/-LDh9GhEQ3sU/Tlfh9NMfbZI/AAAAAAAAAz8/pr-6FCwl-fQ/s280/backside_air.jpg',
            'trick' => $this->getReference('backside-air'),
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Tuto expliqaund comment faire un backside air',
            'path' => 'https://www.youtube.com/embed/_CN_yyEn78M',
            'trick' => $this->getReference('backside-air'),
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de sauter',
            'path' => 'https://upload.wikimedia.org/wikipedia/commons/7/70/Picswiss_VD-44-23.jpg',
            'trick' => $this->getReference('misty-trois-six-mute'),
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de faire la figure',
            'path' => 'https://www.youtube.com/embed/Opg5g4zsiGY',
            'trick' => $this->getReference('misty-trois-six-mute'),
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'décomposition des mouvement de la figure',
            'path' => 'https://img.redbull.com/images/c_limit,w_1500,h_1000,f_auto,q_auto/redbullcom/2013/03/14/1331583803984_1/snowboard-triple-cork-marcus-kleveland',
            'trick' => $this->getReference('cork-sept-deux-indy'),
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Vidéo de la figure',
            'path' => 'https://www.youtube.com/embed/hm68sxK0We4',
            'trick' => $this->getReference('cork-sept-deux-indy'),
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de faire la figure',
            'path' => 'https://snowboardaddiction.com/cdn/shop/articles/Basic-Grabs-On-A-Snowboard.jpg?v=1517794316',
            'trick' => $this->getReference('switch-misty-cinq-quatre-stalefish'),
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Vidéo sur comment améliorer sa figure',
            'path' => 'https://www.youtube.com/embed/f0PyFsOcnIw',
            'trick' => $this->getReference('switch-misty-cinq-quatre-stalefish'),
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de faire la figure',
            'path' => 'https://cdn.shopify.com/s/files/1/0230/2239/files/4_9d4969df-3c51-46bd-93aa-f3254e1e8db7_large.jpg?v=1507503360',
            'trick' => $this->getReference('450-to-nose-slide'),
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Vidéo sur comment faire la figure',
            'path' => 'https://www.youtube.com/embed/KqSi94FT7EE',
            'trick' => $this->getReference('450-to-nose-slide'),
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de faire la figure',
            'path' => 'https://cdn.shopify.com/s/files/1/0230/2239/files/4_a07f3e1e-b8ba-4fa9-8e2d-6ea458d66fb2_large.jpg?v=1531937219',
            'trick' => $this->getReference('tail-slide-to-270'),
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Vidéo sur comment faire la figure',
            'path' => 'https://www.youtube.com/embed/HRNXjMBakwM',
            'trick' => $this->getReference('tail-slide-to-270'),
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de faire la figure',
            'path' => 'https://cdn.outsideonline.com/wp-content/uploads/2023/01/snowboard-accessories-test-lead_h-1024x579.jpg?width=1200',
            'trick' => $this->getReference('switch-nose-slide-to-630'),
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Vidéo sur comment faire la figure',
            'path' => 'https://www.youtube.com/embed/oAK9mK7wWvw',
            'trick' => $this->getReference('switch-nose-slide-to-630'),
            'type' => Media::TYPE_VIDEO,
        ]);
        MediaFactory::createOne([
            'description' => 'Snowboarder en train de faire la figure',
            'path' => 'https://fis-cloudinary.corebine.com/image/upload/c_fit,dpr_3.0,f_webp,g_center,h_430,q_auto,w_768/v1/fis-prod/Dawsy_March20_Aspen_GrandPrix_Finals_SS_Snow-1-45',
            'trick' => $this->getReference('rodeo-cinq-quatre-japan-air'),
            'type' => Media::TYPE_IMAGE,
        ]);
        MediaFactory::createOne([
            'description' => 'Vidéo sur d\'un snowboarder en train de faire la figure',
            'path' => 'https://www.youtube.com/embed/n6POX-LeGnE',
            'trick' => $this->getReference('rodeo-cinq-quatre-japan-air'),
            'type' => Media::TYPE_VIDEO,
        ]);
    }

    public function getDependencies()
    {
        return [
            TrickFixtures::class,
        ];
    }
}
