<div class="col-12">
	<h1>Pharmacopée</h1>
</div>
		
<div class="col-lg-4 col-sm-6 col-12">
	<form name="selectionMedicament" method="post" action="index.php?uc=consultations&ac=pharmacopee">
		<div class="form-group">
			<label>Rechercher :</label>
			<select name="medicament" class="form-control">
				<option value="">Choisissez un médicament</option>
				<?php
				foreach ($lesMedicaments as $unMedicament) {
					?>

					<option value="<?php echo $unMedicament['MED_DEPOTLEGAL'] ?>"><?php echo $unMedicament['MED_NOMCOMMERCIAL'] ?></option>
					<?php
				}
				?>

			</select>
		</div>
		<input class="btn btn-primary" type="submit" value="Valider" />
	</form>
</div>

<?php
if (isset($res) && !empty($res))
{
	?>

	<div class="col-lg-8 col-12">
		<div class="row">

			<div class="col-lg-6 col-sm-6 col-12">
				<div class="form-group">
					<label class="titre">Depot Légal :</label>
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

	<?php
}
?>