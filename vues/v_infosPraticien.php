<div class="col-12">
	<div class="row">

		<div class="col-lg-3 col-md-6 col-12">
			<div class="form-group">
				<label class="titre">Nom</label>
				<div class="form-control"><?php echo $res["PRA_NOM"]; ?></div>
			</div>
		</div>

		<div class="col-lg-3 col-md-6 col-12">
			<div class="form-group">
				<label class="titre">Prénom</label>
				<div class="form-control"><?php echo $res["PRA_PRENOM"]; ?></div>
			</div>
		</div>

		<div class="col-lg-3 col-md-6 col-12">
			<div class="form-group">
				<label class="titre">Coefficient de notoriété</label>
				<div class="form-control"><?php echo $res["PRA_COEFNOTORIETE"]; ?></div>
			</div>
		</div>

		<div class="col-lg-3 col-md-6 col-12">
			<div class="form-group">
				<label class="titre">Type</label>
				<div class="form-control"><?php echo $res["TYP_LIBELLE"]; ?></div>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-12">
			<div class="form-group">
				<label class="titre">Adresse</label>
				<div class="form-control"><?php echo $res["PRA_ADRESSE"]; ?></div>
			</div>
		</div>

		<div class="col-lg-3 col-md-3 col-12">
			<div class="form-group">
				<label class="titre">Code postal</label>
				<div class="form-control"><?php echo $res["PRA_CP"]; ?></div>
			</div>
		</div>

		<div class="col-lg-3 col-md-3 col-12">
			<div class="form-group">
				<label class="titre">Ville</label>
				<div class="form-control"><?php echo $res["PRA_VILLE"]; ?></div>
			</div>
		</div>

	</div>
</div>

<div class="col-12">
	<h2>Spécialités</h2>
	<div class="row">

		<?php
		if (!empty($lesSpecialites))
		{
			foreach ($lesSpecialites as $laSpecialite)
			{
				?>

				<div class="col-lg-6 col-md-6 col-12">
					<div class="form-group">
						<div class="form-control large"><?php echo $laSpecialite[0]; ?></div>
					</div>
				</div>

				<?php
			}
		}
		else
		{
			$message = "Aucune";
			include ("vues/v_info.php");
		}
		?>

	</div>
</div>