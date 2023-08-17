<?php

namespace App\Controller\Trick;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    #[Route('/', name: 'tricks_list')]
    public function tricksList(): Response
    {
        return $this->render('trick/tricks_list.html.twig');
    }
}