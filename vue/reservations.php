<?php 
error_reporting(E_ALL);
ini_set("display_errors",1);
if(!isset($_SESSION))
	header("Location:routeur.php?controleur=ControleurIndex&action=lireIndex");
$user = $_SESSION["user"];
?>
<!DOCTYPE html>

<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lumen Lurning Center</title>
		<link rel="stylesheet" href="vue/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,100;1,200&display=swap" rel="stylesheet">
	</head>
	<body>
		<section class="header"  style="background-color:rgba(4,9,30,0.85)">
			<?php include("vue/header.php"); ?>
			
			<div class="text-box">
				<h1>Mes reservations</h1>
				<?php
				$reservations = ControleurReservation::lireReservation($user->getLogin());
				if(empty($reservations)) {
				?>
				<p>Aucune reservation pour le moment</p>
				<a href="routeur.php?controleur=ControleurOuvrage&action=afficheOuvrages" class = "hero-btn">Consulter des ouvrages</a>
				<?php } else { ?>
				<table>
					<?php foreach($reservations as $r) { ?>
						<tr>
							<?php
							$e = $r->getExemplaire();
							$num = $e->getNumISBN();
							$o = Ouvrage::getOuvrage($num);
							echo "
							<td style='text-align:left'>$num</td>
							<td style='text-align:left'>".$o->getTitre()."</td>";
							?>
						</tr>
					<?php }?>
				</table>
				<?php } ?>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>