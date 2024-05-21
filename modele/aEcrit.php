<?php
class aEcrit
{
	private $num_ISBN;
	private $id_a;
	
	
//constructeur :

	public function __construct($num_ISBN = NULL, $id_a = NULL) {
		if (!is_null($num_ISBN)) {
			$this->num_ISBN = $num_ISBN;
			$this->id_a = $id_a;
		}
	}	
	
	
//getter et setter : 
	public function getNumISBN()
	{
		return $this->num_ISBN;
	}

	public function setNumISBN($a)
	{
		$this->num_ISBN = $a;
	}
	public function getIdA()
	{
		return $this->id_a;
	}

	public function setIdA($a)
	{
		$this->id_a = $a;
	}
	
 
	
//fonction afficher : ?
}
?>
</body>

</html>