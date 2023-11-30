<?php

namespace App\Controller\Trick;

use App\Entity\Trick;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TrickDeleteController extends AbstractController
{
    #[Route('/trick/delete/{slug}', name: 'delete_trick')]
    public function deleteTrick(EntityManagerInterface $entityManager, Trick $trick)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $trick->setChosenImage(null);
        $entityManager->flush();
        $entityManager->remove($trick);
        $entityManager->flush();

        $this->addFlash(
            'deleted',
            'Votre figure a bien été supprimée.'
        );

        return $this->redirectToRoute('tricks_list', ['_fragment' => 'tricks']);
    }
}
