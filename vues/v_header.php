<!DOCTYPE html>
<html lang="fr">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Titre -->
	<title>GSB</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.png">

	<!-- CSS -->
	<!-- Custom CSS -->
	<link href="vendor/css/myCSS.css" rel="stylesheet">

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

</head>
<body>

	<header>

		<!-- Navigation -->
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-secondary" id="header">
			<div class="container">

				<div class="navbar-brand"><img src="images/logo.png" width="70"></div>

				<!-- Info utilisateur -->
				<div class="navbar-text">
					<?php
					if (isset($_SESSION['id']) && $_SESSION['id'] != "")
					{
						echo $_SESSION['id'][1].' '.$_SESSION['id'][2].' | '.$_SESSION['id'][3];	
					}
					?>

				</div>

				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

				<!-- Menu -->
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">

						<?php
						if (isset($_SESSION['id']) && !empty($_SESSION['id']))
						{
							// Role du collaborateur
							$ROLE = $_SESSION['id'][4];

							/**********************************************************
							* Les Roles :
							* 1 - Visiteur
							* 2 - Délégué
							* 3 - 
							**********************************************************/
							?>

							<li class="nav-item">
								<a class="nav-link" href="index.php">Aide</a>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCompteRendu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Comptes rendus</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownCompteRendu">
									<a class="dropdown-item" href="index.php?uc=compteRendu&ac=nouveau">Nouveau</a>
									<a class="dropdown-item" href="index.php?uc=compteRendu&ac=consulter">Consulter</a>
								</div>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownConsulter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consulter</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownConsulter">
									<a class="dropdown-item" href="index.php?uc=consultations&ac=praticien">Praticiens</a>
									<a class="dropdown-item" href="index.php?uc=consultations&ac=pharmacopee">Pharmacopée</a>
								</div>
							</li>

							<?php	
							if ($ROLE == 1)
							{
								?>

								
								<?php
							}
							else if ($ROLE == 2)
							{
								?>

								
								<?php
							}
							else if ($ROLE == 3)
							{
								?>


								<?php
							}
							?>

							<!--<li class="nav-item">
								<a class="nav-link" href="index.php?uc=compte&ac=monCompte">Mon compte</a>
							</li>-->

							<li class="nav-item">
								<a class="nav-link" href="index.php?uc=compte&ac=deconnexion">Déconnexion</a>
							</li>
							<?php
						}
						else
						{
							/*?>

							<li class="nav-item">
								<a class="nav-link" href="index.php?uc=compte&ac=connexion">Connexion</a>
							</li>
							<?php*/
						}
						?>

					</ul>
				</div>

			</div>
		</nav>
	</header>

	<!-- Page Content -->
	<div class="container p-3" id="Top">

		<div class="row">
