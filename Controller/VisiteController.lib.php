<link rel="stylesheet" href="css/visite.css">
<?php
/*
 * Created by PhpStorm.
 * User: alexg78bis
 * Date: 07/11/2017
 * Time: 22:43
 */

$action = (isset($_REQUEST['action']))? $_REQUEST['action'] : "";

switch ($action){
	case "ajouter":
		//variable
		$medecins = MedecinManager::getLstMedecin();
		$produits = ProduitManager::getLstProduit();
		$title = "Ajouter une visite";
		//inclusion de la page d'affichage
		require "View/Visite/FormulaireVisite.inc.php";
		break;
	
	default:
		// Affichage de la liste des visite (pour possibilité de supprimer, ajouter, modifier, visualiser visite)
		break;
}
