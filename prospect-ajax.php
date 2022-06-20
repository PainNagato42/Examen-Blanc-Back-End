<?php

/* 
 * controleur ajax : Afficher le detail du prospect
 * parametre : POST / GET id : id du prospect
 * retour: fragaments du detail du prospect
 */

// faire l'initialisation
include "library/init.php";

// verifie si on est connecté
if (!connected()) {
    exit;
}

$prospect = new prospect($_REQUEST["id"]);

// envoyer le fragments
include "templates/fragments/detail-prospect.php";