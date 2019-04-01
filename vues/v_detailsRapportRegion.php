<div class="col-12">
	<h1>Compte rendu n°<?php echo $res['RAP_NUM']; ?></h1>

	<div class="row">

		<div class="col-12 mb-3">
			<a href="index.php?uc=compteRendu&ac=recherche&RAP_DATE1=<?php echo $_REQUEST['RAP_DATE1']; ?>&RAP_DATE2=<?php echo $_REQUEST['RAP_DATE2']; ?>&PRA_NUM=<?php echo $_REQUEST['PRA_NUM']; ?>">Retour à la liste des comptes rendus</a>
		</div>

		<div class="col-lg-6 col-12">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="titre">De :</label>
						<input type="text" name="" class="form-control" value="<?php echo $res['']; ?>" disabled="true" />
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label class="titre">Date :</label>
						<input type="text" name="" class="form-control" value="<?php echo $res['RAP_DATE']; ?>" disabled="true" />
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label class="titre">Date visite :</label>
						<input type="text" name="" class="form-control" value="<?php echo $res['RAP_DATEVISITE']; ?>" disabled="true" />
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label class="titre">Motif :</label>
						<input type="text" name="" class="form-control" value="<?php
						if ($res['MOT_CODE'] == "AUT")
							echo $res['MOT_AUTRE']; 
						else
							echo $res['MOT_LIB'];
						?>" disabled="true" />
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label class="titre">Praticien :</label>
						<a href="index.php?uc=compteRendu&ac=praticien&praticien=<?php echo $res['PRA_NUM']; ?>&RAP_NUM=<?php echo $res['RAP_NUM']; ?>&RAP_DATE1=<?php echo $_REQUEST['RAP_DATE1']; ?>&RAP_DATE2=<?php echo $_REQUEST['RAP_DATE2']; ?>&PRA_NUM=<?php echo $_REQUEST['PRA_NUM']; ?>">
							<input type="text" name="" class="form-control" value="<?php echo $res['PRA_NOM']; ?>" disabled="true" />
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
							<a href="index.php?uc=compteRendu&ac=praticien&praticien=<?php echo $res['PRA_NUM_REMPLACANT']; ?>&RAP_NUM=<?php echo $res['RAP_NUM']; ?>&RAP_DATE1=<?php echo $_REQUEST['RAP_DATE1']; ?>&RAP_DATE2=<?php echo $_REQUEST['RAP_DATE2']; ?>&PRA_NUM=<?php echo $_REQUEST['PRA_NUM']; ?>">
								<input type="text" name="" class="form-control" value="<?php echo $res['PRA_NOM_REMPLACANT']; ?>" disabled="true" />
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
							<input type="text" name="" class="form-control" value="<?php echo $res['MED_PRESENTE1']; ?>" disabled="true" />
						</a>
					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label class="titre">Produit 2 :</label>
						<a href="index.php?uc=compteRendu&ac=mediacament&medicament=<?php echo $res['MED_PRESENTE2']; ?>&RAP_NUM=<?php echo $res['RAP_NUM']; ?>&RAP_DATE1=<?php echo $_REQUEST['RAP_DATE1']; ?>&RAP_DATE2=<?php echo $_REQUEST['RAP_DATE2']; ?>&PRA_NUM=<?php echo $_REQUEST['PRA_NUM']; ?>">
							<input type="text" name="" class="form-control" value="<?php echo $res['MED_PRESENTE2']; ?>" disabled="true" />
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12">
			<div class="form-group">
				<label class="titre">Bilan :</label>
				<textarea rows="5" cols="50" name="" class="form-control" disabled="true" ><?php echo $res['RAP_BILAN']; ?></textarea>
			</div>
		</div>
	</div>
</div>