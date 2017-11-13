<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 13/11/2017
 * Time: 19:54
 */
class ProduitManager
{
	public static function getLstProduit(){
		$query = MonPdo::getInstance()->query('SELECT * FROM medicament ORDER BY libelle');
		return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Produit');
	}
}