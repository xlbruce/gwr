function setActive(s) {
	var elements = ["home", "html", "php", "duvidas", "forum"];
	for(i = 0; i < elements.length; i++) {		
		document.getElementById(elements[i]).style.backgroundColor = 'white';
	}
	document.getElementById(s).style.backgroundColor = 'DFD6AE';
}
function abre(pagina1,pagina2) {


window.open(pagina1,'painel_principal','')

window.open(pagina2,'painel_sec','')

}	