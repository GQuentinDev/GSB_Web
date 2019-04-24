<div class="col-12 p-3"></div>

<div class="col-12">
	<h1>Les comptes rendus de ma région</h1>

	<div class="row">

		<!-- Pas encore consultés -->
		<div class="col-lg-6 col-sm-6 col-12 p-3">
			<h2>Nouveaux</h2>

			<table class="table table-striped table-hover">
				<tr>
					<th>Numéro</th>
					<th>Date du rapport</th>
					<th>Date de la visite</th>
					<th>Praticien</th>
				</tr>
				<?php
				if (empty($nouveauxRapportsRegion))
				{
					$message = "Il n'y a aucun nouveaux comptes rendus";
					include ("vues/v_info.php");
				}
				foreach ($nouveauxRapportsRegion as $unNouveauRapportRegionVisite)
				{
					//$rapportURL = "index.php?uc=compteRendu&ac=detailRapport&RAP_NUM=".$unNouveauRapportRegionVisite['RAP_NUM'];
					$rapportURL = "index.php?uc=compteRendu&ac=detailRapport&RAP_NUM=".$unNouveauRapportRegionVisite['RAP_NUM']."&RAP_DATE1=&RAP_DATE2=&PRA_NUM=";
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
		</div>

		<!-- Déjà consultés -->
		<div class="col-lg-6 col-sm-6 col-12 p-3">
			<h2>Historique</h2>

			<table class="table table-striped table-hover">
				<tr>
					<th>Numéro</th>
					<th>Date du rapport</th>
					<th>Date de la visite</th>
					<th>Praticien</th>
				</tr>
				<?php
				if (empty($rapportsRegion))
				{
					$message = "L'historique des comptes rendus est vide";
					include ("vues/v_info.php");
				}
				foreach ($rapportsRegion as $unRapportRegion)
				{
					//$rapportURL = "index.php?uc=compteRendu&ac=detailRapport&RAP_NUM=".$unRapportRegion['RAP_NUM'];
					$rapportURL = "index.php?uc=compteRendu&ac=detailRapport&RAP_NUM=".$unRapportRegion['RAP_NUM']."&RAP_DATE1=&RAP_DATE2=&PRA_NUM=";
					?>

					<tr>
						<td>
							<a href="<?php echo $rapportURL; ?>">
								<div>
									<?php echo $unRapportRegion['RAP_NUM']; ?>
								</div>
							</a>
						</td>
						<td>
							<a href="<?php echo $rapportURL; ?>">
								<div>
									<?php echo $unRapportRegion['RAP_DATE']; ?>
								</div>
							</a>
						</td>
						<td>
							<a href="<?php echo $rapportURL; ?>">
								<div>
									<?php echo $unRapportRegion['RAP_DATEVISITE']; ?>
								</div>
							</a>
						</td>
						<td>
							<a href="<?php echo $rapportURL; ?>">
								<div>
									<?php echo $unRapportRegion['PRA_NUM'].' - '.$unRapportRegion['PRA_NOM']; ?>
								</div>
							</a>
						</td>
					</tr>
					<?php 
				} 
				?>

			</table>
		</div>

	</div>
</div>