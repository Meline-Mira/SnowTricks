<?php

namespace App\Controller\Trick;

use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TricksListController extends AbstractController
{
    #[Route('/', name: 'tricks_list')]
    public function tricksList(TrickRepository $repository): Response
    {
        $tricks = $repository->findTricks();
        $numberOfTricks = $repository->numberOfTricks();

        return $this->render('trick/tricks_list.html.twig', [
            'tricks' => $tricks,
            'numberOfTricks' => $numberOfTricks
        ]);
    }

    #[Route('/tricks/{offset}', name: 'tricks_offset')]
    public function tricksOffset(TrickRepository $repository, $offset): JsonResponse
    {
        $tricks = $repository->findTricks($offset);
        return new JsonResponse([
            'hasMoreTricks' => $offset + 15 <= $repository->numberOfTricks(),
            'tricks' => $tricks,
        ]);
    }
}