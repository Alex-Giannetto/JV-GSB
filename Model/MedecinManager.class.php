<?php
/**
 * Manager des médecins
 * Permet de récupérer la liste des médecin ou 1 seul médecin
 * @author Alexandre Giannetto
 * @package default
 */
class  MedecinManager
{

	/**
	 * Permet de récupérer la liste de tout les médecins
	 * @return mixed
	 */
	public static function getLstMedecin(){
		$query = MonPdo::getInstance()->query('SELECT * FROM praticien');
		return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Medecin');
	}

	/**
	 * Permet de récupérer le médecin correspond à l'id passé en paramètre
	 * Si le médecin n'existe pas, on retourne un médecin vide (pour éviter les erreurs)
	 * @param $id
	 * @return Medecin
	 */
	public static function getMedecinById($id){
		$query = MonPdo::getInstance()->prepare('SELECT * FROM praticien WHERE praCode = :id');
		$query->execute(array('id' => $id));
		$med = $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Medecin');

		return (isset($med[0]))? $med[0] : new Medecin();

	}
}