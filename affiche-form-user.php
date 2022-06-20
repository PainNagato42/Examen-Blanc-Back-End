<?php

/*
 * controleur : Préparer et afficher le formulaire de création d'un utilisateur et vérifie si on est connecté
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

// si l'utilisateur n'a pas le bon rôle
if ($utilisateur->get("role") != 1) {
    // afficher le template de non access
    include "templates/pages/non-access.php";
    exit;
}

// afficher le template du form utilisateur
    include "templates/pages/form-user.php";
