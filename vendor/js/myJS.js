function selectionne(pValeur, pSelection, pObjet) {
	if (pSelection == pValeur) {
		saisieRapport.elements[pObjet].disabled = false; 
	}
	else {
		saisieRapport.elements[pObjet].disabled = true; 
	}
}

function confirmation(message) {
	var result = false;
	if (window.confirm(message) == true)
	{
		result = true;
	}
	return result;
}

function redirect(uc, ac, extra) {
	window.location.href='index.php?uc='+uc+'&ac='+ac+extra;
}

function modifier() {
	var btn_Modifier = document.getElementById('modif_info1');
	var btn_Annuler = document.getElementById('modif_info2');
	var btn_Valider = document.getElementById('modif_info3');

	btn_Modifier.style.display = "none";
	btn_Annuler.style.display = "";
	btn_Valider.style.display = "";

	var champ1 = document.getElementById('modif1');
	var champ2 = document.getElementById('modif2');
	var champ3 = document.getElementById('modif3');
	var champ4 = document.getElementById('modif4');
	var champ5 = document.getElementById('modif5');

	champ1.disabled = false;
	champ2.disabled = false;
	champ3.disabled = false;
	champ4.disabled = false;
	champ5.disabled = false;
}

function verifForm() {
	var form = document.forms['saisieRapport'];
	var prod1 = form.elements['PROD1'].value;
	var pra_ech1 = form.elements['PRA_ECH1'].value;
	var erreurs = "";

	if (prod1.length <= 0) {
		erreurs+= "medicament";
	}

	if (pra_ech1.length <= 0) {
		if (erreurs.length > 0) {
			erreurs+= " ni ";
		}
		erreurs+= "echantillon";
	}

	if (erreurs.length > 0) {
		erreurs+= ".";
	}

	if (erreurs.length > 0) {
		if (confirmation('Vous n\'avez selectionné aucun '+erreurs+'\n\nVoulez-vous vraiment enregistrer ?') == false) {
			return false;
		}
	}
}