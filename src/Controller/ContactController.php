<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Contact;
use App\Service\GestionContact;

class ContactController extends AbstractController
{
    #[Route('/contact/demande', name: 'contact')]
    public function demandeContact(Request $request, GestionContact $gestionContact, EntityManagerInterface $manager): Response {
        $contact = new Contact();
        $form = $this->createFormBuilder($contact)
                ->add('titre', ChoiceType::class, array(
                    'choices' => array(
                        'Monsieur' => 'M',
                        'Madame' => 'F',
                        
                    ), 'multiple' => false,
                    'expanded' => true,
                ))
                ->add('nom', TextType::class, array(
                    'label' => 'Nom : ',
                    'required' => true,
                    'attr' => ['placeholder' => 'votre nom'],
                ))/**
                ->add('prenom', TextType::class, array(
                    'label' => 'Prenom : ',
                    'required' => true
                    ))*/
                ->add('mail', TextType::class, array(
                    'label' => 'Mail : ',
                    'required' => true
                    ))
                ->add('tel', TextType::class, array(
                    'label' => 'Telephone : ',
                    'required' => true
                    ))
                ->add('Envoyer', SubmitType::class)
                ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $gestionContact->creerContact($contact);
            $gestionContact->envoiMailContact($contact);
            return $this->redirectToRoute("app_homepage");
        }
        return $this->render('contact/index.html.twig', [
            'formContact' => $form->createView(),
            'titre' => 'Formulaire de contact',
        ]);
    }
}
