<?php

class Categorie{
    
    private $nom;

    public function __construct($nom = "")
    {
        $this->setNom($nom);
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function getNom(){return $this->nom;}
}