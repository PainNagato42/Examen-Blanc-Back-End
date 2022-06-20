<?php
/*
 * controleur : Préparer et afficher le formulaire de création d'un appel et vérifie si on est connecté
 * parametres : GET id : id du prospect
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
if ($utilisateur->get("role") != 1 and $utilisateur->get("role") != 3 and $utilisateur->get("role") != 4  ) {
    // afficher le template de non access
    include "templates/pages/non-access.php";
    exit;
}

// charger l'objet prospect
$prospect = new prospect($_GET["id"]);

// chargé appel vide
$appel = new appel();

// date et heure du debut de l'appel
$date = date("Y-m-d H:i:s");

// afficher la template
include "templates/pages/form-appel.php";