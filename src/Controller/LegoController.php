<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Lego;
use App\Entity\LegoCollection;
use App\Repository\LegoCollectionRepository;
use App\Repository\LegoRepository;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Event\LogoutEvent;

class LegoController extends AbstractController
{
    private LegoCollectionRepository $collectionRepository;
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(LegoCollectionRepository $collectionRepository, UrlGeneratorInterface $urlGenerator)
    {
        $this->collectionRepository = $collectionRepository;
        $this->urlGenerator = $urlGenerator;
    }

    public static function getSubscribedEvents(): array
    {
        return [LogoutEvent::class => 'onLogout'];
    }

    public function onLogout(LogoutEvent $event): void
    {
        // get the security token of the session that is about to be logged out
        $token = $event->getToken();

        // get the current request
        $request = $event->getRequest();

        // get the current response, if it is already set by another listener
        $response = $event->getResponse();

        // configure a custom logout response to the homepage
        $response = new RedirectResponse(
            $this->urlGenerator->generate('homepage'),
            RedirectResponse::HTTP_SEE_OTHER
        );
        $event->setResponse($response);
    }

    private function getAllCollections(): array
    {
        return $this->collectionRepository->findAll();
    }

    #[Route('/', name: 'home')]
    public function home(LegoRepository $legoService): Response 
    {
        $legos = $legoService->findAll();
        $collections = $this->getAllCollections();
        $loginPage = $this->urlGenerator->generate('lego_store_login', [], UrlGeneratorInterface::ABSOLUTE_URL);

        return $this->render('lego.html.twig', [
            'login' => $loginPage,
            'legos' => $legos,
            'collections' => $collections
        ]);
    }

    #[Route('/collection/{id}', name: 'collection')]
    public function collection(LegoCollection $collection): Response
    {
        $legos = $collection->getLegos();
        $collections = $this->getAllCollections();
        return $this->render('lego.html.twig', [
            'legos' => $legos,
            'collections' => $collections,
            'collection' => $collection
        ]);
    }
}
?>