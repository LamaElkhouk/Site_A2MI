<?php

namespace App\Controller;

use App\Entity\OngletsHeader;
use App\Repository\OngletsHeaderRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function __construct(private OngletsHeaderRepository $ongletRepository)
    {
    }

    #[Route('/Accueil', name: 'Accueil')]
    #[Route('/Services', name: 'Services')]

    public function header(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);

        $servicesActive = ($request->get('_route') === 'Services');

        return $this->render('default/index.html.twig', [
            'title' => 'Page accueil',
            'onglets' => $onglets,
            'servicesActive' => $servicesActive
        ]);
    }
}