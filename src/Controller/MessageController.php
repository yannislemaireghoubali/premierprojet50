<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/message/{numerodepartement}/{sexe}', name: 'app_message')]
    public function message(int $numerodepartement, string $sexe): Response
    {
        return $this->render('message/message.html.twig', array("numerodepartement" => $numerodepartement, "sexe" => $sexe));
    }
}
