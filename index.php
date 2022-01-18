<?php

session_start();
include "classes/Article.php";
include "classes/Auteur.php";
include('classes/Commentaire.php');
include "classes/Categorie.php";

include "modele/ModeleGenerique.php";
include "modele/ModeleArticle.php";
include "modele/ModeleAuteur.php";
include "modele/ModeleCategorie.php";
include "modele/ModeleCommentaire.php";

include "controleur/Ctl_article.php";
include "controleur/Ctl_auteur.php";

$mdl_article = new ModeleArticle();
$mdl_auteur = new ModeleAuteur();

$Ctl_auteur = new Ctl_auteur();
$ctl_article = new Ctl_article();

$Ctl_auteur->Url_auteur();
$ctl_article->Url_article();


// $mdl_auteur->getAuteur($id);
$articles = $mdl_article->getAllArticle();
$auteurs = $mdl_auteur->getAllAuteur();

if (empty($_GET))
include('vues/accueil.phtml');