function animarboto(anchor, boto, tipus, inicio, idioma)
{
	var ruta = '';
	var rutaidioma = '';
	if (idioma==1){rutaidioma = 'es/';}
	else if (idioma==2){rutaidioma = 'en/';}
	else if (idioma==3){rutaidioma = 'ca/';}
	if (inicio!=0) {ruta = 'imagenes/botones/'+rutaidioma;}
	else  {ruta = '../imagenes/botones/'+rutaidioma;}
	anchor.onmouseover=function() {boto.src=ruta+tipus+"-1.gif"};
	anchor.onmouseout=function() {boto.src=ruta+tipus+"-0.gif"};
	anchor.onmousedown=function() {boto.src=ruta+tipus+"-2.gif"};
	anchor.onmouseup=function() {boto.src=ruta+tipus+"-1.gif"};
	boto.src=ruta+tipus+"-0.gif"
}
function camp_numeric(e) 
{
	opc = false;
	tecla = (document.all) ? e.keyCode : e.which;

	if (tecla == 8 || tecla == 13)
	{
		//8 tecla de borrar
		//13 tecla de intro
		opc = true;
		if (tecla == 13)
		{
			var foto = document.getElementById("buscar");
			irA (foto.value);
		}
	}
	else if(tecla < 48 || tecla > 58)
	{
	 		opc = false;
	}
	else
	{
		var obj_maximo = document.getElementById("maximo");
		var obj_buscar = document.getElementById("buscar");
		var dato = 0;
		if(tecla==48)dato=0;
		else if(tecla==49)dato=1;
		else if(tecla==50)dato=2;
		else if(tecla==51)dato=3;
		else if(tecla==52)dato=4;
		else if(tecla==53)dato=5;
		else if(tecla==54)dato=6;
		else if(tecla==55)dato=7;
		else if(tecla==56)dato=8;
		else if(tecla==57)dato=9;
		
		var numero_buscar = obj_buscar.value+dato;
		if (numero_buscar>parseInt(obj_maximo.value))
		{
			opc = false;
			alert ("Foto no encontrada");
		}
		else
		{
			opc = true;
		}
	}
	return opc;
}
function anterior(actual)
{
	var anteriorfoto = fotoslist[actual-1];
	var posicion = actual-1;
	if (actual==0)
	{
		anteriorfoto = fotoslist[fotoslist.length-1];
		posicion = fotoslist.length-1;
	}
	var URL="galeria.php?id_foto="+anteriorfoto+"&posicion="+posicion;
	location.href=URL;
}
function siguiente(actual)
{
	var siguientefoto = fotoslist[actual+1];
	var posicion = actual+1;
	if (actual+1>=fotoslist.length)
	{
		siguientefoto = fotoslist[0];
		posicion = 0;
	}
	var URL="galeria.php?id_foto="+siguientefoto+"&posicion="+posicion;
	location.href=URL;
}
function irA(actual)
{
	var siguientefoto = fotoslist[actual-1];
	var posicion = actual-1;
	
	var URL="galeria.php?id_foto="+siguientefoto+"&posicion="+posicion;
	location.href=URL;
}
