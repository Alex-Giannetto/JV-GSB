<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 13/11/2017
 * Time: 19:54
 */
class ProduitManager
{
	//Retourne la liste de tout les produits
	public static function getLstProduit(){
		$query = MonPdo::getInstance()->query('SELECT * FROM medicament ORDER BY libelle');
		return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Produit');
	}

	//Cherche et retourne le produit correspondant à l'id recherché
	public static function getProduitById($id){
		$query = MonPdo::getInstance()->prepare('SELECT * FROM medicament WHERE medDepotLegal = :id');
		$query->execute(array('id' => $id));
		$prod = $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Produit');
		if(isset($prod[0])){
			return $prod[0];
		} else {
			return new Produit();
		}
	}
}