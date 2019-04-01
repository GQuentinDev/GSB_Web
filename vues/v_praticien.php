<div class="col-12">
	<h1>Praticien</h1>
</div>

<div class="col-lg-4 col-sm-6 col-12">
	<form name="selectionPraticien" method="post" action="index.php?uc=consultations&ac=praticien">
		<div class="form-group">
			<label>Nom :</label>
			<select name="praticien" class="form-control">
				<option value="">Choisissez un praticien</option>
				<?php
				foreach ($lesPraticiens as $unPraticien) {
					?>

					<option value="<?php echo $unPraticien['PRA_NUM'] ?>"><?php echo $unPraticien['PRA_NOM'] ?></option>
					<?php
				}
				?>

			</select>
		</div>
		<input class="btn btn-primary" type="submit" value="Valider" />
	</form>
</div>

<?php
if (isset($res) && !empty($res))
{
	?>

	<div class="col-12 mt-3">
		<div class="row">

			<div class="col-lg-3 col-sm-6 col-12">
				<div class="form-group">
					<label class="titre">Nom :</label>
					<div class="form-control"><?php echo $res["PRA_NOM"]; ?></div>
				</div>
			</div>

			<div class="col-lg-3 col-sm-6 col-12">
				<div class="form-group">
					<label class="titre">Prenom :</label>
					<div class="form-control"><?php echo $res["PRA_PRENOM"]; ?></div>
				</div>
			</div>

			<div class="col-lg-3 col-sm-6 col-12">
				<div class="form-group">
					<label class="titre">Coefficient de notoriété :</label>
					<div class="form-control"><?php echo $res["PRA_COEFNOTORIETE"]; ?></div>
				</div>
			</div>

			<div class="col-lg-3 col-sm-6 col-12">
				<div class="form-group">
					<label class="titre">Type :</label>
					<div class="form-control"><?php echo $res["TYP_LIBELLE"]; ?></div>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-12">
				<div class="form-group">
					<label class="titre">Adresse :</label>
					<div class="form-control"><?php echo $res["PRA_ADRESSE"]; ?></div>
				</div>
			</div>

			<div class="col-lg-3 col-sm-3 col-12">
				<div class="form-group">
					<label class="titre">Code postal :</label>
					<div class="form-control"><?php echo $res["PRA_CP"]; ?></div>
				</div>
			</div>

			<div class="col-lg-3 col-sm-3 col-12">
				<div class="form-group">
					<label class="titre">Ville :</label>
					<div class="form-control"><?php echo $res["PRA_VILLE"]; ?></div>
				</div>
			</div>
		</div>
	</div>

	<?php
}
?>