//Variable global
var ajax=null;

function objeto_ajax()
{
	var xmlhttp=false;
	try {xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");}
	catch (e)
	{
		try {xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
		catch (E) {xmlhttp = false;}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {xmlhttp = new XMLHttpRequest();}
	return xmlhttp;
}
function peticion_ajax_asincrona(URL, objetoDIV)
{
	if (ajax==null) {
		ajax = objeto_ajax();
		ajax.open("GET", URL);
		ajax.onreadystatechange = function()
		{
			var detalles = document.getElementById(objetoDIV);
			if (ajax.readyState == 4)
			{
				detalles.innerHTML = ajax.responseText;
				ajax=null
			}else {
				detalles.innerHTML = '<img src="../imagenes/greybox/indicator.gif" align="middle" /> Cargando...';
			}
		}
		ajax.send(null)
	}
	else{
		setTimeout("peticion_ajax_asincrona('"+URL+"','"+objetoDIV+"')",10)
	}
}