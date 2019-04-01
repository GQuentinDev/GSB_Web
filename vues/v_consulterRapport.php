<div class="col-12">
	<h1>Vos comptes rendus</h1>
</div>

<!-- Critères de recherche -->
<div class="col-lg-6 col-sm-6 col-12 p-3">
	<div class="background p-2">
		<h2>Rechercher</h2>

		<form name="rechercheRapport" method="post" action="index.php?uc=compteRendu&ac=recherche">
			<div class="row">
				<div class="col-12">
					Période :
				</div>

				<div class="col-6">
					<div class="form-group">
						<label>du</label>
						<input type="date" size="19" name="RAP_DATE1" class="form-control"
						<?php
						if (isset($_REQUEST['RAP_DATE1']) && !empty($_REQUEST['RAP_DATE1']))
						{
							?>

							value="<?php echo $_REQUEST['RAP_DATE1']; ?>"
							<?php
						}
						?>

						/>
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label>au</label>
						<input type="date" size="19" name="RAP_DATE2" class="form-control"
						<?php
						if (isset($_REQUEST['RAP_DATE2']) && !empty($_REQUEST['RAP_DATE2']))
						{
							?>

							value="<?php echo $_REQUEST['RAP_DATE2']; ?>"
							<?php
						}
						?>

						/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Praticien :</label>
				<select name="PRA_NUM" class="form-control" >
					<option value="">Choisissez un praticien (<i>facultatif</i>)</option>
					<?php
					foreach ($lesPraticiens as $unPraticien) {
						?>

						<option value="<?php echo $unPraticien['PRA_NUM']; ?>" <?php 
						if (isset($_REQUEST['PRA_NUM']) && $unPraticien['PRA_NUM'] == $_REQUEST['PRA_NUM']) { ?> selected <?php } ?> > <?php echo $unPraticien['PRA_NOM'] ?> </option>
						<?php
					}
					?>

				</select>
			</div>
			
			<input type="submit" class="btn btn-primary" value="Valider" />
		</form>
	</div>
</div>

<!-- Saisies non définitives -->
<div class="col-lg-6 col-sm-6 col-12 p-3">
	<h2>Saisies non définitives</h2>

	<table class="table table-striped table-hover">
		<tr>
			<th>Numéro</th>
			<th>Date du rapport</th>
			<th>Date de la visite</th>
			<th>Praticien</th>
		</tr>
		<?php
		if (empty($mesRapports))
		{
			$message = "Vous n'avez aucun rapport à finir de saisir";
			include ("vues/v_info.php");
		}
		foreach ($mesRapports as $unRapport)
		{
			$rapportURL = "index.php?uc=compteRendu&ac=modifier&RAP_NUM=".$unRapport['RAP_NUM'];
			?>

			<tr>
				<td>
					<a href="<?php echo $rapportURL; ?>">
						<div>
							<?php echo $unRapport['RAP_NUM']; ?>
						</div>
					</a>
				</td>
				<td>
					<a href="<?php echo $rapportURL; ?>">
						<div>
							<?php echo $unRapport['RAP_DATE']; ?>
						</div>
					</a>
				</td>
				<td>
					<a href="<?php echo $rapportURL; ?>">
						<div>
							<?php echo $unRapport['RAP_DATEVISITE']; ?>
						</div>
					</a>
				</td>
				<td>
					<a href="<?php echo $rapportURL; ?>">
						<div>
							<?php echo $unRapport['PRA_NUM'].' - '.$unRapport['PRA_NOM']; ?>
						</div>
					</a>
				</td>
			</tr>
			<?php 
		} 
		?>

	</table>
</div>
