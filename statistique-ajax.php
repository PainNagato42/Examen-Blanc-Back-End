<?php

/* 
 * controleur ajax : afficher la liste des prospects
 * parametres : POST / GET statut : statut donné
 * retour : fragment
 * 
 */

// faire l'initialisation
include "library/init.php";

// verifie si on est connecté
if (!connected()) {
    exit;
}

if ($_REQUEST["statut"] !== "null"){
    //faire la liste des prospect
$prospect = new prospect();
$liste = $prospect->select("WHERE `statut` = ", ":statut", "", $_REQUEST["statut"]);

// envoyer le fragment
include "templates/fragments/statistique-liste.php";
}
