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

	public static function updRapport($rapNum, $praCode, $rempCode, $rapDate, $rapBilan, $rapMotif, $medDepLeg1, $medDepLeg2){
        $query = MonPdo::getInstance()->prepare('UPDATE rapport_visite SET praCode = :praCode, rempCode = :rempCode, rapDate = :rapDate, rapBilan = :rapBilan, rapMotif = :rapMotif, medDepotLegal1 = :medDepLeg1, medDepotLegal2 = :medDepLeg2 WHERE rapNum = ?');
        $query -> execute(array(
        'praCode' => $praCode,
        'rempCode' => $rempCode,
        'rapDate' => $rapDate,
        'rapBilan' => $rapBilan,
        'rapMotif' => $rapMotif,
        'medDepotLegal1' => $medDepLeg1,
        'medDepotLegal2' => $medDepLeg2
    ));
    }
}
