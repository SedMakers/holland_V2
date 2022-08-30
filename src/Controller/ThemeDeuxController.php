<?php

namespace App\Controller;

use App\Form\MetiersType;
use App\Repository\MetiersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeDeuxController extends AbstractController
{
    #[Route('/deux', name: 'deux_index')]
    public function index(
        Request $request,
        MetiersRepository $metiersRepository
    ): Response
    {
        $formMetiers = $this->createForm(MetiersType::class);
        $metier = $metiersRepository->findAll();
        $formMetiers->handleRequest($request);

        return $this->renderForm('theme_deux/index.html.twig', compact( 'formMetiers','metier'));
    }
}
