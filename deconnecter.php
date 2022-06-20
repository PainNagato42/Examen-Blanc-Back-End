<?php
/*
 * controleur : faire la deconnexion
 * parametres : neant
 * 
 */

// faire l'initialisation
include "library/init.php";

deconnect();

// afficher la template
include "templates/pages/form-connexion.php";