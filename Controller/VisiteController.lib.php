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

		// En cas de récupération de formulaire
		if(isset($_POST['ajouter'])){
			if(isset($_POST['num']) && !empty($_POST['num'])
				&& isset($_POST['date']) && !empty($_POST['date'])
				&& isset($_POST['medecin']) && !empty($_POST['medecin'])
				&& isset($_POST['motif']) && !empty($_POST['motif'])
				&& isset($_POST['remplacant']) && !empty($_POST['remplacant'])
				&& isset($_POST['bilan']) && !empty($_POST['bilan'])
				&& isset($_POST['firstProduit']) && !empty($_POST['firstProduit'])
				&& isset($_POST['secondProduit']) && !empty($_POST['secondProduit'])
				&& isset($_POST['doc']) && !empty($_POST['doc'])){

				if($_POST['remplacant'] != $_POST['medecin']){
					if($_POST['motif'] != "AUT" || ($_POST['motif'] == "AUT" && !empty($_POST['autre']))){
						$message = [1, "Réussi !"];
					} else {
						$message = [0, "Veuillez remplir tout les champs"];
					}

				} else {
					$message = [0, "Le médecin ne peux être le même que le remplaçant"];
				}
			} else {
				$message = [0, "Veuillez remplir tout les champs"];
			}
		}

		if(isset($message) && $message[0] == 0){
			$data = array(
				"num" => (!empty($_POST['num'])) ? $_POST['num'] : null,
				"date" => (!empty($_POST['date'])) ? $_POST['date'] : null,
				"medecin" => (!empty($_POST['medecin'])) ? $_POST['medecin'] : null,
				"motif" => (!empty($_POST['motif'])) ? $_POST['motif'] : null,
				"remplacant" => (!empty($_POST['remplacant'])) ? $_POST['remplacant'] : null,
				"autre" => (!empty($_POST['autre'])) ? $_POST['autre'] : null,
				"bilan" => (!empty($_POST['bilan'])) ? $_POST['bilan'] : null,
				"firstProduit" => (!empty($_POST['firstProduit'])) ? $_POST['firstProduit'] : null,
				"secondProduit" => (!empty($_POST['secondProduit'])) ? $_POST['secondProduit'] : null,
				"doc" => (!empty($_POST['doc'])) ? $_POST['doc'] : null
			);
		}

		//inclusion de la page d'affichage
		require "View/Visite/FormulaireVisite.inc.php";
		break;
	
	default:
		// Affichage de la liste des visite (pour possibilité de supprimer, ajouter, modifier, visualiser visite)
		break;
}

entete($title);