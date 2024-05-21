<?php

class Emprunt {
	protected $login;
	protected $exemplaire;
	protected $date_emp;
	protected $etat_emp;
	protected $date_ret;
	
	
	
	
	// getter
	public function getLogin() {return $this->login;}
	public function getExemplaire() {return $this->exemplaire;}
	public function getDate_emp() {return $this->date_emp;}
	public function getEtat_emp() {return $this->etat_emp;}
	public function getDate_ret() {return $this->date_ret;}

	// setter
	public function setLogin($i) {$this->login = $i;}
	public function setExemplaire($m) {$this->exemplaire = $m;}
	public function setDate_emp($e) {$this->date_emp = $e;}
	public function setEtat_emp($g) {$this->etat_emp = $g;}
	public function setDate_ret($r) {$this->date_ret = $r;}


	// constructeur polyvalent d'un objet Voiture
	public function __construct($i = NULL, $m = NULL, $e = NULL, $g = NULL, $r = NULL) {
		if (!is_null($i)) {
			$this->login = $i;
			$this->exemplaire = $m;
			$this->date_emp = $e;
			$this->etat_emp = $g;
			$this->date_ret = $r;
		}
	}
	
	
	//fonction Emprunter Un Livre
	public function empruntLivre($l,$e) {
		$requetePreparee = "INSERT INTO Emprunt (login , code_barre, date_emprunt) VALUES(:tag_l, :tag_e, :tag_d );";
		$req_prep = connexion::pdo()->prepare($requetePreparee);
				
		$valeurs = array(
			"tag_l" => $l,
			"tag_e" => $e,
			"tag_d" => date('d-m-y h:i:s'));		
			try {
				$req_prep->execute($valeurs);
				echo "OuvrageReserver";
			}
			catch (PDOException $e) {
				echo $e->getMessage();
			}
	}
	
	
	
	//fonction getAllEmprunt
	public static function getAllEmprunt($l){
		$requetePreparee = "select code_barre from Emprunt where login = :tag_l ;";
		$req_prep = connexion::pdo()->prepare($requetePreparee);
				
		$valeurs = array(
			"tag_l" => $l,
			"tag_e" => $e,
			"tag_d" => date('d-m-y h:i:s'));		
		try {
			$req_prep->execute($valeurs);
			echo "OuvrageReserver";
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
		$req_prep->setFetchmode(PDO::FETCH_CLASS,'Emprunt');
        $tableau = $req_prep->fetchALL();
		return $tableau;
			
	}

	public static function getAllEmprunts(){
		$requetePreparee = "select * from Emprunt;";
		$req_prep = connexion::pdo()->query($requetePreparee);
		$req_prep->setFetchmode(PDO::FETCH_CLASS,'Emprunt');
        return $req_prep->fetchALL();
			
	}
	
	
	
	
}