<?php

/*
 * template fragment : Mise en forme de la liste de l'historique des appels
 * parametres : $liste : tabeleau simple
 * 
 */

foreach ($liste as $appel) {
    ?>
<p>date : <b><?= $appel->html("date") ?></b>, statut de l'appel : <b><?= $appel->afficheStatut() ?></b></p>
<?php

}

