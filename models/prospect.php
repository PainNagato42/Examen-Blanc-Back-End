<?php

/*
 * moedel prospect de la table prospect
 */

class prospect extends _model {
    //attributs
    protected $table = "prospect";
    protected $attributs = ["sociale" => "VARCHAR", "siret" => "VARCHAR", "email" => "VARCHAR", "nom" => "VARCHAR", "date" => "TEXT", "statut" => "NUM"];
    
    function select($where, $paramName, $sort, $resultParam) {
        // Rôle :  retourner un tableau d'objets du modèle courant, en tenant compte des critères de sélection indiqués, et du tri
        // Retour : un tableau d'objets du modèle courant
        // Parametre : $where : condition de recherche (au format sql avec paramètre :xxx)
        //             $paramName : tableau de valorisation des paramètres :xxx
        //             $sort : critères de tri (au format sql)
        //             $resultParam : resultat du param
        // construire la requete
        $sql = "SELECT * FROM `$this->table` $where $paramName $sort";
        $param["$paramName"] = $resultParam;

        // Tranforrmer le résultat de la reqûete en un tableau d'objets
        return $this->sqlToTabObj($sql, $param);
    }
    
    function listeProspect() {
        // Rôle : recupérer les objets ayant le statut "à qualifier" et "à suivre"
        // Retour: tableau simple
        // parametre : neant
        
        // construire la requête
        $sql = "SELECT * FROM `$this->table` WHERE `statut` = :qualifier OR `statut` = :suivre ORDER BY `date`";
        $param = [":qualifier" => "à qualifier", ":suivre" => "à suivre"];
        
        // Tranforrmer le résultat de la reqûete en un tableau d'objets
        return $this->sqlToTabObj($sql, $param);
    }
    
    
    function compteurByStatut($statut) {
        // Rôle : recuperer le nombre exact de prospect pour un statut donné
        // Retour : nombre de prospect
        // parametre : $statut : statut donné
        
        // construire la requête
        $sql = "SELECT COUNT(*) AS 'count' FROM `$this->table` WHERE `statut` = :statut";
        $param = [":statut" => $statut];
        
        $req = $this->requete($sql, $param);
        
        // faire la tableau de résultat à partir de la requête
        $result = [];
        
        // Tant que la requpête donne une ligne
        while($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            // On crée l'objet
            $prospect = new $this->table();
            $prospect->count = $ligne["count"];
            
            // On l'ajoute au tableau
            $result[] = $prospect;     
        }
        // afficher le count exacte
        foreach ($result as $countProspect) {
            $resultCount = $countProspect->count;
        }
        
        return $resultCount;
    }
    
    function compteurByProspect($prospect) {
        // Rôle : recuperer le nombre exact d'appel ayant l'id du prospect donné
        // Retour : nombre d'appel
        // parametre : $prospect : id du prospect
        
        // construire la requête
        $sql = "SELECT COUNT(*) AS 'count' FROM `appel` WHERE `prospect` = :prospect";
        $param = [":prospect" => $prospect];
        
        $req = $this->requete($sql, $param);
        
        // faire la tableau de résultat à partir de la requête
        $result = [];
        
        // Tant que la requpête donne une ligne
        while($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            // On crée l'objet
            $appel = new appel();
            $appel->count = $ligne["count"];
            
            // On l'ajoute au tableau
            $result[] = $appel;     
        }
        // afficher le count exacte
        foreach ($result as $countAppel) {
            $resultCount = $countAppel->count;
        }
        
        return $resultCount;
    }
}
