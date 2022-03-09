<?php

namespace App\Controller;

use App\Entity\Invoic;
use App\Form\InvoicType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $req, EntityManagerInterface $man): Response
    {

        $facture = new Invoic;
        $form = $this->createForm(InvoicType::class, $facture);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid()){

            $man->persist($facture);
            $man->flush();
            return $this->redirectToRoute('app_invoic_lines');
        
        }
        return $this->render('home/index.html.twig', [
            'form'=>$form->createView(),
        ]);
    }
}
