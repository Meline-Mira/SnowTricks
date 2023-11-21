<?php

namespace App\Security;

use App\Entity\User;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Event\CheckPassportEvent;

#[AsEventListener]
class CheckVerifiedUserListener
{
    public function __invoke(CheckPassportEvent $event)
    {
        /** @var User $user */
        $user = $event->getPassport()->getUser();

        if (!$user->isValid()) {
            throw new CustomUserMessageAuthenticationException(
                'Activez votre compte dans vos mails.'
            );
        }
    }
}
