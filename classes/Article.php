<?php

class Article{

    private $id;
    private $titre;
    private $contenu;
    private $auteur;
    private $categorie;


    public function __construct($id = 0, $titre = "", $contenu = "", $auteur = 0, $categorie = 0)
    {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setContenu($contenu);
        $this->setAuteur($auteur);
        $this->setCategorie($categorie);
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}

    public function setTitre($titre){$this->titre = $titre;}
    public function getTitre(){return $this->titre;}

    public function setContenu($contenu){$this->contenu = $contenu;}
    public function getContenu(){return $this->contenu;}

    public function setAuteur($auteur){$this->auteur = $auteur;}
    public function getAuteur(){return $this->auteur;}

    public function setCategorie($categorie){$this->categorie = $categorie;}
    public function getCategorie(){return $this->categorie;}
    
}