<?php
/*
 * template page : Mise en forme des statistiques
 * parametre : $utilisateur : utilisateur chargé
 *             $qualifier : count pour le statut "à qualifier"
 *             $suivre : count pour le statut "à suivre"
 *             $abandonne : count pour le statut "abandonne"
 *             $client : count pour le statut "devenu client"
 * 
 */
?>
<!DOCTYPE html
<html>
    <head>
        <meta charset="UTF-8">
        <title>Statistiques</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?= $utilisateur->headerUser() ?>
        <h1>Statistiques</h1>
        <div class="container-tableau">
            <div>
                <h3>Nombres de prospect pour chaque statut</h3>
                <p><b><?= $qualifier ?></b> prospect(s) pour le statut "à qualifier".</p>
                <p><b><?= $suivre ?></b> prospect(s) pour le statut "à suivre".</p>
                <p><b><?= $abandonne ?></b> prospect(s) pour le statut "abandonné".</p>
                <p><b><?= $client ?></b> prospect(s) pour le statut "devenu client".</p>
            </div>
            <div>
                <h3>Choisissez un statut pour affiche la liste des prospects en fonction du statut choisi</h3>
                <select id="statut" onchange="afficheListeProspect()">
                    <option value="null">-- Statut --</option>
                    <option value="à qualifier">à qualifier</option>
                    <option value="à suivre">à suivre</option>
                    <option value="abandonné">abandonné</option>
                    <option value="devenu client">devenu client</option>
                </select><br><br>
                <div id="prospect">
                    
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
    </body>
</html>
