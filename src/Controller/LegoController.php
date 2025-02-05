<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Lego;

use App\Service\LegoService;


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


    
    public function home(LegoService $legoService): Response
    {
        $legos= $legoService->getLegos();
        return $this->render('lego.html.twig', [ "legos" => $legos]);
    }

    
}

