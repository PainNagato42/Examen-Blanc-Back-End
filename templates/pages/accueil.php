<?php
/*
 * template page : Mise en forme de l'accueil
 * parametres : $utilisateur : utilsateur chargé
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRM</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <div class="contain-btn">
            <p><?= isset($reussi) ? $reussi : ""; ?></p>
            <?= $utilisateur->accueilUser() ?>
        </div>
    </body>
</html>
