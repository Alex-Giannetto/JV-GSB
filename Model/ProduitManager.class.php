<?php
/**
 * Manager des produits
 * Permet de récupérer la liste des produits ou un produit précis
 * @author Alexandre Giannetto
 * @package default
 */
class ProduitManager
{
	/**
	 * Retourne la liste de tout les produits
	 * @return mixed
	 */
	public static function getLstProduit(){
		$query = MonPdo::getInstance()->query('SELECT * FROM medicament ORDER BY libelle');
		return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Produit');
	}

	/**
	 * Cherche et retourne le produit correspondant à l'id recherché
	 * @param $id
	 * @return Produit
	 */
	public static function getProduitById($id){
		$query = MonPdo::getInstance()->prepare('SELECT * FROM medicament WHERE medDepotLegal = :id');
		$query->execute(array('id' => $id));
		$prod = $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Produit');

		return (isset($prod[0]))? $prod[0] : new Produit();

	}
}
