<div class="col-12">
	<h1>Pharmacopée</h1>
</div>
		
<div class="col-lg-4 col-sm-6 col-12 mb-3">
	<form name="selectionMedicament" method="post" action="index.php?uc=consultations&ac=pharmacopee">
		<div class="form-group">
			<label>Rechercher</label>
			<select name="medicament" class="form-control">
				<option value="">Choisissez un médicament</option>
				<?php
				foreach ($lesMedicaments as $unMedicament) {
					?>

					<option value="<?php echo $unMedicament['MED_DEPOTLEGAL'] ?>"><?php echo $unMedicament['MED_NOMCOMMERCIAL'] ?></option>
					<?php
				}
				?>

			</select>
		</div>
		<input class="btn btn-primary" type="submit" value="Valider" />
	</form>
</div>
