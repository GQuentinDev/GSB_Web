<?php
session_start();

// Gestion des erreurs
require_once("modele/fonctions.inc.php");
// Lien a la base de donnée
require_once("modele/class.pdoGsb.inc.php");

// Affichage de l'entête
include("vues/v_header.php");

// Verification du paramètre controleur uc
if(!isset($_REQUEST['uc']))
	$uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

// Déclaration du pdo
$pdo = PdoGsb::getPdoGsb();

switch($uc)
{
	// Accueil du site
	case 'accueil':
	{
		if (isset($_SESSION['id']) && !empty(($_SESSION['id'])))
		{
			// Affichage de l'aide
			include("vues/v_aide.php");
		}
		else
		{
			// Redirection à la connexion
			header("Location:index.php?uc=compte&ac=connexion");
		}
		break;
	}

	// Controleur de gestion des fonctions utilisateurs
	case 'compte' :
	{
		include("controleurs/c_gestionUtilisateurs.php");
		break;
	}

	// Controleur de gestion des fonctions liées comptes rendus
	case 'compteRendu' :
	{
		include("controleurs/c_gestionComptesRendus.php");
		break;
	}

	// Controleur de gestion des fonctions de consultation
	case 'consultations' :
	{
		include("controleurs/c_gestionConsultations.php");
		break;
	}
}

// Affichage du pied de page
include("vues/v_footer.php") ;
?>
