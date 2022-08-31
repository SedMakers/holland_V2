<?php

namespace App\Controller;

use App\Entity\Riasec;
use App\Repository\RiasecRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultatController extends AbstractController
{
    #[Route('/resultat', name: 'resultat_index')]
    public function index(RiasecRepository  $riasecRepository): Response
    {
        $riasec = $riasecRepository-> findAll() ;
        return $this->render('resultat/index.html.twig',compact('riasec'));
    }
}
