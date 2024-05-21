<?php
class TraductionDe
{
	private $num_ISBN;
	private $num_ISBN1;
	private $traducteur;
	
	
	public function __construct($num_ISBN = NULL, $num_ISBN1 = NULL, $traducteur = NULL) {
		if (!is_null($num_ISBN)) {
			$this->traducteur = $traducteur;
			$this->num_ISBN = $num_ISBN;
			$this->num_ISBN1 = $num_ISBN1;
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
	
	public function getNumISBN1()
	{
		return $this->num_ISBN1;
	}

	public function setNumISBN1($a)
	{
		$this->num_ISBN1 = $a;
	}
	public function getTraducteur()
	{
		return $this->traducteur;
	}

	public function setTraducteur($a)
	{
		$this->traducteur = $a;
	}

	

}
?>
