<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
//ajouté le 05/05/2023
use App\Entity\OngletsHeader;
use App\Repository\OngletsHeaderRepository;
//formulaire d'inscription
use App\Entity\User;
use App\Form\InscriptionType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

//ajouter le 15-05-2023
use Symfony\Component\Form\FormError;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    public function __construct(private OngletsHeaderRepository $ongletRepository/*, private UserPasswordEncoderInterface $passwordEncoder*/)
    {
    }
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        
        //pour affihcer les onglets de l'entete de page
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error, 'onglets' => $onglets]);
    }

    //a ete ajouté le 05-05-2023
    #[Route(path: '/inscription', name: 'inscription')]
    public function formulaire(Request $request, EntityManagerInterface $entityManager /*,UserPasswordEncoderInterface $passwordEncoder*/):Response
    {
        //pour affihcer les onglets de l'entete de page
        $onglets = $this->ongletRepository->findAll(OngletsHeader::class);
        //on créer une instance de la class User
        $user= new User();
        //on fait appel au formulaire
        $form = $this->createForm(InscriptionType::class,$user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { //si les infos sont valide et qu'on clique sur le boutton "envoyer"

            // Encodez le mot de passe de l'utilisateur (si vous utilisez un encodeur de mots de passe)
            /*$password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);*/
            // Traitez les données du formulaire ici
            $entityManager->persist($user);
            $entityManager->flush(); // ajoute les données dans la base !

            // Redirigez ou affichez un message de confirmation
            $this->addFlash('notice', 'Message Envoyé!');
            return $this->redirectToRoute('accueil');
        }

           // Ajouter cette condition pour afficher une erreur
    if ($form->isSubmitted() && !$form->isValid()) {
        $form->addError(new FormError('Il y a des erreurs dans le formulaire.'));
    }

        return $this->render('security/inscription.html.twig', [
            'inscriptionForm' => $form->createView(),
            'onglets' => $onglets
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
