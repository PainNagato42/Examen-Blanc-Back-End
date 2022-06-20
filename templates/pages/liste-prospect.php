<?php
/*
 * template page : Mise en forme de la liste des prospects
 * parametres : $liste : tableau simple, $utilisateur : utilisateur chargé
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des prospects</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?= $utilisateur->headerUser() ?>
        <h1>Liste des prospects de statut "à qualifier" ou "à suivre"</h1>
        <div class="flex container">
            <div>
                <table>
                    <thead>
                        <tr class="boreder-bottom">
                            <th>Raison sociale</th>
                            <th>Statut</th>
                            <th>Date limite</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include "templates/fragments/tableau-prospect.php"; ?>
                    </tbody>
                </table>
            </div>
            <div class="detail" id="detail">
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/ajax.js" type="text/javascript"></script>
    </body>
</html>
