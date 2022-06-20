<?php
/*
 * controleur : préparer et afficher la page d'accueil et vérifie si connecté
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

$utilisateur = new utilisateur(monId());


// afficher la template
include "templates/pages/accueil.php";
