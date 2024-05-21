<?php
	include("modele/utilisateur.php");
	include("modele/ouvrage.php");
    session_start();
	require_once("config/connexion.php");
	
	Connexion::connect(); 
	$controleur  = "ControleurIndex";
	$tableauControleurs = ["ControleurAdmin","ControleurAttente", "ControleurConnexion","ControleurIndex","ControleurUtilisateur","ControleurOuvrage", "ControleurReservation"];
	$actionParDefaut = array(
	"ControleurAdmin" => "listeUsers",
	"ControleurAttente" => "preInscriptionUtilisateur",
	"ControleurConnexion" => "connexionUtilisateur",
	"ControleurIndex" => "lireIndex",
	"ControleurOuvrage" => "afficheOuvrages",
	"ControleurReservation" => "afficheReservations",
	"ControleurUtilisateur" => "lireUtilisateurs"
	);
	
	if(isset($_GET["controleur"]) && in_array($_GET["controleur"],$tableauControleurs))
		$controleur = $_GET["controleur"];
	
	require_once("controleur/$controleur.php");

	if (isset($_GET["action"]) && in_array($_GET["action"],get_class_methods($controleur)))
		$action = $_GET["action"];
	else
		$action = $actionParDefaut[$controleur];
	
	$controleur::$action();
	
?>