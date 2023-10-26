<?php

namespace App\Mailer;

use App\Form\DTO\CreateAccountDTO;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class RegisterUserMailer
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function sendMail(CreateAccountDTO $accountDTO, string $token)
    {
        $email = (new TemplatedEmail())
            ->from('snowtricks@example.com')
            ->to($accountDTO->getEmail())
            ->subject('Votre compte sur SnowTricks')
            ->htmlTemplate('email/account_validation.html.twig')
            ->context([
                'token' => $token,
            ]);

        $this->mailer->send($email);
    }
}