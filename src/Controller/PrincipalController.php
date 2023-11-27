<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrincipalController extends AbstractController
{
    #[Route('/principal', name: 'app_principal')]
    public function index(): Response
    {
        $employes=$doctrine->getRepository(Employe::class)->findAll();
        $titre = "Liste des employés";
        return $this->render('principal/employes.html.twig', compact('titre','employes'));
    }
}
