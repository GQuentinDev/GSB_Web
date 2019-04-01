<div class="col-12">
	<h1>Compte rendu n°<?php echo $_REQUEST['RAP_NUM']; ?></h1>

	<div class="mb-3">
		<a href="index.php?uc=compteRendu&ac=detailRapport&RAP_NUM=<?php echo $_REQUEST['RAP_NUM']; ?>&RAP_DATE1=<?php echo $_REQUEST['RAP_DATE1']; ?>&RAP_DATE2=<?php echo $_REQUEST['RAP_DATE2']; ?>&PRA_NUM=<?php echo $_REQUEST['PRA_NUM']; ?>">Retour</a>
	</div>

	<h2>Information sur le médicament</h2>
</div>

<div class="col-12">
	<div class="row">

		<div class="col-12">
			<div class="row">

				<div class="col-lg-6 col-sm-6 col-12">
					<div class="form-group">
						<label class="titre">Dépot Légal :</label>
						<div class="form-control large"><?php echo $res['MED_DEPOTLEGAL']; ?></div>
					</div>

					<div class="form-group">
						<label class="titre">Nom commercial :</label>
						<div class="form-control large"><?php echo $res['MED_NOMCOMMERCIAL']; ?></div>
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-12">
					<div class="form-group">
						<label class="titre">Famille :</label>
						<div class="form-control large"><?php echo $res['FAM_LIBELLE']; ?></div>
					</div>

					<div class="form-group">
						<label class="titre">Prix échantillon :</label>
						<div class="form-control large"><?php echo $res['MED_PRIXECHANTILLON']; ?></div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12">
			<div class="form-group">
				<label class="titre">Composition :</label>
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
									<?php echo $composant['CST_QTE'].' g'; ?>
								</td>
							</tr>
						</table>
						<?php
					}
					?>
					
				</div>
			</div>

			<div class="form-group">
				<label class="titre">Effets :</label>
				<div class="form-control xlarg"><?php echo $res['MED_EFFETS']; ?></div>
			</div>

			<div class="form-group">
				<label class="titre">Contre indications :</label>
				<div class="form-control xlarg"><?php echo $res['MED_CONTREINDIC']; ?></div>
			</div>
		</div>
	</div>
</div>