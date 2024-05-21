<?php
class PenaliteEmprunteur {
    protected $id_e;
    protected $id_p;

    //constructor
	public function __construct($idE = NULL, $idP = NULL) {
		if (!is_null($idE)) {
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
    
}
?>  