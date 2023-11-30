<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\DTO\CreateAccountDTO;
use App\Form\CreateAccountType;
use App\Mailer\RegisterUserMailer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;

class SignUpController extends AbstractController
{
    #[Route('/user/sign-up', name: 'sign_up')]
    public function signUp(Request $request, UserPasswordHasherInterface $passwordHasher, SluggerInterface $slugger, EntityManagerInterface $entityManager, RegisterUserMailer $mailer): Response
    {
        $form = $this->createForm(CreateAccountType::class);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var CreateAccountDTO $createAccount */
            $createAccount = $form->getData();

            $user = new User();
            $user->setEmail($createAccount->getEmail());
            $user->setPassword($passwordHasher->hashPassword($user, $form->getData()->getPassword()));
            $user->setUsername($createAccount->getUsername());
            $user->setToken(sha1(random_bytes(100)));
            $this->generatePictureUrl($createAccount, $user, $slugger);

            $entityManager->persist($user);
            $entityManager->flush();

            $mailer->sendMail($createAccount, $user->getToken());

            return $this->redirectToRoute('tricks_list');
        }

        return $this->render('user/sign_up.html.twig', [
            'form' => $form,
        ]);
    }

    private function generatePictureUrl(CreateAccountDTO $createAccount, User $user, SluggerInterface $slugger): void
    {
        if ($createAccount->getPictureUrl()) {
            $user->setPicture($createAccount->getPictureUrl());
        } else if ($createAccount->getPictureFile()) {
            $pictureFile = $createAccount->getPictureFile();
            $originalFilename = pathinfo($pictureFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename . '-' . uniqid() . '.' . $pictureFile->guessExtension();
            $pictureFile->move($this->getParameter('user_pictures_directory'), $newFilename);

            $user->setPicture('/uploads/user_pictures/' . $newFilename);
        }
    }
}
