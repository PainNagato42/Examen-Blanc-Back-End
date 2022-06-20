<?php
/*
 * controleur : Création de l'appel dans la BDD et vérifie si on est connecté
 * parametres : POST : deroulement, statut, date, prospect
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

// donner les valeurs saisie
$appel = new appel();
$appel->set("prospect", isset($_POST["prospect"]) ? $_POST["prospect"] : 0);
$appel->set("date", isset($_POST["date"]) ? $_POST["date"] : "");
$appel->set("deroulement", isset($_POST["deroulement"]) ? $_POST["deroulement"] : "");
$appel->set("statut", isset($_POST["statut"]) ? $_POST["statut"] : 0);
$appel->insert();

// afficher la template
$utilisateur = new utilisateur(monId());
$reussi = "L'appel à bien été enregistré";
include "templates/pages/accueil.php";