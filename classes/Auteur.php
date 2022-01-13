<?php

class Auteur{

    private $id;
    private $prenom;
    private $nom;
    private $login;
    private $mdp;

    public function __construct($id = 0, $prenom = "", $nom = "", $login = "", $mdp = "")
    {
        $this->setId($id);
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setlogin($login);
        $this->setMdp($mdp);
    }

    public function setId($id){$this->id = $id;}
    public function getId(){return $this->id;}

    public function setPrenom($prenom){$this->prenom  = $prenom;}
    public function getPrenom(){return $this->prenom;}

    public function setNom($nom){$this->nom = $nom;}
    public function getNom(){return $this->nom;}

    public function setLogin($login){$this->login = $login;}
    public function getLogin(){return $this->login;}

    public function setMdp($mdp){$this->mdp = $mdp;}
    public function getMdp(){$this->mdp;}

}