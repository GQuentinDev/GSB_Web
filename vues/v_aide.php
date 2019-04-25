<div class="col-12">
	<h1>Aide</h1>
</div>

<div class="col-12 jumbotron">
	<h2>Comptes rendus</h2>
	<div class="row">

		<div class="col-lg-4 col-12">
			<h3><a href="index.php?uc=compteRendu&ac=nouveau">Nouveau</a></h3>
			<p>
				- Saisie d'un nouveau compte rendu
			</p>
		</div>

		<div class="col-lg-4 col-12">
			<h3><a href="index.php?uc=compteRendu&ac=consulter">Consulter</a></h3>
			<p>
				- Historique des comptes rendus<br>
				- Reprise de saisie d'un compte rendu
			</p>
		</div>

		<?php
		if ($_SESSION['id'][4] == 2)
		{
			?>

			<div class="col-lg-4 col-12">
				<h3><a href="index.php?uc=compteRendu&ac=consulterRegion">Region</a></h3>
				<p>
					- Nouveaux comptes rendus de la région<br>
					- Historique des comptes rendu de la région
				</p>
			</div>

			<?php
		}
		?>

		<div class="col-12">
			<h4>Remarques</h4>
			<div class="row">

				<div class="col-lg-4 col-12">
					<p>
						Possibilité d'avoir plus de détails sur un rapport en cliquant sur le en question champ pris en compte :<br>
						- Praticien<br>
						- Remplaçant<br>
						- Medicament<br>
						- Echantillon
					</p>
				</div>

				<div class="col-lg-4 col-12">
					<p>
						Le coefficient de confiance du praticien n'est pas fonctionnel
					</p>
				</div>

			</div>
		</div>

	</div>
</div>

<div class="col-12 jumbotron">
	<h2>Consulter</h2>
	<div class="row">

		<div class="col-lg-4 col-12">
			<h3><a href="index.php?uc=consultations&ac=praticien">Praticiens</a></h3>
			<p>
				- Informations sur les praticiens
			</p>
		</div>

		<div class="col-lg-4 col-12">
			<h3><a href="index.php?uc=consultations&ac=pharmacopee">Pharmacopée</a></h3>
			<p>
				- Informations sur les médicaments
			</p>
		</div>

	</div>
</div>
