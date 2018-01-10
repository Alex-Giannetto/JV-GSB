<?php
/**
 * Manager des utilisateur
 * GETTER / SETTER pour les valeurs d'un échantillon
 * @author Alexandre Giannetto
 * @package default
 */

class UtilisateurManager
{
	/**
	 * Permet la connexion
	 * @param $mail
	 * @param $password
	 * @return bool
	 */
	static function connexion($mail, $password){
		$mail = htmlspecialchars($mail);
		$password = htmlspecialchars($password);

		$query = MonPdo::getInstance()->prepare('SELECT * FROM utilisateur WHERE mail = :mail AND password = :password');
		$query->execute(array('mail'=> $mail, 'password' => $password));
		$result = $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Utilisateur');


		if(isset($result[0])){
			return $result[0];
		} else {
			return false;
		}
	}

	/**
	 * Permet de récupérer un utilisateur en fonction de son id
	 * @param $id
	 * @return mixed
	 */
	public static function getUtilisateurByID($id){
		$query = MonPdo::getInstance()->prepare('SELECT * FROM utilisateur where num = :num');
		$query->execute(array('num'=> $id));
		$result = $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Utilisateur');

		return (isset($result[0]))? $result[0] : new Utilisateur();

	}

	/**
	 * Récupère tout les rapport d'un utilisateur
	 * @param Utilisateur $utilisateur
	 * @return mixed
	 */
	public static function getLstRapportByUtilisateurId(Utilisateur $utilisateur){
		$query = MonPdo::getInstance()->prepare('SELECT * FROM rapport_visite WHERE visiteurMatricule = :numVisiteur');
		$query->execute(array('numVisiteur' => $utilisateur->getNum()));
		return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'RapportVisite');
	}

}
