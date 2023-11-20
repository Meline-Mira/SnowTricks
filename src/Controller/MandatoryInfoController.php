<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MandatoryInfoController extends AbstractController
{
    #[Route('/mandatory-info', name: 'mandatory_info')]
    public function mandatoyInfo(): Response
    {
        return $this->render('mandatory_info.html.twig');
    }
}
