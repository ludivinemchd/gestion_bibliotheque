<?php
class Genre
{
	private $id_genre;
	private $nom_genre;
	
	
//constructeur : 

	public function __construct($l= NULL, $m = NULL){
		if (!is_null($l)) {
			$this->id_genre = $l;
			$this->nom_genre = $m;
		}
		
	}
	
	
//getter et setter : 
	public function getGenre()
	{
		return $this->genre;
	}
		public function setGenre($a)
	{
		$this->genre = $a;
	}
	public function getNomGenre()
	{
		return $this->nom_genre;
	}

	public function setNomGenre($a)
	{
		$this->nom_genre = $a;
	}
	
}
?>
