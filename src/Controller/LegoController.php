<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Lego;
use App\Entity\LegoCollection;
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

    // Code rajouter pour l'ex 6 TP5
    public function __construct(private LegoCollectionRepository $collectionRepository) {}

    private function getAllCollections(): array
    {
        return $this->collectionRepository->findAll();
    }
    // 

    #[Route('/collection/{id}', name: 'collection')]
    public function collection(LegoCollection $collection): Response
    {
        $legos = $collection->getLegos();
        return $this->render('lego.html.twig', [
            'legos' => $legos,
            'collections' => $this->getAllCollections()
        ]);
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

        #[Route('/test/{id}', 'test')]
        public function test(LegoCollection $collection): Response
        {
            dd($collection);
        }
    
    
}
?>