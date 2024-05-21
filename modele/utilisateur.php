<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
class Utilisateur {
	protected $login;
    protected $nom_u;
    protected $prenom_u;
    protected $mail_u;
    protected $adresse_u;
    protected $tel_u;
    protected $date_naissance;
    protected $nb_p;
    protected $id_abo;
    protected $id_cat;
	protected $mdp;

    //constructor
	  public function __construct($idU = NULL , $n = NULL , $p = NULL , $m = NULL , $a = NULL , $t = NULL , $dn = NULL , $nbp = NULL , $idA = NULL , $idC = NULL ) {
      if(!is_null($idU)){
	  $this->login = $idU;
      $this->nom_u = $n;
      $this->prenom_u = $p;
      $this->mail_u = $m;
      $this->adresse_u = $a;
      $this->tel_u = $t;
      $this->date_naissance = $dn;
      $this->nb_u = $nbp;
      $this->id_abo = $idA;
      $this->id_cat = $idC;}
  }

    //getters
    public function getLogin() {
		return $this->login;
	}

    public function getNom() {
		return $this->nom_u;
	}

    public function getPrenom() {
		return $this->prenom_u;
	}

    public function getMail() {
		return $this->mail_u;
	}

    public function getAdresse() {
		return $this->adresse_u;
	}

    public function getTel() {
		return $this->tel_u;
	}

    public function getDateNaissance() {
		return $this->date_naissance;
	}

    public function getNBP() {
		return $this->nb_p;
	}

    public function getId_abo() {
		return $this->id_abo;
	}

    public function getId_cat() {
		return $this->id_cat;
	}
	
	
	public static function getAllUtilisateurs(){
		$requetepreparee ="select * from Utilisateur;";
		$req_prep = Connexion::pdo()->query($requetepreparee);
		try
		{
			$req_prep->execute();
		}
		
		catch (PDOExcpetion $e)
		{
			echo $e->getMessage();
		}
		
		$req_prep->setFetchmode(PDO::FETCH_CLASS,"Utilisateur");
		$users = $req_prep->fetchAll();
		return $users;
	}

    public function afficher()
	{
		echo "<p> utilisateur $this->login, $this->mdp </p>";
	}

    public static function inscription($l,$n,$p,$m,$a,$t,$d,$nbP,$idA,$idC,$mdp)
	{
		$req_prep =Connexion::pdo()->prepare("INSERT INTO Utilisateur (login,nom_u, prenom_u, mail_u, adresse_u, tel_u, date_naissance, nb_P, id_abo, id_cat, mdp) VALUES('$l', '$n', '$p', '$m', '$a', '$t', '$d', '$nbP', '$idA', '$idC', '$mdp')");
		
		 try{
			$req_prep->execute();
			
		}catch (PDOExcpetion $e)
		{
			echo $e->getMessage();
		}	

	}

	public static function seConnecte($l, $m)
	{
		$requetePreparee = "SELECT * FROM Utilisateur WHERE login = :tag_log AND mdp = :tag_mdp;";
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		$valeur = array ("tag_log" => $l, "tag_mdp" => $m );
		try{
			$req_prep->execute($valeur);
			
		}catch (PDOExcpetion $e)
		{
			echo $e->getMessage();
		}
		$req_prep->setFetchmode(PDO::FETCH_CLASS,"Utilisateur");
		$user = $req_prep->fetchALL();
		return $user;
	}

	public static function getUser ($l, $m)
	{
		$requetePreparee = "SELECT nom_u, prenom_u FROM Utilisateur WHERE login = :tag_log AND mdp = :tag_mdp;";
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		$valeur = array ("tag_log" => $l, "tag_mdp" => $m );
		try{
			$req_prep->execute($valeur);
			
		}catch (PDOExcpetion $e)
		{
			echo $e->getMessage();
		}
		$req_prep->setFetchmode(PDO::FETCH_CLASS,"Utilisateur");
		$user = $req_prep->fetch();
		return $user;
	}
	
	/*public static function connect($l, $m)
	{
		$requetePreparee = "SELECT * FROM Utilisateur WHERE login = :tag_log AND mdp = :tag_mdp;";

		$req_prep = Connexion::pdo()->prepare($requetePreparee);

		$valeur = array ("tag_log" => $l, "tag_mdp" => $m );
		try{

			$req_prep->execute($valeur);

			
		}catch (PDOExcpetion $e)
		{
			echo $e->getMessage();
		}

		$req_prep->setFetchmode(PDO::FETCH_CLASS,"Utilisateur");

		$user = $req_prep->fetchAll();

		return $user;*/
		
		
	
	///////////
}
?>