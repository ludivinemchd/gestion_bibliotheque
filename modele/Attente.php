<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
class Attente {
    protected $nom_A;
    protected $prenom_A;
    protected $email_A;
    protected $adresse_A;
    protected $tel_A;
    protected $date_N_A;
	protected $mdp;
	protected $estInscrit;
    //protected global $id =1;

    //constructor
	  public function __construct($n = NULL , $p = NULL , $m = NULL , $a = NULL , $t = NULL , $dn = NULL ) 
      {
        if(!is_null($n)){
            $this->nom_A = $n;
            $this->prenom_A = $p;
            $this->email_A = $m;
            $this->adresse_A = $a;
            $this->tel_A = $t;
            $this->date_N_A = $dn;
        }
    }
  

    //getters


    public function getNom_A() {
		return $this->nom_A;
	}

    public function getPrenom_A() {
		return $this->prenom_A;
	}

    public function getMail_A() {
		return $this->email_A;
	}

    public function getAdresse_A() {
		return $this->adresse_A;
	}

    public function getTel_A() {
		return $this->tel_A;
	}

    public function getDateNaissance_A() {
		return $this->date_N_A;
	}
	
	public function getMotDePasse_A()
	{
		return $this->mdp;
	}

	public function getEstInscrit()
	{
		return $this->estInscrit;
	}
	/*public static function getAllUtilisateurs(){
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
	}*/
	
	/*public function afficher()
	{
		echo "<p> utilisateur $this->login, $this->mdp </p>";
	}*/
	
    

	public static function preInscription($n,$p,$m,$a,$t,$d,$mdp)
	{
		$req_prep =Connexion::pdo()->prepare("INSERT INTO Attente (nom_A, prenom_A, email_A, adresse_A, tel_A, date_N_A, mdp,estInscrit) VALUES ('$n', '$p', '$m', '$a', '$t', '$d', '$mdp',0)");
		
		 try{
			$req_prep->execute();
			
		}catch (PDOExcpetion $e)
		{
			return $e->getMessage();
		}	

	}

	public static function getAllAttentes(){
		$requetepreparee ="select * from Attente WHERE estInscrit = false;";
		$req_prep = Connexion::pdo()->query($requetepreparee);
		try
		{
			$req_prep->execute();
		}
		
		catch (PDOExcpetion $e)
		{
			echo $e->getMessage();
		}
		
		$req_prep->setFetchmode(PDO::FETCH_CLASS,"Attente");
		$att = $req_prep->fetchAll();
		return $att;
	}

	public static function estInscrit ($n,$p,$mdp)
	{
		$requetepreparee = "UPDATE `Attente` SET `estInscrit`= true WHERE nom_A = '$n' AND prenom_A = '$p' AND mdp = '$mdp' ";
		$req_prep = Connexion::pdo()->query($requetepreparee);
		try
		{
			$req_prep->execute();
		}
		
		catch (PDOExcpetion $e)
		{
			echo $e->getMessage();
		}

	}

		
		
}

	///////////

?>