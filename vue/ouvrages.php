<!DOCTYPE html>
<html lang="fr" style="font-size: 16px">
	<head>
		<title>Ouvrages</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="vue/css/style.css">
	</head>
	<body>
	<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	$ouvrageDispo = ControleurOuvrage::listeOuvragesDispo();
	$ouvrageIndispo = ControleurOuvrage::listeOuvragesIndispo();
	$listeOuvrage = ControleurOuvrage::listeOuvrages();
	$n = 1;
	$a = 0;
	?>
	<section class="header"  style="background-color:rgba(4,9,30,0.85)">
		<?php include("header.php") ?>
		<div class="books">
			<h1 style="color:#fff">Aperçu de nos ouvrages</h1>
            <div class="book_box">
                <?php
				shuffle($ouvrageDispo);
				foreach($ouvrageDispo as $o) {
					if($a>=15)
						break;
					$auteur = $o->getAuteur();
				?>
                <div class="book_card" style="background-color: rgba(4,9,30);">

                    <div class="book_img">
                        <img src="vue/images/b<?php echo $n;if($n<3) echo ".png";else echo ".jpg";?>" alt="Livre">
                    </div>

                    <div class="book_tag" style="color:#fff">
                        <h2><?php echo $o->getTitre() ?></h2> <!----Titre----->
                        <p class="writer"><?php echo $auteur->getNomA()." ".$auteur->getPrenomA() ?></p> <!----l'auteur----->
                        <!-- <div class="categories">Thriller, Horror, Romance</div> --les catégories--- -->
                        <a href="routeur.php?controleur=ControleurOuvrage&action=afficheUnOuvrage&ouvrage=<?php echo $o->getISBN() ?>" style="color:#fff" class="f_btn"><strong>Aperçu</strong></a>
                    </div>
                </div>
				<?php
					$n = $n + 1;
					if($n>5)
						$n=1;
					$a = $a +1;
				}
				?>
            </div>
		</div>
	</section>
	<!------Arrivals------>
	<section class="prochainement">
		<div class="arrivals">
			<form method="post">
				<input type="text" name="filtre" placeholder="Rechercher un ouvrage" width=50 height=30>
				<button type="submit">&#128269;</button>
			</form>
			<?php
			
			if(isset($_POST["sorting"])) {
				if($_POST["sorting"] == "A")
					asort($listeOuvrage);
				if($_POST["sorting"] == "Z")
					arsort($listeOuvrage);
				if($_POST["sorting"] == "DispoA") {
					$listeOuvrage = $ouvrageDispo;
					asort($listeOuvrage);
				}
				if($_POST["sorting"] == "DispoZ") {
					$listeOuvrage = $ouvrageDispo;
					arsort($listeOuvrage);
				}
				if($_POST["sorting"] == "auteur")
					$listeOuvrage = ControleurOuvrage::listeOuvrageAuteur();
			}

			if(isset($_POST["filtre"])) {
				$filtre = $_POST["filtre"];
				$listeOuvrage = ControleurOuvrage::filtre($filtre);
			}
			$n=1;
			if(empty($listeOuvrage)) {
				echo "<center style='color:red'>Aucun resultat pour votre recherche</center>";
				$listeOuvrage = $ouvrageDispo;
				echo "<h1>Tous nos ouvrages</h1>";
			} 
			else
				echo "<h1>Resultats de la recherche</h1>";
			$oParPage = 40;
			$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
			$start = ($currentPage - 1) * $oParPage;
			$totalPages = ceil(count($listeOuvrage) / $oParPage);

			$ouvrageParPage = array_slice($listeOuvrage, $start, $oParPage);

			?>
			<form method="post" style="padding: 5px;">
				
				<select id="select-sorting" name="sorting" onchange="this.form.submit()">
					<option selected disabled>Trier par</option>
					<option value="A">Ordre croissant</option>
					<option value="Z">Ordre decroissant</option>
					<option value="DispoA">Reservable (croissant)</option>
					<option value="DispoZ">Reservable (decroissant)</option>
					<option value="auteur">Auteur</option>
				</select>
			</form>
			<div class="arrivals_box">

				
				<?php foreach($ouvrageParPage as $o) { ?>
				<div class="arrivals_card">
					<div class="arrivals_image">
						<img src="vue/images/b<?php echo $n;if($n<3) echo ".png";else echo ".jpg";?>">
					</div>
					<div class="arrivals_tag">
						<p><?php echo $o->getTitre() ?></p>
						<div class="arrivals_icon">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star-half-stroke"></i>
						</div>
						<a href="routeur.php?controleur=ControleurOuvrage&action=afficheUnOuvrage&ouvrage=<?php echo $o->getISBN() ?>&titre='<?php $o->getTitre() ?>'" class="arrivals_btn">Decouvrir</a>
					</div>
				</div>
				<?php
					$n = $n + 1;
					if($n>5)
						$n=1;
			}
			echo "<div style='display:in-line' id='pagination'>";
			if ($currentPage > 1 && $currentPage <= $totalPages) {
				echo "<a href='routeur.php?controleur=ControleurOuvrage&action=afficheOuvrages&page=" . ($currentPage - 1) . "'>
				<button style='margin: 10px; padding: 10px 20px;'>Previous</button>
				</a>";
			}
			echo "<span>";
			for($i=1;$i<=$totalPages;$i++) {
				echo "<a href='routeur.php?controleur=ControleurOuvrage&action=afficheOuvrages&page=$i'>
					<button style='padding: 10px 20px;'>$i</button>
					</a>";
			}
			echo "</span>";
			if ($currentPage < $totalPages && $currentPage >= 1) {
				echo "<a href='routeur.php?controleur=ControleurOuvrage&action=afficheOuvrages&page=" . ($currentPage + 1) . "'>
				<button style='margin: 10px; padding: 10px 20px;'>Next</b></button>
				</a>";
			}
			echo "</div>";
			?>
			</div>
		</div>
	</section>

	<!-- <script src="js/script.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

	</body>
</html>