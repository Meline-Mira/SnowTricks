<?php

namespace App\Controller\Trick;

use App\Repository\MessageRepository;
use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickShowController extends AbstractController
{
    #[Route('/trick/{slug}', name: 'trick_show')]
    public function trick(TrickRepository $trickRepository, string $slug, MessageRepository $messageRepository): Response
    {
        $trick = $trickRepository->findOneTrick($slug);
        $messages = $messageRepository->findMessagesByTrick($trick->getId());
        $numberOfMessages = $messageRepository->numberOfMessages($trick->getId());

        return $this->render('trick/trick_show.html.twig', [
            'trick' => $trick,
            'messages' => $messages,
            'numberOfMessages' => $numberOfMessages,
        ]);
    }

    #[Route('/trick/{slug}/{offset}', name: 'messages_offset')]
    public function tricksOffset(TrickRepository $trickRepository, string $slug, MessageRepository $messageRepository, $offset): JsonResponse
    {
        $trick = $trickRepository->findOneTrick($slug);
        $messages = $messageRepository->findMessagesByTrick($trick->getId(), $offset);
        return new JsonResponse([
            'hasMoreMessages' => $offset + 10 <= $messageRepository->numberOfMessages($trick->getId()),
            'trick' => $trick,
            'messages' => $messages,
        ]);
    }
}