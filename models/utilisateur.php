<?php

/*
 * moedel utilisateur de la table utilisateur
 */

class utilisateur extends _model {

    //attributs
    protected $table = "utilisateur";
    protected $attributs = ["nom" => "VARCHAR", "email" => "VARCHAR", "mdp" => "VARCHAR", "actif" => "NUM", "role" => "NUM", "reinit" => "VARCHAR"];

    function loadByEmail($email) {
        // Rôle : charge la ligne de la base de données ayant un mail donné
        // retour : true si charger, sinon false
        // parametres : $email : email de l'utilisateur à recuperer
        // construction de la requete
        $sql = "SELECT * FROM `$this->table` WHERE `email` = :email";
        $param = [":email" => $email];

        $req = $this->requete($sql, $param);

        // Si on a un retour "false", on ne charge rien
        if ($req === false) {
            $this->values = [];
            return false;
        }

        // récupérer la première ligne
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        // Si on n'a pas de ligne, on ne charge rien
        if (empty($ligne)) {
            $this->values = [];
            return false;
        }

        // On a une ligne
        $this->values = $ligne;
        return true;
    }

    function headerUser() {
        // Rôle : afficher le header de l'utilisateur en fonction de son rôle
        // Retour : néant
        // Parametres : néant

        if ($this->get("role") == 1) {
            include "templates/fragments/header-administrateur.php";
        } elseif ($this->get("role") == 2) {
            include "templates/fragments/header-createur.php";
        } elseif ($this->get("role") == 3) {
            include "templates/fragments/header-prospecteur.php";
        } elseif ($this->get("role") == 4) {
            include "templates/fragments/header-createur-prospecteur.php";
        }
    }

    function accueilUser() {
        // Rôle : afficher l'accueil de l'utilisateur en fonction de son rôle
        // Retour : néant
        // Parametres : néant

        if ($this->get("role") == 1) {
            $fonctionalite = "<p><a class='btn' href='affiche-form-user.php'>Créer un utilisateur</a></p>\n";
            $fonctionalite .= "<p><a class='btn' href='affiche-form-prospect.php'>Créer un prospect</a></p>\n";
            $fonctionalite .= "<p><a class='btn' href='affiche-liste-prospect.php'>Suivi du prospect</a></p>\n";
            $fonctionalite .= "<p><a class='btn' href='affiche-liste-prospect.php'>Suivi du prospect</a></p>\n";
            $fonctionalite .= "<p><a class='btn' href='affiche-statistique.php'>Statistiques</a></p>\n";
            $fonctionalite .= "<p><a class='btn' href='deconnecter.php'>Se déconnecter</a></p>";
            return $fonctionalite;
        } elseif ($this->get("role") == 2) {
            $fonctionalite = "<p><a class='btn' href='affiche-form-prospect.php'>Créer un prospect</a></p>\n";
            $fonctionalite .= "<p><a class='btn' href='affiche-statistique.php'>Statistiques</a></p>\n";
            $fonctionalite .= "<p><a class='btn' href='deconnecter.php'>Se déconnecter</a></p>";
            return $fonctionalite;
        } elseif ($this->get("role") == 3) {
            $fonctionalite = "<p><a class='btn' href='affiche-liste-prospect.php'>Suivi du prospect</a></p>\n";
            $fonctionalite .= "<p><a class='btn' href='affiche-statistique.php'>Statistiques</a></p>\n";
            $fonctionalite .= "<p><a class='btn' href='deconnecter.php'>Se déconnecter</a></p>";
            return $fonctionalite;
        } elseif ($this->get("role") == 4) {
            $fonctionalite = "<p><a class='btn' href='affiche-form-prospect.php'>Créer un prospect</a></p>\n";
            $fonctionalite .= "<p><a class='btn' href='affiche-liste-prospect.php'>Suivi du prospect</a></p>\n";
            $fonctionalite .= "<p><a class='btn' href='affiche-statistique.php'>Statistiques</a></p>\n";
            $fonctionalite .= "<p><a class='btn' href='deconnecter.php'>Se déconnecter</a></p>";
            return $fonctionalite;
        }
    }
    
    function reinitEmail() {
        // Rôle : préparer et envoyer un lien de réinitisalisation du mot de passe
        // Retour : néant
        // Paramètres : néant
        
        
        // fabriquer un "code" unique et le stocker
        $this->set("reinit", uniqid());
        // Si on veut gérer une date de validité, il nous faut un champ pour la stocker.....
        $this->update();
        
        // Envoyer un email
        
        // $to = '"' . $this->get("nom") . '" <' . $this->get("email") . '>';         // Destinataire, sous la forme "Christophe Blanchot" <cblanchot@cbcd.fr>
        $to = '"' . $this->get("nom") . '" <apicq@mywebecom.ovh>';         // Pour les tests
        $sujet = "CRM : vous avez perdu votre mot de passe";
        $message = '<html><head><meta http-equiv="Content-Type" content="text/html;charset=utf8"></head><body>';
        $message .= "<h1>Bonjour {$this->get("nom")}</h1>";
        $message .= "<p>Pour choisir un nouveau mot de passe, veuillez cliquer (ou recopier) le lien ci-dessous : <br>";
        $message .= "<a href='http://crm.apicq.mywebecom.ovh/reinit-mdp.php?id={$this->id()}&code={$this->get("reinit")}'>Lien de réinitialisation</a>";
        $message .= "</p></body></html>";
        
        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/html;charset=utf8\n";
        $headers .= 'From: "CRM" <mywebecom@mywebecom.ovh>' . "\n";
        
        mail($to, $sujet, $message, $headers);
  
        
    }

}
