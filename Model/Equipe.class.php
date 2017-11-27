<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 22/11/2017
 * Time: 09:21
 */
class Equipe
{
	protected $id, $nom, $delegue, $lstUtilisateurs = array();

	/**
	 * Equipe constructor.
	 */
	public function __construct()
	{

	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * @param mixed $nom
	 */
	public function setNom($nom)
	{
		$this->nom = $nom;
	}

	/**
	 * @return mixed
	 */
	public function getDelegue()
	{
		return $this->delegue;
	}

	/**
	 * @param mixed $delegue
	 */
	public function setDelegue($delegue)
	{
		$this->delegue = $delegue;
	}

	/**
	 * @return array
	 */
	public function getLstUtilisateur()
	{
		return $this->lstUtilisateurs;
	}

	/**
	 * @param array $lstUtilisateur
	 */
	public function setLstUtilisateur($lstUtilisateur)
	{
		$this->lstUtilisateur = $lstUtilisateur;
	}

	public function ajouterUtilisateur($utilisateur){
		$this->lstUtilisateurs[] = $utilisateur;
	}
}
