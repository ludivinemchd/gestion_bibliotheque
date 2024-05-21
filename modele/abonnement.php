<?php
class Abonnement {
    protected $id_abo;
    protected $tarif_abo;
    protected $nb_emprunt_Max;
    protected $duree_emprunt_Max;
    
    //constructor
	public function __construct($id, $t, $nbE, $dE) {
		if (!is_null($id)) {
			$this->id_abo = $id;
			$this->tarif_abo = $t;
			$this->nb_emprunt_Max = $nbE;
            $this->duree_emprunt_Max = $dE;
		}
	}

    //getters
    public function getId_abo() {
		return $this->id_abo;
	}

    public function getTarif() {
		return $this->tarif_abo;
	}

    public function getNbEmprunt() {
		return $this->nb_emprunt_Max;
	}

    public function getDureeEmprunt() {
		return $this->duree_emprunt_Max;
	}

}
?>