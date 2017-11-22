<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 13/11/2017
 * Time: 20:16
 */
class RapportVisiteManager
{
	public static function addRapport(RapportVisite $rapport){
		$query = MonPdo::getInstance()->prepare('INSERT INTO rapport_visite()');
	}
	public static function updRapport($rapNum, $visitMat, $praCode, $rapDate, $rapBilan, $rapMotif, $medDepLeg1, $medDepLeg2){
        $query = MonPdo::getInstance()->prepare('UPDATE rapport_visite SET visiteurMatricule = :visitMat, praCode = :praCode, rapDate = :rapDate, rapBilan = :rapBilan, rapMotif = :rapMotif, medDepotLegal1 = :medDepLeg1, medDepotLegal2 = :medDepLeg2 WHERE rapNum = ?');
        $query -> execute(array(
        'visiteurMatricule' => $visitMat,
        'praCode' => $praCode,
        'rapDate' => $rapDate,
        'rapBilan' => $rapBilan,
        'rapMotif' => $rapMotif,
        'medDepotLegal1' => $medDepLeg1,
        'medDepotLegal2' => $medDepLeg2
    ));
    }
}
