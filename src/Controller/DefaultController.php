<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\OngletsHeader;
use App\Repository\OngletsHeaderRepository;

class DefaultController extends AbstractController
{
    public function __construct(private OngletsHeaderRepository $ongletRepository)
    {
    }

    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);




        return $this->render('default/index.html.twig', [
            'title' => 'Page accueil', 'onglets' => $onglets
        ]);
    }
}