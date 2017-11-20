<link rel="stylesheet" href="css/visite.css">

<?php
/*
 * Created by PhpStorm.
 * User: alexg78bis
 * Date: 16/11/2017
 * Time: 19:44
 */

$action = (isset($_REQUEST['action']))? $_REQUEST['action'] : "";

switch ($action){
	case "Connexion":
		$title = "Connexion";
		// En cas de récupération du formulaire
		if(isset($_POST['mail']) && isset($_POST['password'])){
			$result = UtilisateurManager::connexion($_POST['mail'], sha1($_POST['password']));
			if($result){
				$_SESSION['user'] = $result;
				echo '<meta http-equiv="refresh" content="0; URL=index.php">';
			} else {
				$message = array(0, "Connexion impossible");
			}
		}

		//inclusion de la page d'affichage
		require "View/Connexion/Connexion.inc.php";
		break;

	case "Deconnexion":
		$title = "";
		session_destroy();
		echo '<meta http-equiv="refresh" content="0; URL=index.php">';
		break;

	default:
		$title = "";
		echo '<meta http-equiv="refresh" content="0; URL=index.php">';
		break;
}
fonctions::entete($title);
