<?php

namespace App\Controller\Trick;

use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickShowController extends AbstractController
{
    #[Route('/trick/{slug}', name: 'trick_show')]
    public function trick(TrickRepository $repository, string $slug): Response
    {
        $trick = $repository->findOneTrick($slug);

        return $this->render('trick/trick_show.html.twig', [
            'trick' => $trick,
        ]);
    }
}