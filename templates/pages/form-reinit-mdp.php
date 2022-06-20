<?php
/*
 * Template page : Mise en forme du formulaire pour un nouveau mot de passe
 * paramètres : $utilisateur : utilisateur chargé
 * 
 * 
 */


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire de la réinitialisation du mot de passe</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <h1>Formulaire de la réinitialisation du mot de passe</h1>
        <p class="text-center"><?= isset($erreur) ? $erreur : "" ?></p>
        <form class="text-center" method="post" action="reinit-mdp-bdd.php?id=<?= $utilisateur->id() ?>" >
            <input type="hidden" name="code" value="<?= $utilisateur->get("reinit") ?>"/>
            <label>Nouveau mot de passe : <input type="password" name="mdp" required=""/></label><br><br>
            <label>Confirmer le mot de passe : <input type="password" name="mdp2" required=""/></label><br><br>
            <input type="submit" value="Rénitialiser mon mot de passe"/>
        </form>
    </body>
</html>
