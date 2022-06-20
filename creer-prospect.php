<?php
/*
 * controleur : Création du prospect dans la BDD et vérifie si on est connecté
 * parametres : POST : sociale, siret, email, nom, date, statut
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
$prospect = new prospect();
$prospect->set("sociale", isset($_POST["sociale"]) ? $_POST["sociale"] : "");
$prospect->set("siret", isset($_POST["siret"]) ? $_POST["siret"] : "");
$prospect->set("email", isset($_POST["email"]) ? $_POST["email"] : "");
$prospect->set("nom", isset($_POST["nom"]) ? $_POST["nom"] : "");
$prospect->set("date", isset($_POST["date"]) ? $_POST["date"] : "");
$prospect->set("statut", isset($_POST["statut"]) ? $_POST["statut"] : "");
$prospect->insert();

// afficher la template
$utilisateur = new utilisateur(monId());
$reussi = "Le prospect à bien été créé";
include "templates/pages/accueil.php";