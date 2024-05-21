<?php

require_once("modele/ouvrage.php");
    class ControleurOuvrage
    {
        

        public static function afficheOuvrages()
		{
		    require_once("vue/ouvrages.php");           
		}

        public static function afficheUnOuvrage()
		{
			require_once("vue/unOuvrage.php");
		}

        public static function listeOuvrages()
        {
            return Ouvrage::getOuvrages();
        }

        public static function listeOuvragesDispo()
        {
            return Ouvrage::getOuvragesDispo();
        }

        public static function listeOuvragesIndispo()
        {
            return Ouvrage::getOuvragesIndispo();
        } 

        public static function filtre($mot)
        {
            return Ouvrage::getListeInclude($mot);
        } 

        public static function recupOuvrage($id)
        {
            return Ouvrage::getOuvrage($id);
        }

        public static function listeOuvrageAuteur()
        {
            return Ouvrage::getOuvragesAuteur();
        }
        
    }
?>