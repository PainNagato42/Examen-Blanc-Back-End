<?php
/*
 * controleur : Préparer et afficher les statistique et verifie si on est connecté
 * parametres : néant
 * 
 */

// faire l'initialisation
include "library/init.php";

// verifie si on est connecté
if (!connected()) {
    // affiche le template du formulaire de connexion
    include "templates/pages/form-connexion.php";
    exit;
}

// faire le compte des propects pour chaque statut
$prospect = new prospect();
$qualifier = $prospect->compteurByStatut("à qualifier");
$suivre = $prospect->compteurByStatut("à suivre");
$abandonne = $prospect->compteurByStatut("abandonné");
$client = $prospect->compteurByStatut("devenu client");

// charger appel vide
$appel = new appel();

// afficher la template
$utilisateur = new utilisateur(monId());
include "templates/pages/statistique.php";