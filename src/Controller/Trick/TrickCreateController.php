<?php

namespace App\Controller\Trick;

use App\Entity\Trick;
use App\Form\TrickType;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class TrickCreateController extends AbstractController
{
    #[Route('/trick/create', name: 'create_trick')]
    public function signUp(Request $request, SluggerInterface $slugger, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $form = $this->createForm(TrickType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Trick $trick */
            $trick = $form->getData();

            $today = new DateTimeImmutable();
            $trick->setSlug(strtolower($slugger->slug($trick->getName())));
            $trick->setCreationDate($today);

            $entityManager->persist($trick);
            $entityManager->flush();

            $this->addFlash(
                'notice',
                'Votre figure a bien été enregistrée.'
            );

            return $this->redirectToRoute('tricks_list');
        }

        return $this->render('trick/create_or_modify_trick.html.twig', [
            'form' => $form,
        ]);
    }
}