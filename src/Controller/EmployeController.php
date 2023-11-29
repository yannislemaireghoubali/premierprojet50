<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Employe;

class EmployeController extends AbstractController
{
    #[Route('/employe/voirmieux/{id}', name: 'app_employe', requirements:["id"=>"\d+"], defaults: ['id'=>'99'])]
    #[Route('/employe/voirnom/{nom}', name: 'app_employe', requirements:["id"=>"^\w[1,}"], defaults: ['nom'=>'benoit'])]
    public function VoirEmploye(ManagerRegistry $doctrine, int $id): Response
    {
        $employe=$doctrine->getRepository(Employe::class)->find($id);
        $titre = "Employé";
        return $this->render('employe/index.html.twig', compact('titre','employe'));
    }
}
