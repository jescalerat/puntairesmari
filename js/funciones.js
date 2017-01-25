//Deshabilitar boton derecho
var message="Boton derecho deshabilitado."; 
function click(e) {
	if (document.all) {
		if (event.button == 2) {
		alert(message);
		return false;
		}
	}
	if (document.layers) {
		if (e.which == 3) {
		alert(message);
		return false;
		}
	}
}
if (document.layers) {
	document.captureEvents(Event.MOUSEDOWN);
}
document.onmousedown=click;


var texto_estado = "                          Hospi Tauro"
var posicion = 0
   
//funcion para mover el texto de la barra de estado
function mueve_texto(){
	if (posicion < texto_estado.length) 
         posicion ++;
    else
         posicion = 1;
    string_actual = texto_estado.substring(posicion) + texto_estado.substring(0,posicion)
    window.status = string_actual
    setTimeout("mueve_texto()",50)
}
mueve_texto()


function mueveReloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    str_segundo = new String (segundo)
    if (str_segundo.length == 1)
       segundo = "0" + segundo

    str_minuto = new String (minuto)
    if (str_minuto.length == 1)
       minuto = "0" + minuto

    str_hora = new String (hora)
    if (str_hora.length == 1)
       hora = "0" + hora

    horaImprimible = hora + " : " + minuto + " : " + segundo

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()",1000)
}

function cargarPagina(pagina){
	llamada_prototype('paginas/reloj.php','reloj');
	llamada_prototype('paginas/cambioidioma.php','cambioidioma');
	if (pagina==1)
	{
		llamada_prototype('paginas/principal.php','principal');
	}
	else if (pagina==2)
	{
		llamada_prototype('paginas/calendario.php','principal');
	}
	else if(pagina==3)
	{
		llamada_prototype('paginas/fiestas.php','principal');
	}
	else if(pagina==4)
	{
		llamada_prototype('paginas/programa.php','ContTabul');
	}
	else if(pagina==5)
	{
		llamada_prototype('paginas/fotos.php','ContTabul');
	}
	else if(pagina==7)
	{
		llamada_prototype('paginas/paginas_amigas.php','principal');
	}
	else if(pagina==9)
	{
		llamada_prototype('paginas/contactar.php','principal');
	}
}

function cargarPresentacion(menu)
{
 	var href=document.URL;
  var URLBasica = href.split("/");
  var href = URLBasica[0]+"//"+URLBasica[2]+"/"+URLBasica[3]+"/paginas/presentacion.php?menu="+menu;
	GB_showCenter('Presentacion', href, 340, 300);
}

function cargarPresentacion2()
{
	var href=document.URL;
  var URLBasica = href.split("/");
  var URL = URLBasica[0]+"//"+URLBasica[2]+"/"+URLBasica[3]+"/paginas/presentacion2.php";
  location.href=URL;
	parent.GB.height = 480;
	parent.GB.width = 600;
	parent.GB.setFrameSize();
	parent.GB.setWindowPosition();
}

function salirWeb()
{
 	parent.parent.location.href = "salir_web.php";
}

function salir()
{
 	parent.parent.location.href = "http://www.google.es";
 	parent.parent.GB_hide();
}

function inicio()
{
	parent.parent.GB_hide();
}

function presentacion2Cargada()
{
	//Esperar 10 segundos para mostrar la pagina de inicio	
	setTimeout("inicio()",10000);
}

function combo_comunidades()
{
	var objeto = document.getElementById("op_comunidad");
	objeto.options.length=0;
	objeto.options[0] = new Option('                 ', 0, true, true);
	for(var i=1; i<comunidades.length + 1; i++)
	{
		objeto.options[i] = new Option(comunidades[i-1].desc, comunidades[i-1].id, false, false);
	}
	combo_provincias();
}

function combo_provincias()
{
	var combon1 = document.getElementById("op_comunidad");
	var objeto = document.getElementById("op_provincia");
	var index = combon1.selectedIndex;
	objeto.options.length=0;
	if(index != 0)
	{
		if(provincias[index-1].length > 1)
		{
			objeto.options[0] = new Option('                 ', 0, true, true);
			for(var i = 1; i < provincias[index-1].length + 1; i++)
			{
				objeto.options[i] = new Option(provincias[index-1][i-1].desc, provincias[index-1][i-1].id, false, false);
			}
		}
		else
		{
			objeto.options[0] = new Option(provincias[index-1][0].desc, provincias[index-1][0].id, false, false);
		}
	}
	else objeto.options[0] = new Option('                 ', 0, false, false);
}

function cambio_foto(pagina,foto,cursor,idioma)
{
	var idfiesta = document.getElementById("IdFiesta");
	var tipofoto1 = document.getElementById("TipoFotoN1");
	var tipofoto2 = document.getElementById("TipoFotoN2");
	var parametros='';
	if (cursor!=0)
	{
		parametros='?cursor='+cursor+'&pagina='+pagina+'&IdFiesta='+idfiesta.value+'&IdTipoFotoN1='+tipofoto1.value+'&IdTipoFotoN2='+tipofoto2.value;
	}
	else
	{
		parametros='?pagina='+pagina+'&IdFiesta='+idfiesta.value+'&IdTipoFotoN1='+tipofoto1.value+'&IdTipoFotoN2='+tipofoto2.value;
	}
	
	llamada_prototype('../includes/inc_pasarela.php'+parametros,'pasarela');
	llamada_prototype('../includes/inc_foto_principal.php?IdFoto='+foto+'&IdFiesta='+idfiesta.value+'&IdTipoFotoN1='+tipofoto1.value+'&IdTipoFotoN2='+tipofoto2.value,'fotoprincipal');

	animarboto(document.getElementById("anchorcerrar"), document.getElementById("btncerrar"), 'cerrar', 0, idioma);
	animarboto(document.getElementById("anchor800"), document.getElementById("btn800"), '800x600', 0, idioma);
	animarboto(document.getElementById("anchor1280"), document.getElementById("btn1280"), '1280x1024', 0, idioma);	
}

function llamada_prototype(URL,objetoDIV,metodo)
{
	if (metodo == 1)
	{
		var pars = Form.serialize('contactar');
		var myAjax = new Ajax.Updater(objetoDIV, URL, {asynchronous:true, method:'post', parameters:pars }); 
	}
	else
	{
			new Ajax.Updater(objetoDIV, URL);
	}
}

function centrarpopup(url, name, w, h)
{
	url += "&Idfoto="+document.getElementById("IdFoto").value;
	if (name=='')name='ventana'
  // Fudge factors for window decoration space.
  // In my tests these work well on all platforms & browsers.
  w += 32;
  h += 96;
  wleft = (screen.width - w) / 2;
  wtop = (screen.height - h) / 2;
  // IE5 and other old browsers might allow a window that is
  // partially offscreen or wider than the screen. Fix that.
  // (Newer browsers fix this for us, but let's be thorough.)
  if (wleft < 0) {
    w = screen.width;
    wleft = 0;
  }
  if (wtop < 0) {
    h = screen.height;
    wtop = 0;
  }
  
  var win = window.open(url,
    name,'width=' + w + ', height=' + h + ', ' +
    'left=' + wleft + ', top=' + wtop + ', ' +
    'location=no, menubar=no, ' +
    'status=no, toolbar=no, scrollbars=no, resizable=no');
  // Just in case width and height are ignored
  win.resizeTo(w, h);
  // Just in case left and top are ignored
  win.moveTo(wleft, wtop);
  win.focus();
}

/*--------------------------------------------------------------------------------------------------------------*/
/*Pestañas*/
function CambiarEstilo(id) {
	var elementosMenu = getElementsByClassName(document, "li", "activo");
	for (k = 0; k< elementosMenu.length; k++) {
	elementosMenu[k].className = "inactivo";
	}
	var identity=document.getElementById(id);
	identity.className="activo";
}

/*
    function getElementsByClassName
    Written by Jonathan Snook, http://www.snook.ca/jonathan
    Add-ons by Robert Nyman, http://www.robertnyman.com
*/

function getElementsByClassName(oElm, strTagName, strClassName){
    var arrElements = (strTagName == "*" && document.all)? document.all : oElm.getElementsByTagName(strTagName);
    var arrReturnElements = new Array();
    strClassName = strClassName.replace(/\-/g, "\\-");
    var oRegExp = new RegExp("(^|\\s)" + strClassName + "(\\s|$)");
    var oElement;
    for(var i=0; i<arrElements.length; i++){
        oElement = arrElements[i];      
        if(oRegExp.test(oElement.className)){
            arrReturnElements.push(oElement);
        }   
    }
    return (arrReturnElements)
}
/*Fin de pestañas*/
/*--------------------------------------------------------------------------------------------------------------*/

/*Validación formulario de contacto*/
function validar(ok) {
	if (ok==1)
	{
		var salida=true;
		var nombreerror = document.getElementById("nombreerror");
		var emailerror = document.getElementById("emailerror");
		var mensajeerror = document.getElementById("mensajeerror");
		nombreerror.value="";
		emailerror.value="";
		mensajeerror.value="";
		var nombre=document.getElementById("nombre");
		var email=document.getElementById("email");
		var mensaje=document.getElementById("mensaje");	
		var tipoerror1=document.getElementById("tipoerror1").value;
		var tipoerror2=document.getElementById("tipoerror2").value;
		var tipoerror3=document.getElementById("tipoerror3").value;
		if (mensaje.value.length == 0) {
			mensajeerror.value=tipoerror3;
			mensaje.focus();
			salida=false;
		}
		if (email.value.length == 0) {
		  emailerror.value=tipoerror2;
		  email.focus();
			salida=false;
		}
		if (nombre.value.length == 0) {
			nombreerror.value=tipoerror1;
		  nombre.focus();
			salida=false;
		}
		return (salida);
	}
}

function cargarCambioIdioma(idioma)
{
	var pagina = document.getElementById("paginaactual").value;
	//Esperar 3 segundos para cambiar de idioma
	setTimeout("cambioidioma()", 3000);
	
	var cambiandoidioma = document.getElementById("cambiandoIdioma").value;

 	var href=document.URL;
  var URLBasica = href.split("/");
  var href = URLBasica[0]+"//"+URLBasica[2]+"/"+URLBasica[3]+"/includes/inc_cambio_idioma.php?idioma="+idioma;
	return GB_showCenter(cambiandoidioma, href, 120, 300);
}

function cambioidioma()
{
	parent.parent.GB_hide();
	var direccion=document.URL;
  var URLBasica = direccion.split("/");
  if (URLBasica[3]=="#")var direccion = URLBasica[0]+"//"+URLBasica[2];
  else var direccion = URLBasica[0]+"//"+URLBasica[2]+"/"+URLBasica[3];
	parent.parent.location.href=direccion;
}

/******************************************************************************************************************/
//Buscador Fiestas (Comunidades -> Provincias -> Municipios)
// Declaro los selects que componen el documento HTML. Su atributo ID debe figurar aqui.
var listadoSelects=new Array();
listadoSelects[0]="op_paises";
listadoSelects[1]="op_comunidades";
listadoSelects[2]="op_provincias";
listadoSelects[3]="op_municipios";

var listadoOpcionesCombo=new Array();
listadoOpcionesCombo[0]="paisesString";
listadoOpcionesCombo[1]="comunidadesString";
listadoOpcionesCombo[2]="provinciasString";
listadoOpcionesCombo[3]="municipiosString";

function buscarEnArray(array, dato)
{
	// Retorna el indice de la posicion donde se encuentra el elemento en el array o null si no se encuentra
	var x=0;
	while(array[x])
	{
		if(array[x]==dato) return x;
		x++;
	}
	return null;
}

function gestionCargaDatos(idSelectOrigen,admin)
{
	var destino="";
	if (admin==1)destino="../includes/inc_dependientes_proceso.php";
	else destino="includes/inc_dependientes_proceso.php";
	
	cargaDatos(idSelectOrigen,destino);	
}

function cargaDatos(idSelectOrigen,destino)
{
	//Obtengo el año de busqueda
	if (document.getElementById("anyobuscador")!=null){
		var anyoBuscar=document.getElementById("anyobuscador").value;
		var inicio=anyoBuscar.indexOf("ano=");
		var anyoBusqueda=anyoBuscar.substring(inicio+4,inicio+8);
	}
	
	// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
	var posicionSelectDestino=buscarEnArray(listadoSelects, idSelectOrigen)+1;
	// Obtengo el select que el usuario modifico
	var selectOrigen=document.getElementById(idSelectOrigen);
	// Obtengo la opcion que el usuario selecciono
	var opcionSeleccionada=selectOrigen.options[selectOrigen.selectedIndex].value;
	// Si el usuario eligio la opcion "Elige", no voy al servidor y pongo los selects siguientes en estado "Selecciona opcion..."

	//Si selecciono un nuevo pais deshabilito los municipios y las provincias
	if(idSelectOrigen=="op_paises")
	{
		selectActual=document.getElementById(listadoSelects[3]);
		selectActual.length=0;
		var opcioncombo=document.getElementById("municipiosString");
		var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML=opcioncombo.value;
		selectActual.appendChild(nuevaOpcion);	selectActual.disabled=true;
		
		selectActual=document.getElementById(listadoSelects[2]);
		selectActual.length=0;
		var opcioncombo=document.getElementById("provinciasString");
		var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML=opcioncombo.value;
		selectActual.appendChild(nuevaOpcion);	selectActual.disabled=true;
	}
	
	//Si selecciono una nueva comunidad deshabilito los municipios
	if(idSelectOrigen=="op_comunidades")
	{
		selectActual=document.getElementById(listadoSelects[3]);
		selectActual.length=0;
		var opcioncombo=document.getElementById("municipiosString");
		var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML=opcioncombo.value;
		selectActual.appendChild(nuevaOpcion);	selectActual.disabled=true;
	}
	
	if(opcionSeleccionada==0)
	{
		var x=posicionSelectDestino, selectActual=null;
		// Busco todos los selects siguientes al que inicio el evento onChange y les cambio el estado y deshabilito
		while(listadoSelects[x])
		{
			selectActual=document.getElementById(listadoSelects[x]);
			selectActual.length=0;
			var opcioncombo=document.getElementById(listadoOpcionesCombo[x]);
			var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML=opcioncombo.value;
			selectActual.appendChild(nuevaOpcion);	selectActual.disabled=true;
			x++;
		}
	}
	// Compruebo que el select modificado no sea el ultimo de la cadena
	else if(idSelectOrigen!=listadoSelects[listadoSelects.length-1])
	{
		// Obtengo el elemento del select que debo cargar
		var idSelectDestino=listadoSelects[posicionSelectDestino];
		var selectDestino=document.getElementById(idSelectDestino);
		llamada_prototype('includes/inc_calendario.php?opcion='+opcionSeleccionada+'&ano='+anyoBusqueda,'calendario');
		// Creo el nuevo objeto AJAX y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
		var ajax=objeto_ajax();
		//ajax.open("GET", "includes/inc_dependientes_proceso.php?select="+idSelectDestino+"&opcion="+opcionSeleccionada, true);
		ajax.open("GET", destino+"?select="+idSelectDestino+"&opcion="+opcionSeleccionada, true);
		ajax.onreadystatechange=function() 
		{ 
			if (ajax.readyState==1)
			{
				// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
				selectDestino.length=0;
				var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
				selectDestino.appendChild(nuevaOpcion); selectDestino.disabled=true;	
			}
			if (ajax.readyState==4)
			{
				selectDestino.parentNode.innerHTML=ajax.responseText;
			} 
		}
		ajax.send(null);
	}
	// Compruebo que el select modificado sea el ultimo de la cadena
	else if(idSelectOrigen==listadoSelects[listadoSelects.length-1])
	{
		llamada_prototype('includes/inc_calendario.php?opcion='+opcionSeleccionada+'&ano='+anyoBusqueda,'calendario');
	}
}
//Buscador Fiestas (Comunidades -> Provincias -> Municipios)
/******************************************************************************************************************/

/******************************************************************************************************************/
//TiposFotos (TiposFotosN1 -> TiposFotosN2)
// Declaro los selects que componen el documento HTML. Su atributo ID debe figurar aqui.
var listadoSelectsFotos=new Array();
listadoSelectsFotos[0]="op_tipofoton1";
listadoSelectsFotos[1]="op_tipofoton2";

function cargaDatosFotos(idSelectOrigen,foto)
{
	// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba
	var posicionSelectDestino=buscarEnArray(listadoSelectsFotos, idSelectOrigen)+1;
	// Obtengo el select que el usuario modifico
	var selectOrigen=document.getElementById(idSelectOrigen);
	// Obtengo la opcion que el usuario selecciono
	var opcionSeleccionada=selectOrigen.options[selectOrigen.selectedIndex].value;
	// Si el usuario eligio la opcion "Elige", no voy al servidor y pongo los selects siguientes en estado "Selecciona opcion..."

	if(opcionSeleccionada==0)
	{
		var x=posicionSelectDestino, selectActual=null;
		// Busco todos los selects siguientes al que inicio el evento onChange y les cambio el estado y deshabilito
		while(listadoSelects[x])
		{
			selectActual=document.getElementById(listadoSelectsFotos[x]);
			selectActual.length=0;
			var opcioncombo=document.getElementById("op_tipofoton2"+foto);
			var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML=opcioncombo.value;
			selectActual.appendChild(nuevaOpcion);	selectActual.disabled=true;
			x++;
		}
	}
	// Compruebo que el select modificado no sea el ultimo de la cadena
	else if(idSelectOrigen!=listadoSelectsFotos[listadoSelects.length-1])
	{
		var idSelectDestino=listadoSelectsFotos[posicionSelectDestino];
		idSelectDestino=idSelectDestino+foto;
		// Obtengo el elemento del select que debo cargar
		var selectDestino=document.getElementById("op_tipofoton2"+foto);
		// Creo el nuevo objeto AJAX y envio al servidor el ID del select a cargar y la opcion seleccionada del select origen
		var ajax=objeto_ajax();
		ajax.open("GET", "../includes/inc_dependientes_proceso_fotos.php?select="+idSelectDestino+"&opcion="+opcionSeleccionada, true);
		//ajax.open("GET", "gestionar_fotos.php?select="+selectDestino+"&opcion="+opcionSeleccionada, true);
		ajax.onreadystatechange=function() 
		{ 
			if (ajax.readyState==1)
			{
				// Mientras carga elimino la opcion "Selecciona Opcion..." y pongo una que dice "Cargando..."
				selectDestino.length=0;
				var nuevaOpcion=document.createElement("option"); nuevaOpcion.value=0; nuevaOpcion.innerHTML="Cargando...";
				selectDestino.appendChild(nuevaOpcion); selectDestino.disabled=true;	
			}
			if (ajax.readyState==4)
			{
				selectDestino.parentNode.innerHTML=ajax.responseText;
			} 
		}
		ajax.send(null);
	}
}
//Buscador Fiestas (Comunidades -> Provincias -> Municipios)
/******************************************************************************************************************/

function busquedaFotos(IdFiesta)
{
	llamada_prototype('paginas/fiestas.php?busquedafotovideo=1&idfiesta='+IdFiesta,'principal');
	sleep(1000);
	llamada_prototype('paginas/fotos.php?idfiesta='+IdFiesta,'ContTabul');
}

function busquedaVideos(IdFiesta)
{
	llamada_prototype('paginas/fiestas.php?busquedafotovideo=2&idfiesta='+IdFiesta,'principal');
	sleep(1000);
	llamada_prototype('paginas/videos.php?idfiesta='+IdFiesta,'ContTabul');
}

//http://monjes.org/desarrollo-web/5396-funcion-sleep-en-javascript.html
function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}