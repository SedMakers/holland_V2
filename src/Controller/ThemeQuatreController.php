<?php

namespace App\Controller;

use App\Form\PersonnaliteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeQuatreController extends AbstractController
{
    #[Route('/themequatre', name: 'themeQuatre_index')]
    public function index(
        Request $request
    ): Response
    {
        $formPersonnalite =$this->createForm(PersonnaliteType::class);
        $formPersonnalite->handleRequest($request);

        return $this->renderForm('theme_quatre/index.html.twig', compact('formPersonnalite'));
    }
}
