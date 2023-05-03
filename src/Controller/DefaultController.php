<?php

namespace App\Controller;

use App\Entity\OngletsHeader;
use App\Entity\Introduction;
use App\Entity\Video;
use App\Entity\Service;
use App\Entity\EchoMer;
use App\Repository\EchoMerRepository;
use App\Repository\ServiceRepository;
use App\Repository\OngletsHeaderRepository;
use App\Repository\IntroductionRepository;
use App\Repository\VideoRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DefaultController extends AbstractController
{
    public function __construct(private OngletsHeaderRepository $ongletRepository, private IntroductionRepository $introductionRepository,
        private VideoRepository $videoRepository, private ServiceRepository $serviceRepository, private EchoMerRepository $echoMerRepository)
    {
    }


    #[Route('/accueil', name: 'accueil')]
    #[Route('/services', name: 'services')]

    public function header(Request $request): Response
    {
        //onglets du header
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);

        //introduction sur la page d'accueil
        $introduction = $this->introductionRepository->findAll(Introduction::class);

        //lien vers la video

        $video = $this->videoRepository->findAll(Video::class);

        //section services 02-05-2023

        $service = $this->serviceRepository->findAll(Service::class);

        //section echo-mer 03-05-2023

        $echoMer = $this->echoMerRepository->findAll(EchoMer::class);
        return $this->render('default/index.html.twig', [
            'onglets' => $onglets,
            'introduction' => $introduction,
            'video' => $video,
            'service' => $service,
            'echoMer'=> $echoMer
        ]);
    }

    //liens vers les services

    #[Route('/service_informatique', name: 'service_informatique')]
    public function service_informatique(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);

        return $this->render('default/services/serviceInformatique.html.twig', [
            'onglets' => $onglets
        ]);
    }

    #[Route('/communication', name: 'communication')]
    public function Communication(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/services/communication.html.twig', [
            'onglets' => $onglets
        ]);
    }

    #[Route('/assistance', name: 'assistance')]
    public function Assistance(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/services/assistance.html.twig', [
            'onglets' => $onglets
        ]);
    }

    #[Route('/formation', name: 'formation')]
    public function Formation(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/services/formation.html.twig', [
            'onglets' => $onglets
        ]);
    }


    #[Route('/gestion_administrative', name: 'gestion_administrative')]
    public function Gestion_administrative(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/services/gestionAdministrative.html.twig', [
            'onglets' => $onglets
        ]);
    }

    #[Route('/site_internet', name: 'site_internet')]
    public function Site_internet(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/services/siteInternet.html.twig', [
            'onglets' => $onglets
        ]);
    }

    //lien vers la page agence

    #[Route('/agence', name: 'agence')]
    public function Agence(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/agence.html.twig', [
            'onglets' => $onglets
        ]);
    }

    //lien vers la page mon compte
    #[Route('/mon_compte', name: 'mon_compte')]
    public function Mon_compte(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/monCompte.html.twig', [
            'onglets' => $onglets
        ]);
    }

    //lien vers la page mon compte
    #[Route('/contact', name: 'contact')]
    public function Contact(Request $request): Response
    {
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        return $this->render('default/contact.html.twig', [
            'onglets' => $onglets
        ]);
    }
}