<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BienvenueController extends AbstractController
{
    #[Route('/welcome/{nom}', name: 'welcome')]
    public function welcome(string $nom): Response
    {
        return $this->render('principal/welcome.html.twig', array("nom" => $nom));
    }
}
