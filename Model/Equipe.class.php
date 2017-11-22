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
	 * @param $id
	 * @param $nom
	 * @param $delegue
	 */
	public function __construct($id, $nom, $delegue)
	{
		$this->setId($id);
		$this->setNom($nom);
		$this->setDelegue($delegue);
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
		return $this->lstUtilisateur;
	}

	/**
	 * @param array $lstUtilisateur
	 */
	public function setLstUtilisateur($lstUtilisateur)
	{
		$this->lstUtilisateur = $lstUtilisateur;
	}

	public function ajouterUtilisateur(Utilisateur $utilisateur){
		$this->lstUtilisateurs[] = $utilisateur;
	}
}