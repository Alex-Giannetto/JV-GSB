<?php
/**
 * Définition d'un médecin
 * GETTER / SETTER pour les valeurs d'un médecin
 * @author Alexg78bis
 * @package default
 */
class Medecin
{
	protected $praCode, $praNom, $praPrenom;

	/**
	 * Medecin constructor.
	 * @param $praCode
	 * @param $praNom
	 */
	public function __construct()
	{

	}



	/**
	 * @return mixed
	 */
	public function getPraCode()
	{
		return $this->praCode;
	}

	/**
	 * @param mixed $praCode
	 */
	public function setPraCode($praCode)
	{
		$this->praCode = $praCode;
	}

	/**
	 * @return mixed
	 */
	public function getPraNom()
	{
		return $this->praNom;
	}

	/**
	 * @param mixed $praNom
	 */
	public function setPraNom($praNom)
	{
		$this->praNom = $praNom;
	}

	/**
	 * @return mixed
	 */
	public function getPraPrenom()
	{
		return $this->praPrenom;
	}

	/**
	 * @param mixed $praPrenom
	 */
	public function setPraPrenom($praPrenom)
	{
		$this->praPrenom = $praPrenom;
	}



}
