<?php
/*
 * template page : Mise en forme du formulaire de connexion
 * parametre : neant
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire de connexion</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <h1>Page de connexion</h1>
            <div class="container-form">
                <p><?= isset($reussi) ? $reussi : "" ?><?= isset($reinitReussi) ? $reinitReussi : "" ?><?= isset($echec) ? $echec : "" ?></p><br>
                <form method="POST" action="connecter.php">
                    <label>Email</label><br>
                    <input class="large-100" type="email" name="email" required=""/><br>
                    <label>Mot de passe</label><br>
                    <input class="large-100" type="password" name="mdp" required=""/><br>
                    <input class="btn text-center" type="submit" value="Se connecter"/>
                </form><br>
                <p class="text-center">Mot de passe oublié cliquez <a href="affiche-reinit-mdp.php"><u>ici</u></a></p>
            </div>
        </main>
    </body>
</html>
