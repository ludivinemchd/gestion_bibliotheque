<?php

class Reservation {
	protected $login;
	protected $exemplaire;
	
	
	
	
	// getter
	public function getLogin() {return $this->login;}
	public function getExemplaire() {return $this->exemplaire;}

	// setter
	public function setLogin($i) {$this->login = $i;}
	public function setExemplaire($m) {$this->exemplaire = $m;}


	// constructeur polyvalent d'un objet Voiture
	public function __construct($i = NULL, $m = NULL) {
		if (!is_null($i)) {
			$this->login = $i;
			$this->exemplaire = $m;
		}
	}
	
	
	//fonction Reserver un livre
	public static function reserverLivre($l,$e) {
		$requetePreparee = "INSERT INTO Reservation VALUES(:tag_l, :tag_e);";
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
				
		$valeurs = array(
			"tag_l" => $l,
			"tag_e" => $e);		
		try {
			$req_prep->execute($valeurs);
			echo "OuvrageReserver";
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
		
	}
	
	
	
	// fonction Retourner les Reservations avec Emprunteur
	public static function getAllReservation($l){
		$requete = "Select * from Reservation where login = :tag_l  ;";
		$req_prep = Connexion::pdo()->prepare($requete);
				
		$valeurs = array(
			"tag_l" => $l);		
		try {
			$req_prep->execute($valeurs);
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
		$req_prep->setFetchmode(PDO::FETCH_CLASS,'Reservation');
        $tableau = $req_prep->fetchAll();
		return $tableau;
	}
	
	
	
	
	
		// fonction Retourner les Reservations
	public static function getAllReservations(){
		$requete = "Select * from Reservation ;";
		$req_prep = Connexion::pdo()->prepare($requete);
				
		try {
			$req_prep->execute();
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
		$req_prep->setFetchmode(PDO::FETCH_CLASS,'Reservation');
        $tableau = $req_prep->fetchAll();
		return $tableau;
	}
	
	
	
	
	
	//fonction valider reservation
	public function validerReservation($l,$e) {
		$requetePreparee = "DELETE FROM Reservation where login = :tag_l and code_barre = :tag_e);";
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
				
		$valeurs = array(
			"tag_l" => $l,
			"tag_e" => $e);	
		try {
			$req_prep->execute($valeurs);
			echo "OuvrageReserver";
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
		include("emprunt.php");
		Emprunt::empruntLivre($l,$e);
	}
	
	
	
}