<?php

namespace App\Controller;

use App\Entity\Personnalite;
use App\Entity\Riasec;
use App\Form\PersonnaliteType;
use App\Repository\PersonnaliteRepository;
use App\Repository\RiasecRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeQuatreController extends AbstractController
{
    #[Route('/themequatre/{serie}', name: 'themeQuatre_index')]
    public function index(
        Request                $request,
        EntityManagerInterface $entityManager,
        PersonnaliteRepository $personnaliteRepository,
        RiasecRepository       $riasecRepository,
        int                    $serie
    ): Response
    {


        $formPersonnalite = $this->createForm(PersonnaliteType::class);
        $personnalite = $personnaliteRepository->findBy(['serie' => $serie]);

        $formPersonnalite->handleRequest($request);
        dump($_POST);
        if ($_POST) {
            dump(count($_POST));
            $resultat = $riasecRepository->findOneBy(['id' => 1]);
            switch ($serie) {
                case 1 :
                    $resultat->setR($resultat->getR() + count($_POST));
                    break;
                case 2 :
                    $resultat->setI($resultat->getI() + count($_POST));
                    break;
                case 3 :
                    $resultat->setA($resultat->getA() + count($_POST));
                    break;
                case 4 :
                    $resultat->setS($resultat->getS() + count($_POST));
                    break;
                case 5 :
                    $resultat->setE($resultat->getE() + count($_POST));
                    break;
                case 6 :
                    $resultat->setC($resultat->getC() + count($_POST));
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
