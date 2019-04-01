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

switch($ac)
{	
	// Page de connexion
	case 'connexion' :
	{
		// Vérification de l'état de connexion
		if (isset($_SESSION['id'][0]) && !empty($_SESSION['id'][0]))
		{
			header('Location:index.php');
		}
		else
		{
			$login = "";
			// Affichage du formulaire de connexion
			include("vues/v_connexion.php");
		}
		break;
	}

	// Vérification et connexion
	case 'validerConnexion' :
	{
		// Vérification de l'état de connexion
		if (isset($_SESSION['id'][0]) && !empty($_SESSION['id'][0]))
		{
			header('Refresh: 0; URL=index.php');
		}
		else
		{
			// Vérification de l'existance du login
			if (isset($_REQUEST['login']))
				$login = $_REQUEST['login'];
			else
				$login = "";
			// Vérification de l'existance d'un mot de passe
			if (isset($_REQUEST['mdp']))
				$mdp = $_REQUEST['mdp'];
			else
				$mdp = "";

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
					header('Refresh: 0; URL=index.php');
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
		// Affichage des information du compte
		include ("vues/v_compte.php");
		break;
	}

	// Mise a jour des données et paramètres du compte
	case 'update' :
	{
		// Affichage des information du compte
		include ("vues/v_compte.php");
		break;
	}

	// Déconnexion
	case 'deconnexion' :
	{
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time() - 3600, '/');
		}
		session_destroy();
		header('Refresh: 0; URL=index.php');
		break;
	}

	default :
	{
		header("Location:index.php");
	}
}
?>