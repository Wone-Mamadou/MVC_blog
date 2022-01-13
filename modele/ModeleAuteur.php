<?php

class ModeleAuteur extends ModeleGenerique{

    public function getAuteur($id){
        $res = $this->getOne("auteur", $id);
        extract($res);
        $auteur = new Auteur($id, $prenom, $nom, $login, $mdp);
        return $auteur;
    }

    public function getAllAuteur(){

        $resultat = $this->getAll("auteur");
        //   var_dump($resultat);
          $auteurs = [];

          foreach($resultat as $key => $value){
            //   var_dump($value);
            extract($value);
            
            $auteur = new Auteur($id, $prenom, $nom, $login, $mdp);

            $auteurs[] = $auteur; 
            // var_dump($auteurs);
          }
          return $auteurs;
    }

    public function inscription($auteur){
        $stmt = $this->pdo->prepare(" INSERT INTO auteur VALUES(NULL, ?, ?, ?, ?)");

        $stmt->execute([
            htmlentities($auteur->getPrenom()),
            htmlentities($auteur->getNom()),
            htmlentities($auteur->getLogin()),
            password_hash($auteur->getMdp(), PASSWORD_DEFAULT)
        ]);
    }

   

    public function connexion($login, $mdp){
        $stmt = $this->pdo->prepare("SELECT * FROM auteur WHERE login = ?");

        $stmt->execute([$login]);
        $res = $stmt->fetch();

        if(password_verify($mdp, $res['mdp'])){
            
            extract($res);
            $auteur = new Auteur($id, $prenom, $nom, $login);
            $_SESSION['auteur'] = Serialize($auteur);
        }
         
    
    }
}