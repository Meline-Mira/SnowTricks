<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\ForgottenPasswordType;
use App\Mailer\ChangePasswordMailer;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForgottenPasswordController extends AbstractController
{
    #[Route('/user/forgotten-password', name: 'forgotten_password')]
    public function forgottenPassword(Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository, ChangePasswordMailer $mailer): Response
    {
        $form = $this->createForm(ForgottenPasswordType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $data */
            $data = $form->getData();
            $user = $userRepository->findOneByUsername($data->getUsername());

            if (!$user) {
                $error = "Cet utilisateur n'existe pas !";
            } else {
                $token = sha1(random_bytes(100));
                $user->setToken($token);

                $entityManager->flush();

                $mailer->sendMail($user, $token);

                $this->addFlash(
                    'notice',
                    'Un mail vous a été envoyé pour réinitialiser votre mot de passe.'
                );
            }
        }

        return $this->render('user/forgotten_password.html.twig', [
            'form' => $form,
            'error' => $error ?? null,
        ]);
    }
}
