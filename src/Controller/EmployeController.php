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
    public function Voir(ManagerRegistry $doctrine, int $id): Response
    {
        $employe=$doctrine->getRepository(Employe::class)->find($id);
        $titre = "Employé";
        return $this->render('employe/index.html.twig', compact('titre','employe'));
    }
}
