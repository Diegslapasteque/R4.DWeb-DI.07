<?php
<<<<<<< HEAD

namespace App\Entity;

use App\Repository\LegoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LegoRepository::class)]
class Lego
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $collection = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?int $pieces = null;

    #[ORM\Column(length: 255)]
    private ?string $boxImage = null;

    #[ORM\Column(length: 255)]
    private ?string $legoImage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCollection(): ?string
    {
        return $this->collection;
    }

    public function setCollection(string $collection): static
    {
        $this->collection = $collection;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getPieces(): ?int
    {
        return $this->pieces;
    }

    public function setPieces(int $pieces): static
    {
        $this->pieces = $pieces;

        return $this;
    }

    public function getBoxImage(): ?string
    {
        return $this->boxImage;
    }

    public function setBoxImage(string $boxImage): static
    {
        $this->boxImage = $boxImage;

        return $this;
    }

    public function getLegoImage(): ?string
    {
        return $this->legoImage;
    }

    public function setLegoImage(string $legoImage): static
    {
        $this->legoImage = $legoImage;

        return $this;
    }
}
=======
namespace App\Entity;

Class Lego{

    public $id;
    public $name;
    public $collection;
    public $description;
    public $price;
    public $pieces;
    public $boxImage;
    public $legoImage;
    

    public function __construct($id, $name, $collection, $description, $price, $pieces, $boxImage, $legoImage){
        $this->id = $id;
        $this->name = $name;
        $this->collection = $collection;
        $this->description = $description;
        $this->price = $price;
        $this->pieces = $pieces;
        $this->boxImage = $boxImage;
        $this->legoImage = $legoImage;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getCollection(){
        return $this->collection;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getPieces(){
        return $this->pieces;
    }

    public function getBoxImage(){
        return $this->boxImage;
    }

    public function getLegoImage(){
        return $this->legoImage;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setCollection($collection){
        $this->collection = $collection;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function setPieces($pieces){
        $this->pieces = $pieces;
    }

    public function setBoxImage($boxImage){
        $this->boxImage = $boxImage;
    }

    public function setLegoImage($legoImage){
        $this->legoImage = $legoImage;
    }

    


}
>>>>>>> 29c242cf7b275bf568b8cae10e2186557e607719
