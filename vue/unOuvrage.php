<!DOCTYPE html>
<html lang="fr" style="font-size: 16px">
	<head>
		<title><?php  ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="vue/css/style.css">
	</head>
	<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
	if(isset($_GET['ouvrage'])) {
		$num = $_GET['ouvrage'];
		$ouvrage = ControleurOuvrage::recupOuvrage($num);
	}
	else
		header("Location:routeur.php?controleur=ControleurIndex&action=lireIndex");
	?>
	
	<body>
	<section class="header" style="background-color:rgba(4,9,30,0.85)">
	<?php
	include("vue/header.php");
	foreach($ouvrage as $o) {
		$auteur = $o->getAuteur();
	?>	<div class="bg">
			<div class = "box">
				<table><tr>
					<td><img src="<?php echo $o->getImage()?>" height="300px" width="200px"></td>
					<td>
						<div class="form">
						<form action="routeur.php?controleur=ControleurConnexion&action=processForm" method="post">
							<h2><?php echo $o->getTitre() ?></h2>
							<p><?php echo $auteur->getNomA()." ".$auteur->getPrenomA();
							echo $o->getResume(); ?></p>
							<input type="submit" value="Reserver">
						</form>
						</div>
					</td>
				</tr></table>
			</div>
		</div>
	<?php } ?>
	</section>
	</body>
</html>