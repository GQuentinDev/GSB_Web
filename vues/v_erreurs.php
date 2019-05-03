<div class="col-12">
	<div class="alert alert-danger alert-dismissible fade show">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<div class="row">
			<?php
			foreach($msgErreurs as $erreur)
			{
				echo '<div class="col-lg-6 col-md-6 col-12">'.$erreur.'</div>';
			}
			?>

		</div>
	</div>
</div>
