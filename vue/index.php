<?php 
error_reporting(E_ALL);
ini_set("display_errors",1);
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
		<section class="header" style="background-image: linear-gradient(rgba(4,9,30,0.7), rgba(4,9,30,0.7)), url(vue/images/banner2.png);">
			<?php include("vue/header.php");
			if (isset($_GET["deco"])) {
				$_SESSION["user"] = "";
				session_unset();
				session_destroy();
				header('Location:routeur.php?controleur=ControleurIndex&action=lireIndex');
			}
			?>
			<div class="text-box">
				<h1>Lumen Learning Center</h1>
				<p> Le Lumen Learning Center, cœur de campus du plateau de Moulon, ouvrira ses portes au printemps 2023. </br>
					Il offrira des espaces, services et contenus pour étudier, innover et partager la connaissance. </br>
					Avec sa très grande amplitude d'ouverture, le Lumen accueillera tous les publics intéressés.
				</p>
				<a href="routeur.php?controleur=ControleurOuvrage&action=afficheOuvrages" class = "hero-btn">Consulter les ouvrages</a>
			</div>
		</section>
		<section class="xcaroussel">
			<h1>Nos Meilleures livres</h1>
			<p>Voici les 5 ouvrages les plus empruntés dans notre bibliothèque</p>
			
			<div class="caroussel">
				<input type="radio" name="position" checked />
				<input type="radio" name="position" />
				<input type="radio" name="position" />
				<input type="radio" name="position" />
				<input type="radio" name="position" />
				<main id="carousel">
				<div class="item"><a href="routeur.php?controleur=ControleurOuvrage&action=afficheOuvrages"><img src="vue/image/PourQuiSonneLeGlas.jpg" height="42" width="42"></a></div>
				<div class="item"><a href="routeur.php?controleur=ControleurOuvrage&action=afficheOuvrages"><img src="vue/image/LadieuAuxArmes.jpg"></a></div>
				<div class="item"><a href="routeur.php?controleur=ControleurOuvrage&action=afficheOuvrages"><img src="vue/image/JavaPourLesNuls.jpg"></a></div>
				<div class="item"><a href="routeur.php?controleur=ControleurOuvrage&action=afficheOuvrages"><img src="vue/image/LaCommunauteDeLanneau.jpg"></a></div>
				<div class="item"><a href="routeur.php?controleur=ControleurOuvrage&action=afficheOuvrages"><img src="vue/image/LesDeuxTours.jpg"></a></div>
				<main>
			</div>
		</section>
		<section class="abonnement">
			<h1>Nos abonnements</h1>
			<p>Choisissez votre abonnement en fonction de vos besoins</p>

			<div class="row">
				<div class="abonnement-col">
					<h3>Étudiant</h3>
					<p>
						La bibliothèque est accessible pour tout les etudiants de l'Universite Paris-Saclay et de toutes ses composantes.
						Elle permet un acces à tout les ouvrages disponible, en ligne ou physique pour vous accompagner durant votre parcours scolaire.
						Le Lumen proposera des services à la communauté universitaire : des millions de livres, revues et articles,
						imprimés ou numériques, couvrant tous les domaines d’activité du plateau de Moulon.
					</p>
				</div>
				<div class="abonnement-col">
					<h3>Lecteur Pro</h3>
					<p>Grand lecteur ou chercheur, vous recherchez un endroit calme, reposant et accueillant, offrant l'acces à des millions d'ouvrages,
						alors n'attendez plus ! En effet, venez vous detendre dans nos espaces de travail ou profitez du studio d'enregistrement.
						Il y en a pour tout les goûts, et on ne vous jugera pas pour cela. Il y a même une restauration sur place entre deux livres.
						Pour en savoir plus, envoyez nous un mail ou venez directement sur place, on sera ravi de vous guider.
					</p>
				</div>
				<div class="abonnement-col">
					<h3>Premium</h3>
					<p>En plus des millions d'ouvrages qui vous sont propose, Lumen Lurning Center propose une programmation culturelle et scientifique variée tout au long de l’année universitaire, 
						ainsi que divers espaces réservables pour contribuer à la vie pédagogique, associative, scientifique et culturelle du plateau de Moulon comme
						un auditorium modulable de 140 places assises, à l'entrée du bâtiment, le Forum, 
						les Box, salles modulables de 16 à 64 personnes et un espace ouvert de 250 m² modulable.
					</p>
				</div>
			</div>

		</section>

		<section class="infrastructure">
			<h1>L'infrastructure</h1>
			<p>Decouvrez-nous un peu plus</p>

			<div class="row">
				<div class="infrastructure-col">
					<img src="vue/image/infra1.jpg">
					<h3>Collaboratif</h3>
					<p>Cette documentation est issue des fonds de CentraleSupélec, de l’École Normale Supérieure Paris-Saclay et de l’Université Paris-Saclay.</p>
				</div>
				<div class="infrastructure-col">
					<img src="vue/image/infra2.jpg">
					<h3>Pedagogique</h3>
					<p>Un accompagnement de la vie étudiante : ateliers, prêt de jeux de société, services dédiés, etc.</p>
				</div>
				<div class="infrastructure-col">
					<img src="vue/image/infra3.jpg">
					<h3>Individuel</h3>
					<p>Du wifi, des copieurs et imprimantes, des casiers pour recharger son matériel informatique, etc.</p>
				</div>
			</div>
		</section>
		<?php include("footer.php"); ?>
	</body>
</html>