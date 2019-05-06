<div class="col-12">
	<h1>Compte rendu n°<?php echo $res['RAP_NUM']; ?></h1>
</div>

<form id="saisieRapport" name="saisieRapport" method="post" action="index.php?uc=compteRendu&ac=<?php echo $case;?>" onsubmit="return verifForm();">
	<div class="row p-3">

	<!-- COL 1 -->
	<div class="col-lg-6 col-12">
		<div class="row">

			<!-- Date de la saisie -->
			<div class="col-6">
				<div class="form-group">
					<label class="titre">Date de saisie</label>
					<div class="form-control"><?php echo date("Y-m-d"); ?></div>
				</div>
			</div>

			<!-- Date de la visite -->
			<div class="col-6">
				<div class="form-group">
					<label>Date de la visite</label>
					<input type="date" name="RAP_DATEVISITE" class="form-control" value="<?php echo $res['RAP_DATEVISITE']; ?>" />
				</div>
			</div>

			<!-- Praticien -->
			<div class="col-lg-6 col-12">
				<div class="form-group">
					<label>Praticien</label>
					<select name="PRA_NUM" class="form-control" >
						<option value="">Choisissez un praticien</option>
						<?php
						foreach ($lesPraticiens as $unPraticien)
						{
							?>

							<option value="<?php echo $unPraticien['PRA_NUM']; ?>" <?php
							if ($unPraticien['PRA_NUM'] == $res['PRA_NUM'])
							{
								?>

								selected
								<?php
							}
							?> > <?php echo $unPraticien['PRA_NOM']." - ".$unPraticien['PRA_PRENOM']; ?> </option>
							<?php
						}
						?>

					</select>
				</div>
			</div>

			<!-- Coefficient de confiance -->
			<!--<div class="col-lg-6 col-12">
				<div class="form-group">
					<label>Coefficient de confiance</label>
					<input type="number" min="0" size="6" name="PRA_COEFF" class="form-control" value="<?php echo $res['PRA_COEFF']; ?>" />
				</div>
			</div>-->

			<!-- Remplacant -->
			<div class="col-12">
				<div class="form-group">
					<div class="custom-control custom-checkbox mb-3">
						<input type="checkbox" class="custom-control-input" onClick="selectionne(true,this.checked,'PRA_REMPLACANT');" id="customCheck" <?php 
						if ($res['PRA_REMPLACANT'] == 1)
						{
							?>

							checked
							<?php
						}
						?>

						/>
						<label class="custom-control-label" for="customCheck">Remplacant</label>
					</div>

					<select name="PRA_REMPLACANT" class="form-control" <?php 
						if ($res['PRA_REMPLACANT'] == 0)
						{
							?>

							disabled
							<?php
						}
						?> >
						<option value="">Choisissez un remplacant</option>
						<?php
						foreach ($lesPraticiens as $unPraticien)
						{
							?>

							<option value="<?php echo $unPraticien['PRA_NUM']; ?>" <?php 
							if ($unPraticien['PRA_NUM'] == $res['PRA_NUM_REMPLACANT'])
							{
								?>

								selected
								<?php
							}
							?> > <?php echo $unPraticien['PRA_NOM']." - ".$unPraticien['PRA_PRENOM']; ?> </option>
							<?php
						}
						?>

					</select>
				</div>
			</div>

		</div>

		<!-- Motif -->
		<label>Motif</label>
		<div class="row">

			<!-- Liste -->
			<div class="col-5">
				<div class="form-group">
					<select name="RAP_MOTIF" class="form-control" onClick="selectionne('AUT',this.value,'RAP_MOTIFAUTRE');">
						<option value="">Choisissez un motif</option>
						<?php
						foreach ($lesMotifs as $unMotif)
						{
							?>

							<option value="<?php echo $unMotif['MOT_CODE']; ?>" <?php
							if ($unMotif['MOT_CODE'] == $res['MOT_CODE'])
							{
								?>

								selected
								<?php
							}
							?> > <?php echo $unMotif['MOT_LIB'] ?> </option>
							<?php
						}
						?>

					</select>
				</div>
			</div>

			<!-- Autre -->
			<div class="col-7">
				<div class="form-group">
					<input type="text" name="RAP_MOTIFAUTRE" class="form-control" <?php
						if ($res['MOT_CODE'] != "AUT")
						{
							?>

							disabled
							<?php
						}
						?> value="<?php echo $res['MOT_AUTRE']; ?>" />
				</div>
			</div>

		</div>

	</div>
	<!-- COL 1 END -->

	<!-- COL 2 -->
	<div class="col-lg-6 col-12">
		<h3>Eléments présentés</h3>
		<div class="row">

			<!-- Produit 1 -->
			<div class="col-6">
				<div class="form-group">
					<label>Produit 1</label>
					<select name="PROD1" class="form-control">
						<option value="">Choisissez un produit</option>
						<?php
						foreach ($lesMedicaments as $unMedicament)
						{
							?>

							<option value="<?php echo $unMedicament['MED_DEPOTLEGAL']; ?>" <?php
							if ($unMedicament['MED_DEPOTLEGAL'] == $res['MED_PRESENTE1'])
							{
								?>

								selected
								<?php
							}
							?> > <?php echo $unMedicament['MED_NOMCOMMERCIAL']; ?> </option>
							<?php
						}
						?>

					</select>
				</div>
			</div>

			<!-- Produit 2 -->
			<div class="col-6">
				<div class="form-group">
					<label>Produit 2</label>
					<select name="PROD2" class="form-control">
						<option value="">Choisissez un produit</option>
						<?php
						foreach ($lesMedicaments as $unMedicament)
						{
							?>

							<option value="<?php echo $unMedicament['MED_DEPOTLEGAL']; ?>" <?php
							if ($unMedicament['MED_DEPOTLEGAL'] == $res['MED_PRESENTE2'])
							{
								?>

								selected
								<?php
							}
							?> > <?php echo $unMedicament['MED_NOMCOMMERCIAL']; ?> </option>
							<?php
						}
						?>

					</select>
				</div>
			</div>

		</div>


		<h3>Echantillons</h3>
		<div class="form-group">
			<div class="row">

				<!-- Produit 1 -->
				<div class="col-9">
					<div class="form-group">
						<label>Produit</label>
						<select name="PRA_ECH1" class="form-control">
							<option value="">Choisissez un produit</option>
							<?php
							foreach ($lesMedicaments as $unMedicament) {
								?>

								<option value="<?php echo $unMedicament['MED_DEPOTLEGAL']; ?>" <?php
								if ($unMedicament['MED_DEPOTLEGAL'] == $res['ECHANTILLONS']['ECH1'])
								{
									?>

									selected
									<?php
								}
								?> > <?php echo $unMedicament['MED_NOMCOMMERCIAL']; ?></option>
								<?php
							}
							?>

						</select>
					</div>
				</div>

				<!-- Quantité 1 -->
				<div class="col-3">
					<div class="form-group">
						<label>Quantité</label>
						<input type="number" min="1" max="10" name="PRA_QTE1" size="2" class="form-control" value="<?php echo $res['ECHANTILLONS']['QTE1']; ?>" />
					</div>
				</div>

				<!-- Produit 2 -->
				<div class="col-9">
					<div class="form-group">
						<select name="PRA_ECH2" class="form-control">
							<option value="">Choisissez un produit</option>
							<?php
							foreach ($lesMedicaments as $unMedicament) {
								?>

								<option value="<?php echo $unMedicament['MED_DEPOTLEGAL']; ?>" <?php
								if ($unMedicament['MED_DEPOTLEGAL'] == $res['ECHANTILLONS']['ECH2'])
								{
									?>

									selected
									<?php
								}
								?> > <?php echo $unMedicament['MED_NOMCOMMERCIAL']; ?></option>
								<?php
							}
							?>

						</select>
					</div>
				</div>

				<!-- Quantité 2 -->
				<div class="col-3">
					<div class="form-group">
						<input type="number" min="1" max="10" name="PRA_QTE2" size="2" class="form-control" value="<?php echo $res['ECHANTILLONS']['QTE2']; ?>" />
					</div>
				</div>

				<!-- Produit 3 -->
				<div class="col-9">
					<div class="form-group">
						<select name="PRA_ECH3" class="form-control">
							<option value="">Choisissez un produit</option>
							<?php
							foreach ($lesMedicaments as $unMedicament) {
								?>

								<option value="<?php echo $unMedicament['MED_DEPOTLEGAL']; ?>" <?php
								if ($unMedicament['MED_DEPOTLEGAL'] == $res['ECHANTILLONS']['ECH3'])
								{
									?>

									selected
									<?php
								}
								?> > <?php echo $unMedicament['MED_NOMCOMMERCIAL']; ?></option>
								<?php
							}
							?>

						</select>
					</div>
				</div>

				<!-- Quantité 3 -->
				<div class="col-3">
					<div class="form-group">
						<input type="number" min="1" max="10" name="PRA_QTE3" size="2" class="form-control" value="<?php echo $res['ECHANTILLONS']['QTE3']; ?>" />
					</div>
				</div>

			</div>

		</div>

	</div>
	<!-- COL 2 END -->

	<div class="col-12">

		<!-- Bilan -->
		<div class="form-group">
			<label>Bilan</label>
			<textarea rows="5" cols="50" name="RAP_BILAN" class="form-control" ><?php echo $res['RAP_BILAN']; ?></textarea>
		</div>

		<!-- Saisie definitive -->
		<div class="custom-control custom-checkbox mb-3">
			<input type="checkbox" class="custom-control-input" name="RAP_DEF" id="customCheck2" <?php 
			if ($res['RAP_DEF'] == 1)
			{
				?>

				checked
				<?php
			}  
			?>

			/>
			<label class="custom-control-label" for="customCheck2">Saisie definitive</label>
		</div>
		
		<!-- Enregistrer / Annuler -->
		<input type="button" value="Annuler" class="btn" onclick="redirect('compteRendu', '<?php if ($case == "update") echo  "consulter"; else echo  "nouveau"; ?>', '');" />
		<?php
		if ($case == "update")
		{
			?>

			<input type="button" value="Supprimer" class="btn btn-danger" onclick="if (confirmation('Voulez vous vraiment supprimer ce rapport ?')) redirect('compteRendu', 'supprimer', '&RAP_NUM=<?php echo $_SESSION['RAP_NUM_OLD']; ?>');" />

			<?php
		}
		?>

		<input type="submit" value="Enregistrer" class="btn btn-primary" />

	</div>
</div>

</form>
