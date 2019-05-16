<div class="col-12">
	<h1>Mon compte</h1>
</div>

<div class="col-12">
	<div class="row">

		<div class="col-md-6 col-12">
			<form name="coordonnees" method="post" action="index.php?uc=compte&ac=updateCoordonnees">
				<h2>Mes coordonnées</h2>
				<div class="row">

					<!-- Nom -->
					<div class="col-lg-6 col-md-6 col-12">
						<div class="form-group">
							<label class="titre">Nom</label>
							<input id="modif1" type="text" name="NOM" class="form-control" value="<?php echo $res['COL_NOM']; ?>" disabled />
						</div>
					</div>

					<!-- Prenom -->
					<div class="col-lg-6 col-md-6 col-12">
						<div class="form-group">
							<label class="titre">Prénom</label>
							<input id="modif2" type="text" name="PRENOM" class="form-control" value="<?php echo $res['COL_PRENOM']; ?>" disabled />
						</div>
					</div>

					<!-- Adresse -->
					<div class="col-12">
						<div class="form-group">
							<label class="titre">Adresse</label>
							<input id="modif3" type="text" name="ADRESSE" class="form-control" value="<?php echo $res['COL_ADRESSE']; ?>" disabled />
						</div>
					</div>

					<!-- Code Postal -->
					<div class="col-4">
						<div class="form-group">
							<label class="titre">Code postal</label>
							<input id="modif4" type="text" maxlength="5" name="CP" class="form-control" value="<?php echo $res['COL_CP']; ?>" disabled />
						</div>
					</div>

					<!-- Ville -->
					<div class="col-8">
						<div class="form-group">
							<label class="titre">Ville</label>
							<input id="modif5" type="text" name="VILLE" class="form-control" value="<?php echo $res['COL_VILLE']; ?>" disabled />
						</div>
					</div>

					<!-- Modifier -->
					<div class="col-12 mb-3">
						<input id="modif_info1" type="button" value="Modifier" class="btn btn-info showHide" onclick="modifier();" />
						<input id="modif_info2" type="button" value="Annuler" class="btn hideShow" onclick="redirect('compte','monCompte', '');" style="display: none;" />
						<input id="modif_info3" type="submit" value="Valider" class="btn btn-primary hideShow" style="display: none;" />
					</div>

				</div>
			</form>
		</div>

		<div class="col-md-6 col-12">
			<form name="password" method="post" action="index.php?uc=compte&ac=updatePassword">
				<h2>Modifier mon mot de passe</h2>
				<div class="row">

					<div class="col-lg-5 col-md-5 col-12">
						<p>
							<b>Informations</b><br>
							Le mot de passe doit contenir :<br>
							- Au moins 8 caractères<br>
							- Au moins une majuscule<br>
							- Au moins une minuscule<br>
							- Au moins 1 chiffre<br>
							- Au moins un caractère spéciale<br>
							<br>
							Le nouveau mot de passe ne doit pas contenir l'ancien mot de passe.
						</p>
					</div>

					<div class="col-lg-7 col-md-7 col-12">

							<!-- Ancien mot de passe -->
							<div class="form-group">
								<label class="titre">Ancien mot de passe</label>
								<input type="password" name="OLD_PASS" value="<?php echo $password['OLD_PASS']; ?>" class="form-control" />
							</div>

							<!-- Nouveau mot de passe -->
							<div class="form-group">
								<label class="titre">Nouveau mot de passe</label>
								<input type="password" name="NEW_PASS" value="<?php echo $password['NEW_PASS']; ?>" class="form-control" />
							</div>

							<!-- Nouveau mot de passe (confirmation) -->
							<div class="form-group">
								<label class="titre">Nouveau mot de passe <i>(confirmation)</i></label>
								<input type="password" name="NEW_PASS_CONFIRM" value="<?php echo $password['NEW_PASS_CONFIRM']; ?>" class="form-control" />
							</div>

							<!-- Modifier -->
							<input type="submit" value="Modifier" class="btn btn-primary mb-3" />
					</div>

				</div>
			</form>
		</div>

	</div>
</div>

<div class="col-12">
	<h2>Information</h2>
	<div class="row">
		
		<div class="col-lg-6 col-md-6 col-12">
			<h3></h3>
			<div class="row">

				<!-- Région -->
				<div class="col-lg-6 col-md-6 col-12">
					<div class="form-group">
						<label class="titre">Région</label>
						<div class="form-control"><?php echo $info['REGION']; ?></div>
					</div>
				</div>

				<?php
				if (!empty($info['SECTEUR']))
				{
					?>

					<!-- Secteur -->
					<div class="col-lg-6 col-md-6 col-12">
						<div class="form-group">
							<label class="titre">Responsable du secteur</label>
							<div class="form-control"><?php echo $info['SECTEUR']; ?></div>
						</div>
					</div>

					<?php
				}

				if (!empty($info['DATE_EMBAUCHE']))
				{
					?>

					<!-- Date d'embauche -->
					<div class="col-lg-6 col-md-6 col-12">
						<div class="form-group">
							<label class="titre">Date d'embauche</label>
							<div class="form-control"><?php echo $info['DATE_EMBAUCHE']; ?></div>
						</div>
					</div>

					<?php
				}
				?>

			</div>
		</div>

	</div>
</div>