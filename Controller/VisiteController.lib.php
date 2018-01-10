<link rel="stylesheet" href="css/visite.css">
<?php
/**
 * Controlleur pour la partie visite du site
 * @author Alexandre Giannetto, Bryce Tavares, Adrien Stupnicki
 * @package default
 */

$action = (isset($_REQUEST['action']))? $_REQUEST['action'] : "";
switch ($action){
	case "ajouter":
		//variable nécéssaire pour la vue
		$medecins = MedecinManager::getLstMedecin(); // liste des médecins qui seront affichés dans les listes déroulantes
		$produits = ProduitManager::getLstProduit(); // liste des produits qui seront affichés dans les listes déroulantes
		$title = "Ajouter une visite"; // titre de la page à affiché dans l'encadré
		$modification = true; // activation des champs

		// En cas de récupération de formulaire
		if(isset($_POST['submit'])){
			$echantillons = array();
			// Nous allons récupérer tous les échantillons envoyé via le formulaire
			if(isset($_POST['nbEchantillons'])){
				for ($i = 1; $i <=  $_POST['nbEchantillons']; $i++){
					$indexPdt = 'pdt'.$i;
					$indexQte = 'qte'.$i;
					// Les champs du formulaire peuvent être vide, c'est donc pour cela que que nous alons regarder s'ils ont été remplit
					if(isset($_POST[$indexPdt]) && !empty($_POST[$indexPdt])){
						// on ajoute les échantillon sous forme d'objet dans le tableaux des échantillons
						$echan = new Echantillon();
						$echan->setMedDepotLegal($_POST[$indexPdt]);
						$echan->setQuantite($_POST[$indexQte]);
						$echantillons[] = $echan;
					}
				}
			}

			// si l'on récupère un formulaire, on regarde bien la saisi de chacun des champs
			if(isset($_POST['date']) && !empty($_POST['date'])
			   	&& isset($_POST['medecin']) && !empty($_POST['medecin'])
			   	&& isset($_POST['motif']) && !empty($_POST['motif'])
			   	&& isset($_POST['remplacant']) && !empty($_POST['remplacant'])
			   	&& isset($_POST['bilan']) && !empty($_POST['bilan'])
			   	&& isset($_POST['firstProduit']) && !empty($_POST['firstProduit'])
			   	&& isset($_POST['secondProduit']) && !empty($_POST['secondProduit'])){

			    // On vérifie que le remplacant soit bien différent du pratiquant
				if($_POST['remplacant'] != $_POST['medecin']){
				    // On vérifie que le motif soit bien saisi
					if($_POST['motif'] != "AUT" || ($_POST['motif'] == "AUT" && !empty($_POST['autre']))){
						//On convertit le formulaire sous forme d'objet
					    $rapport = new RapportVisite();
						$rapport->setVisiteurMatricule($_SESSION['user']->getNum());
						$rapport->setRapDate($_POST['date']);
						$rapport->setPraCode($_POST['medecin']);
						$rapport->setRapBilan($_POST['bilan']);
						$rapport->setRapMotif(($_POST['motif'] == "AUT")? $_POST["autre"] : $_POST['motif']);
						$rapport->setRempCode($_POST['remplacant']);
						$rapport->setMedDepotLegal1($_POST['firstProduit']);
						$rapport->setMedDepotLegal2($_POST['secondProduit']);

						// On ajoute le rapport dans la base de donnée
						RapportVisiteManager::addRapport($rapport);

						// On récupère le numéro du rapport inséré
						$id = MonPdo::getInstance()->query('select max(rapNum) from rapport_visite')->fetch();

						// Pour ensuite ajouté chaque échantilons au rapport
						foreach ($echantillons as $echantillon){
							EchantillonManager::addEchantillon($echantillon, $id[0]);
						}

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

		// Si il y a eu une erreur durant le processus, on injecte toute les valeurs du formulaire dans la variable
        // $data afin de les réaffiché dans la vue
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
				"doc" => (!empty($_POST['doc'])) ? $_POST['doc'] : null,
				"echantillons" => $echantillons,
			);

		}
		//inclusion de la page d'affichage
		require "View/Visite/FormulaireVisite.inc.php";
		break;

    case "modify":
        $medecins = MedecinManager::getLstMedecin(); // liste des médecins qui seront affichés dans les listes déroulantes
        $produits = ProduitManager::getLstProduit(); // liste des produits qui seront affichés dans les listes déroulantes
        $title = "Modifier une visite"; // titre de la page à affiché dans l'encadré
        $modification = true; // activation des champs pour la modification
        $visite = RapportVisiteManager::getRapportById($_GET['id']); // on récupére l'id du rapport à modifier

        $echantillons = array();
        // Nous allons récupérer tous les échantillons envoyé via le formulaire
        if(isset($_POST['nbEchantillons'])){
            for ($i = 1; $i <=  $_POST['nbEchantillons']; $i++){
                $indexPdt = 'pdt'.$i;
                $indexQte = 'qte'.$i;
                // Les champs du formulaire peuvent être vide, c'est donc pour cela que que nous alons regarder s'ils ont été remplit
                if(isset($_POST[$indexPdt]) && !empty($_POST[$indexPdt])){
                    // on ajoute les échantillon sous forme d'objet dans le tableaux des échantillons
                    $echan = new Echantillon();
                    $echan->setMedDepotLegal($_POST[$indexPdt]);
                    $echan->setQuantite($_POST[$indexQte]);
                    $echantillons[] = $echan;
                }
            }
        }

        // Si l'on recoit des donnée du formulaire
        if(isset($_POST['submit'])){
            // On vérifie que chaque champ soit saisi
            if(isset($_POST['date']) && !empty($_POST['date'])
                && isset($_POST['medecin']) && !empty($_POST['medecin'])
                && isset($_POST['motif']) && !empty($_POST['motif'])
                && isset($_POST['remplacant']) && !empty($_POST['remplacant'])
                && isset($_POST['bilan']) && !empty($_POST['bilan'])
                && isset($_POST['firstProduit']) && !empty($_POST['firstProduit'])
                && isset($_POST['secondProduit']) && !empty($_POST['secondProduit'])){

                // On verifie que le remplacant soit différent du pratiquant
                if($_POST['remplacant'] != $_POST['medecin']){
                    if($_POST['motif'] != "AUT" || ($_POST['motif'] == "AUT" && !empty($_POST['autre']))){
                        $message = [1, "Réussi !"];

                        // On appel la méthode updRapport qui met a jour le rapport avec les nouvelle valeurs
                        RapportVisiteManager::updRapport($_GET['id'], $_POST['medecin'], $_POST['remplacant'], $_POST['date'], $_POST['bilan'], $_POST['motif'], $_POST['firstProduit'], $_POST['secondProduit']);

                        // on supprime tout les échantillons
                        EchantillonManager::deleteEchantillonsVisite($_GET['id']);

                        // Pour les remmetre dans la base de donnée à nouveau
                        foreach ($echantillons as $echantillon){
                            EchantillonManager::addEchantillon($echantillon, $_GET['id']);
                        }
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

        // On récupére les échantillons
        $echantillons = EchantillonManager::getLstEchantillonVisite($visite);

        // Si il y a eu une erreur durant le processus, on injecte toute les valeurs du formulaire dans la variable
        // $data afin de les réaffiché dans la vue
        $data = array(
            "num" => (isset($_POST['num'])) ? $_POST['num'] : $visite->getRapNum(),
            "date" => (isset($_POST['date'])) ? $_POST['date'] : $visite->getRapDate(),
            "medecin" => (isset($_POST['medecin'])) ? $_POST['medecin'] : $visite->getPraCode(),
            "motif" => (isset($_POST['motif'])) ? $_POST['motif'] : $visite->getRapMotif(),
            "remplacant" => (isset($_POST['remplacant'])) ? $_POST['remplacant'] : $visite->getRempCode(),
            "bilan" => (isset($_POST['bilan'])) ? $_POST['bilan'] : $visite->getRapBilan(),
            "firstProduit" => (isset($_POST['firstProduit'])) ? $_POST['firstProduit'] : $visite->getMedDepotLegal1(),
            "secondProduit" => (isset($_POST['secondProduit'])) ? $_POST['secondProduit'] : $visite->getMedDepotLegal2(),
            "doc" => (isset($_POST['doc'])) ? $_POST['doc'] : null,
            "echantillons" => $echantillons
        );

        require "View/Visite/FormulaireVisite.inc.php";
        break;

	case"delete":
	    // En cas de suppression de rapport, on appel la fonction delRapport et on redirige sur la page des visites
        RapportVisiteManager::delRapport($_GET['id']);
        $title='';
        echo '<meta http-equiv="refresh" content="0; URL=index.php?uc=visite">';
        break;

	case "view":
		if(isset($_GET['id'])){

			$medecins = array();
			$produits = array();
			$modification = false;

			// On récupere le rapport
			$rapport = RapportVisiteManager::getRapportById($_GET['id']);

			// On récupere les echantillons
			$echantillons = EchantillonManager::getLstEchantillonVisite($rapport);

			$title = "Visite n°".$rapport->getRapNum(); // On défini le titre de la page

            // On remplit la variable $data afin de remplir les champs de la vue
			$data = array(
				"num" => $rapport->getRapNum(),
				"date" => $rapport->getRapDate(),
				"medecin" => $rapport->getPraCode(),
				"motif" => $rapport->getRapMotif(),
				"remplacant" => $rapport->getRempCode(),
				"bilan" => $rapport->getRapBilan(),
				"firstProduit" => $rapport->getMedDepotLegal1(),
				"secondProduit" => $rapport->getMedDepotLegal2(),
				"doc" => $rapport->getDoc(),
				"echantillons" => $echantillons
			);

			//inclusion de la page d'affichage
			require "View/Visite/FormulaireVisite.inc.php";
		}
		break;

	default:
		$title = "Rapport de visite";
		if($_SESSION['user']->getRole() == 0){
		    // On affiche tout les rapport
			$rapports = RapportVisiteManager::getLstRapport();

		} else if ($_SESSION['user']->getRole() == 1) {
		    // Si la personne est un chef d'equipe, on affiche tous les rapports de son équipe
			$equipe = EquipeManager::getEquipe($_SESSION['user']->getNum());
			$rapports = EquipeManager::getLstRapportEquipe($equipe);
		} else {
		    // Sinon si c'est un simple employé, on affiche seulement ses rapports
			$rapports = UtilisateurManager::getLstRapportByUtilisateurId($_SESSION['user']);
		}
  		require "View/Visite/visite.inc.php";
  		break;
}

fonctions::entete($title);
?>


