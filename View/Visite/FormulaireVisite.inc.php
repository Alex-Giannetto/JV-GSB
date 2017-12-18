<div class="container firstContainer">
	<?php if(isset($message)){ ?>
		<div class="row">
			<div class=" col-lg-3"></div>
			<div class="alert-<?php if($message[0] == 0){ echo "dander";} else { echo "success";} ?> alert col-lg-6">
				<?php echo $message[1] ?>
			</div>
		</div>
	<?php } ?>
	<div class="row">
		<div class=" col-lg-3"></div>
		<div class=" col-lg-6 bloc">

            <!-- action="index.php?uc=visite&action=<?php // echo $_GET['action']; if(isset($_POST['id'])){ echo $_POST['id'];} ?>" -->
			<form method='post' >
				<fieldset <?php if(!$modification){ echo "disabled"; }?>>
					<div class="row">
						<div class="col-md-6 margin-bottom-2">
							<input class="form-control" type="text" name="num" <?php if(isset($data['num'])){ echo 'value="'.$data['num'].'"'; } ?> disabled placeholder="Numéro…" />
						</div>
						<div class="col-md-6 margin-bottom-2">
							<input class="form-control" type="date" name="date" <?php if(isset($data['date'])){ echo 'value="'.$data['date'].'"'; } ?> required placeholder="Date…" />
						</div>
						<div class="col-md-6 margin-bottom-2">
							<select name="medecin"  class='custom-select w-100' required >
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
								<?php if(isset($data['motif'])){ ?>
									<option SELECTED value="<?php echo $data['motif'] ?>"><?php echo fonctions::getLstMotif()[$data['motif']]; ?></option>
								<?php } else {?>
									<option value="" disabled selected hidden>Motif…</option>
								<?php }
								foreach (fonctions::getLstMotif() as $key => $value){ ?>
									<option value="<?php echo $key;?>"><?php echo $value;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-6 margin-bottom-2">
							<select name="remplacant"  class='custom-select w-100' required>
								<?php if(isset($data['medecin'])){ ?>
									<option SELECTED value="<?php echo $data['remplacant'] ?>">
										<?php
										if($data['remplacant'] != -1){
											echo MedecinManager::getMedecinById($data['remplacant'])->getPraNom()." - ".MedecinManager::getMedecinById($data['remplacant'])->getPraPrenom();
										} else {
											echo "Pas de remplacant";
										}
										?>
									</option>
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
									<option SELECTED value="<?php echo $data['firstProduit'] ?>"><?php echo ProduitManager::getProduitById($data['firstProduit'])->getLibelle();?></option>
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
									<option SELECTED value="<?php echo $data['secondProduit'] ?>">
										<?php
										if($data['secondProduit'] != -1) {
											echo ProduitManager::getProduitById($data['secondProduit'])->getLibelle();
										} else {
											echo "Aucun";
										}
										?>
									</option>
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

					<!--		Partie des échantillons			-->
					<div class="row" id="echantillon">
					 <!--Suivant si nous possedons le tableau $data,
					 soit nous afficherons toutes les donnée de ce tableau
					 soit nous afficherons qu'un seul champs-->

						<?php if(isset($data['echantillons'][0])){ ?>
							<div class="col-md-6 margin-bottom-2">
								<div style="display: inline-block; width: 15%">
									<button class="add_field_button btn">+</button>
								</div>
								<div style=" display: inline-block; width: 60%">
									<select name="pdt1" class="custom-select w-100" >
										<option value="<?php echo $data['echantillons'][0]->getMedDepotLegal() ;?>" selected ><?php echo ProduitManager::getProduitById($data['echantillons'][0]->getMedDepotLegal())->getLibelle() ; ?></option>
										<?php foreach ($produits as $produit){ ?>
											<option value="<?php echo $produit->getMedDepotLegal(); ?>"><?php echo $produit->getLibelle() ; ?></option>
										<?php } ?>
									</select>
								</div>
								<div style="display: inline-block; width: 20%">
									<input type="number" name="qte1" class="form-control" min="1" value="<?php echo $data['echantillons'][0]->getQuantite(); ?>" style="padding-right: 0;">
								</div>
							</div>

							<?php for($i = 1 ; $i < count($data['echantillons']); $i++){ ?>
								<div class="col-md-6 margin-bottom-2">
									<div style="display: inline-block; width: 15%">
										<button class="remove_field btn">-</button>
									</div>
									<div style=" display: inline-block; width: 60%">
										<select name="pdt<?php echo $i+1; ?>" class="custom-select w-100" >
											<option value="<?php echo $data['echantillons'][$i]->getMedDepotLegal() ;?>" selected ><?php echo ProduitManager::getProduitById($data['echantillons'][$i]->getMedDepotLegal())->getLibelle() ; ?></option>
											<?php foreach ($produits as $produit){ ?>
												<option value="<?php echo $produit->getMedDepotLegal(); ?>"><?php echo $produit->getLibelle() ; ?></option>
											<?php } ?>
										</select>
									</div>
									<div style="display: inline-block; width: 20%">
										<input type="number" name="qte<?php echo $i+1; ?>" class="form-control" min="1" value="<?php echo $data['echantillons'][$i]->getQuantite(); ?>" style="padding-right: 0;">
									</div>
								</div>
							<?php } ?>
							<input type="hidden" name="nbEchantillons" id="nbEchantillons" value="<?php echo count($data['echantillons']);?>">
						<?php } else { ?>
							<div class="col-md-6 margin-bottom-2">
								<div style="display: inline-block; width: 15%">
									<button class="add_field_button btn">+</button>
								</div>
								<div style=" display: inline-block; width: 60%">
									<select name="pdt1" class="custom-select">
										<option hidden selected disabled>Échantillons n°1</option>
										<?php foreach ($produits as $produit){ ?>
											<option value="<?php echo $produit->getMedDepotLegal(); ?>"><?php echo $produit->getLibelle() ; ?></option>
										<?php } ?>
									</select>
								</div>
								<div style="display: inline-block; width: 20%">
									<input type="number" name="qte1" class="form-control" min="1" value="1" style="padding-right: 0;">
								</div>
							</div>
							<input type="hidden" name="nbEchantillons" id="nbEchantillons" value="1">
						<?php } ?>
					</div>

					<br>
					<div class="form-group text-center ">
						<br>
						<?php if($modification){ ?>
							<input type="submit" class='btn btn-primary' name='submit' value="Valider">
						<?php } ?>
					</div>
				</fieldset>
			</form>

		</div>
	</div>
</div>


<script>


    $('#motif').change(function(e){
        e.preventDefault();
        if( $('#motif').val() == 'AUT'){
            $('#autre').addClass('displayTrue').removeClass('displayFalse');
        }else{
            $('#autre').addClass('displayFalse').removeClass('displayTrue');
        }
    });

    $(document).ready(function() {
        var wrapper    = $("#echantillon"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
//        var x          = <?php //if(isset($data['echantillons'])){echo 10 - (count($data['echantillons'])-1);} else { echo 2; }?>//;
	    var x = <?php if(isset($data['echantillons']) && !empty($data['echantillons'])){ echo count($data['echantillons']) + 1;} else { echo 2;} ?>;
		var c = x;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x <= 10) {
                $(wrapper).append('<div class="col-md-6 margin-bottom-2">' +
                        '<div style="display: inline-block; width: 15%">'+
                            '<button class="remove_field btn">-</button>'+
                        '</div>'+
                        '<div style=" display: inline-block; width: 64%">'+
	                        '<select name="pdt'+ c + '" class="custom-select w-100" >'+
                                '<option value="" disabled selected hidden>Échantillon n°'+ c +'</option>'+
                                '<?php foreach ($produits as $produit){ ?>'+
                                    '<option value="<?php echo $produit->getMedDepotLegal() ; ?>" ><?php echo $produit->getLibelle() ; ?></option>'+
	                            '<?php } ?>'+
                            '</select>'+
		                '</div>'+
		                '<div style="display: inline-block; width: 20%">'+
                            '<input type="number" name="qte'+ c +'" class="form-control" min="1" value="1" style="padding-right: 0;">'+
                        '</div>'+
	                '</div>');
                $("#nbEchantillons").val(c);
                x++;
                c++;
            }
        });
        $(wrapper).on("click",".remove_field", function(e){
            e.preventDefault(); $(this).parent('div').parent('div').remove();
            x--;
        })
    });
</script>