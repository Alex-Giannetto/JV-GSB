<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 13/11/2017
 * Time: 20:08
 */
class RapportVisite
{
	protected $rapNum, $visiteurMatricule, $rempCode, $praCode, $rapDate, $rapBilan, $rapMotif, $medDepotLegal1, $medDepotLegal2, $doc;
	protected $echantillon = [];

	/**
	 * RapportVisite constructor.
	 */
	public function __construct()
	{
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
	public function getVisiteurMatricule()
	{
		return $this->visiteurMatricule;
	}

	/**
	 * @param mixed $visiteurMatricule
	 */
	public function setVisiteurMatricule($visiteurMatricule)
	{
		$this->visiteurMatricule = $visiteurMatricule;
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
	public function getRapDate()
	{
		return $this->rapDate;
	}

	/**
	 * @param mixed $rapDate
	 */
	public function setRapDate($rapDate)
	{
		$this->rapDate = $rapDate;
	}

	/**
	 * @return mixed
	 */
	public function getRapBilan()
	{
		return $this->rapBilan;
	}

	/**
	 * @param mixed $rapBilan
	 */
	public function setRapBilan($rapBilan)
	{
		$this->rapBilan = $rapBilan;
	}

	/**
	 * @return mixed
	 */
	public function getRapMotif()
	{
		return $this->rapMotif;
	}

	/**
	 * @param mixed $rapMotif
	 */
	public function setRapMotif($rapMotif)
	{
		$this->rapMotif = $rapMotif;
	}

	/**
	 * @return mixed
	 */
	public function getRempCode()
	{
		return $this->rempCode;
	}

	/**
	 * @param mixed $rempCode
	 */
	public function setRempCode($rempCode)
	{
		$this->rempCode = $rempCode;
	}

	/**
	 * @return mixed
	 */
	public function getMedDepotLegal1()
	{
		return $this->medDepotLegal1;
	}

	/**
	 * @param mixed $medDepotLegal1
	 */
	public function setMedDepotLegal1($medDepotLegal1)
	{
		$this->medDepotLegal1 = $medDepotLegal1;
	}

	/**
	 * @return mixed
	 */
	public function getMedDepotLegal2()
	{
		return $this->medDepotLegal2;
	}

	/**
	 * @param mixed $medDepotLegal2
	 */
	public function setMedDepotLegal2($medDepotLegal2)
	{
		$this->medDepotLegal2 = $medDepotLegal2;
	}

	/**
	 * @return array
	 */
	public function getEchantillon()
	{
		return $this->echantillon;
	}

	public function ajouterEchantillon($ref, $quantite){
		$this->echantillon[] = array(
			"ref" => $ref,
			"quantite" => $quantite
		);
	}

	/**
	 * @return mixed
	 */
	public function getDoc()
	{
		return $this->doc;
	}

	/**
	 * @param mixed $doc
	 */
	public function setDoc($doc)
	{
		$this->doc = $doc;
	}



}
