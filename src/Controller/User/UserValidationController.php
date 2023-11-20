<?php

namespace App\Controller\User;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserValidationController extends AbstractController
{
    #[Route('/user-validation/{token}', name: 'user_validation')]
    public function emailValidation(string $token, EntityManagerInterface $entityManager): Response
    {
        /** @var SubscriptionRequest $registered */
        $user = $entityManager->getRepository(User::class)->findOneByToken($token);

        if ($user !== null) {
            $user->setValid(true);
            $entityManager->flush();

            return $this->render('user/user_validation.html.twig');
        } else {
            return $this->render('errors/mail_or_token.html.twig');
        }
    }
}
