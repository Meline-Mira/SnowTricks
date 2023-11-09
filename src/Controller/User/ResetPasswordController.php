<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\ResetPasswordType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ResetPasswordController extends AbstractController
{
    #[Route('user/reset_password/{token}', name: 'reset_password')]
    public function resetPassword(Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository, string $token, UserPasswordHasherInterface $passwordHasher): Response
    {
        $form = $this->createForm(ResetPasswordType::class);

        $form->handleRequest($request);

        $user = $userRepository->findOneByToken($token);

        if ($user === null) {
            return $this->render('errors/token.html.twig');
        } else {
            if ($form->isSubmitted() && $form->isValid()) {
                /** @var User $data */
                $data = $form->getData();

                if ($user !== null) {
                    $user->setPassword($passwordHasher->hashPassword($user, $data->getPassword()));

                    $entityManager->flush();

                    $this->addFlash(
                        'notice',
                        'Votre mot de passe a bien été modifié.'
                    );

                    return $this->redirectToRoute('tricks_list');
                }
            }
        }

        return $this->render('user/reset_password.html.twig', [
            'form' => $form,
        ]);
    }
}