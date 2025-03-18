<?php 
namespace App\Service; 
use App\Entity\Lego; 
use \PDO;

class LegoService 
{ 
    private $cnx;

    public function __construct()
    {
        $this->cnx = new PDO("mysql:host=tp-symfony-mysql;dbname=lego_store", "root", "root");
    }

    public function getLegos(): array 
    { 
        $query = $this->cnx->query("SELECT * FROM lego");
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $legos = [];
        foreach ($results as $result) {
            $legos[] = new Lego(
                $result['id'], 
                $result['name'], 
                $result['collection_id'], 
                $result['description'],
                $result['price'],
                $result['pieces'],
                $result['box_image'], // Assurez-vous que ce nom de colonne est correct
                $result['lego_image']   // Assurez-vous que ce nom de colonne est correct
            );
        }

        return $legos; 
    } 

    public function getLegosByCollection(string $collection): array 
    { 
        $query = $this->cnx->prepare("SELECT * FROM lego WHERE collection_id = :collection");
        $query->execute(['collection' => $collection]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $legos = [];
        foreach ($results as $result) {
            $legos[] = new Lego(
                $result['id'], 
                $result['name'], 
                $result['collection'], 
                $result['description'],
                $result['price'],
                $result['pieces'],
                $result['imagebox'], // Assurez-vous que ce nom de colonne est correct
                $result['imagebg']   // Assurez-vous que ce nom de colonne est correct
            );
        }

        return $legos;
    }
} 
?>