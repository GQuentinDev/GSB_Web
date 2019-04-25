<div class="col-12">
	<h1>Compte rendu n°<?php echo $rapport['RAP_NUM']; ?></h1>

	<div class="mb-3">
		<?php
		$base_url = "index.php?uc=compteRendu&ac=";
		$end_url = "&RAP_NUM=".$rapport['RAP_NUM']."&REDIRECT=".$_REQUEST['REDIRECT']."&RAP_DATE1=".$_REQUEST['RAP_DATE1']."&RAP_DATE2=".$_REQUEST['RAP_DATE2']."&PRA_NUM=".$_REQUEST['PRA_NUM'];
		if ($_REQUEST['REDIRECT'] == "P")
		{
			?>

			<a href="<?php echo $base_url.'recherche'.$end_url; ?>">Retour à la liste des comptes rendus</a>

			<?php
		}
		elseif ($_REQUEST['REDIRECT'] == "R")
		{
			?>

			<a href="<?php echo $base_url.'consulterRegion'; ?>">Retour</a>

			<?php
		}
		?>

	</div>

</div>

<!-- COL 1 -->
<div class="col-12">
	<div class="row">

		<!-- Date de la saisie -->
		<div class="col-lg-6 col-12">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="titre">Date de saisie</label>
						<div class="form-control"><?php echo $rapport['RAP_DATE']; ?></div>
					</div>
				</div>

				<!-- Date de la visite -->
				<div class="col-6">
					<div class="form-group">
						<label class="titre">Date de la visite</label>
						<div class="form-control"><?php echo $rapport['RAP_DATEVISITE']; ?></div>
					</div>
				</div>


				<!-- Praticien -->
				<div class="col-6">
					<div class="form-group">
						<label class="titre">Praticien</label>
						<a href="<?php echo $base_url.'praticien&praticien='.$rapport['PRA_NUM'].'&PRA_TYPE=P'.$end_url; ?>">
							<div class="form-control"><?php echo $rapport['PRA_NOM']; ?></div>
						</a>
					</div>
				</div>

				<?php
				if (isset($rapport['PRA_NUM_REMPLACANT']) && !empty($rapport['PRA_NUM_REMPLACANT']))
				{
					?>

					<!-- Remplacant -->
					<div class="col-6">
						<div class="form-group">
							<label class="titre">Remplaçant</label>
							<a href="<?php echo $base_url.'praticien&praticien='.$rapport['PRA_NUM'].'&PRA_TYPE=R'.$end_url; ?>">
								<div class="form-control"><?php echo $rapport['PRA_NOM_REMPLACANT']; ?></div>
							</a>
						</div>
					</div>
					<?php
				}
				else
				{
					?>

					<div class="col-6"></div>

					<?php
				}
				?>

				<!-- Motif -->
				<div class="col-6">
					<div class="form-group">
						<label class="titre">Motif</label>
						<div class="form-control">
							<?php
							if ($rapport['MOT_CODE'] == "AUT")
								echo $rapport['MOT_AUTRE']; 
							else
								echo $rapport['MOT_LIB'];
							?>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- COL 1 END -->

		<!-- COL 2 -->
		<div class="col-lg-6 col-12">
			<h3>Eléments présentés</h3>
			<div class="row">

				<!-- Produit 1 -->
				<div class="col-6">
					<div class="form-group">
						<label class="titre">Produit 1</label>
						<a href="<?php echo $base_url.'medicament&medicament='.$rapport['MED_PRESENTE1']."&MED_TYPE=M".$end_url; ?>">
							<div class="form-control"><?php echo $rapport['MED_PRESENTE1']; ?></div>
						</a>
					</div>
				</div>

				<?php
				if (!empty($rapport['MED_PRESENTE2']))
				{
					?>

					<!-- Produit 2 -->
					<div class="col-6">
						<div class="form-group">
							<label class="titre">Produit 2</label>
							<a href="<?php echo $base_url.'medicament&medicament='.$rapport['MED_PRESENTE2']."&MED_TYPE=M".$end_url; ?>">
								<div class="form-control"><?php echo $rapport['MED_PRESENTE2']; ?></div>
							</a>
						</div>
					</div>

					<?php
				}
				?>

			</div>

			<h3>Echantillons</h3>
			<div class="form-group">
				<div class="row">

					<?php
					if (!empty($lesEchantillons))
					{
						$i = 0;
						foreach ($lesEchantillons as $echantillon)
						{
							?>

							<!-- Produit -->
							<div class="col-9">
								<div class="form-group">
									<?php
									if ($i == 0)
										echo "<label>Produit</label>";
									?>

									<a href="<?php echo $base_url.'medicament&medicament='.$echantillon['MED_DEPOTLEGAL']."&MED_TYPE=E".$end_url; ?>">
										<div class="form-control"><?php echo $echantillon['MED_DEPOTLEGAL']; ?></div>
									</a>
								</div>
							</div>

							<!-- Quantité -->
							<div class="col-3">
								<div class="form-group">
									<?php
									if ($i == 0)
										echo "<label>Quantité</label>";
									?>

									<div class="form-control"><?php echo $echantillon['OFF_QTE']; ?></div>
								</div>
							</div>

							<?php
							$i++;
						}
					}
					else
					{
						$message = "Il n'y a aucun échantillon";
						include ("vues/v_info.php");
					}
					?>

				</div>
			</div>

		</div>

		<div class="col-12">
			<div class="form-group">
				<label class="titre">Bilan</label>
				<div class="form-control xlarg"><?php echo $rapport['RAP_BILAN']; ?></div>
			</div>
		</div>

	</div>
</div>