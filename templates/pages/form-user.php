<?php
/*
 * template page : Mise en forme du dormulaire de création de l'utilisateur
 * parametres : $utilisateur : utilisateur chargé
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire de création de l'utilisateur</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?= $utilisateur->headerUser() ?>
        <h1>Formulaire de création de l'utilisateur</h1>
        <div class="container-form">
            <form method="post" action="creer-user.php">
                <label>Nom</label><br>
                <input class="large-100" type="text" name="nom" required=""/><br>
                <label>Email</label><br>
                <input class="large-100" type="email" name="email" required=""/><br>
                <label>Mot de passe</label><br>
                <input class="large-100" type="password" name="mdp" required=""/><br>
                <label>Actif : <label>Oui <input type="radio" name="actif" value="1"/></label> <label>Non <input type="radio" name="actif" value="0"/></label></label><br><br>
                <label>Rôle : <select name="role">
                        <option value="1">Administrateur</option>
                        <option value="2">Créateur</option>
                        <option value="3">Prospecteur</option>
                        <option value="4">Créateur et Prospecteur</option>
                    </select></label><br><br>
                <input class="btn large-100" type="submit" value="Créer le compte"/>
            </form>
        </div>
    </body>
</html>
