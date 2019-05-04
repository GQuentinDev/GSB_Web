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
				- Reprise de saisie d'un compte rendu non définitif<br>
				- Suppression d'un compte rendu non définitif
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
			<h4>Astuces</h4>
			<div class="row">

				<div class="col-lg-4 col-12">
					<p>
						Vous avez possibilité d'avoir plus de détails sur les éléments d'un rapport en cliquant dessus.<br>
						<i>Nota Bene:</i> Seul les champs suivants disposent de cette fonction : Praticien, Remplaçant, Medicament et Echantillon.
					</p>
				</div>

				<div class="col-lg-4 col-12">
					<p>
						Pour supprimer un échantillon d'un rapport non définitif, il suffit de séléctionner la valeur "Choississez ...".<br>
						Idem pour les médicaments présentés.
					</p>
				</div>

				<div class="col-lg-4 col-12">
					<p>
						Pour supprimer un praticien d'une recherche, il suffit de séléctionner la valeur "Choississez ...".
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

<div class="col-12 jumbotron">
	<h2><a href="index.php?uc=compte&ac=monCompte">Mon Compte</a></h2>
	<div class="row">

		<div class="col-lg-4 col-12">
			<h3>Mes coordonnées</h3>
			<p>
				- Visualisation et mise à jour de vos coordonnées
			</p>
		</div>

		<div class="col-lg-4 col-12">
			<h3>Modifier mon mot de passe</h3>
			<p>
				- Renouvlement de votre mot de passe
			</p>
		</div>

		<div class="col-lg-4 col-12">
			<h3>Information</h3>
			<p>
				- Informations supplémentaires sur votre compte
			</p>
		</div>

	</div>
</div>