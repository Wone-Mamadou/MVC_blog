<?php

class Ctl_article{

    public function Url_article(){
        $mdl_auteur = new ModeleAuteur();
        $mdl_article = new ModeleArticle();

                            // pour différencier "update" et "ajout"
        if( isset($_POST['titre']) && !empty($_POST['id']) ){
            $article = $mdl_article->getArticle($_POST['id']);
            $article->setTitre($_POST['titre']);
            $article->setContenu($_POST['contenu']);

            $mdl_article->update($article);

            header("location: ?action=adminArt");
            exit;
        }

        

        if( isset($_GET['action'])){
            $action = $_GET['action'];

            if( $action == "getArt" && ctype_digit($_GET['id']) ){
                
                $article = $mdl_article->getArticle($_GET['id']);
                $commentaires = $mdl_article->getCommentaire($_GET['id']);
                include "vues/article.phtml";
            }elseif( $action == "adminArt"){
                
                $articles = $mdl_article->getAllArticle();

                include "vues/admin.phtml";

            }else if($action == "delete" && ctype_digit($_GET['id'])){

                $article = $mdl_article->getArticle($_GET['id']);
                $mdl_article->delete($article);

                header("location: ?action=adminArt");
                exit;
            }elseif($action == "update" && ctype_digit($_GET['id'])){

                $article = $mdl_article->getArticle($_GET['id']);

            }elseif($action == "newArticle"){
                $articles = $mdl_article->getAllArticle();
                $auteurs = $mdl_auteur->getAllAuteur();

                if(!empty($_POST['titre']) ){
                    extract($_POST);
                    $article = new Article(0, $titre, $contenu, $auteur, $categorie);
                    $mdl_article->insertNewArt($article);
                    header("location: ?action=adminArt");
                    exit;
                }

                include "vues/newArticle.phtml";
            }

        }

        if(isset($_POST['pseudo']) ){
            //var_dump($_POST);
            extract($_POST);
            $commentaire = new Commentaire(0, $pseudo, $contenus, $article);
            $mdl_article->insertCom($commentaire);
            header("location: ?action=newArt");
            exit;

        }
    }
}
