<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Employe;

class PrincipalController extends AbstractController
{
    #[Route('/employes', name: 'employes')]
    public function afficheEmployes(ManagerRegistry $doctrine): Response {
        $employes=$doctrine->getRepository(Employe::class)->findAll();
        $titre = "Liste des employés";
        return $this->render('principal/employes.html.twig', compact('titre','employes'));
    }
    
    #[Route('/employe/{id}', name: 'employe')]
    public function afficheUnEmployes(ManagerRegistry $doctrine, int $id): Response {
        $employe=$doctrine->getRepository(Employe::class)->find($id);
        $titre = "Employé n° " . $id;
        return $this->render('principal/unemploye.html.twig', compact('titre','employe'));
    }
    
    #[Route('/employetout/{id}', name: 'employetout', requirements:["id"=>"\d+"])]
    public function afficheUnEmployesTout(ManagerRegistry $doctrine, int $id): Response {
        $employe=$doctrine->getRepository(Employe::class)->find($id);
        $titre = "Employe";
        return $this->render('principal/unemployetout.html.twig', compact('titre','employe'));
    }
    
    #[Route('/lieu/', name: 'lieu')]
    public function Lieu(ManagerRegistry $doctrine, int $id): Response {
        $employe=$doctrine->getRepository(Employe::class)->findAll();
        $titre = "Select * from employe where idLieu=" . $id;
        return $this->render('principal/lieu.html.twig', compact('titre','employe'));
    }
}
