<?php
class Bibliotheque
{
	private $id_bibli;
	private $nom_bibli;
	
	
//constructeur : 
	public function __construct($id=NULL, $nom=NULL) 
	{
		if (!(is_null($id) & is_null($nom)))
		{
			$this->id_bibli = $id;
			$this->nom_bibli = $nom;
		}
	}
	
	
//getter et setter : 

	public function getIdBibli()
	{
		return $this->id_bibli;
	}

	public function setIdBibli($a)
	{
		$this->id_bibli = $a;
	}
	public function getNomBibli()
	{
		return $this->nom_bibli;
	}

	public function setNomBibli($a)
	{
		$this->nom_bibli = $a;
	}

	
//fonction afficher : 
	public function afficher()
	{
		echo "<p> Bibliotheque numéro $this->id_bibli se nommant $this->nom_bibli </p>";
	}
	
	public static function getAllBiblio()
	{
		$requete = "SELECT * FROM Bibliotheque;";
		$resultat = Connexion::pdo()->query($requete);
		$resultat->setFetchmode(PDO::FETCH_CLASS,"Bibliotheque");
		$tableau = $resultat->fetchAll();
		return $tableau;
	}
}

?>
</body>

</html>