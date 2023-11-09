<?php

namespace App\Mailer;

use App\Entity\User;
use App\Form\DTO\CreateAccountDTO;
use App\Form\ForgottenPasswordType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class ChangePasswordMailer
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function sendMail(User $user, string $token)
    {
        $email = (new TemplatedEmail())
            ->from('snowtricks@example.com')
            ->to($user->getEmail())
            ->subject('Votre mot de passe sur SnowTricks')
            ->htmlTemplate('email/message_password.html.twig')
            ->context([
                'token' => $token,
            ]);

        $this->mailer->send($email);
    }
}