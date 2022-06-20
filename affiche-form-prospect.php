<?php
/*
 * controleur : 
 * parametres : 
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
if ($utilisateur->get("role") != 1 and $utilisateur->get("role") != 2 and $utilisateur->get("role") != 4  ) {
    // afficher le template de non access
    include "templates/pages/non-access.php";
    exit;
}

// afficher le template du form utilisateur
    include "templates/pages/form-prospect.php";