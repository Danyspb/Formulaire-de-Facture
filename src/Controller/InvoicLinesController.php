<?php

namespace App\Controller;

use App\Entity\InvoicLines;
use App\Form\InvoicLineType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class InvoicLinesController extends AbstractController
{
    #[Route('/invoic/lines', name: 'app_invoic_lines')]
    public function index(Request $req, EntityManagerInterface $man, SessionInterface $session): Response
    {
        $infos = new InvoicLines;
        $form = $this->createForm(InvoicLineType::class, $infos);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            
            $ht = $infos->getQuantity() * $infos->getAmount();
            $tva = $infos->getVatAmount() / 100 ;
            $ttc = $ht * (1+$tva);
            $infos->setTotalVat($ttc);
            $man->persist($infos);
            $man->flush();
            $session->set("info", $infos);
            return $this->redirectToRoute('factureGet');
        }
        return $this->render('invoic_lines/index.html.twig', [
           'form' => $form->createView(),
        ]);
    }

    #[Route('/getFacture', name:'factureGet')]
    public function Donnes ( SessionInterface $session): Response
    {

        $in = $session->get('info');
        return $this->render('pdf/pdf.html.twig',[
            'facture'=> $in
        ]);
    }

}