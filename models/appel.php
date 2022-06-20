<?php

/*
 * moedel appel de la table appel
 */

class appel extends _model {

    //attributs
    protected $table = "appel";
    protected $attributs = ["prospect" => "LINK", "date" => "TEXT", "deroulement" => "TEXT", "statut" => "NUM"];
    protected $target = ["prospect" => "prospect"];

    function historiqueAppel($id) {
        // Rôle: recuperer les objet ayant l'id du prospect donné
        // Retour : tableau simple
        // Parametre : $id : id du prospect
        // construction de la requete
        $sql = "SELECT * FROM `$this->table` WHERE `prospect` = :prospect";
        $param = [":prospect" => $id];

        // Tranforrmer le résultat de la reqûete en un tableau d'objets
        return $this->sqlToTabObj($sql, $param);
    }

    function afficheHistorique($id) {
        // Rôle: affiche la liste si y a une liste
        // Retour : tableau simple
        // Parametre : $id : id du prospect

        if ($this->historiqueAppel($id)) {
            // faire la liste des appel pour l'historique
            $appel = new appel();
            $liste = $appel->historiqueAppel($_GET["id"]);
            include "templates/fragments/liste-historique.php";
        } else {
            echo "Aucun historique";
        }
    }

    function afficheStatut() {
        // Rôle : affiche le statut en clair
        // Retour : statut en clair
        // parametres : neant
        
        if ($this->get("statut") == 0) {
            echo "Absent";
        } else {
            echo "Argumenté";
        }
    }
    
    
}
