<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 13/11/2017
 * Time: 15:05
 */
class  MedecinManager
{
	public static function getLstMedecin(){
		$query = MonPdo::getInstance()->query('SELECT * FROM praticien');
		return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Medecin');
	}

	public static function getMedecinById($id){
		$query = MonPdo::getInstance()->prepare('SELECT * FROM praticien WHERE praCode = :id');
		$query->execute(array('id' => $id));
		$med = $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Medecin');
		if(isset($med[0])){
			return $med[0];
		} else {
			return new Medecin();
		}
	}
}