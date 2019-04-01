<div class="col-12">
	<h1>Compte rendu n°<?php echo $res['RAP_NUM']; ?></h1>

	<div class="mb-3">
		<a href="index.php?uc=compteRendu&ac=recherche&RAP_DATE1=<?php echo $_REQUEST['RAP_DATE1']; ?>&RAP_DATE2=<?php echo $_REQUEST['RAP_DATE2']; ?>&PRA_NUM=<?php echo $_REQUEST['PRA_NUM']; ?>">Retour à la liste des comptes rendus</a>
	</div>

	<h2>Détail</h2>
</div>

<div class="col-12">
	<div class="row">

		<div class="col-lg-6 col-12">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="titre">Date de saisie :</label>
						<div class="form-control"><?php echo $res['RAP_DATE']; ?></div>
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label class="titre">Date de la visite :</label>
						<div class="form-control"><?php echo $res['RAP_DATEVISITE']; ?></div>
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label class="titre">Motif :</label>
						<div class="form-control">
							<?php
							if ($res['MOT_CODE'] == "AUT")
								echo $res['MOT_AUTRE']; 
							else
								echo $res['MOT_LIB'];
							?>
						</div>
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label class="titre">Praticien :</label>
						<a href="index.php?uc=compteRendu&ac=praticien&praticien=<?php echo $res['PRA_NUM']; ?>&RAP_NUM=<?php echo $res['RAP_NUM']; ?>&RAP_DATE1=<?php echo $_REQUEST['RAP_DATE1']; ?>&RAP_DATE2=<?php echo $_REQUEST['RAP_DATE2']; ?>&PRA_NUM=<?php echo $_REQUEST['PRA_NUM']; ?>&PRA_TYPE=P">
							<div class="form-control"><?php echo $res['PRA_NOM']; ?></div>
						</a>
					</div>
				</div>

				<?php
				if (isset($res['PRA_NUM_REMPLACANT']) && !empty($res['PRA_NUM_REMPLACANT']))
				{
					?>

					<div class="col-6">
						<div class="form-group">
							<label class="titre">Remplaçant :</label>
							<a href="index.php?uc=compteRendu&ac=praticien&praticien=<?php echo $res['PRA_NUM_REMPLACANT']; ?>&RAP_NUM=<?php echo $res['RAP_NUM']; ?>&RAP_DATE1=<?php echo $_REQUEST['RAP_DATE1']; ?>&RAP_DATE2=<?php echo $_REQUEST['RAP_DATE2']; ?>&PRA_NUM=<?php echo $_REQUEST['PRA_NUM']; ?>&PRA_TYPE=R">
								<div class="form-control"><?php echo $res['PRA_NOM_REMPLACANT']; ?></div>
							</a>
						</div>
					</div>
					<?php
				}
				?>

			</div>
		</div>

		<div class="col-lg-6 col-12">

			<h3>Eléments présentés</h3>

			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="titre">Produit 1 :</label>
						<a href="index.php?uc=compteRendu&ac=mediacament&medicament=<?php echo $res['MED_PRESENTE1']; ?>&RAP_NUM=<?php echo $res['RAP_NUM']; ?>&RAP_DATE1=<?php echo $_REQUEST['RAP_DATE1']; ?>&RAP_DATE2=<?php echo $_REQUEST['RAP_DATE2']; ?>&PRA_NUM=<?php echo $_REQUEST['PRA_NUM']; ?>">
							<div class="form-control"><?php echo $res['MED_PRESENTE1']; ?></div>
						</a>
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label class="titre">Produit 2 :</label>
						<a href="index.php?uc=compteRendu&ac=mediacament&medicament=<?php echo $res['MED_PRESENTE2']; ?>&RAP_NUM=<?php echo $res['RAP_NUM']; ?>&RAP_DATE1=<?php echo $_REQUEST['RAP_DATE1']; ?>&RAP_DATE2=<?php echo $_REQUEST['RAP_DATE2']; ?>&PRA_NUM=<?php echo $_REQUEST['PRA_NUM']; ?>">
							<div class="form-control"><?php echo $res['MED_PRESENTE2']; ?></div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12">
			<div class="form-group">
				<label class="titre">Bilan :</label>
				<div class="form-control xlarg"><?php echo $res['RAP_BILAN']; ?></div>
			</div>
		</div>

	</div>
</div>