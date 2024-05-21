<?php
class Auteur
{
	private $id_a;
	private $nom_a;
	private $prenom_a;
	
	
	
//constructeur : 

	public function __construct($id_a = NULL, $nom_a = NULL, $prenom_a = NULL) {
		if (!is_null($id_a)) {
			$this->nom_a = $nom_a;
			$this->id_a = $id_a;
			$this->prenom_a = $prenom_a;
		}
	}
	
	
//getter et setter : 
	public function getIdA()
	{
		return $this->id_a;
	}

	public function setIdA($a)
	{
		$this->id_a = $a;
	}
	
	public function getNomA()
	{
		return $this->nom_a;
	}

	public function setNomA($a)
	{
		$this->nom_a = $a;
	}
	
	public function getPrenomA()
	{
		return $this->prenom_a;
	}

	public function setPrenomA($a)
	{
		$this->prenom_a = $a;
	}
	
}
?>
</body>

</html>