<?php
namespace App\Entity;

Class OldLego{

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