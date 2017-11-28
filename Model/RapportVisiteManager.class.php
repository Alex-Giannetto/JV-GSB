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
//		$query = MonPdo::getInstance()->prepare('INSERT INTO rapport_visite(praCode, rempCode, rapDate, rapBilan, rapMotif, 		medDepotLegal1, medDepotLegal2) VALUES(:praCode, :rempCode, :rapDate, :rapBilan, :rapMotif, :medDepLeg1, 					:medDepLeg2');
//		$query ->execute(array(
/*		'praCode' => $praCode,
        'rempCode' => $rempCode,
        'rapDate' => $rapDate,
        'rapBilan' => $rapBilan,
        'rapMotif' => $rapMotif,
        'medDepotLegal1' => $medDepLeg1,
        'medDepotLegal2' => $medDepLeg2))
 */
	}

	public static function getRapportById($id){
		$query = MonPdo::getInstance()->prepare('SELECT * FROM rapport_visite where rapNum = :id');
		$query->execute(array('id' => $id));
		$result = $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'RapportVisite');
		return (isset($result[0]))? $result[0] : new RapportVisite();
	}


	// Retourne la liste de tout les rapport de visite
	public static function getLstRapport(){
		$query = MonPdo::getInstance()->query('SELECT * FROM rapport_visite');
		return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'RapportVisite');
	}

	public static function updRapport($rapNum, $praCode, $rempCode, $rapDate, $rapBilan, $rapMotif, $medDepLeg1, $medDepLeg2, $echantillons)
	{
		$query = MonPdo::getInstance()->prepare('UPDATE rapport_visite SET praCode = :praCode, rempCode = :rempCode, rapDate = :rapDate, rapBilan = :rapBilan, rapMotif = :rapMotif, medDepotLegal1 = :medDepLeg1, medDepotLegal2 = :medDepLeg2 WHERE rapNum = ?');
		$query->execute([
			'praCode'        => $praCode,
			'rempCode'       => $rempCode,
			'rapDate'        => $rapDate,
			'rapBilan'       => $rapBilan,
			'rapMotif'       => $rapMotif,
			'medDepotLegal1' => $medDepLeg1,
			'medDepotLegal2' => $medDepLeg2
		]);
        $req = MonPdo::getInstance()->prepare('UPDATE echantillons SET echantillons = :echantillons WHERE rapNum = ?');
        $req->execute([
            'echantillons' => $echantillons
        ]);
	}

	public static function delRapport($id){
        $query = MonPdo::getInstance()->prepare('DELETE FROM echantillons WHERE rapNum = :rapNum');
        $query->execute(array('rapNum' => $id));
        $query = MonPdo::getInstance()->prepare('DELETE FROM rapport_visite WHERE rapNum = :rapNum');
        $query->execute(array('rapNum' => $id));

    }
}
