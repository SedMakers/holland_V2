<?php

namespace App\Controller;

use App\Form\PersonnaliteType;
use App\Repository\IdentificationRepository;
use App\Repository\PersonnaliteRepository;
use App\Repository\RiasecRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class ThemeQuatreController extends AbstractController
{
    #[Route('/themequatre/{serie}', name: 'themeQuatre_index')]
    public function index(
        Request                  $request,
        EntityManagerInterface   $entityManager,
        PersonnaliteRepository   $personnaliteRepository,
        RiasecRepository         $riasecRepository,
        int                      $serie,
        IdentificationRepository $identificationRepository
    ): Response
    {
        $formPersonnalite = $this->createForm(PersonnaliteType::class);
        $personnalite = $personnaliteRepository->findBy(['serie' => $serie]);

        $formPersonnalite->handleRequest($request);

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
                return $this->redirectToRoute('themeQuatre_index', ['serie' => $serie + 1]);
            }
            return $this->redirectToRoute('resultat_index');

        }
        return $this->renderForm('theme_quatre/index.html.twig', compact('personnalite', 'serie'));
    }
}
