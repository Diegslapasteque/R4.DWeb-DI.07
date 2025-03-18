<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityController extends AbstractController
{
    #[Route('/login', name: 'lego_store_login')]
    public function login(AuthenticationUtils $authenticationUtils, UserPasswordHasherInterface $passwordHasher): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $user = new User(); // get the user from the database
        $plaintextPassword = 'mot_de_passe'; // the password the user entered

        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        
        if ($this->getUser()) {
            return $this->redirectToRoute('homepage');
        }

        return $this->render('login.html.twig', [
            $user->setPassword($hashedPassword),
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
}
?>