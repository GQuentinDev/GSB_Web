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
	if ($_REQUEST['MED_TYPE'] == 'M')
	{
		?>

		<h2>Information sur le médicament</h2>
		<?php
	}
	elseif ($_REQUEST['MED_TYPE'] == 'E')
	{
		?>

		<h2>Informations sur l'échantillon</h2>
		<?php
	}
	?>

</div>
