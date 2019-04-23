<?php
// Verification du paramètre controleur ac et du statu de l'utilisateur
if (isset($_REQUEST['ac']) && !empty($_REQUEST['ac']) && isset($_SESSION['id']) && !empty(($_SESSION['id']))
{
	$ac = $_REQUEST['ac'];
}
else
{
	header("Location:index.php");
}

// Matricule collaborateur
$COL_MATRICULE = $_SESSION['id'][0];
// Role du collaborateur
$ROLE = $_SESSION['id'][4];

/**********************************************************
* Les Roles :
* 1 - Visiteur
* 2 - Délégué
* 3 - 
* 
* Les case
* - nouveau
* - enregistrer
* - consulter
* - recherche
* - detailRapport
* - medicament
* - praticien
* - modifier
* - update
**********************************************************/

switch($ac)
{
	// Compte rendu vierge
	case 'nouveau' :
	{
		if ($ROLE == 1 || $ROLE = 2)
		{
			// Action du formulaire
			$case = "enregistrer";

			// Tableau contenant les valeurs préremplies
			$res = array(
				'RAP_NUM' => "", 
				'RAP_DATEVISITE' => "",
				'PRA_NUM' => "",
				'PRA_COEFF' => "",
				'PRA_REMPLACANT' => 0,
				'PRA_NUM_REMPLACANT' => "",
				'RAP_DATE' => "",
				'MOT_CODE' => "",
				'MOT_AUTRE' => "",
				'RAP_BILAN' => "",
				'MED_PRESENTE1' => "",
				'MED_PRESENTE2' => "",
				'RAP_DEF' => 0
			);
			// Retourne la liste des médicaments
			$lesMedicaments = $pdo->getMedicaments();
			// Retourne la liste des praticiens
			$lesPraticiens = $pdo->getPraticiens();
			// Retourne la liste des motifs
			$lesMotifs = $pdo->getMotifs();
			// Affichage du formulaire de rapport
			include("vues/v_saisieRapport.php");
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Verification et insertion
	case 'enregistrer' :
	{
		if ($ROLE == 1 || $ROLE = 2)
		{
			// Action du formulaire
			$case = "enregistrer";

			// Vérification de l'existance du numéro de rapport
			if (!empty($_REQUEST['RAP_NUM']))
				$RAP_NUM = $_REQUEST['RAP_NUM'];
			else
				$RAP_NUM = "";
			// Vérification de l'existance de la date de visite
			if (!empty($_REQUEST['RAP_DATEVISITE']))
				$RAP_DATEVISITE = $_REQUEST['RAP_DATEVISITE'];
			else
				$RAP_DATEVISITE = "";
			// Vérification de l'existance du praticien
			if (!empty($_REQUEST['PRA_NUM']))
				$PRA_NUM = $_REQUEST['PRA_NUM'];
			else
				$PRA_NUM = "";
			// Vérification de l'existance du coefficient de confiance
			if (!empty($_REQUEST['PRA_COEFF']))
				$PRA_COEFF = $_REQUEST['PRA_COEFF'];
			else
				$PRA_COEFF = "";
			// Vérification de l'existance du remplacant
			if (!empty($_REQUEST['PRA_REMPLACANT'])) 
			{
				// Etat de la case remplacant
				$PRA_REMPLACANT = 1;
				$PRA_NUM_REMPLACANT = $_REQUEST['PRA_REMPLACANT'];
			}
			else 
			{
				// Etat de la case remplacant
				$PRA_REMPLACANT = 0;
				$PRA_NUM_REMPLACANT = "";
			}
			// Date système
			$RAP_DATE = date("Y-m-d");
			// Vérification de l'existance du motif
			if (!empty($_REQUEST['RAP_MOTIF']))
				$MOT_CODE = $_REQUEST['RAP_MOTIF'];
			else
				$MOT_CODE = "";
			// Vérification de l'existance du libéllé motif autre
			if (!empty($_REQUEST['RAP_MOTIFAUTRE']))
				$MOT_AUTRE = $_REQUEST['RAP_MOTIFAUTRE'];
			else
				$MOT_AUTRE = "";
			// Vérification de l'existance du bilan
			if (!empty($_REQUEST['RAP_BILAN']))
				$RAP_BILAN = $_REQUEST['RAP_BILAN'];
			else
				$RAP_BILAN = "";
			// Vérification de l'existance d'un produit 1
			if (!empty($_REQUEST['PROD1']))
				$MED_PRESENTE1 = $_REQUEST['PROD1'];
			else
				$MED_PRESENTE1 = "";
			// Vérification de l'existance d'un produit 2
			if (!empty($_REQUEST['PROD2']))
				$MED_PRESENTE2 = $_REQUEST['PROD2'];
			else
				$MED_PRESENTE2 = "";
			// Vérification de l'état de la case saisie deffinitive
			if (!empty($_REQUEST['RAP_DEF']))
				$RAP_DEF = 1;
			else
				$RAP_DEF = 0;

			// Vérification des données saisies
			$msgErreurs = getErreurSaisieRapport($RAP_NUM, $RAP_DATEVISITE, $PRA_NUM, $PRA_COEFF, $PRA_REMPLACANT, $PRA_NUM_REMPLACANT, $RAP_BILAN, $MOT_CODE, $MOT_AUTRE, $MED_PRESENTE1, $MED_PRESENTE2);

			if (count($msgErreurs) != 0)
			{
				// Affichage des messages d'erreurs
				include ("vues/v_erreurs.php");
				// Tableau contenant les valeurs préremplies
				$res = array(
					'RAP_NUM' => $RAP_NUM, 
					'RAP_DATEVISITE' => $RAP_DATEVISITE,
					'PRA_NUM' => $PRA_NUM,
					'PRA_COEFF' => $PRA_COEFF,
					'PRA_REMPLACANT' => $PRA_REMPLACANT,
					'PRA_NUM_REMPLACANT' => $PRA_NUM_REMPLACANT,
					'RAP_DATE' => $RAP_DATE,
					'MOT_CODE' => $MOT_CODE,
					'MOT_AUTRE' => $MOT_AUTRE,
					'RAP_BILAN' => $RAP_BILAN,
					'MED_PRESENTE1' => $MED_PRESENTE1,
					'MED_PRESENTE2' => $MED_PRESENTE2,
					'RAP_DEF' => $RAP_DEF
				);
				// Retourne la liste des médicaments
				$lesMedicaments = $pdo->getMedicaments();
				// Retourne la liste des praticiens
				$lesPraticiens = $pdo->getPraticiens();
				// Retourne la liste des motifs
				$lesMotifs = $pdo->getMotifs();
				// Affichage du formulaire de rapport
				include ("vues/v_saisieRapport.php");
			}
			else
			{
				// Vérification de l'existance du libéllé motif
				if (empty($MOT_AUTRE))
					$MOT_AUTRE = "null";
				// Vérification de l'existance d'un remplacant
				if (empty($PRA_NUM_REMPLACANT))
					$PRA_NUM_REMPLACANT = "null";
				// Tableau contenant les valeurs pour l'insertion
				$rapport = array(
					'RAP_NUM' => $RAP_NUM, 
					'RAP_DATEVISITE' => $RAP_DATEVISITE,
					'PRA_NUM' => $PRA_NUM,
					'PRA_COEFF' => $PRA_COEFF,
					'PRA_NUM_REMPLACANT' => $PRA_NUM_REMPLACANT,
					'RAP_DATE' => $RAP_DATE,
					'MOT_CODE' => $MOT_CODE,
					'MOT_AUTRE' => $MOT_AUTRE,
					'RAP_BILAN' => $RAP_BILAN,
					'MED_PRESENTE1' => $MED_PRESENTE1,
					'MED_PRESENTE2' => $MED_PRESENTE2,
					'RAP_DEF' => $RAP_DEF
				);
				
				// Test d'insertion
				if ($pdo->noveauRapport($COL_MATRICULE, $rapport['RAP_NUM'], $rapport['PRA_NUM'], $rapport['PRA_NUM_REMPLACANT'], $rapport['RAP_DATE'], $rapport['RAP_BILAN'], $rapport['MOT_CODE'], $rapport['MOT_AUTRE'], $rapport['MED_PRESENTE1'], $rapport['MED_PRESENTE2'], $rapport['RAP_DEF'], $rapport['RAP_DATEVISITE']))
				{
					// Verification de l'état de la case saisie définitive
					if ($rapport['RAP_DEF'] == 0)
					{
						$message = "Enregistrement réussi en tant que saisie non définitive";
					}
					else
					{
						$message = "Enregistrement réussi en tant que saisie définitive";
					}
					// Affichage message succès
					include ("vues/v_message.php");
					// Affichage indication où trouver ses enregistrements
					include ("vues/v_infoEnregistrement.php");
				}
				else
				{
					$msgErreurs[] = "L'enregistrement à échoué, le numéro de rapport existe déjà";
					// Affichage du message d'erreurs
					include ("vues/v_erreurs.php");
					// Tableau contenant les valeurs préremplies
					$res = array(
						'RAP_NUM' => $RAP_NUM, 
						'RAP_DATEVISITE' => $RAP_DATEVISITE,
						'PRA_NUM' => $PRA_NUM,
						'PRA_COEFF' => $PRA_COEFF,
						'PRA_REMPLACANT' => $PRA_REMPLACANT,
						'PRA_NUM_REMPLACANT' => $PRA_NUM_REMPLACANT,
						'RAP_DATE' => $RAP_DATE,
						'MOT_CODE' => $MOT_CODE,
						'MOT_AUTRE' => $MOT_AUTRE,
						'RAP_BILAN' => $RAP_BILAN,
						'MED_PRESENTE1' => $MED_PRESENTE1,
						'MED_PRESENTE2' => $MED_PRESENTE2,
						'RAP_DEF' => $RAP_DEF
					);
					// Retourne la liste des médicaments
					$lesMedicaments = $pdo->getMedicaments();
					// Retourne la liste des praticiens
					$lesPraticiens = $pdo->getPraticiens();
					// Retourne la liste des motifs
					$lesMotifs = $pdo->getMotifs();
					// Afficahge du formulaire de rapport
					include ("vues/v_saisieRapport.php");
				}
				/*
				$pdo->updateCoefConfiance($PRA_NUM, $PRA_COEFF);

				if (isset($_REQUEST['PRA_ECH1'])) {
					$MED_DEPOTLEGAL = $_REQUEST['PRA_ECH1'];
					$OFF_QTE = $_REQUEST['PRA_QTE1'];
					$pdo->offrir($COL_MATRICULE, $RAP_NUM, $MED_DEPOTLEGAL, $OFF_QTE);
				}
				if (isset($_REQUEST['PRA_ECH2'])) {
					$MED_DEPOTLEGAL = $_REQUEST['PRA_ECH2'];
					$OFF_QTE = $_REQUEST['PRA_QTE1'];
					$pdo->offrir($COL_MATRICULE, $RAP_NUM, $MED_DEPOTLEGAL, $OFF_QTE);
				}
				*/
			}
			}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Recherche et saisies non définitifves
	case 'consulter' :
	{	
		if ($ROLE == 1)
		{
			// Retourne la liste des praticiens vu
			$lesPraticiens = $pdo->getPraticiensVu($COL_MATRICULE);
			// Retourne la liste des rapports non validés
			$mesRapports = $pdo->getRapportsNonValides($COL_MATRICULE);
			// Affichage recherche et rapport non définitifs
			include("vues/v_consulterRapport.php");
		}
		elseif ($ROLE == 2)
		{
			// Retourne les rapports
			
			// Affichage des rapports
			include("vues/v_consulterRapportRegion.php");
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Résultats de recherche d'un compte rendu
	case 'recherche' :
	{
		if ($ROLE == 1)
		{
			// Vérification de l'existance d'une date 1
			if (isset($_REQUEST['RAP_DATE1']))
				$RAP_DATE1 = $_REQUEST['RAP_DATE1'];
			else
				$RAP_DATE1 = "";
			// Vérification de l'existance d'une date 2
			if (isset($_REQUEST['RAP_DATE2']))
				$RAP_DATE2 = $_REQUEST['RAP_DATE2'];
			else
				$RAP_DATE2 = "";

			// Vérification des données saisies
			$msgErreurs = getErreurRechercheRapport($RAP_DATE1, $RAP_DATE2);

			if (count($msgErreurs) != 0)
			{
				// Afficahge des messages d'erreurs
				include ("vues/v_erreurs.php");
				// Retourne la liste des praticiens vu
				$lesPraticiens = $pdo->getPraticiensVu($COL_MATRICULE);
				// Retourne la liste des rapports non validés
				$mesRapports = $pdo->getRapportsNonValides($COL_MATRICULE);
				// Affichage recherche et rapports non définitifs
				include("vues/v_consulterRapport.php");
			}
			else
			{
				// Vérification de l'existance d'un praticien
				if (isset($_REQUEST['PRA_NUM']) && !empty($_REQUEST['PRA_NUM']))
					$PRA_NUM = $_REQUEST['PRA_NUM'];
				else
					$PRA_NUM = "null";

				// Retourne la liste des rapports entre 2 dates pour un praticien
				$mesRapports = $pdo->getRapports($COL_MATRICULE, $RAP_DATE1, $RAP_DATE2, $PRA_NUM);

				// Vérification du tableau
				if (!empty($mesRapports))
				{
					// Affichage des rapports
					include("vues/v_rapports.php");
				}
				else
				{
					// Affichage d'un message d'information
					$message = "Il n'y a aucun compte rendu";
					include ("vues/v_info.php");
					// Retourne la liste des praticiens vu
					$lesPraticiens = $pdo->getPraticiensVu($COL_MATRICULE);
					// Retourne la liste des rapports non validés
					$mesRapports = $pdo->getRapportsNonValides($COL_MATRICULE);
					// Affichage recherche et rapports non définitifs
					include("vues/v_consulterRapport.php");
				}
			}
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Détail du compte rendu
	case 'detailRapport' :
	{
		if ($ROLE == 1 || $ROLE = 2)
		{
			// Récuperation du numéro de rapport
			$RAP_NUM = $_REQUEST['RAP_NUM'];
			// Retourne les détails d'un rapport
			$res = $pdo->getDetailsRapport($RAP_NUM);
			// Affichage du rapport
			include("vues/v_detailsRapport.php");
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Détail sur le médicament d'un compte rendu
	case 'mediacament' :
	{
		if ($ROLE == 1 || $ROLE = 2)
		{
			// Récuperation du mediacament
			$MED_DEPOTLEGAL = $_REQUEST['medicament'];
			// Retourne les info d'un médicament
			$res = $pdo->getInfosMedicament($MED_DEPOTLEGAL);
			// Retourne les composant d'un médicament
			$lesComposants = $pdo->getCompositionMedicament($MED_DEPOTLEGAL);
			// Affichage des info d'un médicament
			include("vues/v_infosMedicament.php");
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Détail sur le praticien d'un compte rendu
	case 'praticien' :
	{
		if ($ROLE == 1 || $ROLE = 2)
		{
			// Récupération du praticien
			$PRA_NUM = $_REQUEST['praticien'];
			// Retourne les infos d'un praticien
			$res = $pdo->getInfosPraticien($PRA_NUM);
			// Affichage des info d'un praticien
			include("vues/v_infosPraticien.php");
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Modification d'un compte rendu
	case 'modifier' :
	{
		if ($ROLE == 1 || $ROLE = 2)
		{
			// Action du formulaire
			$case = "update";

			// Ancien numéro de rapport
			$_SESSION['RAP_NUM_OLD'] = $_REQUEST['RAP_NUM'];
			// Récuperation du numéro de rapport
			$RAP_NUM = $_REQUEST['RAP_NUM'];
			// Retourne les détails d'un rapport
			$res = $pdo->getDetailsRapport($RAP_NUM);
			// Coefficient de confiance
			$res['PRA_COEFF'] = "";

			// Vérification de l'existance du remplacant
			if (!empty($res['PRA_NUM_REMPLACANT'])) 
			{
				// Etat de la case remplacant
				$res['PRA_REMPLACANT'] = 1;
			}
			else 
			{
				$res['PRA_REMPLACANT'] = 0;
			}

		 	// Retourne la liste des médicaments
			$lesMedicaments = $pdo->getMedicaments();
			// Retourne la liste des praticiens
			$lesPraticiens = $pdo->getPraticiens();
			// Retourne la liste des motifs
			$lesMotifs = $pdo->getMotifs();
			// Affichage 
			include ("vues/v_saisieRapport.php");
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Verification des modifications et insertion
	case 'update' :
	{
		if ($ROLE == 1 || $ROLE = 2)
		{
			// Action du formulaire
			$case = "update";

			// Ancien numéro de rapport
			$RAP_NUM_OLD = $_SESSION['RAP_NUM_OLD'];
			// Vérification de l'existance du numéro de rapport
			if (!empty($_REQUEST['RAP_NUM']))
				$RAP_NUM = $_REQUEST['RAP_NUM'];
			else
				$RAP_NUM = "";
			// Vérification de l'existance de la date de visite
			if (!empty($_REQUEST['RAP_DATEVISITE']))
				$RAP_DATEVISITE = $_REQUEST['RAP_DATEVISITE'];
			else
				$RAP_DATEVISITE = "";
			// Vérification de l'existance du praticien
			if (!empty($_REQUEST['PRA_NUM']))
				$PRA_NUM = $_REQUEST['PRA_NUM'];
			else
				$PRA_NUM = "";
			// Vérification de l'existance du coefficient de confiance
			if (!empty($_REQUEST['PRA_COEFF']))
				$PRA_COEFF = $_REQUEST['PRA_COEFF'];
			else
				$PRA_COEFF = "";
			// Vérification de l'existance du remplacant
			if (!empty($_REQUEST['PRA_REMPLACANT'])) 
			{
				// Etat de la case remplacant
				$PRA_REMPLACANT = 1;
				$PRA_NUM_REMPLACANT = $_REQUEST['PRA_REMPLACANT'];
			}
			else 
			{
				// Etat de la case remplacant
				$PRA_REMPLACANT = 0;
				$PRA_NUM_REMPLACANT = "";
			}
			// Date système
			$RAP_DATE = date("Y-m-d");
			// Vérification de l'existance du motif
			if (!empty($_REQUEST['RAP_MOTIF']))
				$MOT_CODE = $_REQUEST['RAP_MOTIF'];
			else
				$MOT_CODE = "";
			// Vérification de l'existance du libéllé motif autre
			if (!empty($_REQUEST['RAP_MOTIFAUTRE']))
				$MOT_AUTRE = $_REQUEST['RAP_MOTIFAUTRE'];
			else
				$MOT_AUTRE = "";
			// Vérification de l'existance du bilan
			if (!empty($_REQUEST['RAP_BILAN']))
				$RAP_BILAN = $_REQUEST['RAP_BILAN'];
			else
				$RAP_BILAN = "";
			// Vérification de l'existance d'un produit 1
			if (!empty($_REQUEST['PROD1']))
				$MED_PRESENTE1 = $_REQUEST['PROD1'];
			else
				$MED_PRESENTE1 = "";
			// Vérification de l'existance d'un produit 2
			if (!empty($_REQUEST['PROD2']))
				$MED_PRESENTE2 = $_REQUEST['PROD2'];
			else
				$MED_PRESENTE2 = "";
			// Vérification de l'état de la case saisie deffinitive
			if (!empty($_REQUEST['RAP_DEF']))
				$RAP_DEF = 1;
			else
				$RAP_DEF = 0;

			// Vérification des données saisies
			$msgErreurs = getErreurSaisieRapport($RAP_NUM, $RAP_DATEVISITE, $PRA_NUM, $PRA_COEFF, $PRA_REMPLACANT, $PRA_NUM_REMPLACANT, $RAP_BILAN, $MOT_CODE, $MOT_AUTRE, $MED_PRESENTE1, $MED_PRESENTE2);

			if (count($msgErreurs) != 0)
			{
				// Affichage des messages d'erreur
				include ("vues/v_erreurs.php");
				// Tableau contenant les valeurs préremplies
				$res = array(
					'RAP_NUM' => $RAP_NUM, 
					'RAP_DATEVISITE' => $RAP_DATEVISITE,
					'PRA_NUM' => $PRA_NUM,
					'PRA_COEFF' => $PRA_COEFF,
					'PRA_REMPLACANT' => $PRA_REMPLACANT,
					'PRA_NUM_REMPLACANT' => $PRA_NUM_REMPLACANT,
					'RAP_DATE' => $RAP_DATE,
					'MOT_CODE' => $MOT_CODE,
					'MOT_AUTRE' => $MOT_AUTRE,
					'RAP_BILAN' => $RAP_BILAN,
					'MED_PRESENTE1' => $MED_PRESENTE1,
					'MED_PRESENTE2' => $MED_PRESENTE2,
					'RAP_DEF' => $RAP_DEF
				);
				// Retourne la liste des médicaments
				$lesMedicaments = $pdo->getMedicaments();
				// Retourne la liste des praticiens
				$lesPraticiens = $pdo->getPraticiens();
				// Retourne la liste des motifs
				$lesMotifs = $pdo->getMotifs();
				// Affichage du formulaire de rapport
				include ("vues/v_saisieRapport.php");
			}
			else
			{
				// Vérification de l'existance du motif autre
				if (empty($MOT_AUTRE))
					$MOT_AUTRE = "null";
				// Verification de l'existance d'un remplaçant
				if (empty($PRA_NUM_REMPLACANT))
					$PRA_NUM_REMPLACANT = "null";
				// Tableau contenant les valeurs pour la mise à jour
				$rapport = array(
					'RAP_NUM' => $RAP_NUM, 
					'RAP_DATEVISITE' => $RAP_DATEVISITE,
					'PRA_NUM' => $PRA_NUM,
					'PRA_COEFF' => $PRA_COEFF,
					'PRA_NUM_REMPLACANT' => $PRA_NUM_REMPLACANT,
					'RAP_DATE' => $RAP_DATE,
					'MOT_CODE' => $MOT_CODE,
					'MOT_AUTRE' => $MOT_AUTRE,
					'RAP_BILAN' => $RAP_BILAN,
					'MED_PRESENTE1' => $MED_PRESENTE1,
					'MED_PRESENTE2' => $MED_PRESENTE2,
					'RAP_DEF' => $RAP_DEF
				);

				// Mise à jour du rapport
				if ($pdo->updateRapport($RAP_NUM_OLD, $rapport['RAP_NUM'], $rapport['PRA_NUM'], $rapport['PRA_NUM_REMPLACANT'], $rapport['RAP_DATE'], $rapport['RAP_BILAN'], $rapport['MOT_CODE'], $rapport['MOT_AUTRE'], $rapport['MED_PRESENTE1'], $rapport['MED_PRESENTE2'], $rapport['RAP_DEF'], $rapport['RAP_DATEVISITE']))
				{
					// Vérification de l'état de la case saisie définitive
					if ($rapport['RAP_DEF'] == 0)
					{
						$message = "Enregistrement réussi en tant que saisie non définitive";
					}
					else
					{
						$message = "Enregistrement réussi en tant que saisie définitive";
					}
					// Affichage message succès
					include ("vues/v_message.php");
					// Affichage indication où trouver ses enregistrements
					include ("vues/v_infoEnregistrement.php");
					// Ancien numéro de rapport
					$_SESSION['RAP_NUM_OLD'] = '';
				}
				else
				{
					// Affichage du message d'erreur
					$msgErreurs[] = "L'enregistrement à echoué, veuillez réessayer";
					include ("vues/v_erreurs.php");
				}
			}
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