
<?php
require_once("modele/utilisateur.php");
require_once("modele/Attente.php");
require_once("modele/emprunt.php");

class ControleurAdmin {
    public static function listeUsers() {
        require_once("vue/utilisateurs.php");
        return Utilisateur::getAllUtilisateurs();
    }

    public static function listePreinscrits() {
        require_once("vue/preInscrits.php");
        return Attente::getAllAttentes();
    }

    public static function validerPreinscrits() {

    }

    public static function listeEmprunts() {
        require_once("vue/emprunts.php");
        return Emprunt::getAllEmprunts();
    }
}
?>