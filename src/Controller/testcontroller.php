<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


/* le nom de la classe doit être cohérent avec le nom du fichier */
class TestController
{
    /*
       La méthode que l'on veut exécuter en remplacement de la page
       par défaut de Symfony. Le nom de la méthode importe peu.
    */
    #[Route('/', name: 'home')]
    
    
    public function home()
    {
        die("Get lost.");
        
    }

    #[Route('/me', name: 'mael')]

    public function mael()
    {
        return new Response("Hello Mael !");
    }

    
}

