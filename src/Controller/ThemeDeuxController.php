<?php

namespace App\Controller;

use App\Form\MetiersType;

use App\Repository\IdentificationRepository;
use App\Repository\MetiersRepository;
use App\Repository\RiasecRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class ThemeDeuxController extends AbstractController
{
    #[Route('/deux/{serie}', name: 'deux_index')]
    public function index(
        Request                  $request,
        EntityManagerInterface   $entityManager,
        MetiersRepository        $metiersRepository,
        RiasecRepository         $riasecRepository,
        int                      $serie,
        IdentificationRepository $identificationRepository
    ): Response
    {
        $formMetiers = $this->createForm(MetiersType::class);
        $metiers = $metiersRepository->findBy(['serie' => $serie]);

        $formMetiers->handleRequest($request);

        if ($_POST) {

            $session = new Session();
            $resultat = $riasecRepository->findOneBy(["Identification" => $identificationRepository->findOneBy(['id' => $session->get('id')])]);
            switch ($serie) {
                case 1 :
                    $resultat->setR($resultat->getR() + count($_POST) - 1);
                    break;
                case 2 :
                    $resultat->setI($resultat->getI() + count($_POST) - 1);
                    break;
                case 3 :
                    $resultat->setA($resultat->getA() + count($_POST) - 1);
                    break;
                case 4 :
                    $resultat->setS($resultat->getS() + count($_POST) - 1);
                    break;
                case 5 :
                    $resultat->setE($resultat->getE() + count($_POST) - 1);
                    break;
                case 6 :
                    $resultat->setC($resultat->getC() + count($_POST) - 1);
                    break;
            }
            $entityManager->persist($resultat);
            $entityManager->flush();
            if ($serie < 6) {
                return $this->redirectToRoute('deux_index', ['serie' => $serie + 1]);
            }
            return $this->redirectToRoute('aptitudes_index', ['serie' => 1]);

        }
        return $this->renderForm('theme_deux/index.html.twig', compact('metiers', 'serie'));
    }
}

