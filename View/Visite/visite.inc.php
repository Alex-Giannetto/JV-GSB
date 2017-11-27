<?php
/**
 * Created by PhpStorm.
 * User: Alexg78bis
 * Date: 22/11/2017
 * Time: 08:29
 */
?>
<div class="container firstContainer">
	<div class="row">
		<div class=" col-lg-2"></div>
		<div class=" col-lg-8 bloc">
			<div class="text-center margin-bottom-2">
				<a href="index.php?uc=visite&action=ajouter"><input type="button" class="btn btn-primary" value="Ajouter rapport"></a>
			</div>
			<table class="table table-hover table-striped">
				<thead>
					<th>#</th>
					<th>Visiteur</th>
					<th>Practicien</th>
					<th>Date</th>
					<th></th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					<?php foreach ($rapports as $rapport ) { ?>
						<tr>
							<td><?php echo $rapport->getRapNum(); ?></td>
							<td><?php echo $rapport->getVisiteurMatricule(); ?></td>
							<td><?php echo $rapport->getPraCode(); ?></td>
							<td><?php echo $rapport->getRapDate(); ?></td>
							<td><a class="text-danger" href="index.php?uc=visite&action=delete&id=<?php echo $rapport->getRapNum();  ?>">✖</a></td>
							<td><a class="text-dark" href="index.php?uc=visite&action=modify&id=<?php echo $rapport->getRapNum();  ?>">✎</a></td>
							<td><a href="index.php?uc=visite&action=view&id=<?php echo $rapport->getRapNum();  ?>">❯</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
