<?php
	
	require_once("modele/utilisateur.php");
	class ControleurConnexion{
		public static function connexionUtilisateur() {
			require_once("vue/connecter.php");
		}

        public static function processForm() {
            if (isset($_POST["login"]) && isset($_POST["mdp"])){
                $l = $_POST["login"];
                $m = $_POST["mdp"];
                
                $rep = Utilisateur::seConnecte($l,$m);
            
                if(isset($rep[0])) {
                    $_SESSION["user"]=$rep[0];
                    header('Location:routeur.php?controleur=ControleurIndex&action=lireIndex');
                }
                else {
                    session_unset();
                    session_destroy();
                    header("Location:routeur.php?controleur=ControleurConnexion&action=connexionUtilisateur&error=1");
                }
            }
            
            else {
                session_unset();
                session_destroy();
                header("Location:routeur.php?controleur=ControleurConnexion&action=connexionUtilisateur");
            }
	
	    }
}
	
?>