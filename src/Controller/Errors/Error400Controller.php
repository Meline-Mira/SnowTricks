<?php

namespace App\Controller\Errors;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Error400Controller extends AbstractController
{
    #[Route('/error/400', name: 'error_400')]
    public function error400(): Response
    {
        return $this->render('error/400.html.twig');
    }
}