<?php

namespace App\Controller\Trick;

use App\Entity\Trick;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TrickDeleteChosenImageController extends AbstractController
{
    #[Route('/trick/delete-chosen-image/{slug}', name: 'delete_chosen_image')]
    public function deleteChosenImage(EntityManagerInterface $entityManager, Trick $trick)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $trick->setChosenImage(null);

        $entityManager->flush();

        return $this->redirectToRoute('trick_show', ['slug' => $trick->getSlug()]);
    }
}
