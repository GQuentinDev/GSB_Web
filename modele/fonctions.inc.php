<?php

/**
 * Retourne un tableau d'erreurs de saisie pour une connexion
 * @param String $login chaîne
 * @param String $mdp chaîne
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
 * @param date $RAP_DATEVISITE
 * @param int $PRA_NUM
 * @param boolean $PRA_REMPLACANT
 * @param int $PRA_NUM_REMPLACANT
 * @param String $RAP_BILAN chaîne
 * @param String $MOT_CODE chaîne
 * @param String $MOT_AUTRE chaîne
 * @param int $MED_PRESENTE1
 * @return array $lesErreurs un tableau de chaînes d'erreurs
 */
function getErreurSaisieRapport($RAP_DATEVISITE, $PRA_NUM, $PRA_REMPLACANT, $PRA_NUM_REMPLACANT, $RAP_BILAN, $MOT_CODE, $MOT_AUTRE, $MED_PRESENTE1)
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
 * @param String $champ
 * @param String $mot
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
 * Retourne un tableau d'erreurs de saisie pour les coordonnées
 * @param String $NOM
 * @param String $PRENOM
 * @param String $ADRESSE
 * @param String $CP
 * @param String $VILLE
 * @return array $lesErreurs un tableau de chaînes d'erreurs
 */
function getErreurSaisieCoordonnees($NOM, $PRENOM, $ADRESSE, $CP, $VILLE)
{
	$lesErreurs = array();
	if (empty($NOM))
	{
		$lesErreurs[] = "Vous devez saisir votre nom";
	}
	if (empty($PRENOM))
	{
		$lesErreurs[] = "Vous devez saisir votre prénom";
	}
	if (empty($ADRESSE))
	{
		$lesErreurs[] = "Vous devez saisir votre adresse";
	}
	if (empty($CP))
	{
		$lesErreurs[] = "Vous devez saisir votre code postal";
	}
	if (empty($VILLE))
	{
		$lesErreurs[] = "Vous devez saisir votre ville";
	}
	return $lesErreurs;
}

/**
 * Retourne un tableau d'erreur de saisie pour un mot de passe
 * @param String $OLD_PASS
 * @param String $NEW_PASS
 * @param String $NEW_PASS_CONFIRM
 * @return array $lesErreurs un tableau de chaînes d'erreurs
 */
function getErreurSaisiePassword($OLD_PASS, $NEW_PASS, $NEW_PASS_CONFIRM)
{
	$lesErreurs = array();
	if (empty($OLD_PASS))
	{
		$lesErreurs[] = "Vous devez saisir votre mot de passe";
	}
	if (empty($NEW_PASS))
	{
		$lesErreurs[] = "Vous devez saisir votre un nouveau mot de passe";
	}
	if (empty($NEW_PASS_CONFIRM))
	{
		$lesErreurs[] = "Vous devez confirmer le nouveau mot de passe";
	}
	return $lesErreurs;
}

?>