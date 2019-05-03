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