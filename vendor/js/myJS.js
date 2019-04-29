function selectionne(pValeur, pSelection, pObjet) {
	if (pSelection == pValeur) 
	{
		saisieRapport.elements[pObjet].disabled = false; 
	}
	
	else 
	{
		saisieRapport.elements[pObjet].disabled = true; 
	}
}