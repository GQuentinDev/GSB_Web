<div class="col-12">
	<h1>Les comptes rendus de ma région</h1>
</div>

<!-- Pas encore consultés -->
<div class="col-lg-6 col-sm-6 col-12 p-3">
	<?php
	if (empty($nouveauxRapportsRegion))
	{
		$message = "Il n'y a aucun nouveaux comptes rendus";
		include ("vues/v_info.php");
	}
	else
	{
		?>

		<h2>Nouveaux</h2>

		<table class="table table-striped table-hover">
			<tr>
				<th>Numéro</th>
				<th>Date du rapport</th>
				<th>Date de la visite</th>
				<th>Praticien</th>
			</tr>
			<?php
			foreach ($nouveauxRapportsRegion as $unNouveauRapportRegionVisite)
			{
				$rapportURL = "index.php?uc=compteRendu&ac=detailRapport&RAP_NUM=".$unNouveauRapportRegionVisite['RAP_NUM']."&REDIRECT=R&RAP_DATE1=&RAP_DATE2=&PRA_NUM=";
				?>

				<tr>
					<td>
						<a href="<?php echo $rapportURL; ?>">
							<div>
								<?php echo $unNouveauRapportRegionVisite['RAP_NUM']; ?>
							</div>
						</a>
					</td>
					<td>
						<a href="<?php echo $rapportURL; ?>">
							<div>
								<?php echo $unNouveauRapportRegionVisite['RAP_DATE']; ?>
							</div>
						</a>
					</td>
					<td>
						<a href="<?php echo $rapportURL; ?>">
							<div>
								<?php echo $unNouveauRapportRegionVisite['RAP_DATEVISITE']; ?>
							</div>
						</a>
					</td>
					<td>
						<a href="<?php echo $rapportURL; ?>">
							<div>
								<?php echo $unNouveauRapportRegionVisite['PRA_NUM'].' - '.$unNouveauRapportRegionVisite['PRA_NOM']; ?>
							</div>
						</a>
					</td>
				</tr>
				<?php 
			}
			?>

		</table>
		<?php 
	}
	?>

</div>

<!-- Critères de recherche -->
<div class="col-lg-6 col-sm-6 col-12 p-3">
	<div class="background p-2">
		<h2>Rechercher</h2>

		<form name="rechercheRapport" method="post" action="index.php?uc=compteRendu&ac=rechercheRegion">
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