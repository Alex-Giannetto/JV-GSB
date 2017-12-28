<?php
/**
 * Manager des echantillons
 * Permet de récupérer la liste de tout les échantillons, d'en ajouter un
 * ou encore d'en chercher un en particulier
 * @author Alexg78bis
 * @package default
 */

class EchantillonManager
{

	/**
	 * Récupération des échantillons pour une visite
	 * @param RapportVisite $visite
	 * @return échantillon
	 */
	public static function getLstEchantillonVisite(RapportVisite $visite){
		$query = MonPdo::getInstance()->prepare("SELECT * FROM echantillons WHERE rapNum = :rapNum");
		$query->execute(array("rapNum" => $visite->getRapNum()));
		return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Echantillon');
	}

	/**
	 * Retourne l'échantillon correspondant à l'id recherché.
	 * Retourne un échantillon vide si n'existe pas
	 * @param $id
	 * @return Echantillon
	 */
	public static function getEchantillonById($id){
		$query = MonPdo::getInstance()->prepare('SELECT * FROM echantillons WHERE echNum = :id');
		$query->execute(array('id' => $id));
		$result = $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Echantillon');

		return (isset($result[0]))? $result[0] : new Echantillon();
	}

	/**
	 * Ajoute un échantillon dans la base de donnée
	 * @param Echantillon $echantillon
	 * @param $raportId
	 */
	public static function addEchantillon(Echantillon $echantillon, $raportId){
		$query = MonPdo::getInstance()->prepare('INSERT INTO echantillons(rapNum, medDepotLegal, quantite) VALUES (:rapNum, :medDepotLegal, :quantite)');
		$query->execute(array(
			'rapNum' => $raportId,
			'medDepotLegal' => $echantillon->getMedDepotLegal(),
			'quantite' => $echantillon->getQuantite()
		));

	}


    /**
     * Supprime tout les échantillons d'un rapport
     * @param $raportId
     */
    public static function deleteEchantillonsVisite($raportId){
        $query = MonPdo::getInstance()->prepare('DELETE FROM echantillons WHERE rapNum = :rapNum');
        $query->execute(array("rapNum" => $raportId));
    }


}
