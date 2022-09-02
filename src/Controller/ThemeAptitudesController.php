<?php

namespace App\Controller;

use App\Entity\Aptitudes;
use App\Form\AptitudeType;


use App\Form\PersonnaliteType;
use App\Repository\AptitudesRepository;
use App\Repository\IdentificationRepository;
use App\Repository\RiasecRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class ThemeAptitudesController extends AbstractController
{
    #[Route('/aptitudes/{serie}', name: 'aptitudes_index')]
    public function index(
        Request                  $request,
        EntityManagerInterface   $entityManager,
        AptitudesRepository      $aptitudeRepository,
        RiasecRepository         $riasecRepository,
        int                      $serie,
        IdentificationRepository $identificationRepository
    ): Response
    {

        $formAptitudes = $this->createForm(AptitudeType::class);
        $aptitudes = $aptitudeRepository->findBy(['serie' => $serie]);

        $formAptitudes->handleRequest($request);

        if ($_POST) {
            $valeur = 0;
            foreach ($_POST as $choice) {
                if ($choice == 1) {
                    $valeur++;
                }
            }
            $session = new Session();
            $resultat = $riasecRepository->findOneBy(["Identification" => $identificationRepository->findOneBy(['id' => $session->get('id')])]);
            switch ($serie) {
                case 1 :
                    $resultat->setR($resultat->getR() + $valeur);
                    break;
                case 2 :
                    $resultat->setI($resultat->getI() + $valeur);
                    break;
                case 3 :
                    $resultat->setA($resultat->getA() + $valeur);
                    break;
                case 4 :
                    $resultat->setS($resultat->getS() + $valeur);
                    break;
                case 5 :
                    $resultat->setE($resultat->getE() + $valeur);
                    break;
                case 6 :
                    $resultat->setC($resultat->getC() + $valeur);
                    break;
            }
            $entityManager->persist($resultat);
            $entityManager->flush();
            if ($serie < 6) {
                return $this->redirectToRoute('aptitudes_index', ['serie' => $serie + 1]);
            }
            return $this->redirectToRoute('themeQuatre_index', ['serie' => 1]);

        }
        return $this->renderForm('theme_aptitudes/index.html.twig', compact('aptitudes', 'serie'));
    }

}
