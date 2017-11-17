<div class="container firstContainer">
	<div class="row">
		<div class=" col-lg-3"></div>
		<div class=" col-lg-6 bloc">
			<form method='post' action="index.php?uc=visite&action=<?php echo $_GET['action']; ?>">
				<div class="row">
					<div class="col-md-6 margin-bottom-2">
						<input class="form-control" type="text" <?php if(!$modification){ echo "readonly";} ?> name="num" <?php if(isset($data['num'])){ echo 'value="'.$data['num'].'"'; } ?> cla placeholder="Numéro…" />
					</div>
					<div class="col-md-6 margin-bottom-2">
						<input class="form-control" type="date" <?php if(!$modification){ echo "readonly";} ?>  name="date" <?php if(isset($data['date'])){ echo 'value="'.$data['date'].'"'; } ?> required placeholder="Date…" />
					</div>
					<div class="col-md-6 margin-bottom-2">
						<select name="medecin"  class='custom-select w-100' required <?php if(!$modification){ echo "disabled";} ?> >
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
						<select name="motif" id='motif' class='custom-select w-100' required <?php if(!$modification){ echo "disabled";} ?>>
							<?php if(isset($data['medecin'])){ ?>
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
						<select name="remplacant"  class='custom-select w-100' required <?php if(!$modification){ echo "disabled";} ?>>
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
						<textarea name="bilan" class='form-control' placeholder='Bilan…' <?php if(!$modification){ echo "disabled";} ?>><?php if(isset($data['bilan'])){ echo $data['bilan']; } ?></textarea>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<h2>Élément présenté</h2>
					</div>
					<div class="col-md-6 margin-bottom-2">
						<select name="firstProduit"  class='custom-select w-100' required <?php if(!$modification){ echo "disabled";} ?>>
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
						<select name="secondProduit"  class='custom-select w-100' required <?php if(!$modification){ echo "disabled";} ?>>
							<?php if(isset($data['medecin'])){ ?>
								<option SELECTED value="<?php echo $data['secondProduit'] ?>"><?php echo ProduitManager::getProduitById($data['secondProduit'])->getLibelle();?></option>
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
							<?php if(isset($data['echantillons'][0])){?>
								<option value="<?php echo $data['echantillons'][0]['medDepotLegal'];?>"selected><?php echo ProduitManager::getProduitById($data['echantillons'][0]['medDepotLegal'])->getLibelle();?></option>
							<?php } else { ?>
								<option value="" disabled selected hidden>Produit…</option>
							<?php }
							foreach ($produits as $produit){ ?>
								<option value="<?php echo $produit->getMedDepotLegal(); ?>"><?php echo $produit->getLibelle() ; ?></option>
							<?php } ?>
						</select>
						<input type="number" class="form-control text-center" name="qte1" placeholder="Qte" <?php if(isset($data['echantillons'][0]['quantite'])) { echo "value='".(int)$data['echantillons'][0]['quantite']."'"; } ?>>
					</div>
					<?php
					if(isset($data['echantillons'])) {
						for ($i = 1; $i <= count($data['echantillons'])-1; $i++) {
							?>
							<div class="input_fields_wrap" >
								<a href="#" class="remove_field"><button class="add_field_button btn btn-outline-primary">-</button></a>
								<select name="pdt<?php echo $i + 1 ?>" style="width: 100%" class="custom-select" disabled>
									<option value="<?php echo $data['echantillons'][$i]['medDepotLegal'];?>"selected><?php echo ProduitManager::getProduitById($data['echantillons'][$i]['medDepotLegal'])->getLibelle();?></option>
									<?php foreach ($produits as $produit){ ?>
										<option value="<?php echo $produit->getMedDepotLegal(); ?>"><?php echo $produit->getLibelle() ; ?></option>
									<?php } ?>
								</select>
								<input type="number" class="form-control text-center" name="qte<?php echo $i + 1 ?>" placeholder="Qte" <?php if(isset($data['echantillons'][$i]['quantite'])) { echo "value='".(int)$data['echantillons'][$i]['quantite']."'"; } ?>>
							</div>
							<?php
						}
					}
					?>
				</div>
				<div class="form-group text-center ">
					<br> <!-- À ameliorer  -->
					<input type="submit" class='btn btn-primary' name='ajouter' value='Ajouter'>
				</div>
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
        var wrapper    = $("#echantillon"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
//        var x          = <?php //if(isset($data['echantillons'])){echo 10 - (count($data['echantillons'])-1);} else { echo 2; }?>//;
	    var x = <?php if(isset($data['echantillons']) && !empty($data['echantillons'])){ echo count($data['echantillons']) + 1;} else { echo 2;} ?>;

        $(add_button).click(function(e){
            e.preventDefault();
            if(x <= 10) {
                $(wrapper).append('<div class="input_fields_wrap">' +
                        '<a href="#" class="remove_field">'+
                            '<button class="add_field_button btn btn-outline-primary">-</button>'+
                        '</a>'+
                        '<select name="pdt'+ x +'" style="width: 100%" class="custom-select">'+
                            '<option value="" disabled selected hidden>Produit '+ x +'…</option>'+
                        '<?php foreach ($produits as $produit){ ?>'+
	                        '<option value="<?php echo $produit->getMedDepotLegal() ?>"><?php echo $produit->getLibelle() ?></option>'+
                        '<?php } ?>'+
                        '</select>'+
                        '<input type="number" class="form-control" name="qte' + x + '" placeholder="Qte">'+
                    '</div>');
                x++;
            }
        });
        $(wrapper).on("click",".remove_field", function(e){
            e.preventDefault(); $(this).parent('div').remove();
            x--;
        })
    });
</script>


