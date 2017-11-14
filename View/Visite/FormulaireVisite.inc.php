<div class="container firstContainer">
	<div class="row">
		<div class=" col-lg-3"></div>
		<div class=" col-lg-6 bloc">
			<form method='post' action="index.php?uc=visite&action=<?php echo $_GET['action']; ?>">
				<div class="row">
					<div class="col-md-6 margin-bottom-2">
						<input class="form-control" type="text" name="num" <?php if(isset($data['num'])){ echo 'value="'.$data['num'].'"'; } ?> required placeholder="Numéro…" />
					</div>
					<div class="col-md-6 margin-bottom-2">
						<input class="form-control" type="date" name="date" <?php if(isset($data['date'])){ echo 'value="'.$data['date'].'"'; } ?> required placeholder="Date…" />
					</div>
					<div class="col-md-6 margin-bottom-2">
						<select name="medecin"  class='custom-select w-100' required>
							<?php if(isset($data['medecin'])){ ?>
								<option SELECTED value="<?php echo $data['medecin'] ?>"><?php echo MedecinManager::getMedecinById($data['medecin'])->getPraNom()." - ".MedecinManager::getMedecinById($data['medecin'])->getPraPrenom(); ?></option>
							<?php } else {?>
								<option value="" disabled selected hidden>Médecin…</option>
							<?php }
							foreach ($medecins as $medecin){ ?>
								<option value="<?php echo $medecin->getPraCode(); ?>"><?php echo $medecin->getPraNom()." - ".$medecin->getPraPrenom() ; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-6 margin-bottom-2">
						<select name="motif" id='motif' class='custom-select w-100' required>
							<?php if(isset($data['medecin'])){ ?>
								<option SELECTED value="<?php echo $data['motif'] ?>"><?php echo $data['motif'] ?></option>
							<?php } else {?>
								<option value="" disabled selected hidden>Motif…</option>
							<?php } ?>
							<option value="PRD">Périodicité</option>
							<option value="ACT">Actualisation</option>
							<option value="REL">Relance</option>
							<option value="SOL">Sollicitation praticien</option>
							<option value="AUT">Autre</option>
						</select>
					</div>
					<div class="col-md-6 margin-bottom-2">
						<select name="remplacant"  class='custom-select w-100' required>
							<?php if(isset($data['medecin'])){ ?>
								<option SELECTED value="<?php echo $data['remplacant'] ?>"><?php echo MedecinManager::getMedecinById($data['remplacant'])->getPraNom()." - ".MedecinManager::getMedecinById($data['remplacant'])->getPraPrenom(); ?></option>
							<?php } else {?>
								<option value="" hidden disabled selected >Remplaçant…</option>
							<?php } ?>
							<option value="-1" >Pas de remplaçant</option>
							<?php foreach ($medecins as $medecin){?>
								<option value="<?php echo $medecin->getPraCode(); ?>"><?php echo $medecin->getPraNom()." - ".$medecin->getPraPrenom() ; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-6 margin-bottom-2">
						<input type="text" id='autre' name='autre' class='form-control displayFalse' <?php if(isset($data['autre'])){ echo 'value="'.$data['autre'].'"'; } ?> placeholder='Autre motif…'>
					</div>
					<div class="col-md-12 margin-bottom-2">
						<textarea name="bilan" class='form-control' placeholder='Bilan…'><?php if(isset($data['bilan'])){ echo $data['bilan']; } ?></textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<h2>Élément présenté</h2>
					</div>
					<div class="col-md-6 margin-bottom-2">
						<select name="firstProduit"  class='custom-select w-100' required>
							<?php if(isset($data['medecin'])){ ?>
								<option SELECTED value="<?php echo $data['firstProduit'] ?>"><?php echo $data['firstProduit'] ?></option>
							<?php } else {?>
								<option value="" disabled selected hidden>Produit n°1…</option>
							<?php }
							foreach ($produits as $produit){ ?>
								<option value="<?php echo $produit->getMedDepotLegal(); ?>"><?php echo $produit->getLibelle() ; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-6 margin-bottom-2">
						<select name="secondProduit"  class='custom-select w-100' required>
							<?php if(isset($data['medecin'])){ ?>
								<option SELECTED value="<?php echo $data['secondProduit'] ?>"><?php echo $data['secondProduit'] ?></option>
							<?php } else {?>
								<option value="" disabled selected hidden>Produit n°2…</option>
							<?php } ?>
							<option value="-1">Aucun</option>
							<?php foreach ($produits as $produit){ ?>
								<option value="<?php echo $produit->getMedDepotLegal(); ?>"><?php echo $produit->getLibelle() ; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-12">
						<center>
							<table>
								<td>
									<input type="checkbox" value="1" id='doc' <?php if(isset($data['doc'])) { echo "checked"; } ?> name='doc'>

								</td>
								<td><label for='doc'>Documentation</label></td>
							</table>
						</center>
					</div>
				</div>


				<h2>Échantillons</h2>
				<div class="wrapper" id="echantillon">
					<div class="input_fields_wrap" >
						<button class="add_field_button btn btn-light" style="background-color: #3665b6; color: white">+</button><!--				À rendre propre !!!!!!!!!!!         -->
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
        var x = 2;

        $(add_button).click(function(e){
            e.preventDefault();
	        if(x <= 10) {
                $(wrapper).append('<div class="input_fields_wrap"> <a href="#" class="remove_field"><button class="add_field_button btn btn-outline-primary">-</button></a> <select name="pdt1" style="width: 100%" class="custom-select"> <option value="" disabled selected hidden>Produit…</option> </select> <input type="number" class="form-control" name="qte' + x + '" placeholder="Qte"></div>');
                document.getElementById("echantillonNbr").value = x;
                x++;
            }
        });

        $(wrapper).on("click",".remove_field", function(e){
            e.preventDefault(); $(this).parent('div').remove();
            x--;
            document.getElementById("echantillonNbr").value = x;
        })
    });
</script>