<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeAptitudesController extends AbstractController
{
    #[Route('/aptitudes', name: 'aptitudes_index')]
    public function index(): Response
    {
        return $this->render('theme_aptitudes/index.html.twig', [
            'controller_name' => 'ThemeAptitudesController',
        ]);
    }
}
