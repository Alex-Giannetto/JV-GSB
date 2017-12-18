<?php
/**
 * Définition d'une équipe
 * GETTER / SETTER pour les valeur d'une équipe + fonction pour ajouter des utilisateur dans
 * l'équipe de facon local
 * @author Alexg78bis
 * @package default
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
		$this->id = $id;
		$this->nom = $nom;
		$this->delegue = $delegue;
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
