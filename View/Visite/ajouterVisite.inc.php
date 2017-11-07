<?php
entete("Ajouter une visite");
?>

<div class="container ">
	<div class="row" style='margin-top: -5vw; z-index: 999'>
		<div class="col-md-3"></div>
		<div class="col-md-6 bloc">
			<form method='post' action='index.php?uc=Albums&action=ajouter'>
				<div class="wrapper">
					<input class="form-control" type="text" name="num" required placeholder="Numéro…" />
					<input class="form-control" type="date" name="date" required placeholder="Date…" />
					
					<select name="medecin"  class='custom-select w-100' required>
						<option value="" disabled selected hidden>Médecin…</option>
					
					</select>
					
					<select name="motif" id='motif' class='custom-select w-100' required>
						<option value="" disabled selected hidden>Motif…</option>
						<option value="PRD">Périodicité</option>
						<option value="ACT">Actualisation</option>
						<option value="REL">Relance</option>
						<option value="SOL">Sollicitation praticien</option>
						<option value="AUT">Autre</option>
					</select>
					
					
					<input type="text" id='autre' name='autre' class='form-control displayFalse' placeholder='Autre motif…'>
					
					<select name="remplacant"  class='custom-select w-100' required>
						<option value="" disabled selected hidden>Remplaçant…</option>
					</select>
					
					<textarea  style='grid-column: 1/3' name="bilan" class='form-control'></textarea>
					
				</div>
				<div class="form-group text-center ">
					<br> <!-- À ameliorer  -->
					<input type="submit" class='btn btn-primary' name='ajouter' value='Ajouter'>
				</div>
			</form>
		</div>
	</div>
</div>



<!-- À ameliorer  -->
<style>

	.wrapper{
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-gap: 1em;
	}
	.displayTrue{
		display: inherit;
	}
	.displayFalse{
		display : none;
	}

</style>


<script>
    $('#motif').change(function(e){
        e.preventDefault();
        if( $('#motif').val() == 'AUT'){
	        $('#autre').addClass('displayTrue').removeClass('displayFalse');
        }else{
            $('#autre').addClass('displayFalse').removeClass('displayTrue');
        }
    });
</script>