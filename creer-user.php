<?php
/*
 * controleur : Création de l'utilisateur dans la BDD et vérifie si on est connecté
 * parametres : POST : nom, email, mdp, actif, role
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

// hasher le mot de passe
$mdp = password_hash(isset($_POST["mdp"]) ? $_POST["mdp"] : "", PASSWORD_DEFAULT );

// donner les valeurs saisie
$newUtilisateur = new utilisateur();
$newUtilisateur->set("nom", isset($_POST["nom"]) ? $_POST["nom"] : "");
$newUtilisateur->set("email", isset($_POST["email"]) ? $_POST["email"] : "");
$newUtilisateur->set("mdp", $mdp);
$newUtilisateur->set("actif", isset($_POST["actif"]) ? $_POST["actif"] : "");
$newUtilisateur->set("role", isset($_POST["role"]) ? $_POST["role"] : "");
$newUtilisateur->insert();

// afficher la template
$utilisateur = new utilisateur(monId());
$reussi = "Le compte à bien été créé";
include "templates/pages/accueil.php";