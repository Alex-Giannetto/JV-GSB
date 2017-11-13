<?php
entete("Ajouter une visite");
?>


<div class="container firstContainer">
	<div class="row">
		<div class=" col-lg-3"></div>
		<div class=" col-lg-6 bloc">
			<form method='post' action='index.php?uc=Albums&action=ajouter'>
				<div class="row">
					<div class="col-md-6 margin-bottom-2">
						<input class="form-control" type="text" name="num" required placeholder="Numéro…" />
					</div>
					<div class="col-md-6 margin-bottom-2">
						<input class="form-control" type="date" name="date" required placeholder="Date…" />
					</div>
					<div class="col-md-6 margin-bottom-2">
						<select name="medecin"  class='custom-select w-100' required>
							<option value="" disabled selected hidden>Médecin…</option>
							<?php foreach ($medecins as $medecin): ?>
								<option value="<?php echo $medecin->getPraCode(); ?>"><?php echo $medecin->getPraNom()." - ".$medecin->getPraPrenom() ; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-6 margin-bottom-2">
						<select name="motif" id='motif' class='custom-select w-100' required>
							<option value="" disabled selected hidden>Motif…</option>
							<option value="PRD">Périodicité</option>
							<option value="ACT">Actualisation</option>
							<option value="REL">Relance</option>
							<option value="SOL">Sollicitation praticien</option>
							<option value="AUT">Autre</option>
						</select>
					</div>
					<div class="col-md-6 margin-bottom-2">
						<select name="remplacant"  class='custom-select w-100' required>
							<option value="" disabled selected hidden>Remplaçant…</option>
							<?php foreach ($medecins as $medecin): ?>
								<option value="<?php echo $medecin->getPraCode(); ?>"><?php echo $medecin->getPraNom()." - ".$medecin->getPraPrenom() ; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-6 margin-bottom-2">
						<input type="text" id='autre' name='autre' class='form-control displayFalse' placeholder='Autre motif…'>
					</div>
					<div class="col-md-12 margin-bottom-2">
						<textarea  style='grid-column: 1/3' name="bilan" class='form-control' placeholder='Bilan…'></textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<h2>Élément présenté</h2>
					</div>
					<div class="col-md-6 margin-bottom-2">
						<select name="firstProduit"  class='custom-select w-100' required>
							<option value="" disabled selected hidden>Produit n°1…</option>
						</select>
					</div>
					<div class="col-md-6 margin-bottom-2">
						<select name="secondeProduit"  class='custom-select w-100' required>
							<option value="" disabled selected hidden>Produit n°2…</option>
						</select>
					</div>
				</div>


<!--				À rendre propre !!!!!!!!!!!         -->
				<div class="wrapper">
					<center style='grid-column: 1/3'>
						<table>
							<td><input type="checkbox" value="1" id='doc' name='doc'></td>
							<td><label for='doc'>Documentation</label></td>
						</table>
					</center>
				</div>

				<h2>Échantillons</h2>
				<div class="wrapper" id="echantillon">


					<div class="input_fields_wrap" >
						<button class="add_field_button btn btn-outline-primary">+</button>

						<select name="pdt1" style="width: 100%" class="custom-select">
							<option value="" disabled selected hidden>Produit…</option>
						</select>

						<input type="number" class="form-control text-center" name="qte1" placeholder="Qte">
					</div>

				</div>

				<div class="form-group text-center ">
					<br> <!-- À ameliorer  -->
					<input type="submit" class='btn btn-primary' name='ajouter' value='Ajouter'>
				</div>

				<input type="hidden" id="echantillonNbr" name="echantillonNbr" value="1">
			</form>

		</div>
	</div>
</div>



<script>


    $(window).scroll(function() {

        var scroll = $(window).scrollTop();

        if (scroll >= 150) {
            $(".navbar").addClass("shadow");
        } else {
            $(".navbar").removeClass("shadow");
        }
    });


    $('#motif').change(function(e){
        e.preventDefault();
        if( $('#motif').val() == 'AUT'){
	        $('#autre').addClass('displayTrue').removeClass('displayFalse');
        }else{
            $('#autre').addClass('displayFalse').removeClass('displayTrue');
        }
    });



    $(document).ready(function() {
        var wrapper         = $("#echantillon"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
	        x++;
	        $(wrapper).append('<div class="input_fields_wrap"> <a href="#" class="remove_field"><button class="add_field_button btn btn-outline-primary">-</button></a> <select name="pdt1" style="width: 100%" class="custom-select"> <option value="" disabled selected hidden>Produit…</option> </select> <input type="number" class="form-control" name="qte'+ x +'" placeholder="Qte"></div>');
            document.getElementById("echantillonNbr").value = x;

        });

        $(wrapper).on("click",".remove_field", function(e){
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>