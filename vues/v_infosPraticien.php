<div class="col-12">
	<h1>Compte rendu n°<?php echo $_REQUEST['RAP_NUM']; ?></h1>

	<div class="mb-3">
		<?php
		$base_url = "index.php?uc=compteRendu&ac=";
		$end_url = "&RAP_NUM=".$_REQUEST['RAP_NUM']."&REDIRECT=".$_REQUEST['REDIRECT']."&RAP_DATE1=".$_REQUEST['RAP_DATE1']."&RAP_DATE2=".$_REQUEST['RAP_DATE2']."&PRA_NUM=".$_REQUEST['PRA_NUM'];
		?>

		<a href="<?php echo $base_url.'detailRapport'.$end_url; ?>">Retour</a>
	</div>

	<?php
	if ($_REQUEST['PRA_TYPE'] == 'P')
	{
		?>

		<h2>Informations sur le praticien</h2>
		<?php
	}
	elseif ($_REQUEST['PRA_TYPE'] == 'R')
	{
		?>

		<h2>Informations sur le remplaçant</h2>
		<?php
	}
	?>

</div>

<div class="col-12">
	<div class="row">

		<div class="col-lg-3 col-sm-6 col-12">
			<div class="form-group">
				<label class="titre">Nom</label>
				<div class="form-control"><?php echo $res["PRA_NOM"]; ?></div>
			</div>
		</div>

		<div class="col-lg-3 col-sm-6 col-12">
			<div class="form-group">
				<label class="titre">Prenom</label>
				<div class="form-control"><?php echo $res["PRA_PRENOM"]; ?></div>
			</div>
		</div>

		<div class="col-lg-3 col-sm-6 col-12">
			<div class="form-group">
				<label class="titre">Coefficient de notoriété</label>
				<div class="form-control"><?php echo $res["PRA_COEFNOTORIETE"]; ?></div>
			</div>
		</div>

		<div class="col-lg-3 col-sm-6 col-12">
			<div class="form-group">
				<label class="titre">Type</label>
				<div class="form-control"><?php echo $res["TYP_LIBELLE"]; ?></div>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-12">
			<div class="form-group">
				<label class="titre">Adresse</label>
				<div class="form-control"><?php echo $res["PRA_ADRESSE"]; ?></div>
			</div>
		</div>

		<div class="col-lg-3 col-sm-3 col-12">
			<div class="form-group">
				<label class="titre">Code postal</label>
				<div class="form-control"><?php echo $res["PRA_CP"]; ?></div>
			</div>
		</div>

		<div class="col-lg-3 col-sm-3 col-12">
			<div class="form-group">
				<label class="titre">Ville</label>
				<div class="form-control"><?php echo $res["PRA_VILLE"]; ?></div>
			</div>
		</div>

	</div>
</div>