<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 13/11/2017
 * Time: 19:49
 */
class Produit
{
	protected $medDepotLegal, $libelle;

	/**
	 * Produit constructor.
	 * @param $medDepotLegal
	 * @param $libelle
	 */

	/**
	 * Produit constructor.
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
