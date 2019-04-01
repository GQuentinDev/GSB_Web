<div class="col-lg-4 mb-12 col-12">
	<h3>Connexion</h3>

	<form method="POST" action="index.php?uc=compte&ac=validerConnexion">

			<div class="form-group">
				<label for="login">Login :</label>
				<input type="text" class="form-control" name="login" value="<?php echo $login ?>">
			</div>

			<div class="form-group">
				<label for="mdp">Mot de passe :</label>
				<input type="password" class="form-control" name="mdp">
			</div>

		<button type="submit" value="Valider" name="valider" class="btn btn-primary">Valider</button>

	</form>
</div>
