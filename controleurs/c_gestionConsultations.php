<?php
// Verification du paramètre controleur ac et du statu de l'utilisateur
if (isset($_REQUEST['ac']) && !empty($_REQUEST['ac']) && isset($_SESSION['id'][4]) && !empty(($_SESSION['id'][4])))
{
	$ac = $_REQUEST['ac'];
}
else
{
	header("Location:index.php");
}


if ($_SESSION['id'][4] == 1 || $_SESSION['id'][4] == 2)
{
	switch($ac)
	{
		// Infos sur un praticien
		case 'praticien' :
		{
			// Retourne la liste des praticiens
			$lesPraticiens = $pdo->getPraticiens();
			// Vérification de l'existance d'un praticien
			if (isset($_REQUEST['praticien']) && !empty($_REQUEST['praticien']))
			{
				// Récupération du praticien
				$PRA_NUM = $_REQUEST['praticien'];
				// Retourne les infos sur un praticien
				$res = $pdo->getInfosPraticien($PRA_NUM);
			}
			// Affichage des informations
			include("vues/v_praticien.php");
			break;
		}

		// Infos sur un médicament
		case 'pharmacopee' :
		{
			// Retourne la liste des médicaments
			$lesMedicaments = $pdo->getMedicaments();
			// Vérification de l'existance d'un médicament
			if (isset($_REQUEST['medicament']) && !empty($_REQUEST['medicament']))
			{
				// Récupération du médicament
				$MED_DEPOTLEGAL = $_REQUEST['medicament'];
				// Retourne les infos sur un médicament
				$res = $pdo->getInfosMedicament($MED_DEPOTLEGAL);
				// Retourne les composant d'un médicament
				$lesComposants = $pdo->getCompositionMedicament($MED_DEPOTLEGAL);
			}
			// Affichage des informations
			include("vues/v_pharmacopee.php");
			break;
		}

		default :
		{
			header("Location:index.php");
		}
	}
}

else
{
	header("Location:index.php");
}
?>