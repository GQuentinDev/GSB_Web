<div class="col-lg-8 col-12">
	<div class="row">

		<div class="col-lg-6 col-sm-6 col-12">
			<div class="form-group">
				<label class="titre">Depot Légal</label>
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
		<label class="titre">Contre-indications</label>
		<div class="form-control xlarg"><?php echo $res['MED_CONTREINDIC']; ?></div>
	</div>

	<h2>Réactions avec d'autres médicaments</h2>
	<div class="row">

		<?php
		if (/*!empty($)*/false)
		{
			/*foreach ($ as $)
			{
				?>

				<div class="col-lg-3 col-sm-3 col-12">
					<div class="form-group">
						<div class="form-control large"><?php echo $; ?></div>
					</div>
				</div>

				<?php
			}*/
		}
		else
		{
			$message = "Aucune";
			include ("vues/v_info.php");
		}
		?>

	</div>

</div>

