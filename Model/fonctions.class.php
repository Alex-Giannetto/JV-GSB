<?php
/**
 * Classe contenant plusieurs fonction de base
 * @author Alexandre Giannetto
 * @package default
 */

class fonctions
{
	/**
	 * Permet d'afficher l'entête complété avec le nom en paramètre
	 * @param $name
	 */
	public static function entete($name){
		?>
		<div class="head margin-top-8">
			<table>
				<tr>
					<td><h1><?= $name ?></h1></td>
				</tr>
			</table>
		</div>
		<?php
	}

	/**
	 * Liste des motifs disponible pour une visite
	 * @return array
	 */
	public static function getLstMotif(){
		return array(
			'PRD' => 'Périodicité',
			'ACT' => 'Actualisation',
			'REL' => 'Relance',
			'SOL' => 'Sollicitation praticien',
			'AUT' => 'Autre'
		);
	}

	/**
	 * Permet d'afficher les messages passé en paramètre
	 * la variable message est un tableau.
	 * => La premiere variable de se tableau est soit un 0 soit un 1.
	 *      -> 0 signifie que c'est un echec et donc qu'il faudra afficher un message rouge
	 *      -> 1 signifie que c'est un success et donc qu'il faudra afficher un message vert
	 * => La deuxieme variable est le message à affiché
	 * @param $message
	 */
	public static function message($message){
		?>
		<div class="container ">
			<div class="alert alert-<?php if($message[0] == 0){ echo 'danger'; } else { echo 'success';} ?> text-center float-bottom">
				<?= $message[1] ?>
			</div>
		</div>
		<?php
	}
}