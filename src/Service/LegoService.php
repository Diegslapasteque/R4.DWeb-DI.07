<?php

// Là ou la classe est déclarée (où son fichier se trouve)
namespace App\Service;

use App\Entity\Lego;
use PDO;

class LegoService
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=tp-symfony-mysql;dbname=lego_store', 'root', 'root');
    }
    
    

    public function getLego(int $id): Lego
    {      
        $donnees = $this->pdo->prepare('SELECT * FROM lego WHERE id = :id');
        $donnees->bindParam(':id', $id);
        $donnees->execute();
        $obj = $donnees->fetch(PDO::FETCH_ASSOC);

        $objdonnees = new Lego(
            $obj['id'],
            $obj['name'],
            $obj['collection'],
            $obj['description'],
            $obj['price'],
            $obj['pieces'],
            $obj['imagebox'],
            $obj['imagebg']
        );
        return $objdonnees;
        
       /* $lego = new Lego(
             10252,
            'La coccinelle Volkwagen',
             'Creator Expert',
             'Construis une réplique LEGO® Creator Expert de l\'automobile la plus populaire au monde. Ce magnifique modèle LEGO est plein de détails authentiques qui capturent le charme et la personnalité de la voiture, notamment un coloris bleu ciel, des ailes arrondies, des jantes blanches avec des enjoliveurs caractéristiques, des phares ronds et des clignotants montés sur les ailes.',
             94.99,
             1167,
             'LEGO_10252_Box.png',
             'LEGO_10252_Main.jpg'
        );

        

        return $lego;*/
    }

    public function getLegos(): array
    {
        $donnees = $this->pdo->prepare('SELECT * FROM lego');
        $donnees->execute();
        $legos = [];

        while ($obj = $donnees->fetch(PDO::FETCH_ASSOC)) {
            $objdonnees = new Lego(
                $obj['id'],
                $obj['name'],
                $obj['collection'],
                $obj['description'],
                $obj['price'],
                $obj['pieces'],
                $obj['imagebox'],
                $obj['imagebg']
            );
            $legos[] = $objdonnees;
        }

        return $legos;
    }
}