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


function ajoutLigne(pNumero) { 
	//masque le bouton en cours
	document.getElementById("but"+pNumero).setAttribute("hidden","true");
	//incrémente le numéro de ligne	
	pNumero++;

	var laDiv = document.getElementById("lignes");

	//div produit
	var col9 = document.createElement("div");
	col9.setAttribute("class", "col-9");
	laDiv.appendChild(col9);

	var formgroupCOL9 = document.createElement("div");
	formgroupCOL9.setAttribute("class", "form-group");
	col9.appendChild(formgroupCOL9);

	var liste = document.createElement("select");	
	liste.setAttribute("name", "PRA_ECH"+pNumero);
	liste.setAttribute("class", "form-control");
	formgroupCOL9.appendChild(liste);

	//div quantité
	var col3 = document.createElement("div");
	col3.setAttribute("class", "col-3");
	laDiv.appendChild(col3);

	var formgroupCOL3 = document.createElement("div");
	formgroupCOL3.setAttribute("class", "form-group");
	col3.appendChild(formgroupCOL3);

	liste.innerHTML = saisieRapport.elements["PRA_ECH1"].innerHTML;
	var qte = document.createElement("input");
	qte.setAttribute("name", "PRA_QTE"+pNumero);
	qte.setAttribute("size", "2"); 
	qte.setAttribute("class", "form-control");
	qte.setAttribute("type", "number");
	qte.setAttribute("min", "1");
	qte.setAttribute("max", "10");
	formgroupCOL3.appendChild(qte);

	var laDiv2 = document.getElementById("lignes2");

	//div ajouter
	var formgroupAJ = document.createElement("div");
	formgroupAJ.setAttribute("class", "form-group");
	laDiv2.appendChild(formgroupAJ);

	var bouton = document.createElement("input");
	bouton.setAttribute("onClick", "ajoutLigne("+pNumero+");");
	bouton.setAttribute("type", "button");
	bouton.setAttribute("value", "+");
	bouton.setAttribute("class", "form-control");	
	bouton.setAttribute("id", "but"+pNumero);
	formgroupAJ.appendChild(bouton);
}