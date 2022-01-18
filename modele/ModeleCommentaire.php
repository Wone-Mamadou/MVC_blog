<?php

class ModeleCommentaire extends ModeleGenerique{

    public function getCommentaire($id){

        $stmt = $this->pdo->prepare("SELECT * FROM commentaire c, article a WHERE c.article = a.id AND c.article = ?");
        $stmt->execute([$_GET['id'] ]);
        $resultat = $stmt->fetchAll();
  
        $commentaires = [];
  
        foreach($resultat as $key => $value){
              extract($value);
               $commentaire = new Commentaire($id, $pseudo, $contenus, $article);
  
               $commentaires[] = $commentaire;
              //  var_dump($commentaires);
        }
          return $commentaires;
      }
  
      public function insertCom($commentaire){
          $stmt = $this->pdo->prepare("INSERT INTO commentaire VALUES(NULL, ?, ?, now(),?)");
          $stmt->execute([
            $commentaire->getPseudo(),
            $commentaire->getContenus(),
            $_GET['id']
          ]);
      }
}