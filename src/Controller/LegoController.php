<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Lego;
use App\Service\LegoService;
use App\Repository\LegoCollectionRepository;

class LegoController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(LegoService $legoService): Response 
    {
        $legos = $legoService->getLegos();
        return $this->render('lego.html.twig', ['legos' => $legos]);
    }

        // Creator
        #[Route('/creator', name: 'creator')]
        public function creator(LegoService $legoService): Response 
        {
            $legos = $legoService->getLegosByCollection('Creator');
            return $this->render('lego.html.twig', ['legos' => $legos]);
        }

        // Star Wars
        #[Route('/star_wars', name: 'star_wars')]
        public function starWars(LegoService $legoService): Response 
        {
            $legos = $legoService->getLegosByCollection('Star Wars');
            return $this->render('lego.html.twig', ['legos' => $legos]);
        }

        // Creator Expert
        #[Route('/creator_expert', name: 'creator_expert')]
        public function creatorExpert(LegoService $legoService): Response 
        {
            $legos = $legoService->getLegosByCollection('Creator Expert');
            return $this->render('lego.html.twig', ['legos' => $legos]);
        }

        // test
        #[Route('/test/{id}', 'test')]
        public function test(int $id, LegoCollectionRepository $legoCollectionRepository): Response
        {
            $collection = $legoCollectionRepository->find($id);
            dd($collection);
        }
    
}
?>