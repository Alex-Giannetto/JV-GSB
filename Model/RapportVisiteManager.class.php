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
}