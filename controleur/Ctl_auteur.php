<?php

class Ctl_auteur{

    public function Url_auteur(){

        $mdl_auteur = new ModeleAuteur();
        
        if(isset($_GET['action']) ){
            $action = $_GET['action'];
            
            if( $action == "inscription"){
                include "vues/inscription.phtml";

               if( isset($_POST['login'])){
                   extract($_POST);
                   $auteur = new Auteur(0, $prenom, $nom, $login, $mdp);
                   $mdl_auteur->inscription($auteur);
                   header("location: .");
                   exit;
               }
                
            }elseif( $action == "connexion"){

                include("vues/connexion.phtml");
                if( isset($_POST['login'])){
                    
                    $mdl_auteur->connexion($_POST['login'], $_POST['mdp']);
                    header("location: .");
                    exit;
                }
            }elseif($action == "deconnexion"){
                session_destroy();
                header("location: ?action=connexion");

            }

        }

    }
}