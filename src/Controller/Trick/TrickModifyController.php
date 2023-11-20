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

class TrickModifyController extends AbstractController
{
    #[Route('/trick/modify/{slug}', name: 'modify_trick')]
    public function trickModify(Request $request, SluggerInterface $slugger, EntityManagerInterface $entityManager, Trick $trick): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $form = $this->createForm(TrickType::class, $trick);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Trick $trick */
            $trick = $form->getData();

            $updatingDate = new DateTimeImmutable();
            $trick->setSlug(strtolower($slugger->slug($trick->getName())));
            $trick->setUpdatingDate($updatingDate);

            $entityManager->flush();

            $this->addFlash(
                'notice',
                'Votre figure a bien été modifiée.'
            );

            return $this->redirectToRoute('trick_show', ['slug' => $trick->getSlug()]);
        }

        return $this->render('trick/create_or_modify_trick.html.twig', [
            'form' => $form,
            'page_type' => 'modify',
            'slug' => $trick->getSlug(),
        ]);
    }
}
