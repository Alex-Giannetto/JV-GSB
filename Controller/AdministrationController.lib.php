<link rel="stylesheet" href="css/visite.css">

<?php
/**
 * Controlleur pour la partie administration du site
 * Connexion / deconnexion des utilisateurs
 * @author Alexg78bis
 * @package default
 */

$action = (isset($_REQUEST['action']))? $_REQUEST['action'] : "";

switch ($action){
	case "Connexion":
		$title = "Connexion";
		// En cas de récupération du formulaire
		if(isset($_POST['mail']) && isset($_POST['password'])){
		    // On appel la fonction de conexion en lui passant une adresse mail et un mot de passe
            // crypté en sha1
			$result = UtilisateurManager::connexion($_POST['mail'], sha1($_POST['password']));
			if($result){
			    // si on obtient un résultat on attribu les information de l'utilisateur à
                // la variable user de session
				$_SESSION['user'] = $result;
				echo '<meta http-equiv="refresh" content="0; URL=index.php">';
			} else {
			    // Sinon on retourne un message d'erreur
				$message = array(0, "Connexion impossible");
			}
		}

		//inclusion de la page d'affichage
		require "View/Connexion/Connexion.inc.php";
		break;

	case "Deconnexion":
		// En cas de déconnexion, on supprime la variable session et on redirige
		// l'utilisateur sur l'index
		$title = "";
		session_destroy();
		echo '<meta http-equiv="refresh" content="0; URL=index.php">';
		break;

	default:
		//Par défaut, nous redirigeons sur l'index
		$title = "";
		echo '<meta http-equiv="refresh" content="0; URL=index.php">';
		break;
}

fonctions::entete($title);
