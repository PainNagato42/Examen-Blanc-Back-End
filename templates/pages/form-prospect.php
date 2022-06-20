<?php
/*
 * template page : Mise en forme du formulaire de creation du prospect
 * parametres : $utilisateur : utilisateur chargé
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire de création du prospect</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?= $utilisateur->headerUser() ?>
        <h1>Formulaire de création du prospect</h1>
        <div class="container-form">
            <form method="post" action="creer-prospect.php">
                <label>Raison sociale</label><br>
                <input class="large-100" type="text" name="sociale" required=""/><br>
                <label>Code Siret</label><br>
                <input class="large-100" type="text" name="siret" required=""/><br>
                <label>Email du contact</label><br>
                <input class="large-100" type="email" name="email" required=""/><br>
                <label>Nom du contact</label><br>
                <input class="large-100" type="text" name="nom" required=""/><br>
                <label>Date limite</label><br>
                <input class="large-100" type="date" name="date" required=""/><br>
                <label>Statut : <select name="statut">
                        <option value="à qualifier">à qualifier</option>
                        <option value="à suivre">à suivre</option>
                        <option value="abandonné">abandonné</option>
                        <option value="devenu client">devenu client</option>
                    </select></label><br><br>
                <input class="btn large-100" type="submit" value="Créer le prospect"/>
            </form>
        </div>
    </body>
</html>
