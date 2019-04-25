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

<div class="col-12">
	<div class="row">

		<div class="col-12">
			<div class="row">

				<div class="col-lg-6 col-sm-6 col-12">
					<div class="form-group">
						<label class="titre">Dépot Légal</label>
						<div class="form-control large"><?php echo $res['MED_DEPOTLEGAL']; ?></div>
					</div>

					<div class="form-group">
						<label class="titre">Nom commercial</label>
						<div class="form-control large"><?php echo $res['MED_NOMCOMMERCIAL']; ?></div>
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-12">
					<div class="form-group">
						<label class="titre">Famille</label>
						<div class="form-control large"><?php echo $res['FAM_LIBELLE']; ?></div>
					</div>

					<div class="form-group">
						<label class="titre">Prix échantillon</label>
						<div class="form-control large"><?php echo $res['MED_PRIXECHANTILLON']; ?></div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12">
			<div class="form-group">
				<label class="titre">Composition</label>
				<div class="form-control xlarg">
					<?php
					foreach ($lesComposants as $composant)
					{
						?>

						<table style="width: 100%;">
							<tr>
								<td>
									<?php echo $composant['CMP_LIBELLE']; ?>
								</td>
								<td style="text-align: right;">
									<?php 
									if (!empty($composant['CST_QTE']))
										echo $composant['CST_QTE'].' g';
									?>

								</td>
							</tr>
						</table>
						<?php
					}
					?>
					
				</div>
			</div>

			<div class="form-group">
				<label class="titre">Effets</label>
				<div class="form-control xlarg"><?php echo $res['MED_EFFETS']; ?></div>
			</div>

			<div class="form-group">
				<label class="titre">Contre indications</label>
				<div class="form-control xlarg"><?php echo $res['MED_CONTREINDIC']; ?></div>
			</div>
		</div>
	</div>
</div>