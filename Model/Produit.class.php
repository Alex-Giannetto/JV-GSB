<?php
/**
 * Définition d'un produit
 * GETTER / SETTER pour les valeurs d'un produit
 * @author Alexg78bis
 * @package default
 */

class Produit
{
	protected $medDepotLegal, $libelle;

	/**
	 * Produit constructor. (vide)
	 */
	public function __construct()
	{
	}

	/**
	 * @return mixed
	 */
	public function getMedDepotLegal()
	{
		return $this->medDepotLegal;
	}

	/**
	 * @param mixed $medDepotLegal
	 */
	public function setMedDepotLegal($medDepotLegal)
	{
		$this->medDepotLegal = $medDepotLegal;
	}

	/**
	 * @return mixed
	 */
	public function getLibelle()
	{
		return $this->libelle;
	}

	/**
	 * @param mixed $libelle
	 */
	public function setLibelle($libelle)
	{
		$this->libelle = $libelle;
	}


}
