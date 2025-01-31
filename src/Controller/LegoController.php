<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Lego;


/* le nom de la classe doit être cohérent avec le nom du fichier */
/*class TestController extends AbstractController
{
    
       La méthode que l'on veut exécuter en remplacement de la page
       par défaut de Symfony. Le nom de la méthode importe peu.
    
    #[Route('/', name: 'home')]

    
    
    
    public function home(): Response
    {
        $userFirstName = "Mael";
        
        return $this->render('test.html.twig',[
            // this array defines the variables passed to the template,
            // where the key is the variable name and the value is the variable value
            // (Twig recommends using snake_case variable names: 'foo_bar' instead of 'fooBar')
            'user_name' => $userFirstName,
            
        ]);
    }
    

    #[Route('/me', name: 'mael')]

    public function mael()
    {
        return new Response("Hello Mael !");
    }

    
}*/

class LegoController extends AbstractController
{
    #[Route('/lego', name: 'lego')]

    public function lego(): Response
    {
        
        $lego = new Lego(
             10252,
            'La coccinelle Volkwagen',
             'Creator Expert',
             'Construis une réplique LEGO® Creator Expert de l\'automobile la plus populaire au monde. Ce magnifique modèle LEGO est plein de détails authentiques qui capturent le charme et la personnalité de la voiture, notamment un coloris bleu ciel, des ailes arrondies, des jantes blanches avec des enjoliveurs caractéristiques, des phares ronds et des clignotants montés sur les ailes.',
             94.99,
             1167,
             'LEGO_10252_Box.png',
             'LEGO_10252_Main.jpg'
        );

        return $this->render('lego.html.twig', [ "lego" => $lego]);

            

        
    }
}

