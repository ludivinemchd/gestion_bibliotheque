<?php
class Emprunte {
    protected $id_e;
    protected $code_barre;
    protected $date_emprunt;
    protected $etat_retour;
    protected $date_retour;
    protected $code_emprunt;

    //constructor
	  public function __construct($idE, $cb, $de, $er, $dr, $ce) {
      $this->id_e = $idE;
      $this->code_barre = $cb;
      $this->date_emprunt = $de;
      $this->etat_retour = $er;
      $this->date_retour = $dr;
      $this->code_emprunt = $ce;

  }

    //getters
    public function getId_e() {
		return $this->id_e;
	}

    public function getCodeBarre() {
		return $this->code_barre;
	}

    public function getDateEmprunt() {
		return $this->date_emprunt;
	}

    public function getEtatRetour() {
		return $this->etat_retour;
	}

    public function getDateRetour() {
		return $this->date_retour;
	}

    public function getCodeEmprunt() {
		return $this->code_emprunt;
	}
	
	public function emprunterUnOuvrage($e = NULL, $cb = NULL, $de = NULL, $ce = NULL) {
		if (!is_null($e)) {
			$requetePreparee = "INSERT INTO Emprunte (id_e, code_barre, code_emprunt) VALUES(:tag_e, :tag_cb, :tag_de, :tag_ce);";
			$req_prep = connexion::pdo()->prepare($requetePreparee);
			
			$valeurs = array(
				"tag_e" => $e,
				"tag_cb" => $cb,
				"tag_ce" => $ce
			);
					
			try {
				$req_prep->execute($valeurs);
				echo "Emprunt réalisé avec succès";
			}catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
	}
	
}
?>