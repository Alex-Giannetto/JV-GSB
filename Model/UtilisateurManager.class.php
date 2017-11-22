<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 20/11/2017
 * Time: 14:29
 */
class UtilisateurManager
{

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

	public static function getUtilisateurByID($id){
		$query = MonPdo::getInstance()->prepare('SELECT * FROM utilisateur where num = :num');
		$query->execute(array('num'=> $id));
		$result = $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Utilisateur');
		if(isset($result[0])){
			return $result[0];
		}
	}
}