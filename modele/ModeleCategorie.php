<?php

class ModelCategorie extends ModeleGenerique{

    public function getAllCategorie(){

        $result = $this->getAll("categorie");

        $categories = [];

        foreach($result as $key => $value){

            extract($value);
    
            $categorie = new Categorie($nom);
            $categories[] = $categorie;

        }
        return $categories;
    }
}