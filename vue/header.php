<?php
if(isset($_SESSION["user"])) {
	$user = $_SESSION["user"];
	$connecter = true;
	$login = $user->getLogin();
	$categorie = $user->getId_Cat();
	$reserver = "routeur.php?controleur=ControleurReservation&action=afficheReservations";
}
else {
	$connecter = false;
	$reserver = "routeur.php?controleur=ControleurConnexion&action=connexionUtilisateur&error=2";
}

?>
<nav id="navbar">
	<a href="routeur.php?controleur=ControleurIndex&action=lireIndex"><img src="vue/images/logo.png"></a>
	<div class="nav-links" id="navLinks">
		<i class="fa fa-xmark" onclick="hideMenu()"></i>
		<ul>
			<?php if ($connecter && ($categorie == 4 || $categorie == 5)) { ?>
			<li><a href="routeur.php?controleur=ControleurAdmin&action=listeUsers">Utilisateurs</a></li>
			<li><a href="routeur.php?controleur=ControleurAdmin&action=listePreinscrits">Pre-inscrits</a></li>
			<li><a href="routeur.php?controleur=ControleurOuvrage&action=afficheOuvrages">Ouvrages</a></li>
			<li><a href="routeur.php?controleur=ControleurAdmin&action=listeEmprunts">Emprunts</a></li>
			<li><a href="routeur.php?controleur=ControleurIndex&action=lireIndex&deco=1">Deconnexion</a></li>
			<?php } else { ?>
			<li><a href="routeur.php?controleur=ControleurIndex&action=lireIndex">Accueil</a></li>
			<li><a href="routeur.php?controleur=ControleurOuvrage&action=afficheOuvrages">Ouvrages</a></li>
			<li><a href="<?php echo $reserver ?>">Reservation</a></li>	
			<?php if(!$connecter) { ?>
			<li><a href="routeur.php?controleur=ControleurConnexion&action=connexionUtilisateur">Connexion</a></li>
			<li><a href="routeur.php?controleur=ControleurAttente&action=preInscriptionUtilisateur">Pre-inscription</a></li>
			<?php } else { ?>
			<li><a href="#"><?php echo $login ?></a></li>
			<li><a href="routeur.php?controleur=ControleurIndex&action=lireIndex&deco=1">Deconnexion</a></li>
			<?php }} ?>
		</ul>
	</div>
	<i class="fa fa-bars" onclick="showMenu()"></i>
	<!-- 
	<form action="ouvrages.php" method="GET">
		<input type="text" name="filtre" placeholder="Rechercher un ouvrage" width=50 height=30>
		<button type="submit">&#128269;</button>
	</form>
	 -->
</nav>
<script>
window.onscroll = function() {
  var navbar = document.getElementById("navbar");
  if (document.body.scrollTop > 650 || document.documentElement.scrollTop > 650) {
    navbar.style.backgroundColor = "#000";
  } else {
    navbar.style.backgroundColor = "";
  }
};
</script>

