<div class="col-12">
	<h1>Praticien</h1>
</div>

<div class="col-lg-4 col-sm-6 col-12 mb-3">
	<form name="selectionPraticien" method="post" action="index.php?uc=consultations&ac=praticien">
		<div class="form-group">
			<label>Rechercher</label>
			<select name="praticien" class="form-control">
				<option value="">Choisissez un praticien</option>
				<?php
				foreach ($lesPraticiens as $unPraticien) {
					?>

					<option value="<?php echo $unPraticien['PRA_NUM'] ?>"><?php echo $unPraticien['PRA_NOM']." - ".$unPraticien['PRA_PRENOM']; ?></option>
					<?php
				}
				?>

			</select>
		</div>
		<input class="btn btn-primary" type="submit" value="Valider" />
	</form>
</div>
