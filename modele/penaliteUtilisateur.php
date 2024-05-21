<?php
class PenaliteUtilisateur {
    protected $id_e;
    protected $id_p;

    //constructor
	  public function __construct($idE = NULL, $idP = NULL) {
		  if(!is_null($idE)) {
			  $this->id_cat = $idE;
			  $this->nom_cat = $idP;
		  }
	}


    //getters
    public function getId_e() {
		return $this->id_e;
	}

    public function getId_p() {
		return $this->id_p;
	}
	
	public function penaliser($log, $pen) {
		$requetePreparee = "UPDATE Utilisateur SET nb_p = nb_p + point_p WHERE login = :tag_log AND id_p = :tag_p;";
		$req_prep = connexion::pdo()->prepare($requetePreparee);
		
		$valeurs = array(
			"tag_log" => $log,
			"tag_p" => $pen
		);
				
		try {
			$req_prep->execute($valeurs);
			echo "Pénalité appliquée avec succès";
		}catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
    
}
?>  