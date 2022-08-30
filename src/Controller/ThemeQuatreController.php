<?php

namespace App\Controller;

use App\Entity\Personnalite;
use App\Form\PersonnaliteType;
use App\Repository\PersonnaliteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeQuatreController extends AbstractController
{
    #[Route('/themequatre', name: 'themeQuatre_index')]
    public function index(
        Request                $request,
        EntityManagerInterface $entityManager,
        PersonnaliteRepository $personnaliteRepository
    ): Response
    {

        $formPersonnalite = $this->createForm(PersonnaliteType::class);
        $personnalite = $personnaliteRepository->findAll();
        $formPersonnalite->handleRequest($request);

        return $this->renderForm('theme_quatre/index.html.twig', compact('formPersonnalite', 'personnalite'));
    }
}
