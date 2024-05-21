<?php
class Exemplaire {
    protected $code_barre;
    protected $num_etat;
    protected $num_ISBN;

    //constructor
	public function __construct($cb = NULL, $n = NULL, $ISBN = NULL) {
		if (!is_null($cb)) {
			$this->code_barre = $cb;
			$this->num_etat = $n;
			$this->num_ISBN = $ISBN;
		}
    }
	
	
    //getters
    public function getCodeBarre() {
		return $this->code_barre;
	}

    public function getNumEtat() {
		return $this->num_etat;
	}

    public function getNumISBN() {
		return $this->num_ISBN;
	}

	//fonction getOuvrage avec codeBarre
	public function getOuvrage($cb) {
		$requetePreparee = "Select num_ISBN from Exemplaire where code_barre = :tag_l  ;";
		$req_prep = connexion::pdo()->prepare($requetePreparee);
				
		$valeurs = array(
			"tag_l" => $cb);		
		try {
			$req_prep->execute($valeurs);
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
		$req_prep->setFetchmode(PDO::FETCH_CLASS,'Ouvrage');
        $v = $req_prep->fetchAll();
		return $v;

	}

}
?>