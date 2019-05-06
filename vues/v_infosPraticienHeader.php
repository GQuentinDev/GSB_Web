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
