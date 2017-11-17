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
		//inclusion de la page d'affichage
		require "View/Connexion/Connexion.inc.php";
		break;

	default:
		// Affichage de la liste des visite (pour possibilité de supprimer, ajouter, modifier, visualiser visite)
		break;
}
fonctions::entete($title);
