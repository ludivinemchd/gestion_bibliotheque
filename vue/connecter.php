<?php
if(!empty($_SESSION))
	header("Location:routeur.php?controleur=ControleurIndex&action=lireIndex");
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Connexion</title>
		<link rel="stylesheet" href="vue/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,100;1,200&display=swap" rel="stylesheet">
	</head>
	<body>
		<section class="header" style="background-color:rgba(4,9,30,0.85)">
		<?php 
		error_reporting(E_ALL);
		ini_set("display_errors",1);
		include("header.php");
		?>
			<!----la box de connxion---->
			<div class="bg">
				<div class = "box">
					<div class="form">
						<form action="routeur.php?controleur=ControleurConnexion&action=processForm" method="post">
						<h2>Connexion</h2>
						<div class="inputBox">
							<input name="login" type="text" required="required" require autofocus="on">
							<span>Identifiant</span>
							<i></i>
						</div>
						<div class="inputBox">
							<input name="mdp" type="password" required="required" require>
							<span>Mot de passe</span>
							<i></i>
						</div>
						
						<div class="links">
							<a href="routeur.php?controleur=ControleurConnexion&action=connexionUtilisateur&error=3">Mot de passe oublié ?</a>
							<a href="routeur.php?controleur=ControleurAttente&action=preInscriptionUtilisateur">Pas encore de compte ?</a>
						</div>
						<?php
						if(isset($_GET["error"])) {
							$error = $_GET["error"];
							if($error == 1)
								echo "<p style='color:red'>Identifiant ou mot de passe incorrect</p>";
							if($error == 2) { ?>
								<script>
									window.alert("Veuillez vous connecter pour reserver");
									include("header.php")
								</script>
							<?php }
							if($error == 3) {?>
								<script>
									window.alert("Veuillez contacter directement la bibliothèque");
									header('Location: routeur.php?controleur=ControleurIndex&action=lireIndex');
								</script>
							<?php }
						}
						?>
						<input type="submit" value="Se connecter">
						</form>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>