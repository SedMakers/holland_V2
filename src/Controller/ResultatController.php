<?php

namespace App\Controller;

use App\Entity\Riasec;
use App\Repository\IdentificationRepository;
use App\Repository\RiasecRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ResultatController extends AbstractController
{
    #[Route('/resultat', name: 'resultat_index')]
    public function index(
        RiasecRepository         $riasecRepository,
        EntityManagerInterface   $entityManager,
        IdentificationRepository $identificationRepository
    ): Response

    {
        $session = new Session();
        $riasec = $riasecRepository->findOneBy(["Identification" => $identificationRepository->findOneBy(['id' => $session->get('id')])]);
        return $this->render('resultat/index.html.twig', compact('riasec'));
    }

    #[Route('/reset', name: 'resultat_reset')]
    public function reset(
        RiasecRepository         $riasecRepository,
        EntityManagerInterface   $entityManager,
        AuthenticationUtils      $authenticationUtils,
        IdentificationRepository $identificationRepository
    ): Response

    {

        //get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->redirectToRoute('app_identification');
    }
}
