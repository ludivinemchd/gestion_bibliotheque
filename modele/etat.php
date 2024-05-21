<?php
class Etat {
    protected $num_etat;
    protected $nom_etat;

    //constructor
    public function __construct($num = NULL, $nom = NULL) {
		if (!is_null($num)) {
			$this->num_etat = $num;
			$this->nom_etat = $nom;
		}
  }
    //getters
    public function getNum() {
		return $this->num_etat;
	}

    public function getNom() {
		return $this->nom_etat;
	}
 
}
?>