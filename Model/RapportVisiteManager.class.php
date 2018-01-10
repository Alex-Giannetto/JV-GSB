<?php
/**
 * Manager des rapport de visite
 * Permet de récupérer la liste / 1 rapport de visite et d'ajouter / mettre à jour ou supprimer un rapport
 * @author Alexandre Giannetto
 * @package default
 */

class RapportVisiteManager
{
	/**
	 * Ajoute un rapport de visite dans la base de donnée
	 * @param RapportVisite $rapport
	 */
	public static function addRapport(RapportVisite $rapport){

		$query = MonPdo::getInstance()->prepare('INSERT INTO `rapport_visite`(`visiteurMatricule`, `praCode`, `rempCode`, `rapDate`, `rapBilan`, `rapMotif`, `medDepotLegal1`, `medDepotLegal2`, `doc`) '.
			' VALUES (:visiteurMatricule, :praCode, :rempCode, :rapDate, :rapBilan, :rapMotif, :medDepotLegal1, :medDepotLegal2, :doc);');

		$query->execute(array(
			'visiteurMatricule' => $rapport->getVisiteurMatricule(),
			'praCode' => $rapport->getPraCode(),
			'rempCode' => $rapport->getRempCode(),
			'rapDate' => $rapport->getRapDate(),
			'rapBilan' => $rapport->getRapBilan(),
			'rapMotif' => $rapport->getRapMotif(),
			'medDepotLegal1' => $rapport->getMedDepotLegal1(),
			'medDepotLegal2' => $rapport->getMedDepotLegal2(),
			'doc' => $rapport->getDoc()
		));

	}

	/**
	 * Retourne le rapport correspondant à l'id passé en paramètre
	 * @param $id
	 * @return RapportVisite
	 */
	public static function getRapportById($id){
		$query = MonPdo::getInstance()->prepare('SELECT * FROM rapport_visite where rapNum = :id');
		$query->execute(array('id' => $id));
		$result = $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'RapportVisite');
		return (isset($result[0]))? $result[0] : new RapportVisite();
	}

	/**
	 * Retourne la liste de tout les rapport de visite
	 * @return mixed
	 */
	public static function getLstRapport(){
		$query = MonPdo::getInstance()->query('SELECT * FROM rapport_visite');
		return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'RapportVisite');
	}

	/**
	 * Met à jour un rapport en fonction de son id
	 * @param $rapNum
	 * @param $praCode
	 * @param $rempCode
	 * @param $rapDate
	 * @param $rapBilan
	 * @param $rapMotif
	 * @param $medDepLeg1
	 * @param $medDepLeg2
	 * @param $echantillons
	 */
	public static function updRapport($rapNum, $praCode, $rempCode, $rapDate, $rapBilan, $rapMotif, $medDepLeg1, $medDepLeg2)
	{
		$query = MonPdo::getInstance()->prepare('UPDATE rapport_visite SET praCode = :praCode, rempCode = :rempCode, rapDate = :rapDate, rapBilan = :rapBilan, rapMotif = :rapMotif, medDepotLegal1 = :medDepLeg1, medDepotLegal2 = :medDepLeg2 WHERE rapNum = :rapNum');
		$query->execute([
			'praCode'        => $praCode,
			'rempCode'       => $rempCode,
			'rapDate'        => $rapDate,
			'rapBilan'       => $rapBilan,
			'rapMotif'       => $rapMotif,
			'medDepLeg1' => $medDepLeg1,
			'medDepLeg2' => $medDepLeg2,
            'rapNum'         => $rapNum
		]);
	}

	/**
	 * Supprime un rapport en fonction de son id
	 * @param $id
	 */
	public static function delRapport($id)
	{
	    EchantillonManager::deleteEchantillonsVisite($id);
		$query = MonPdo::getInstance()->prepare('DELETE FROM rapport_visite WHERE rapNum = :rapNum');
		$query->execute(array('rapNum' => $id));
	}
}