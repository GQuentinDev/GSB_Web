<?php

/**
* Retourne un tableau d'erreurs de saisie pour une connexion
*
* @param string $login chaîne
* @param string $mdp chaîne
* @return array $lesErreurs un tableau de chaînes d'erreurs
*/
function getErreursConnexion($login, $mdp)
{
	$lesErreurs = array();
	if (empty($login))
	{
		$lesErreurs[] = "Vous devez indiquer votre login";
	}
	if (empty($mdp))
	{
		$lesErreurs[] = "Vous devez indiquer un mot de passe";
	}
	return $lesErreurs;
}

/**
* Retourne un tableau d'erreurs de saisie pour une saisie de rapport
*
* @param date $RAP_DATEVISITE
* @param int $PRA_NUM
* @param int $PRA_COEFF
* @param boolean $PRA_REMPLACANT
* @param int $PRA_NUM_REMPLACANT
* @param string $RAP_BILAN chaîne
* @param string $MOT_CODE chaîne
* @param string $MOT_AUTRE chaîne
* @param int $MED_PRESENTE1
* @return array $lesErreurs un tableau de chaînes d'erreurs
*/
function getErreurSaisieRapport($RAP_DATEVISITE, $PRA_NUM, $PRA_COEFF, $PRA_REMPLACANT, $PRA_NUM_REMPLACANT, $RAP_BILAN, $MOT_CODE, $MOT_AUTRE, $MED_PRESENTE1)
{
	$lesErreurs = array();
	if (empty($RAP_DATEVISITE))
	{
		$lesErreurs[] = "Vous devez indiquer la date visite";
	}
	if (empty($PRA_NUM))
	{
		$lesErreurs[] = "Vous devez sélectionner le praticien";
	}
	if (empty($PRA_COEFF))
	{
		$lesErreurs[] = "Vous devez indiquer le coefficient de confiance";
	}
	if ($PRA_REMPLACANT == true && empty($PRA_NUM_REMPLACANT))
	{
		$lesErreurs[] = "Vous devez sélectionner le remplacant";
	}
	if (empty($MOT_CODE))
	{
		$lesErreurs[] = "Vous devez sélectionner le motif ";
	}
	if ($MOT_CODE == "AUT" && empty($MOT_AUTRE))
	{
		$lesErreurs[] = "Vous devez indiquer le motif ";
	}
	if (empty($RAP_BILAN))
	{
		$lesErreurs[] = "Vous devez saisir le bilan";
	}
	if (empty($MED_PRESENTE1))
	{
		$lesErreurs[] = "Vous devez sélectionner le produit 1";
	}
	return $lesErreurs;
}

/**
* Retourne un tableau d'erreurs de saisie pour une quantité
*
* @param int $OFF_QTE
* @return array $lesErreurs un tableau de chaînes d'erreurs
*/
function getErreurSaisieQuantite($OFF_QTE)
{
	$lesErreurs = array();
	if (empty($OFF_QTE) || $OFF_QTE <= 0)
	{
		$lesErreurs[] = "Vous devez indiquer la quantité de d'échantillon (entier non null)";
	}
	return $lesErreurs;
}

/**
* Retourne un tableau d'erreurs de saisie pour une selection
*
* @param string $champ
* @param string $mot
* @return array $lesErreurs un tableau de chaînes d'erreurs
*/
function getErreurSelection($champ, $mot)
{
	$lesErreurs = array();
	if (empty($champ))
	{
		$lesErreurs[] = "Vous devez sélectionner un ".$mot;
	}
	return $lesErreurs;
}

/**
* Retourne un tableau d'erreurs de saisie pour une periode
*
* @param date $RAP_DATE1
* @param date $RAP_DATE2
* @return array $lesErreurs un tableau de chaînes d'erreurs
*/
function getErreurRechercheRapport($RAP_DATE1, $RAP_DATE2)
{
	$lesErreurs = array();
	if (empty($RAP_DATE1) || empty($RAP_DATE2))
	{
		$lesErreurs[] = "Vous devez indiquer une période";
	}
	if (!empty($RAP_DATE1) && !empty($RAP_DATE2) && $RAP_DATE2 <= $RAP_DATE1)
	{
		$lesErreurs[] = "L'untervalle doit être correcte";	
	}
	return $lesErreurs;	
}

/**
* Transforme une date au format français jj/mm/aaaa vers le format anglais aaaa-mm-jj
*
* @param $date au format  jj/mm/aaaa
* @return string la date au format anglais aaaa-mm-jj
*/
function convertirDateFrancaisVersAnglais($date)
{
	@list($jour,$mois,$annee) = explode('/',$date);
	return date("Y-m-d", mktime(0, 0, 0, $mois, $jour, $annee));
}
?>