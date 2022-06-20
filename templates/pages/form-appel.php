<?php
/*
 * template page : Mise en forme du formulaire de l'appel
 * parametre : $liste : tableau simple, $utilisateur : utulisateur chargé, $prospect : prospect chargé
 * 
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire de l'appel</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?= $utilisateur->headerUser() ?>
        <div class="container">
            <h1>Formulaire de l'appel</h1>
            <div class="detail-appel">
                <h3>Détails du prospect</h3>
                <div class="line-height-25">
                    <p>Raison sociale : <b><?= $prospect->html("sociale") ?></b></p>
                    <p>Code Siret : <b><?= $prospect->html("siret") ?></b></p>
                    <p>Email : <b><?= $prospect->html("email") ?></b></p>
                    <p>Nom : <b><?= $prospect->html("nom") ?></b></p>
                    <p>Date limite : <b><?= $prospect->html("date") ?></b></p>
                    <p>Statut : <b><?= $prospect->html("statut") ?></b></p>
                </div>

                <div>
                    <h3>Historique des appels</h3>
                    <?= $appel->afficheHistorique($prospect->id()) ?>
                </div>
            </div>
            <div class="container-form margin-top-50">
                <form method="post" action="creer-appel.php">
                    <label>Déroulement de l'appel</label>
                    <textarea class="large-100" name="deroulement"></textarea><br><br>
                    <label>Statut : <select name="statut">
                            <option value="1">Argumenté</option>
                            <option value="0">Absent</option>
                        </select></label><br><br>
                    <input type="hidden" value="<?= $date ?>" name="date"/>
                    <input type="hidden" value="<?= $prospect->id() ?>" name="prospect"/>
                    <input class="btn large-100" type="submit" value="Terminer l'appel"/>
                </form>
            </div>
        </div>
    </body>
</html>
