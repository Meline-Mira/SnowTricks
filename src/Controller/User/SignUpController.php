<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class SignUpController extends AbstractController
{
    #[Route('/user/sign-up', name: 'sign_up')]
    public function signUp(UserRepository $repository, Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $user = $form->getData();
            $token = sha1(random_bytes(100));

            $user->setToken($token);

            return $this->redirectToRoute('task_success');
        }

        return $this->render('user/sign_up.html.twig', [
            'form' => $form,
        ]);
    }
}