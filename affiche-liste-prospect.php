<?php
/*
 * controleur : Préparer et afficher la liste des prospect à suivre et vérifie si on est connecté
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

// faire la liste des prospect pour le statut à qualifier et à suivre
$prospect = new prospect();
$liste = $prospect->listeProspect();

$utilisateur = new utilisateur(monId());

// si l'utilisateur n'a pas le bon rôle
if ($utilisateur->get("role") != 1 and $utilisateur->get("role") != 3 and $utilisateur->get("role") != 4  ) {
    // afficher le template de non access
    include "templates/pages/non-access.php";
    exit;
}

// afficher le template du form utilisateur
    include "templates/pages/liste-prospect.php";