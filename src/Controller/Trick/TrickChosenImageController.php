<?php

namespace App\Controller\Trick;

use App\Entity\Media;
use App\Entity\Trick;
use App\Repository\MediaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickChosenImageController extends AbstractController
{
    #[Route('/trick/{slug}/chosen-image', name: 'chosen_image')]
    public function chosenImage(Trick $trick, MediaRepository $mediaRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $medias = $mediaRepository->findMediasInATrick($trick);

        return $this->render('trick/chosen_image.html.twig', [
            'medias' => $medias,
            'trick' => $trick,
        ]);
    }

    #[Route('/trick/{slug}/chosen-image/{id}', name: 'chosen_image_id')]
    public function selectedImage(string $slug, int $id, EntityManagerInterface $entityManager)
    {
        $trick = $entityManager->getRepository(Trick::class)->findOneBySlug($slug);
        $media = $entityManager->getRepository(Media::class)->find($id);
        $trick->setChosenImage($media);

        $entityManager->flush();

        return $this->redirectToRoute('trick_show', ['slug' => $trick->getSlug()]);
    }
}