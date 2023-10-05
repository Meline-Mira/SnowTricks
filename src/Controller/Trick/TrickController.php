<?php

namespace App\Controller\Trick;

use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    #[Route('/trick/{slug}', name: 'trick')]
    public function trick(TrickRepository $repository): Response
    {
        $trick = $repository->findTricks();
        $numberOfTricks = $repository->numberOfTricks();

        return $this->render('trick/tricks_list.html.twig', [
            'tricks' => $tricks,
            'numberOfTricks' => $numberOfTricks
        ]);
    }
}