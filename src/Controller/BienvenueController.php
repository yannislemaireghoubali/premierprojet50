<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BienvenueController extends AbstractController
{
    #[Route('/welcome/{nom}', name: 'welcome')]
    public function index(): Response
    {
        return $this->render('principal/index.html.twig', array("nom" => $nom));
    }
}
