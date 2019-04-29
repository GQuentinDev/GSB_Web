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