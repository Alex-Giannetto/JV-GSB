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

}