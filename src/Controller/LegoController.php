<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Lego;
use App\Repository\LegoCollectionRepository;
use App\Repository\LegoRepository;

class LegoController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(LegoRepository $legoService): Response 
    {
        $legos = $legoService->findAll();
        return $this->render('lego.html.twig', ['legos' => $legos]);
    }

        // Creator
        #[Route('/creator', name: 'creator')]
        public function creator(LegoRepository $legoService): Response 
        {
            $legos = $legoService->getLegosByCollection('Creator');
            return $this->render('lego.html.twig', ['legos' => $legos]);
        }

        // Star Wars
        #[Route('/star_wars', name: 'star_wars')]
        public function starWars(LegoRepository $legoService): Response 
        {
            $legos = $legoService->getLegosByCollection('Star Wars');
            return $this->render('lego.html.twig', ['legos' => $legos]);
        }

        // Creator Expert
        #[Route('/creator_expert', name: 'creator_expert')]
        public function creatorExpert(LegoRepository $legoService): Response 
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