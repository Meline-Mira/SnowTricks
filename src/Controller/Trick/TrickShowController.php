<?php

namespace App\Controller\Trick;

use App\Entity\Message;
use App\Entity\User;
use App\Form\CreateMessageType;
use App\Repository\MessageRepository;
use App\Repository\TrickRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickShowController extends AbstractController
{
    #[Route('/trick/{slug}', name: 'trick_show')]
    public function trick(TrickRepository $trickRepository, string $slug, MessageRepository $messageRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $trick = $trickRepository->findOneTrick($slug);

        $form = $this->createForm(CreateMessageType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $today = new DateTimeImmutable();

            $createMessage = $form->getData();

            $messageLeaved = new Message();
            $messageLeaved->setContent($createMessage->getContent());
            $messageLeaved->setCreationDate($today);
            $messageLeaved->setUser($user);
            $messageLeaved->setTrick($trick);

            $entityManager->persist($messageLeaved);
            $entityManager->flush();

            return $this->redirectToRoute('trick_show', ['slug' => $slug, '_fragment' => 'leave-message']);
        }

        $messages = $messageRepository->findMessagesByTrick($trick->getId());
        $numberOfMessages = $messageRepository->numberOfMessages($trick->getId());

        return $this->render('trick/trick_show.html.twig', [
            'trick' => $trick,
            'messages' => $messages,
            'numberOfMessages' => $numberOfMessages,
            'form' => $form,
        ]);
    }

    #[Route('/trick/{slug}/{offset}', name: 'messages_offset')]
    public function tricksOffset(TrickRepository $trickRepository, string $slug, MessageRepository $messageRepository, $offset, Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $trick = $trickRepository->findOneTrick($slug);

        $form = $this->createForm(CreateMessageType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $today = new DateTimeImmutable();

            $createMessage = $form->getData();

            $messageLeaved = new Message();
            $messageLeaved->setContent($createMessage->getContent());
            $messageLeaved->setCreationDate($today);
            $messageLeaved->setUser($user);

            $entityManager->persist($messageLeaved);
            $entityManager->flush();

            return $this->redirectToRoute('trick_show');
        }

        $messages = $messageRepository->findMessagesByTrick($trick->getId(), $offset);
        return new JsonResponse([
            'hasMoreMessages' => $offset + 10 <= $messageRepository->numberOfMessages($trick->getId()),
            'trick' => $trick,
            'messages' => $messages,
            'form' => $form,
        ]);
    }
}