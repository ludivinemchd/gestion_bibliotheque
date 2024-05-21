<?php
include("modele/reservation.php");
class ControleurReservation {

  // la méthode de récupération et d'affichage de tous les utilisateurs
    public static function afficheReservations()
	{
		require_once("vue/reservations.php");
	}
 
 	public static function lireReservation($l) {
		
		$tab_u = Reservation::getAllReservation($l);
		return $tab_u;
	}

	public static function lireReservations() {
		
		$tab_u = Reservation::getAllReservation();
		return $tab_u;
	}
		
  }
  
?>