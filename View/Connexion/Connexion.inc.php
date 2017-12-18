<div class="container firstContainer">
	<div class="row">
		<div class=" col-lg-3"></div>
		<div class=" col-lg-6 bloc">
			<form method='post' action="index.php?uc=Administration&action=<?php echo $_GET['action']; ?>">
				<div class="form-group">
					<input type="mail" class="form-control" name="mail" placeholder="Adresse mail…" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Mot de passe…" required>
				</div>
				<div class="form-group text-center">
					<input type="submit" class="btn btn-primary" value="Connexion" name="connexion">
				</div>
			</form>
		</div>
	</div>
</div>

<?php if (isset($message)){fonctions::message($message);} ?>



