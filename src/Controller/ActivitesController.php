<?php

namespace App\Controller;

use App\Entity\Activites;
use App\Form\ActivitesType;
use App\Repository\ActivitesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActivitesController extends AbstractController
{
    #[Route('/activites/{serie}', name: 'activites_index')]
    public function index(
        Request                $request,
        EntityManagerInterface $entityManager,
        ActivitesRepository    $ActivitesRepository,
        int                    $serie
    ): Response
    {
        $formActivites = $this->createForm(ActivitesType::class);
        $activites = $ActivitesRepository->findBy(['serie' => $serie]);
        $formActivites->handleRequest($request);
        return $this->renderForm('activites/index.html.twig', compact('formActivites', 'activites'));
    }
}
