<?php
class Categorie {
    protected $id_cat;
    protected $nom_cat;

	//constructor
	public function __construct($id = NULL, $n = NULL) {
		if (!is_null($id)) {
			$this->id_cat = $id;
			$this->nom_cat = $n;
		}
	}

    //getters
    public function getId_cat() {
		return $this->id_cat;
	}

    public function getNom() {
		return $this->nom_cat;
	}
    
}
?>