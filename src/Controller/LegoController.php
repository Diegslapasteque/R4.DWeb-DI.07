<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

/* indique l'utilisation du bon bundle pour gérer nos routes */
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/* le nom de la classe doit être cohérent avec le nom du fichier */
class LegoController extends AbstractController
{
    // L'attribute #[Route] indique ici que l'on associe la route
    // "/" à la méthode home() pour que Symfony l'exécute chaque fois
    // que l'on accède à la racine de notre site.

    #[Route('/', name: 'home')]
    public function home()
    {
        return new Response('<html><body><h1>Bienvenue sur la page d\'accueil</h1></body></html>');
    }
    
    #[Route('/about', name: 'about')]
    public function about()
    {
        return $this->render('|||.html.twig', [
            'msg' => 'Oui, c\'est bien moi !',
        ]);
    }
}