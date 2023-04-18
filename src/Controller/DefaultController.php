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

        $Active = ($request->get('_route') === 'Services');

        return $this->render('default/index.html.twig', [
            'title' => 'Page accueil',
            'onglets' => $onglets,
            'Active' => $Active
        ]);
    }

    //liens vers les services

    #[Route('/Service_informatique', name: 'Service_informatique')]
    public function service_informatique(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);

        return $this->render('default/services/serviceInformatique.html.twig', [
            'onglets' => $onglets
        ]);
    }

    #[Route('/Communication', name: 'Communication')]
    public function Communication(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/services/communication.html.twig', [
            'onglets' => $onglets
        ]);
    }

    #[Route('/Assistance', name: 'Assistance')]
    public function Assistance(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/services/assistance.html.twig', [
            'onglets' => $onglets
        ]);
    }

    #[Route('/Formation', name: 'Formation')]
    public function Formation(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/services/formation.html.twig', [
            'onglets' => $onglets
        ]);
    }


    #[Route('/Gestion_administrative', name: 'Gestion_administrative')]
    public function Gestion_administrative(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/services/gestionAdministrative.html.twig', [
            'onglets' => $onglets
        ]);
    }

    #[Route('/Site_internet', name: 'Site_internet')]
    public function Site_internet(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/services/siteInternet.html.twig', [
            'onglets' => $onglets
        ]);
    }

    //lien vers la page agence

    #[Route('/Agence', name: 'Agence')]
    public function Agence(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/agence.html.twig', [
            'onglets' => $onglets
        ]);
    }

    //lien vers la page mon compte
    #[Route('/Mon_compte', name: 'Mon_compte')]
    public function Mon_compte(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/monCompte.html.twig', [
            'onglets' => $onglets
        ]);
    }
}