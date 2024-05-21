<?php

require_once("modele/Attente.php");
    class ControleurAttente
    {
        public static function lireAttente()
		{
			$att = Attente::getAllAttentes();
            return $att;
		}

        public static function preInscriptionUtilisateur()
		{
			require_once("vue/inscription.php");
		}

        public static function processForm()
        {
            
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $adresse = $_POST['adresse'];
            $tel = $_POST['tel'];
            $dateN = $_POST['dateN'];
            $mdp = $_POST['mdp'];

            $try = Attente::preInscription($nom,$prenom,$email,$adresse,$tel,$dateN,$mdp);
            if(empty($try))
                header('Location: routeur.php?controleur=ControleurAttente&action=preInscriptionUtilisateur&confirm=1');
            header('Location: routeur.php?controleur=ControleurAttente&action=preInscriptionUtilisateur&confirm=0');
            
            
        }

        public static function estInscritAttente($n,$p,$mdp)
        {
            Attente::estInscrit($n,$p,$mdp);
        }
        
    }
?>