<?php

/* 
 * template de fragment : mise en forme du header pour administrateur
 * 
 */
?>
<header class="flex justify-end">
    <nav>
        <ul class="flex">
            <li><a href="index.php"><?php include "img/home.svg"; ?></a></li>
            <li><a href="affiche-form-user.php">Créer un utilisateur</a></li>
            <li><a href="affiche-form-prospect.php">Créer un prospect</a></li>
            <li><a href="affiche-liste-prospect.php">Suivi du prospect</a></li>
            <li><a href="affiche-statistique.php">Statistisques</a></li>
            <li><a href="deconnecter.php"><?php include "img/sign-out.svg"; ?></a></li>
        </ul>
    </nav>
</header>