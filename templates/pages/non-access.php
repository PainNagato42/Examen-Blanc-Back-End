<?php
/*
 * template page : Mise en forme de la page de non access
 * parametre : $utilisateur : utilisateur chargé
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page non autorisé</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?= $utilisateur->headerUser() ?>
        <h4 class="text-center">Vous n'avez pas les droits pour accéder à cette page</h4>
    </body>
</html>
