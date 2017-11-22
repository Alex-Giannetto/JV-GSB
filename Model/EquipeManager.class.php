<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 22/11/2017
 * Time: 09:27
 */
class EquipeManager
{
	/**
	 * @param $numDelegue
	 * @return Equipe
	 * Récupere une équipe avec ses utilisateurs
	 */
	public static function getEquipe($numDelegue){
		$query = MonPdo::getInstance()->prepare('SELECT * FROM equipe WHERE numDelegue = :numDelegue');
		$query->execute(array('numDelegue' => $numDelegue));

		while($e = $query->fetch()){
			// On va chercher son délégué
			$getDelegue = MonPdo::getInstance()->prepare('SELECT * FROM utilisateur where num = :num');
			$getDelegue->execute(array('num' => $e['numDelegue']));
			$delegue = $getDelegue->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Utilisateur');

			// On créer l'équipe qui sera retourné à la fin de la fonction
			$equipe = new Equipe($e['id'], $e['nom'], $delegue[0]);

			// On ajoute les différentes personne dans l'equipe
			// il faut donc aller chercher dans la table appatientEquipe les différentes personnes
			$personnes = MonPdo::getInstance()->prepare('SELECT * FROM appartientequipe WHERE numEquipe = :numEquipe');
			$personnes->execute(array('numEquipe' => $e['id']));
			while($per = $personnes->fetch()){
				// On réucupere l'utilisateur sous la forme d'un objet de type Utilisateur
				$utilisateur = MonPdo::getInstance()->prepare('SELECT * FROM utilisateur WHERE num = :num');
				$utilisateur->execute(array('num' => $per['numUtilisateur']));
				$ut = $utilisateur->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Utilisateur');

				//On ajoute l'utilisateur dans la liste
				$equipe->ajouterUtilisateur($ut);
			}


		}
		return $equipe;
	}

	public static function getLstRapportEquipe(Equipe $equipe){
		$user = "";
		foreach ($equipe->getLstUtilisateur()[0] as $visiteur){
			$user += ", ".$visiteur->getNum();
		}

		return $user;
//		$query = MonPdo::getInstance()->prepare('SELECT rapport_visite.* FROM rapport_visite, utilisateur where rapport_visite.visiteurMatricule = utilisateur.num AND utilisateur.num in (:user)');
	}

}
