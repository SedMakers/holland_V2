<?php

namespace App\Controller;

use App\Form\IdentificationType;
use App\Repository\IdentificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/home', name: 'accueil_index')]
    public function index(): Response
    {
       
        return $this->render('accueil/index.html.twig');
    }
}
