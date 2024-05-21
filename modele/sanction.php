<?php
class Sanction {
    protected $id_s;
    protected $description;

    public function __construct($id = NULL, $d = NULL) {
		if (!is_null($id)) {
			$this->id_s = $id;
			$this->description = $d;
		}
    }

    //getters
    public function getId_s() {
		return $this->id_s;
	}

    public function getDescription() {
		return $this->description;
	}
    
    /*public function setMarque($m) {
		$this->marque = $m;
	}
    */
}
?>