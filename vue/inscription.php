<?php
if(!empty($_SESSION))
	header("Location:routeur.php?controleur=ControleurIndex&action=lireIndex");
?>
<!DOCTYPE html>
<html lang="fr" style="font-size: 16px">
	<head>
	<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Inscription</title>
		<link rel="stylesheet" href="vue/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,100;1,200&display=swap" rel="stylesheet">
	</head>
	<body style="background-color:rgba(4,9,30,0.85)">
	<section class="header" id="inscription" >
	<?php 
		error_reporting(E_ALL);
		ini_set("display_errors",1);
		include("header.php");
	?>
		<div class = "box" id="inscription">
			<div class="form">
				<form action="routeur.php?controleur=ControleurAttente&action=processForm" method="post">
					<h2>Inscription</h2>
					<div class="inputBox">
						<input name="nom" type="text" required="required" require autofocus="on">
						<span>Nom</span>
						<i></i>
					</div>
					<div class="inputBox">
						<input name="prenom" type="text" required="required" require>
						<span>Prenom</span>
						<i></i>
					</div>
					<div class="inputBox">
						<input name="email" type="email" required="required" require>
						<span>Adresse mail</span>
						<i></i>
					</div>
					<div class="inputBox">
						<input name="adresse" type="text" required="required" require>
						<span>Adresse postale</span>
						<i></i>
					</div>
					<div class="inputBox">
						<input name="tel" type="text" required="required" require>
						<span>Telephone</span>
						<i></i>
					</div>
					<div class="inputBox">
						<input name="dateN" type="date" required="required" require>
						<span>Date de naissance</span>
						<i></i>
					</div>
					<div class="inputBox">
						<input name="mdp" type="password" required="required" require>
						<span>Mot de passe</span>
						<i></i>
					</div>
					<div class="links">
						<a href="connecter.php">Deja inscrit ?</a>
					</div>
					<?php
					if(isset($_GET["confirm"])) {
						$confirm = $_GET["error"];
						if($confirm == 0)
							echo "<p style='color:red'>Un problème est survenu, veuillez reessayer ulterieurement</p>";
						if($confirm == 1)
							echo "<p style='color:green'>Pre-inscription reussi, veuillez vous rendre à la bibliothèque pour valider votre inscription</p>";
					}
					?>
					<input type="submit" value="S'inscrire">
				</form>
			</div>
		</div>
	</section>
	</body>
</html>