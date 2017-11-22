<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 13/11/2017
 * Time: 20:16
 */


class RapportVisiteManager
{
	// Ajoute un rapport de visite dans la base de donnée
	public static function addRapport(RapportVisite $rapport){
//		$query = MonPdo::getInstance()->prepare('INSERT INTO rapport_visite()');
	}

	// Retourne la liste de tout les rapport de visite
	public static function getLstRapport(){

		$query = MonPdo::getInstance()->query('SELECT * FROM rapport_visite');
		return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'RapportVisite');
	}

	// Retourne la liste des rapport pour une équipe
	public static function getLstRapportEquipe($idEquipe){
		// il faut d'abord boucler sur chaque personne de la liste
//		$query = MonPdo::getInstance()->query("SELECT * FROM ")
	}


}