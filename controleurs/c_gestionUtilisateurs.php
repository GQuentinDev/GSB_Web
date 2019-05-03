<?php
// Verification du paramètre controleur ac
if (isset($_REQUEST['ac']))
{
	$ac = $_REQUEST['ac'];
}
else
{
	header("Location:index.php");
}

if (isset($_SESSION['id']) && !empty($_SESSION['id']))
	$CONNECTE = true;
else
	$CONNECTE = false;

/**********************************************************
* Les case
* - connexion
* - validerConnexion
* - monCompte
* - updateCoordonnees
* - updatePassword
* - deconnexion
**********************************************************/

switch($ac)
{	
	// Page de connexion
	case 'connexion' :
	{
		// Vérification de l'état de connexion
		if ($CONNECTE)
		{
			header('Location:index.php');
		}
		else
		{
			$login = null;
			// Affichage du formulaire de connexion
			include("vues/v_connexion.php");
		}
		break;
	}

	// Vérification et connexion
	case 'validerConnexion' :
	{
		// Vérification de l'état de connexion
		if ($CONNECTE)
		{
			header('Refresh: 0; URL=index.php');
		}
		else
		{
			// Vérification de l'existance du login
			if (isset($_REQUEST['login']))
				$login = $_REQUEST['login'];
			else
				$login = null;

			// Vérification de l'existance d'un mot de passe
			if (isset($_REQUEST['mdp']))
				$mdp = $_REQUEST['mdp'];
			else
				$mdp = null;

			// Vérification des erreurs de saisie
			$msgErreurs = getErreursConnexion($login, $mdp);
			
			// Vérification des erreurs
			if (count($msgErreurs) != 0)
			{
				// Affichage des erreurs
				include ("vues/v_erreurs.php");
				// Affichage du formulaire de connexion
				include ("vues/v_connexion.php");
			}
			else
			{
				// Retourne le mot de passe
				$nb = $pdo->getConnexion($login);
				// Vérification du mot de passe
				$verif_pass = password_verify($mdp, $nb['mdp']);
				// Vérification de de l'existance du login et que le mot de passe est correcte
				if ($nb['nb'] > 0 && $verif_pass == true)
				{
					// Stockage du matricule du collaborateur
					$_SESSION['id'][0] = $nb['id'];
					// Retourne les infos d'un collaborateur
					$info = $pdo->getInfo($_SESSION['id'][0]);
					// Stockage du nom du collaborateur
					$_SESSION['id'][1] = $info['COL_NOM'];
					// Stockage du prénom du collaborateur
					$_SESSION['id'][2] = $info['COL_PRENOM'];
					// Stockage du statut du collaborateur
					$_SESSION['id'][3] = $info['STA_LIB'];
					// Stockage du code de statu du collaborateur
					$_SESSION['id'][4] = $info['STA_CODE'];
					// Stockage du code de région du collaborateur
					$regionCode = $pdo->getRegion($_SESSION['id'][0]);
					$_SESSION['id'][5] = $regionCode[0];
					header("Location:index.php");
				}
				else
				{
					// Affichage du message d'erreur
					$msgErreurs[] = "Login et/ou mot de passe incorrect";
					include ("vues/v_erreurs.php");
					// Affichage du formulaire de connexion
					include ("vues/v_connexion.php");
				}
			}
		}
		break;
	}

	// Données et paramètres du compte
	case 'monCompte' :
	{
		if ($CONNECTE)
		{
			// Retourne les coordonnées d'un collaborateur
			$res = $pdo->getCoordonnees($_SESSION['id'][0]);
			// Retourne la région d'un collaborateur
			$region = $pdo->getRegion($_SESSION['id'][0]);
			$region = $region[0];
			// Affichage des information du compte
			include ("vues/v_compte.php");
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Mise a jour des coordonnées
	case 'updateCoordonnees' :
	{
		if ($CONNECTE)
		{
			// Vérification de l'existence d'un nom
			if (!empty($_REQUEST['NOM']))
				$NOM = $_REQUEST['NOM'];
			else
				$NOM = null;

			// Vérification de l'existence d'un prenom
			if (!empty($_REQUEST['PRENOM']))
				$PRENOM = $_REQUEST['PRENOM'];
			else
				$PRENOM = null;

			// Vérification de l'existence d'une adresse
			if (!empty($_REQUEST['ADRESSE']))
				$ADRESSE = $_REQUEST['ADRESSE'];
			else
				$ADRESSE = null;

			// Vérification de l'existence d'un code postal
			if (!empty($_REQUEST['CP']))
				$CP = $_REQUEST['CP'];
			else
				$CP = null;

			// Vérification de l'existence d'une ville
			if (!empty($_REQUEST['VILLE']))
				$VILLE = $_REQUEST['VILLE'];
			else
				$VILLE = null;

			$res = array(
				'COL_NOM' => $NOM,
				'COL_PRENOM' => $PRENOM,
				'COL_ADRESSE' => $ADRESSE,
				'COL_CP' => $CP,
				'COL_VILLE' => $VILLE
			);

			// Retourne la région d'un collaborateur
			$region = $pdo->getRegion($_SESSION['id'][0]);
			$region = $region[0];

			// Vérification des données saisies
			$msgErreurs = getErreurSaisieCoordonnees($NOM, $PRENOM, $ADRESSE, $CP, $VILLE);

			if (count($msgErreurs) != 0)
			{
				// Affichage des messages d'erreurs
				include ("vues/v_erreurs.php");
				// Activation des champs de saisie
				$modif = true;
				// Affichage des information du compte
				include ("vues/v_compte.php");
			}
			else
			{
				// mise à jour des données en session et dans la bdd
				if ($pdo->updateCoordonnees($_SESSION['id'][0], $NOM, $PRENOM, $ADRESSE, $CP, $VILLE))
				{	
					// Affichage message succès
					$message = "Vos cordonnées on bien été mises à jour";
					include ("vues/v_message.php");
				}
				else
				{
					// Affichage du message d'erreur
					$msgErreurs[] = "L'enregistrement à echoué, veuillez réessayer";
					include ("vues/v_erreurs.php");
					// Activation des champs de saisie
					$modif = true;
					// Affichage des information du compte
					include ("vues/v_compte.php");
				}
			}
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// mise à jour du mot de passe
	case 'updatePassword' :
	{
		if ($CONNECTE)
		{
			// Vérification de l'existence d'un 
			if (!empty($_REQUEST['OLD_PASS']))
				$OLD_PASS = $_REQUEST['OLD_PASS'];
			else
				$OLD_PASS = null;

			// Vérification de l'existence d'un 
			if (!empty($_REQUEST['NEW_PASS']))
				$NEW_PASS = $_REQUEST['NEW_PASS'];
			else
				$NEW_PASS = null;

			// Vérification de l'existence d'une 
			if (!empty($_REQUEST['NEW_PASS_CONFIRM']))
				$NEW_PASS_CONFIRM = $_REQUEST['NEW_PASS_CONFIRM'];
			else
				$NEW_PASS_CONFIRM = null;

			// Retourne les coordonnées d'un collaborateur
			$res = $pdo->getCoordonnees($_SESSION['id'][0]);
			// Retourne la région d'un collaborateur
			$region = $pdo->getRegion($_SESSION['id'][0]);
			$region = $region[0];

			// Vérification des données saisies
			$msgErreurs = getErreurSaisiePassword($OLD_PASS, $NEW_PASS, $NEW_PASS_CONFIRM);

			if (count($msgErreurs) != 0)
			{
				// Affichage des messages d'erreurs
				include ("vues/v_erreurs.php");
				// Affichage des information du compte
				include ("vues/v_compte.php");
			}
			else
			{
				// mise à jour des données en session et dans la bdd
				if ($pdo->updatePassword($_SESSION['id'][0], $NEW_PASS))
				{	
					// Affichage message succès
					$message = "Vos cordonnées on bien été mises à jour";
					include ("vues/v_message.php");
					// Affichage des information du compte
					include ("vues/v_compte.php");
				}
				else
				{
					// Affichage du message d'erreur
					$msgErreurs[] = "L'enregistrement à echoué, veuillez réessayer";
					include ("vues/v_erreurs.php");
					// Affichage des information du compte
					include ("vues/v_compte.php");
				}
			}
		}
		else
		{
			header("Location:index.php");
		}
		break;
	}

	// Déconnexion
	case 'deconnexion' :
	{
		if (isset($_COOKIE[session_name()]))
		{
			setcookie(session_name(), '', time() - 3600, '/');
		}
		session_destroy();
		header("Location:index.php");
		break;
	}

	default :
	{
		header("Location:index.php");
	}
}
?>