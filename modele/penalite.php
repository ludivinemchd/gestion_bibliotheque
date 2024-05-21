<?php
class Penalite {
    protected $id_p;
    protected $nom_p;
    protected $point_p;
    protected $id_s;

    public function __construct($id = NULL, $n = NULL, $p = NULL, $idS = NULL) {
		if (!is_null($id)) {
			$this->id_p = $id;
			$this->nom_p = $n;
			$this->point_p= $p;
			$this->id_s = $idS;
		}
    }

    //getters
    public function getId_p() {
		return $this->id_p;
	}

    public function getNom() {
		return $this->nom_p;
	}

    public function getPoint() {
		return $this->point_p;
	}

    public function getId_s() {
		return $this->id_s;
	}
}
?>