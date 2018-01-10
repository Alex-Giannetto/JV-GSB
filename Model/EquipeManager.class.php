<?php
/**
 * Manager d'équipe
 * Permet de récupérer une équipe et d'obtenir tout leurs rapport
 * @author Alexandre Giannetto
 * @package default
 */

class EquipeManager
{
	/**
	 * Récupere une équipe avec ses utilisateurs
	 * @param $numDelegue
	 * @return Equipe
	 */
	public static function getEquipe($numDelegue){
		$query = MonPdo::getInstance()->prepare('Select * From equipe Where numDelegue = :num');
		$query->execute(array('num' => $numDelegue));

		$equipe = null;

		while($e = $query->fetch()){


			// On va chercher son délégué
			$getDelegue = MonPdo::getInstance()->prepare('SELECT * FROM utilisateur where num = :num');
			$getDelegue->execute(array('num' => $numDelegue));
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

	/**
	 * Récupérer tout les rapport d'une équipe
	 * @param Equipe $equipe
	 * @return mixed
	 */
	public static function getLstRapportEquipe(Equipe $equipe){

		$query = MonPdo::getInstance()->prepare("SELECT rapport_visite.* FROM rapport_visite, utilisateur WHERE rapport_visite.visiteurMatricule = utilisateur.num AND ( utilisateur.num IN ( SELECT numUtilisateur FROM appartientequipe WHERE numEquipe = :numEquipe) OR visiteurMatricule = :visiteurMatricule)");
		$query->execute(array('numEquipe' => $equipe->getId(), 'visiteurMatricule' => $equipe->getDelegue()->getNum()));

//		$query->execute();
		return $query->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'RapportVisite');


	}
}
