<?php
	
	require_once("modele/utilisateur.php");
	
	class ControleurUtilisateur { 

		public static function processForm()
		{
			if (isset($_POST['login']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['adresse']) && isset($_POST['tel']) && isset($_POST['dateN'])) 
 			{
  
  				$login = $_POST['login'];
  				$nom = $_POST['nom'];
  				$prenom = $_POST['prenom'];
  				$email = $_POST['email'];
  				$adresse = $_POST['adresse'];
  				$tel = $_POST['tel'];
  				$dateN = $_POST['dateN'];
 				$penalite = $_POST['penalite'];
  				$typeAbonnement = $_POST['typeAbonnement'];
  				$typeCategorie = $_POST['typeCategorie'];
  				$psw = $_POST['mdp'] ;

				Utilisateur::inscription($login,$nom,$prenom,$email,$adresse,$tel,$dateN,$penalite,$typeAbonnement,$typeCategorie,$psw);

 				require_once("controleur/ControleurAttente.php");
  				ControleurAttente::estInscritAttente($nom,$prenom,$psw);
  
  				header('Location:.routeur.php?controleur=ControleurAdmin&action=listeUsers');
			}
		}
	}
	
?>