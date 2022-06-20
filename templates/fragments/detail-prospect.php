<?php

/* 
 * fragment : Mise en forme du detail du prospect
 * parametre : $prospect : propect chargé
 * 
 */
?>
<div class="cross" onclick="retireDetail()"><?php include "img/cross.svg"; ?></div>
<div>
    <p>Raison sociale : <b><?= $prospect->html("sociale") ?></b></p>
    <p>Code Siret : <b><?= $prospect->html("siret") ?></b></p>
    <p>Email : <b><?= $prospect->html("email") ?></b></p>
    <p>Nom : <b><?= $prospect->html("nom") ?></b></p>
    <p>Date limite : <b><?= $prospect->html("date") ?></b></p>
    <p>Statut : <b><?= $prospect->html("statut") ?></b></p>
</div>
<p><a class="btn" href="affiche-form-appel.php?id=<?= $prospect->id() ?>">Enregistrer l'appel</a></p>
