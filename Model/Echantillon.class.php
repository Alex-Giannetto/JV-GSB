<?php
/**
 * Définition d'un échantillon
 * GETTER / SETTER pour les valeurs d'un échantillon
 * @author Alexg78bis
 * @package default
 */

class Echantillon
{
	protected $echNum, $rapNum, $medDepotLegal, $quantite;

	/**
	 * Echantillon constructor.
	 */
	public function __construct()
	{
	}


	/**
	 * @return mixed
	 */
	public function getEchNum()
	{
		return $this->echNum;
	}

	/**
	 * @param mixed $echNum
	 */
	public function setEchNum($echNum)
	{
		$this->echNum = $echNum;
	}

	/**
	 * @return mixed
	 */
	public function getRapNum()
	{
		return $this->rapNum;
	}

	/**
	 * @param mixed $rapNum
	 */
	public function setRapNum($rapNum)
	{
		$this->rapNum = $rapNum;
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
	public function getQuantite()
	{
		return $this->quantite;
	}

	/**
	 * @param mixed $quantite
	 */
	public function setQuantite($quantite)
	{
		$this->quantite = $quantite;
	}



}
