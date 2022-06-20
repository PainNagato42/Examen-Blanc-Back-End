<?php

/* 
 * template fragment : Mise en forme du tableau de la liste des prospects
 * parametres : $liste : tableau simple
 */

foreach ($liste as $prospect) { ?>
<tr class="text-center ligne" onclick="afficheDetail(<?= $prospect->id() ?>)">
    <td><?= $prospect->html("sociale") ?></td>
    <td><?= $prospect->html("statut") ?></td>
    <td><?= $prospect->html("date") ?></td>
</tr>
<?php }
