<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 22/11/2017
 * Time: 09:27
 */
class EquipeManager
{
//	public static function getEquipe($numDelegue){
//		$query = MonPdo::getInstance()->prepare('SELECT * FROM equipe WHERE numDelegue = :numDelegue');
//		$query->execute(array('numDelegue' => $numDelegue));
//
//		while($e = $query->fetch()){
//			$equipe = new Equipe($e['id'], $e['nom'], $e['numDelegue']);
//			$q = MonPdo::getInstance()->prepare('SELECT * FROM appartientequipe WHERE numEquipe = :numEquipe');
//			$q->execute(array('numEquipe' => $e['id']));
//			while ($u = $q->fetchAll()){
//				$equipe->ajouterUtilisateur(UtilisateurManager::getUtilisateurByID($u['numUtilisateur']));
//			}
//
//		}
//		return $equipe;
//	}


	public static function getEquipe($numDelegue){
		$query = MonPdo::getInstance()->prepare('SELECT * FROM equipe WHERE numDelegue = :numDelegue');
		$query->execute(array('numDelegue' => $numDelegue));

		while($e = $query->fetch()){

			$getDelegue = MonPdo::getInstance()->prepare('SELECT * FROM utilisateur where num = :num');
			$getDelegue->execute(array('num' => $e['numDelegue']));

			$result = $getDelegue->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_PROPS_LATE, 'Utilisateur');

			$equipe = new Equipe($e['id'], $e['nom'], $result[0]);

		}
		return $equipe;
	}
}
