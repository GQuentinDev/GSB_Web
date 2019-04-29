<?php
// Verification du paramètre controleur ac et du statu de l'utilisateur
if (isset($_REQUEST['ac']) && !empty($_REQUEST['ac']) && isset($_SESSION['id']) && !empty(($_SESSION['id'])))
{
	$ac = $_REQUEST['ac'];
}
else
{
	header("Location:index.php");
}

// Role du collaborateur
$ROLE = $_SESSION['id'][4];

/**********************************************************
* Les Roles :
* 1 - Visiteur
* 2 - Délégué
* 3 - Responsable
* 
* Les case
* - praticien
* - pharmacopee
**********************************************************/

switch($ac)
{
	// Infos sur un praticien
	case 'praticien' :
	{
		if ($ROLE == 1 || $ROLE = 2)
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
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Infos sur un médicament
	case 'pharmacopee' :
	{
		if ($ROLE == 1 || $ROLE = 2)
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
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	default :
	{
		header("Location:index.php");
	}
}
?>