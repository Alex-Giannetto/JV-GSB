<?php
/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 13/11/2017
 * Time: 07:34
 */
class Medecin
{
	protected $praCode, $praNom;

	/**
	 * Medecin constructor.
	 * @param $praCode
	 * @param $praNom
	 */
	public function __construct($praCode, $praNom)
	{
		$this->praCode = $praCode;
		$this->praNom = $praNom;
	}

	public function Medecin(){

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


}