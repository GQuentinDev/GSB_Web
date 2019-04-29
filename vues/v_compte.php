<div class="col-12">
	<h1>Mon compte</h1>
</div>

<div class="col-md-6 col-12">
	<form name="" method="" action="">
		<h2>Mes coordonnées</h2>
		<div class="row">

			<!-- Nom -->
			<div class="col-md-6 col-12">
				<div class="form-group">
					<label class="titre">Nom</label>
					<input type="" name="" class="form-control" value="<?php echo $res['COL_NOM']; ?>" disabled />
				</div>
			</div>

			<!-- Prenom -->
			<div class="col-md-6 col-12">
				<div class="form-group">
					<label class="titre">Prénom</label>
					<input type="" name="" class="form-control" value="<?php echo $res['COL_PRENOM']; ?>" disabled />
				</div>
			</div>

			<!-- Adresse -->
			<div class="col-12">
				<div class="form-group">
					<label class="titre">Adresse</label>
					<input type="" name="" class="form-control" value="<?php echo $res['COL_ADRESSE']; ?>" disabled />
				</div>
			</div>

			<!-- Code Postal -->
			<div class="col-4">
				<div class="form-group">
					<label class="titre">Code postal</label>
					<input type="" name="" class="form-control" value="<?php echo $res['COL_CP']; ?>" disabled />
				</div>
			</div>

			<!-- Ville -->
			<div class="col-8">
				<div class="form-group">
					<label class="titre">Ville</label>
					<input type="" name="" class="form-control" value="<?php echo $res['COL_VILLE']; ?>" disabled />
				</div>
			</div>

			<!-- Modifier -->
			<div class="col-12">
				<input type="button" value="Modifier" class="btn btn-info" onclick=";" />
				<input type="button" value="Annuler" class="btn" onclick="redirect('compte','monCompte', '');" style="display: none;" />
				<input type="button" value="Valider" class="btn btn-primary" onclick="redirect('compte','update', '');" style="display: none;" />
			</div>

		</div>
	</form>

	<form name="" method="" action="">
		<h2 class="mt-3">Modifier le mot de passe</h2>
		<div class="row">

			<div class="col-12">
				<p>
					<b>Informations</b><br>
					Le mot de passe doit contenir :<br>
					- Au moins 8 caractères<br>
					- Au moins une majuscule<br>
					- Au moins un caractère spéciale
				</p>
			</div>

			<div class="col-md-8 col-12">
				<div class="row">

					<!-- Ancien mot de passe -->
					<div class="col-12">
						<div class="form-group">
							<label class="titre">Ancien mot de passe</label>
							<input type="" name="" class="form-control" value="<?php echo $res['COL_NOM']; ?>" />
						</div>
					</div>

					<!-- Nouveau mot de passe -->
					<div class="col-12">
						<div class="form-group">
							<label class="titre">Nouveau mot de passe</label>
							<input type="" name="" class="form-control" value="<?php echo $res['COL_NOM']; ?>" />
						</div>
					</div>

					<!-- Nouveau mot de passe (confirmation) -->
					<div class="col-12">
						<div class="form-group">
							<label class="titre">Nouveau mot de passe <i>(confirmation)</i></label>
							<input type="" name="" class="form-control" value="<?php echo $res['COL_PRENOM']; ?>" />
						</div>
					</div>

				</div>
			</div>

			<!-- Modifier -->
			<div class="col-12">
				<input type="button" value="Modifier" class="btn btn-primary" onclick=";" />
			</div>

		</div>
	</form>
</div>

<div class="col-md-6 col-12">
	<h2>Information</h2>
	<div class="row">

		<!-- Secteur -->
		<div class="col-md-6 col-12">
			<div class="form-group">
				<label class="titre">Secteur</label>
				<div class="form-control"><?php echo null; ?></div>
			</div>
		</div>

		<!-- Région -->
		<div class="col-md-6 col-12">
			<div class="form-group">
				<label class="titre">Région</label>
				<div class="form-control"><?php echo null; ?></div>
			</div>
		</div>

	</div>
</div>