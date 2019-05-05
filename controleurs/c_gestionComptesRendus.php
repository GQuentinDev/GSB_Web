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

// Matricule collaborateur
$COL_MATRICULE = $_SESSION['id'][0];
// Role du collaborateur
$ROLE = $_SESSION['id'][4];
// Région du collaborateur
$REG_CODE = $_SESSION['id'][5];

/**********************************************************
* Les Roles :
* 1 - Visiteur
* 2 - Délégué
* 3 - Responsable
* 
* Les case
* - nouveau
* - enregistrer
* - modifier
* - update
* - supprimer
* - consulter
* - recherche
* - consulterRegion
* - rechercheRegion
* - detailRapport
* - medicament
* - praticien
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

			// Numéro du compte rendu
			$LAST_RAP_NUM = $pdo->getNumRapport($COL_MATRICULE);
			if (empty($LAST_RAP_NUM))
				$LAST_RAP_NUM = 0;
			else
				$LAST_RAP_NUM = $LAST_RAP_NUM[0];
			$RAP_NUM = $LAST_RAP_NUM + 1;

			// Tableau contenant les valeurs préremplies
			$res = array(
				'RAP_NUM'           => $RAP_NUM, 
				'RAP_DATEVISITE'    => null,
				'PRA_NUM'           => null,
				'PRA_COEFF'         => null,
				'PRA_REMPLACANT'    => 0,
				'PRA_NUM_REMPLACANT'=> null,
				'RAP_DATE'          => null,
				'MOT_CODE'          => null,
				'MOT_AUTRE'         => null,
				'RAP_BILAN'         => null,
				'MED_PRESENTE1'     => null,
				'MED_PRESENTE2'     => null,
				'RAP_DEF'           => 0,
				'ECHANTILLONS'      => array(
					'ECH1' => null,
					'QTE1' => null,
					'ECH2' => null,
					'QTE2' => null,
					'ECH3' => null,
					'QTE3' => null,
				)
			);
			// Retourne la liste des médicaments
			$lesMedicaments = $pdo->getMedicaments();
			// Retourne la liste des praticiens
			$lesPraticiens = $pdo->getPraticiens();
			// Retourne la liste des motifs
			$lesMotifs = $pdo->getMotifs();
			// Affichage du formulaire de compte rendu
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

			// Numéro du compte rendu
			$LAST_RAP_NUM = $pdo->getNumRapport($COL_MATRICULE);
			if (empty($LAST_RAP_NUM))
				$LAST_RAP_NUM = 0;
			else
				$LAST_RAP_NUM = $LAST_RAP_NUM[0];
			$RAP_NUM = $LAST_RAP_NUM + 1;

			// Vérification de l'existence de la date de visite
			if (!empty($_REQUEST['RAP_DATEVISITE']))
				$RAP_DATEVISITE = $_REQUEST['RAP_DATEVISITE'];
			else
				$RAP_DATEVISITE = null;

			// Vérification de l'existence du praticien
			if (!empty($_REQUEST['PRA_NUM']))
				$PRA_NUM = $_REQUEST['PRA_NUM'];
			else
				$PRA_NUM = null;

			// Vérification de l'existence du coefficient de confiance
			if (!empty($_REQUEST['PRA_COEFF']))
				$PRA_COEFF = $_REQUEST['PRA_COEFF'];
			else
				$PRA_COEFF = null;

			// Vérification de l'existence du remplacant
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
				$PRA_NUM_REMPLACANT = null;
			}

			// Date système
			$RAP_DATE = date("Y-m-d");

			// Vérification de l'existence du motif
			if (!empty($_REQUEST['RAP_MOTIF']))
				$MOT_CODE = $_REQUEST['RAP_MOTIF'];
			else
				$MOT_CODE = null;

			// Vérification de l'existence du libéllé motif autre
			if (!empty($_REQUEST['RAP_MOTIFAUTRE']))
				$MOT_AUTRE = $_REQUEST['RAP_MOTIFAUTRE'];
			else
				$MOT_AUTRE = null;

			// Vérification de l'existence du bilan
			if (!empty($_REQUEST['RAP_BILAN']))
				$RAP_BILAN = $_REQUEST['RAP_BILAN'];
			else
				$RAP_BILAN = null;

			// Vérification de l'existence d'un produit 1
			if (!empty($_REQUEST['PROD1']))
				$MED_PRESENTE1 = $_REQUEST['PROD1'];
			else
				$MED_PRESENTE1 = null;

			// Vérification de l'existence d'un produit 2
			if (!empty($_REQUEST['PROD2']))
				$MED_PRESENTE2 = $_REQUEST['PROD2'];
			else
				$MED_PRESENTE2 = null;

			// Vérification de l'état de la case saisie deffinitive
			if (!empty($_REQUEST['RAP_DEF']))
				$RAP_DEF = 1;
			else
				$RAP_DEF = 0;

			// Vérification de l'existence d'un echantillon 1
			if (!empty($_REQUEST['PRA_ECH1']))
			{
				$ECH1 = $_REQUEST['PRA_ECH1'];
				$QTE1 = $_REQUEST['PRA_QTE1'];
				// Vérification de l'existence d'une quantité d'echantillon 1
				if (empty($QTE1))
					$QTE1 = 1;

				// Vérification de l'existence d'un echantillon 2
				if (!empty($_REQUEST['PRA_ECH2']))
				{
					$ECH2 = $_REQUEST['PRA_ECH2'];
					$QTE2 = $_REQUEST['PRA_QTE2'];
					// Vérification de l'existence d'une quantité d'echantillon 2
					if (empty($QTE2))
						$QTE2 = 1;

					// Vérification de l'existence d'un echantillon 3
					if (!empty($_REQUEST['PRA_ECH3']))
					{
						$ECH3 = $_REQUEST['PRA_ECH3'];
						$QTE3 = $_REQUEST['PRA_QTE3'];
						// Vérification de l'existence d'une quantité d'echantillon 3
						if (empty($QTE3))
							$QTE3 = 1;
					}
					else
					{
						$ECH3 = null;
						$QTE3 = null;
					}
				}
				else
				{
					$ECH2 = null;
					$QTE2 = null;
					$ECH3 = null;
					$QTE3 = null;
				}
			}
			else
			{
				$ECH1 = null;
				$QTE1 = null;
				$ECH2 = null;
				$QTE2 = null;
				$ECH3 = null;
				$QTE3 = null;
			}

			// Tableau contenant les valeurs préremplies
			$res = array(
				'RAP_NUM'           => $RAP_NUM, 
				'RAP_DATEVISITE'    => $RAP_DATEVISITE,
				'PRA_NUM'           => $PRA_NUM,
				'PRA_COEFF'         => $PRA_COEFF,
				'PRA_REMPLACANT'    => $PRA_REMPLACANT,
				'PRA_NUM_REMPLACANT'=> $PRA_NUM_REMPLACANT,
				'RAP_DATE'          => $RAP_DATE,
				'MOT_CODE'          => $MOT_CODE,
				'MOT_AUTRE'         => $MOT_AUTRE,
				'RAP_BILAN'         => $RAP_BILAN,
				'MED_PRESENTE1'     => $MED_PRESENTE1,
				'MED_PRESENTE2'     => $MED_PRESENTE2,
				'RAP_DEF'           => $RAP_DEF,
				'ECHANTILLONS'      => array(
					'ECH1' => $ECH1,
					'QTE1' => $QTE1,
					'ECH2' => $ECH2,
					'QTE2' => $QTE2,
					'ECH3' => $ECH3,
					'QTE3' => $QTE3,
				)
			);

			// Retourne la liste des médicaments
			$lesMedicaments = $pdo->getMedicaments();
			// Retourne la liste des praticiens
			$lesPraticiens = $pdo->getPraticiens();
			// Retourne la liste des motifs
			$lesMotifs = $pdo->getMotifs();

			// Vérification des données saisies
			$msgErreurs = getErreurSaisieRapport($RAP_DATEVISITE, $PRA_NUM, $PRA_REMPLACANT, $PRA_NUM_REMPLACANT, $RAP_BILAN, $MOT_CODE, $MOT_AUTRE, $MED_PRESENTE1);

			if (count($msgErreurs) != 0)
			{
				// Affichage des messages d'erreurs
				include ("vues/v_erreurs.php");
				// Affichage du formulaire de compte rendu
				include ("vues/v_saisieRapport.php");
			}
			else
			{
				// Vérification de l'existence du libéllé motif
				if (empty($MOT_AUTRE))
					$MOT_AUTRE = null;

				// Vérification de l'existence d'un remplacant
				if (empty($PRA_NUM_REMPLACANT))
					$PRA_NUM_REMPLACANT = null;
				
				// Test d'insertion
				if ($pdo->nouveauRapport($COL_MATRICULE, $RAP_NUM, $PRA_NUM, $PRA_NUM_REMPLACANT, $RAP_DATE, $RAP_BILAN, $MOT_CODE, $MOT_AUTRE, $MED_PRESENTE1, $MED_PRESENTE2, $RAP_DEF, $RAP_DATEVISITE))
				{
					if ($ECH1 != null)
					{
						$pdo->offrir($COL_MATRICULE, $RAP_NUM, $ECH1, $QTE1);
					}
					if ($ECH2 != null)
					{
						$pdo->offrir($COL_MATRICULE, $RAP_NUM, $ECH2, $QTE2);
					}
					if ($ECH3 != null)
					{
						$pdo->offrir($COL_MATRICULE, $RAP_NUM, $ECH3, $QTE3);
					}

					/*
					$pdo->updateCoefConfiance($PRA_NUM, $PRA_COEFF);
					*/

					// Verification de l'état de la case saisie définitive
					if ($RAP_DEF == 0)
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
					$msgErreurs[] = "L'enregistrement à échoué";
					// Affichage du message d'erreurs
					include ("vues/v_erreurs.php");
					// Afficahge du formulaire de compte rendu
					include ("vues/v_saisieRapport.php");
				}
			}
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

			// Ancien numéro de compte rendu
			$_SESSION['RAP_NUM_OLD'] = $RAP_NUM = $_REQUEST['RAP_NUM'];

			// Retourne les détails d'un compte rendu
			$res = $pdo->getDetailsRapport($RAP_NUM);

			if (empty($res) || $res['RAP_DEF'] == 1)
			{
				unset($_SESSION['RAP_NUM_OLD']);
				header("Location:index.php");
			}

			// Coefficient de confiance
			$res['PRA_COEFF'] = null;

			// Les echantillons
			$lesEchantillons = $pdo->getEchantillons($COL_MATRICULE, $RAP_NUM);
			$j = 1;
			for ($i = 0; $i < 3; $i++)
			{
				if ($i < sizeof($lesEchantillons))
				{
					$res['ECHANTILLONS']['ECH'.$j] = $lesEchantillons[$i]['MED_DEPOTLEGAL'];
					$res['ECHANTILLONS']['QTE'.$j] = $lesEchantillons[$i]['OFF_QTE'];
				}
				else
				{
					$res['ECHANTILLONS']['ECH'.$j] = null;
					$res['ECHANTILLONS']['QTE'.$j] = null;
				}
				$j++;
			}

			// Vérification de l'existence du remplacant
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

			// Ancien numéro de compte rendu
			$RAP_NUM_OLD = $RAP_NUM = $_SESSION['RAP_NUM_OLD'];

			// Vérification de l'existence de la date de visite
			if (!empty($_REQUEST['RAP_DATEVISITE']))
				$RAP_DATEVISITE = $_REQUEST['RAP_DATEVISITE'];
			else
				$RAP_DATEVISITE = null;

			// Vérification de l'existence du praticien
			if (!empty($_REQUEST['PRA_NUM']))
				$PRA_NUM = $_REQUEST['PRA_NUM'];
			else
				$PRA_NUM = null;

			// Vérification de l'existence du coefficient de confiance
			if (!empty($_REQUEST['PRA_COEFF']))
				$PRA_COEFF = $_REQUEST['PRA_COEFF'];
			else
				$PRA_COEFF = null;

			// Vérification de l'existence du remplacant
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
				$PRA_NUM_REMPLACANT = null;
			}

			// Date système
			$RAP_DATE = date("Y-m-d");

			// Vérification de l'existence du motif
			if (!empty($_REQUEST['RAP_MOTIF']))
				$MOT_CODE = $_REQUEST['RAP_MOTIF'];
			else
				$MOT_CODE = null;

			// Vérification de l'existence du libéllé motif autre
			if (!empty($_REQUEST['RAP_MOTIFAUTRE']))
				$MOT_AUTRE = $_REQUEST['RAP_MOTIFAUTRE'];
			else
				$MOT_AUTRE = null;

			// Vérification de l'existence du bilan
			if (!empty($_REQUEST['RAP_BILAN']))
				$RAP_BILAN = $_REQUEST['RAP_BILAN'];
			else
				$RAP_BILAN = null;

			// Vérification de l'existence d'un produit 1
			if (!empty($_REQUEST['PROD1']))
				$MED_PRESENTE1 = $_REQUEST['PROD1'];
			else
				$MED_PRESENTE1 = null;

			// Vérification de l'existence d'un produit 2
			if (!empty($_REQUEST['PROD2']))
				$MED_PRESENTE2 = $_REQUEST['PROD2'];
			else
				$MED_PRESENTE2 = null;

			// Vérification de l'état de la case saisie deffinitive
			if (!empty($_REQUEST['RAP_DEF']))
				$RAP_DEF = 1;
			else
				$RAP_DEF = 0;

			// Vérification de l'existence d'un echantillon 1
			if (!empty($_REQUEST['PRA_ECH1']))
			{
				$ECH1 = $_REQUEST['PRA_ECH1'];
				$QTE1 = $_REQUEST['PRA_QTE1'];
				// Vérification de l'existence d'une quantité d'echantillon 1
				if (empty($QTE1))
					$QTE1 = 1;

				// Vérification de l'existence d'un echantillon 2
				if (!empty($_REQUEST['PRA_ECH2']))
				{
					$ECH2 = $_REQUEST['PRA_ECH2'];
					$QTE2 = $_REQUEST['PRA_QTE2'];
					// Vérification de l'existence d'une quantité d'echantillon 2
					if (empty($QTE2))
						$QTE2 = 1;

					// Vérification de l'existence d'un echantillon 3
					if (!empty($_REQUEST['PRA_ECH3']))
					{
						$ECH3 = $_REQUEST['PRA_ECH3'];
						$QTE3 = $_REQUEST['PRA_QTE3'];
						// Vérification de l'existence d'une quantité d'echantillon 3
						if (empty($QTE3))
							$QTE3 = 1;
					}
					else
					{
						$ECH3 = null;
						$QTE3 = null;
					}
				}
				else
				{
					$ECH2 = null;
					$QTE2 = null;
					$ECH3 = null;
					$QTE3 = null;
				}
			}
			else
			{
				$ECH1 = null;
				$QTE1 = null;
				$ECH2 = null;
				$QTE2 = null;
				$ECH3 = null;
				$QTE3 = null;
			}

			// Tableau contenant les valeurs préremplies
			$res = array(
				'RAP_NUM'           => $RAP_NUM, 
				'RAP_DATEVISITE'    => $RAP_DATEVISITE,
				'PRA_NUM'           => $PRA_NUM,
				'PRA_COEFF'         => $PRA_COEFF,
				'PRA_REMPLACANT'    => $PRA_REMPLACANT,
				'PRA_NUM_REMPLACANT'=> $PRA_NUM_REMPLACANT,
				'RAP_DATE'          => $RAP_DATE,
				'MOT_CODE'          => $MOT_CODE,
				'MOT_AUTRE'         => $MOT_AUTRE,
				'RAP_BILAN'         => $RAP_BILAN,
				'MED_PRESENTE1'     => $MED_PRESENTE1,
				'MED_PRESENTE2'     => $MED_PRESENTE2,
				'RAP_DEF'           => $RAP_DEF,
				'ECHANTILLONS' => array(
					'ECH1' => $ECH1,
					'QTE1' => $QTE1,
					'ECH2' => $ECH2,
					'QTE2' => $QTE2,
					'ECH3' => $ECH3,
					'QTE3' => $QTE3,
				)
			);

			// Retourne la liste des médicaments
			$lesMedicaments = $pdo->getMedicaments();
			// Retourne la liste des praticiens
			$lesPraticiens = $pdo->getPraticiens();
			// Retourne la liste des motifs
			$lesMotifs = $pdo->getMotifs();

			// Vérification des données saisies
			$msgErreurs = getErreurSaisieRapport($RAP_DATEVISITE, $PRA_NUM, $PRA_REMPLACANT, $PRA_NUM_REMPLACANT, $RAP_BILAN, $MOT_CODE, $MOT_AUTRE, $MED_PRESENTE1);

			if (count($msgErreurs) != 0)
			{
				// Affichage des messages d'erreurs
				include ("vues/v_erreurs.php");
				// Affichage du formulaire de compte rendu
				include ("vues/v_saisieRapport.php");
			}
			else
			{
				// Mise à jour du compte rendu
				if ($pdo->updateRapport($RAP_NUM_OLD, $PRA_NUM, $PRA_NUM_REMPLACANT, $RAP_DATE, $RAP_BILAN, $MOT_CODE, $MOT_AUTRE, $MED_PRESENTE1, $MED_PRESENTE2, $RAP_DEF, $RAP_DATEVISITE))
				{
					$pdo->deleteEchantillons($COL_MATRICULE, $RAP_NUM_OLD);
					if ($ECH1 != null)
					{
						$pdo->offrir($COL_MATRICULE, $RAP_NUM_OLD, $ECH1, $QTE1);
					}
					if ($ECH2 != null)
					{
						$pdo->offrir($COL_MATRICULE, $RAP_NUM_OLD, $ECH2, $QTE2);
					}
					if ($ECH3 != null)
					{
						$pdo->offrir($COL_MATRICULE, $RAP_NUM_OLD, $ECH3, $QTE3);
					}

					// Vérification de l'état de la case saisie définitive
					if ($RAP_DEF == 0)
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
					// Ancien numéro de compte rendu
					unset($_SESSION['RAP_NUM_OLD']);
				}
				else
				{
					// Affichage du message d'erreur
					$msgErreurs[] = "L'enregistrement à echoué, veuillez réessayer";
					include ("vues/v_erreurs.php");
					// Afficahge du formulaire de compte rendu
					include ("vues/v_saisieRapport.php");
				}
			}
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Suppression d'un compte rendu
	case 'supprimer' :
	{
		if ($ROLE == 1 || $ROLE = 2)
		{
			$RAP_NUM = $_REQUEST['RAP_NUM'];
			$pdo->deleteEchantillons($COL_MATRICULE, $RAP_NUM);
			$pdo->deleteRapport($COL_MATRICULE, $RAP_NUM);
			// Redirection à la consultation
			header("Location:index.php?uc=compteRendu&ac=consulter");
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
		if ($ROLE == 1 || $ROLE = 2)
		{
			// Retourne la liste des praticiens vu
			$lesPraticiens = $pdo->getPraticiensVu($COL_MATRICULE);
			// Retourne la liste des compte rendus non validés
			$mesRapports = $pdo->getRapportsNonValides($COL_MATRICULE);
			// Affichage recherche et compte rendu non définitifs
			include("vues/v_consulterRapport.php");
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Résultats de recherche de compte rendu
	case 'recherche' :
	{
		if ($ROLE == 1 || $ROLE = 2)
		{
			// Vérification de l'existence d'une date 1
			if (isset($_REQUEST['RAP_DATE1']))
				$RAP_DATE1 = $_REQUEST['RAP_DATE1'];
			else
				$RAP_DATE1 = null;
			// Vérification de l'existence d'une date 2
			if (isset($_REQUEST['RAP_DATE2']))
				$RAP_DATE2 = $_REQUEST['RAP_DATE2'];
			else
				$RAP_DATE2 = null;

			// Vérification des données saisies
			$msgErreurs = getErreurRechercheRapport($RAP_DATE1, $RAP_DATE2);

			if (count($msgErreurs) != 0)
			{
				// Afficahge des messages d'erreurs
				include ("vues/v_erreurs.php");
				// Retourne la liste des praticiens vu
				$lesPraticiens = $pdo->getPraticiensVu($COL_MATRICULE);
				// Retourne la liste des compte rendus non validés
				$mesRapports = $pdo->getRapportsNonValides($COL_MATRICULE);
				// Affichage recherche et compte rendus non définitifs
				include("vues/v_consulterRapport.php");
			}
			else
			{
				// Vérification de l'existence d'un praticien
				if (isset($_REQUEST['PRA_NUM']) && !empty($_REQUEST['PRA_NUM']))
					$PRA_NUM = $_REQUEST['PRA_NUM'];
				else
					$PRA_NUM = null;

				// Retourne la liste des compte rendus entre 2 dates pour un praticien
				$lesRapports = $pdo->getRapports($COL_MATRICULE, $RAP_DATE1, $RAP_DATE2, $PRA_NUM);

				// Vérification du tableau
				if (!empty($lesRapports))
				{
					// Paramètre de redirection
					$REDIRECT = "P";
					// Affichage des compte rendus
					include("vues/v_rapports.php");
				}
				else
				{
					// Affichage d'un message d'information
					$message = "Il n'y a aucun compte rendu";
					include ("vues/v_info.php");
					// Retourne la liste des praticiens vu
					$lesPraticiens = $pdo->getPraticiensVu($COL_MATRICULE);
					// Retourne la liste des compte rendus non validés
					$mesRapports = $pdo->getRapportsNonValides($COL_MATRICULE);
					// Affichage recherche et compte rendus non définitifs
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

	// Recherche et saisies non définitifves
	case 'consulterRegion' :
	{	
		if ($ROLE = 2)
		{
			// Retourne les nouveaux compte rendus
			$nouveauxRapportsRegion = $pdo->getNouveauxRapportsRegion($REG_CODE);
			// Retourne la liste des praticiens ayant un compte rendu définitif dans la region
			$lesPraticiens = $pdo->getPraticiensRapDefRegion($REG_CODE);
			// Affichage des compte rendus
			include("vues/v_consulterRapportRegion.php");
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Résultats de recherche de compte rendu
	case 'rechercheRegion' :
	{
		if ($ROLE = 2)
		{
			// Vérification de l'existence d'une date 1
			if (isset($_REQUEST['RAP_DATE1']))
				$RAP_DATE1 = $_REQUEST['RAP_DATE1'];
			else
				$RAP_DATE1 = null;
			// Vérification de l'existence d'une date 2
			if (isset($_REQUEST['RAP_DATE2']))
				$RAP_DATE2 = $_REQUEST['RAP_DATE2'];
			else
				$RAP_DATE2 = null;

			// Vérification des données saisies
			$msgErreurs = getErreurRechercheRapport($RAP_DATE1, $RAP_DATE2);

			if (count($msgErreurs) != 0)
			{
				// Afficahge des messages d'erreurs
				include ("vues/v_erreurs.php");
				// Retourne les nouveaux compte rendus
				$nouveauxRapportsRegion = $pdo->getNouveauxRapportsRegion($REG_CODE);
				// Retourne la liste des praticiens ayant un compte rendu définitif dans la region
				$lesPraticiens = $pdo->getPraticiensRapDefRegion($REG_CODE);
				// Affichage des compte rendus
				include("vues/v_consulterRapportRegion.php");
			}
			else
			{
				// Vérification de l'existence d'un praticien
				if (isset($_REQUEST['PRA_NUM']) && !empty($_REQUEST['PRA_NUM']))
					$PRA_NUM = $_REQUEST['PRA_NUM'];
				else
					$PRA_NUM = null;

				// Retourne la liste des compte rendus définitif de la région entre 2 dates pour un praticien
				$lesRapports = $pdo->getRapportsDefRegion($REG_CODE, $RAP_DATE1, $RAP_DATE2, $PRA_NUM);

				// Vérification du tableau
				if (!empty($lesRapports))
				{
					// Paramètre de redirection
					$REDIRECT = "R";
					// Affichage des compte rendus
					include("vues/v_rapports.php");
				}
				else
				{
					// Affichage d'un message d'information
					$message = "Il n'y a aucun compte rendu";
					include ("vues/v_info.php");
					// Retourne les nouveaux compte rendus
					$nouveauxRapportsRegion = $pdo->getNouveauxRapportsRegion($REG_CODE);
					// Retourne la liste des praticiens ayant un compte rendu définitif dans la region
					$lesPraticiens = $pdo->getPraticiensRapDefRegion($REG_CODE);
					// Affichage des compte rendus
					include("vues/v_consulterRapportRegion.php");
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
			// Récuperation du numéro de compte rendu
			$RAP_NUM = $_REQUEST['RAP_NUM'];
			// Texte et page de la redirection
			$REDIRECT = $_REQUEST['REDIRECT'];
			// Retourne les détails d'un compte rendu
			$rapport = $pdo->getDetailsRapport($RAP_NUM);
			// Retourne les echantillons du compte rendu
			$lesEchantillons = $pdo->getEchantillons($COL_MATRICULE, $RAP_NUM);
			if ($ROLE == 2)
			{
				//Lorsque le compte rendu a été consulté
				$pdo->rapportConsulteDelegue($RAP_NUM);
			}
			// Affichage du compte rendu
			include("vues/v_detailsRapport.php");
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Détail sur le médicament d'un compte rendu
	case 'medicament' :
	{
		if ($ROLE == 1 || $ROLE = 2)
		{
			// Récuperation du medicament
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

	default :
	{
		header("Location:index.php");
	}
}

?>