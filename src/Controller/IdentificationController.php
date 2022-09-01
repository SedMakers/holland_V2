<?php

namespace App\Controller;

use App\Entity\Identification;
use App\Form\IdentificationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class IdentificationController extends AbstractController
{
    #[Route('/identification', name: 'app_identification')]
    public function index(
        EntityManagerInterface $entityManager,
        IdentificationType     $identificationType,
        Request                $request
    ): Response
    {
        $date = new \DateTimeImmutable('now');

        $user = new Identification();
        $form = $this->createForm(IdentificationType::class, $user);
        $form->handleRequest($request);
        $user->setDate($date);
        dump($user);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($user);
            dump($user);

            $entityManager->flush();
            return $this->redirectToRoute('accueil_index');
        }


        return $this->renderForm('identification/index.html.twig', compact('form'));
    }
}
