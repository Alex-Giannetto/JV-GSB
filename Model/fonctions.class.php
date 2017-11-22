<?php

/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 15/11/2017
 * Time: 00:09
 */
class fonctions
{
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

	public static function getLstMotif(){
		return array(
			'PRD' => 'Périodicité',
			'ACT' => 'Actualisation',
			'REL' => 'Relance',
			'SOL' => 'Sollicitation praticien',
			'AUT' => 'Autre'
		);
	}



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