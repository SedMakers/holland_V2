<?php

namespace App\Controller;

use App\Entity\Aptitudes;
use App\Form\AptitudeType;

use App\Repository\AptitudesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeAptitudesController extends AbstractController
{
    #[Route('/aptitudes', name: 'aptitudes_index')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        AptitudesRepository $aptitudeRepository
    ): Response
    {
        $aptitude = new Aptitudes();
        $aptitudeForm = $this->createForm(AptitudeType::class, $aptitude);
        $aptitude = $aptitudeRepository->findAll();
        $aptitudeForm->handleRequest($request);
        return $this->render('theme_aptitudes/index.html.twig', [
            'controller_name' => 'ThemeAptitudesController',
            'aptitudeForm' => $aptitudeForm->createView(),
            'aptitude' => $aptitude
        ]);
    }
}
