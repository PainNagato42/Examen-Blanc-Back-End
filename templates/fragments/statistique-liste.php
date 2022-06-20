<?php
/*
 * template fragment : Mise en forme de la liste des prospects
 * parametre : $liste : tableau simple
 * 
 */
?>
<table>
    <thead>
        <tr>
            <th>Raison sociale</th>
            <th>Code Siret</th>
            <th>Email</th>
            <th>Nom</th>
            <th>Date limite</th>
            <th>Statut</th>
            <th>Nombre d'appel</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste as $prospect) { ?>
            <tr class="text-center">
                <td><?= $prospect->html("sociale") ?></td>
                <td><?= $prospect->html("siret") ?></td>
                <td><?= $prospect->html("email") ?></td>
                <td><?= $prospect->html("nom") ?></td>
                <td><?= $prospect->html("date") ?></td>
                <td><?= $prospect->html("statut") ?></td>
                <td><?= $prospect->compteurByProspect($prospect->id()) ?></td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>