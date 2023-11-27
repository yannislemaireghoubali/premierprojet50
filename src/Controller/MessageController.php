<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/message/{numerodepartement}/{sexe}', name: 'message')]
    public function message(int $numerodepartement, string $sexe): Response
    {
        $reponse="";
        if ($sexe == "M"){
            $reponse = 'garçon';
        } elseif($sexe == "F") {
            $reponse = 'fille';
        } else {
            $reponse = 'sexe inconnue';
        }
        $date = date('d-m-y h:i:s');
        return $this->render('message/message.html.twig', 
                array("numerodepartement" => $numerodepartement, "sexe" => $reponse, "date" => $date));
    }
}
