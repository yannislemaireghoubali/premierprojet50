<?php
namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Contact;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class GestionContact{
    private EntityManagerInterface $em;
    private MailerInterface $mailer;
    
    public function __construct(EntityManagerInterface $em, MailerInterface $mailer) {
        $this->em = $em;
        $this->mailer = $mailer;
    }

    public function creerContact(Contact $contact):void{
        $contact->setDatePremierContact(new DateTime());
        $this->em->persist($contact);
        $this->em->flush();
    }
    
    public function envoiMailContact(Contact $contact): void{
        $email = (new TemplatedEmail())
                ->from(new Address('benoit.roche@ac-nice.fr','Contact Symfony'))
                ->to($contact->getMail())
                ->subject('Demande de renseignement')
                ->text('Bonjour')
                ->attachFromPath('assets/pdf/presentation.pdf','Presentation')
                ->htmlTemplate('mails/mail.html.twig')
                ->context([
                    'contact' =>$contact,
                ]);
                
        $this->mailer->send($email);
    }
}