<?php
class TypeOuvrage
{
	private $id_to;
	private $libelle;
	

//constructeur :

	public function __construct($id_to = NULL, $libelle = NULL) {
		if (!is_null($id_to)) {
			$this->id_to = $id_to;
			$this->libelle = $libelle;
		}
    }

	
//getter et setter : 
	public function getIdTo()
	{
		return $this->id_to;
	}

	public function setIdTo($a)
	{
		$this->id_to = $a;
	}
	public function getLibelle()
	{
		return $this->libelle;
	}

	public function setLibelle($a)
	{
		$this->libelle = $a;
	}
	
}
?>
