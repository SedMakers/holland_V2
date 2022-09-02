<?php

namespace App\Controller;

use App\Entity\Identification;
use App\Entity\Riasec;
use App\Form\IdentificationType;
use App\Repository\IdentificationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class IdentificationController extends AbstractController
{
    #[Route('/', name: 'app_identification')]
    public function index(
        EntityManagerInterface   $entityManager,
        IdentificationType       $identificationType,
        Request                  $request,
        IdentificationRepository $identificationRepository
    ): Response
    {
        $date = new \DateTimeImmutable('now');

        $user = new Identification();
        $form = $this->createForm(IdentificationType::class, $user);
        $form->handleRequest($request);
        $user->setDate($date);
        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager->persist($user);

            $entityManager->flush();
            $session = new Session();
            $idUser = $identificationRepository->findOneBy([], ['id' => 'DESC']);
            $session->set('id', $idUser->getId());
            $riasec = new Riasec();

            $riasec->setR(0);
            $riasec->setI(0);
            $riasec->setA(0);
            $riasec->setS(0);
            $riasec->setE(0);
            $riasec->setC(0);
            $riasec->setIdentification($idUser);
            $entityManager->persist($riasec);
            $entityManager->flush();

            return $this->redirectToRoute('accueil_index');
        }


        return $this->renderForm('identification/index.html.twig', compact('form'));
    }
}
