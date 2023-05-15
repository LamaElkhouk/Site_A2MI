<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//ajout des entitées au dashboard le 15/05/2023
use App\Entity\EchoMer;
use App\Entity\Introduction;
use App\Entity\Logo;
use App\Entity\OngletsHeader;
use App\Entity\Service;
use App\Entity\User;

//seule les admins peuvent se connecter à l'espace administrateur
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    //seule les admin ont accés a l'espace admin ..
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // !!!!!!!!!!!!!!!!   Lignes décommentés et modifiés le  15/05/2023    !!!!!!!!!!!!!
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Site A2MI');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        //Ajout des icones aux dashboard, des classes administrable 15/05/2023
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('EchoMer', 'fas fa-list', EchoMer::class);
        yield MenuItem::linkToCrud('Introduction', 'fas fa-list', Introduction::class);
        yield MenuItem::linkToCrud('Logo', 'fas fa-list', Logo::class);
        yield MenuItem::linkToCrud('OngletsHeader', 'fas fa-list', OngletsHeader::class);
        yield MenuItem::linkToCrud('Service', 'fas fa-list', Service::class);
        

    }
}
