<?php

class ModeleArticle extends ModeleGenerique{

    public function getAllArticle(){

        $resultat = $this->getAll("article");
        //   var_dump($resultat);
          $articles = [];

          foreach($resultat as $key => $value){
            //   var_dump($value);
            extract($value);
            $article = new Article($id, $titre, $contenu, $auteur, $categorie);

            $articles[] = $article; 
            // var_dump($articles);
          }
          return $articles;
    }

    public function getArticle($id){
        $res = $this->getOne("article" ,$id);
        extract($res);
        return new Article($id, $titre, $contenu, $auteur, $categorie);
    }

    public function delete($article){
      $stmt = $this->pdo->prepare("DELETE FROM article WHERE id = ?");
      $stmt->execute([$article->getId()]);
    }

    public function update($article){
      $stmt = $this->pdo->prepare("UPDATE article SET titre = ?, contenu = ? WHERE id = ?");

      $stmt->execute([
        $article->getTitre(),
        $article->getContenu(),
        $article->getId()
      ]);

    }

    public function insertNewArt($article){
      $stmt = $this->pdo->prepare("INSERT INTO article VALUES(NULL, ?, ?, now(), ?, ?)");
      $stmt->execute([
        htmlentities($article->getTitre()),
        htmlentities($article->getContenu()),
        htmlentities($article->getAuteur()),
        htmlentities($article->getCategorie())
        
      ]);
    }

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