//Funcion menu
startList = function() {
mueveReloj();

}

//Deshabilitar boton derecho
/*var message="Boton derecho deshabilitado."; 
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
*/

var texto_estado = "                          Pagina dedicada al At. C. Hospitalense"
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


/*function mueveReloj(){
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
}*/

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

    if (document.layers){
			document.layers.liveclock.document.write(horaImprimible)
			document.layers.liveclock.document.close()
		}
		else if (document.all)
			liveclock.innerHTML=horaImprimible
		else if (document.getElementById)
			document.getElementById("liveclock").innerHTML=horaImprimible

    setTimeout("mueveReloj()",1000)
}

function cargarPagina(pagina){
	llamada_prototype('paginas/reloj.php','reloj');
	llamada_prototype('paginas/cambioidioma.php','cambioidioma');
	if (pagina==0)
	{
		llamada_prototype('paginas/principal.php','principal');
	}
	if (pagina==1)
	{
		llamada_prototype('paginas/club.php','principal');
	}
	else if (pagina==2)
	{
		llamada_prototype('paginas/resultados.php','principal');
	}
	else if(pagina==3)
	{
		llamada_prototype('paginas/clasificacion.php','principal');
	}
	else if(pagina==4)
	{
		llamada_prototype('paginas/equipos.php','principal');
	}
	else if(pagina==5)
	{
		llamada_prototype('paginas/contactar.php','principal');
	}
	else if(pagina==6)
	{
		llamada_prototype('paginas/campos.php','principal');
	}
	else if(pagina==7)
	{
		llamada_prototype('paginas/estadisticas.php','principal');
	}
	else if(pagina==8)
	{
		llamada_prototype('paginas/goleadores.php','principal');
	}
	else if(pagina==9)
	{
		llamada_prototype('paginas/mostrar_equipos.php','principal');
	}
	else if(pagina==10)
	{
		llamada_prototype('paginas/mostrar_campos.php','principal');
	}
	else if(pagina==11)
	{
		llamada_prototype('paginas/campus.php','principal');
	}
	else if(pagina==12)
	{
		llamada_prototype('paginas/torneo.php','principal');
	}
	else if(pagina==13)
	{
		llamada_prototype('paginas/paginas_amigas.php','principal');
	}
	else if(pagina==14)
	{
		llamada_prototype('paginas/historia.php','principal');
	}
	else if(pagina==15)
	{
		llamada_prototype('paginas/directiva.php','principal');
	}
	else if(pagina==16)
	{
		llamada_prototype('paginas/himno.php','principal');
	}
	else if(pagina==17)
	{
		llamada_prototype('paginas/socio.php','principal');
	}
	else if(pagina==18)
	{
		llamada_prototype('paginas/formularios.php','principal');
	}
	else if(pagina==19)
	{
		llamada_prototype('paginas/economia.php','principal');
	}
	else if(pagina==20)
	{
		llamada_prototype('paginas/plantillas.php','principal');
	}
	else if(pagina==21)
	{
		llamada_prototype('paginas/galeria.php','principal');
	}
	else if(pagina==22)
	{
		llamada_prototype('paginas/regimen_interno.php','principal');
	}
	else if(pagina==23)
	{
		llamada_prototype('paginas/estatuto.php','principal');
	}
	else if(pagina==24)
	{
		llamada_prototype('paginas/noticias.php','principal');
	}
	else if(pagina==25)
	{
		llamada_prototype('paginas/horarios.php','principal');
	}
}

/*Validaci�n formulario de contacto*/
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

function validarForo(ok) {
	if (ok==1)
	{
		errores.aliaserror.value="";
		errores.comentarioerror.value="";
		var salida=true;
		var alias=foro.alias.value;
		var comentario=foro.mensaje.value;
		if (comentario.length == 0) {
		    errores.comentarioerror.value="Falta el comentario";
		    foro.mensaje.focus();
			salida=false;
		}
		if (alias.length == 0) {
			errores.aliaserror.value="Falta el alias";
			foro.alias.focus();
			salida=false;
		}
		return (salida);
	}
}

function validarRegistro(ok) {
	if (ok==1)
	{
		registro.aliaserror.value="";
		registro.passworderror.value="";
		registro.emailerror.value="";
		registro.equipoerror.value="";
		var salida=true;
		var alias=registro.alias.value;
		var password=registro.password.value;
		var email=registro.email.value;
		var equipo=registro.equipo.value;

		if (equipo == 2000) {
		    registro.equipoerror.value=tipo_error.tipo_error4.value;
		    registro.equipo.focus();
			salida=false;
		}
		if (email.length == 0) {
		    registro.emailerror.value=tipo_error.tipo_error3.value;
		    registro.email.focus();
			salida=false;
		}
		if (password.length == 0) {
		    registro.passworderror.value=tipo_error.tipo_error2.value;
		    registro.password.focus();
			salida=false;
		}
		if (alias.length == 0) {
			registro.aliaserror.value=tipo_error.tipo_error1.value;
			registro.alias.focus();
			salida=false;
		}
		return (salida);
	}
}

function validarQuiniela(ok,formid) {
	if (ok==1)
	{
		var salida=true;
		var cont=0;
		var Formulario = document.getElementById(formid);
        var longitudFormulario = Formulario.elements.length;
        var cadenaFormulario = "";
        var sepCampos;
        sepCampos = "";
        for (var i=0; i <= Formulario.elements.length-1;i++)
		{
			if (encodeURI(Formulario.elements[i].checked)=="true")
			{
				cont++;
			}
		}

		if (cont!=9)
		{
			salida=false;
			quiniela.error.value=tipo_error.tipo_error1.value;
		}
		return (salida);
	}
}

function validarEncuesta(ok) {
	if (ok==1)
	{
		var salida=true;
		var j, cont=0;
		for (j=0;j<3;j++){
			if (encuesta.equipo[j].checked)
			{
				cont++;
			}
		} 
		if (cont==0){salida=false;}

		if (salida==false)
		{
			encuesta.error.value=tipo_error.tipo_error1.value;
		}
		return (salida);
	}
}

function llamada_ajax(URL,objetoDIV)
{
	var texto = '';
	if (document.getElementById("cargandotexto")!=null){
		texto = document.getElementById("cargandotexto").value;
	}
	
	ajax = new ActiveXObject("Microsoft.XMLHTTP");

	ajax.open("GET", URL, true);
	
	ajax.onreadystatechange = function()
	{
		var capa = document.getElementById(objetoDIV);
		
		if (ajax.readyState == 4)
		{
			capa.innerHTML = ajax.responseText;
		} else {
			if (capa != null)
			{
				//capa.innerHTML = '<img src="imagenes/loading.gif" align="middle" />' + texto;
			}
		}
	}
	ajax.send(null)
}



function llamada_prototype(URL,objetoDIV)
{
	//var objeto =  "#"+objetoDIV;
	//$(objeto).load(URL);
	llamada_prototype(URL,objetoDIV,1,'');
}

function llamada_prototype(URL,objetoDIV,tipo,formulario){
	var texto = '';
	if (document.getElementById("cargandotexto")!=null){
		texto = document.getElementById("cargandotexto").value;
	}

	if (tipo == 1){
        $.ajax({
                url:   URL,
                type:  'get',
                beforeSend: function () {
                        $("#"+objetoDIV).html("<img src='imagenes/loading.gif' align='middle' />"+texto);
                },
                success:  function (response) {
                        $("#"+objetoDIV).html(response);
                }
        });
	}
	else {
		$.ajax({
            data:  $("#"+formulario).serialize(), //datos que se envian a traves de ajax
            url:   URL, //archivo que recibe la peticion
            type:  'post', //método de envio
            beforeSend: function () {
                $("#"+objetoDIV).html("<img src='imagenes/loading.gif' align='middle' />"+texto);
            },
            success:  function (response) {
                    $("#"+objetoDIV).html(response);
            }
    });
	}
}


//-----------------------------------------------------------------------------------------------------------------
//Funciones necesarias externas
/* Compiled from X 4.09 with XC 1.02 on 10Feb07 */
function xAddClass(e,c){e=xGetElementById(e);if(!e)return false;if(!xHasClass(e,c))e.className+=' '+c;return true;};function xAddEventListener(e,eT,eL,cap){if(!(e=xGetElementById(e)))return;eT=eT.toLowerCase();if(e.addEventListener)e.addEventListener(eT,eL,cap||false);else if(e.attachEvent)e.attachEvent('on'+eT,eL);else e['on'+eT]=eL;}function xAddEventListener2(e,eT,eL,cap){if(!(e=xGetElementById(e)))return;eT=eT.toLowerCase();if(e==window&&!e.opera&&!document.all){if(eT=='resize'){e.xPCW=xClientWidth();e.xPCH=xClientHeight();e.xREL=eL;xResizeEvent();return;}if(eT=='scroll'){e.xPSL=xScrollLeft();e.xPST=xScrollTop();e.xSEL=eL;xScrollEvent();return;}}if(e.addEventListener)e.addEventListener(eT,eL,cap||false);else if(e.attachEvent)e.attachEvent('on'+eT,eL);else e['on'+eT]=eL;}function xResizeEvent(){if(window.xREL)setTimeout('xResizeEvent()',250);var w=window,cw=xClientWidth(),ch=xClientHeight();if(w.xPCW!=cw||w.xPCH!=ch){w.xPCW=cw;w.xPCH=ch;if(w.xREL)w.xREL();}}function xScrollEvent(){if(window.xSEL)setTimeout('xScrollEvent()',250);var w=window,sl=xScrollLeft(),st=xScrollTop();if(w.xPSL!=sl||w.xPST!=st){w.xPSL=sl;w.xPST=st;if(w.xSEL)w.xSEL();}}function xAddEventListener3(e,eT,eL,cap){if(!(e=xGetElementById(e)))return;eT=eT.toLowerCase();if(e==window&&!e.opera&&!document.all){if(eT=='resize'){e.xPCW=xClientWidth();e.xPCH=xClientHeight();var pREL=e.xREL;e.xREL=pREL?function(){eL();pREL();}:eL;xResizeEvent();return;}if(eT=='scroll'){e.xPSL=xScrollLeft();e.xPST=xScrollTop();var pSEL=e.xSEL;e.xSEL=pSEL?function(){eL();pSEL();}:eL;xScrollEvent();return;}}if(e.addEventListener)e.addEventListener(eT,eL,cap);else if(e.attachEvent)e.attachEvent('on'+eT,eL);else{var pev=e['on'+eT];e['on'+eT]=pev?function(){eL();typeof(pev)=='string'?eval(pev):pev();}:eL;}}function xResizeEvent(){if(window.xREL)setTimeout('xResizeEvent()',250);var w=window,cw=xClientWidth(),ch=xClientHeight();if(w.xPCW!=cw||w.xPCH!=ch){w.xPCW=cw;w.xPCH=ch;if(w.xREL)w.xREL();}}function xScrollEvent(){if(window.xSEL)setTimeout('xScrollEvent()',250);var w=window,sl=xScrollLeft(),st=xScrollTop();if(w.xPSL!=sl||w.xPST!=st){w.xPSL=sl;w.xPST=st;if(w.xSEL)w.xSEL();}}function xAniEllipse(xa,xr,yr,a1,a2,tt,at,qc,oed,oea,oef){var a=xa.init(xa.e,at,qc,tt,onRun,onRun,oed,oea,oef);a.x1=a1*(Math.PI/180);a.x2=a2*(Math.PI/180);var sx=xLeft(a.e)+(xWidth(a.e)/2);var sy=xTop(a.e)+(xHeight(a.e)/2);a.xc=sx-(xr*Math.cos(a.x1));a.yc=sy-(yr*Math.sin(a.x1));a.xr=xr;a.yr=yr;if(a.as)a.start();return a;function onRun(o){xMoveTo(o.e,Math.round(o.xr*Math.cos(o.x))+o.xc-(xWidth(o.e)/2),Math.round(o.yr*Math.sin(o.x))+o.yc-(xHeight(o.e)/2));}}function xAniLine(xa,x,y,tt,at,qc,oed,oea,oef){var a=xa.init(xa.e,at,qc,tt,onRun,onRun,oed,oea,oef);a.x1=xLeft(a.e);a.y1=xTop(a.e);a.x2=x;a.y2=y;if(a.as)a.start();return a;function onRun(o){xMoveTo(o.e,Math.round(o.x),Math.round(o.y));}}function xAnimation(e,at,qc,tt,orf,otf,oed,oea,oef){this.init(e,at,qc,tt,orf,otf,oed,oea,oef);var a=xAnimation.instances;var i;for(i=0;i<a.length;++i){if(!a[i])break;}a[i]=this;this.idx=i;}xAnimation.instances=[];xAnimation.prototype.init=function(e,at,qc,tt,orf,otf,oed,oea,oef){this.e=xGetElementById(e);this.at=at||2;this.qc=qc||1;this.tt=tt;this.orf=orf;this.otf=otf;this.oed=oed;this.oea=oea;this.oef=oef;this.to=20;this.as=true;return this;};xAnimation.prototype.start=function(){var a=this;if(a.at==1){a.ap=1/a.tt;}else{a.ap=a.qc*(Math.PI/(2*a.tt));}if(xDef(a.x1)){a.xm=a.x2-a.x1;}if(xDef(a.y1)){a.ym=a.y2-a.y1;}if(!(a.qc%2)){if(xDef(a.x1))a.x2=a.x1;if(xDef(a.y1))a.y2=a.y1;}if(!a.tmr){var d=new Date();a.t1=d.getTime();a.tmr=setTimeout('xAnimation.run('+a.idx+')',1);}};xAnimation.run=function(i){var a=xAnimation.instances[i];if(!a){return;}var d=new Date();a.et=d.getTime()-a.t1;if(a.et<a.tt){a.tmr=setTimeout('xAnimation.run('+i+')',a.to);a.af=a.ap*a.et;if(a.at==2){a.af=Math.abs(Math.sin(a.af));}else if(a.at==3){a.af=1-Math.abs(Math.cos(a.af));}if(xDef(a.x1))a.x=a.xm*a.af+a.x1;if(xDef(a.y1))a.y=a.ym*a.af+a.y1;a.orf(a);}else{var rep=false;if(xDef(a.x2))a.x=a.x2;if(xDef(a.y2))a.y=a.y2;a.tmr=null;a.otf(a);if(xDef(a.oef)){if(a.oed)setTimeout(a.oef,a.oed);else if(xStr(a.oef)){rep=eval(a.oef);}else{rep=a.oef(a,a.oea);}}if(rep){a.resume(true);}}};xAnimation.prototype.pause=function(){var s=false;if(this.tmr){clearTimeout(this.tmr);this.tmr=null;s=true;}return s;};xAnimation.prototype.resume=function(fromStart){var s=false;if(!this.tmr){var d=new Date();this.t1=d.getTime();if(!fromStart)this.t1-=this.et;this.tmr=setTimeout('xAnimation.run('+this.idx+')',this.to);s=true;}return s;};xAnimation.prototype.kill=function(){this.pause();xAnimation.instances[this.idx]=null;};function xAniOpacity(xa,o,tt,at,qc,oed,oea,oef){var a=xa.init(xa.e,at,qc,tt,onRun,onRun,oed,oea,oef);a.x1=xOpacity(a.e);a.x2=o;if(a.as)a.start();return a;function onRun(o){xOpacity(o.e,o.x);}}function xAniScroll(xa,x,y,tt,at,oed,oea,oef){var a=xa.init(xa.e,at,1,tt,onRun,onRun,oed,oea,oef);a.x1=xScrollLeft(a.e,1);a.y1=xScrollTop(a.e,1);a.x2=x;a.y2=y;if(a.as&&a.e.scrollTo)a.start();return a;function onRun(o){o.e.scrollTo(Math.round(o.x),Math.round(o.y));}}function xAniSize(xa,w,h,tt,at,qc,oed,oea,oef){var a=xa.init(xa.e,at,qc,tt,onRun,onRun,oed,oea,oef);a.x1=xWidth(a.e);a.y1=xHeight(a.e);a.x2=w;a.y2=h;if(a.as)a.start();return a;function onRun(o){xResizeTo(o.e,Math.round(o.x),Math.round(o.y));}}function xAppendChild(oParent,oChild){if(oParent.appendChild)return oParent.appendChild(oChild);else return null;}function xBackground(e,c,i){if(!(e=xGetElementById(e)))return'';var bg='';if(e.style){if(xStr(c)){e.style.backgroundColor=c;}if(xStr(i)){e.style.backgroundImage=(i!='')?'url('+i+')':null;}bg=e.style.backgroundColor;}return bg;}function xBar(dir,conStyle,barStyle){this.value=0;this.update=function(v){if(v<0)v=0;else if(v>this.inMax)v=this.inMax;this.con.title=this.bar.title=this.value=v;switch(this.dir){case'ltr':v=this.scale(v,this.w);xLeft(this.bar,v-this.w);break;case'rtl':v=this.scale(v,this.w);xLeft(this.bar,this.w-v);break;case'btt':v=this.scale(v,this.h);xTop(this.bar,this.h-v);break;case'ttb':v=this.scale(v,this.h);xTop(this.bar,v-this.h);break;}};this.paint=function(x,y,w,h){if(xNum(x))this.x=x;if(xNum(y))this.y=y;if(xNum(w))this.w=w;if(xNum(h))this.h=h;xResizeTo(this.con,this.w,this.h);xMoveTo(this.con,this.x,this.y);xResizeTo(this.bar,this.w,this.h);xMoveTo(this.bar,0,0);};this.reset=function(max,start){if(xNum(max))this.inMax=max;if(xNum(start))this.start=start;this.update(this.start);};this.scale=function(v,outMax){return Math.round(xLinearScale(v,0,this.inMax,0,outMax));};this.dir=dir;this.x=0;this.y=0;this.w=100;this.h=100;this.inMax=100;this.start=0;this.conStyle=conStyle;this.barStyle=barStyle;this.con=document.createElement('DIV');this.con.className=this.conStyle;this.bar=document.createElement('DIV');this.bar.className=this.barStyle;this.con.appendChild(this.bar);document.body.appendChild(this.con);}function xCapitalize(str){var i,c,wd,s='',cap=true;for(i=0;i<str.length;++i){c=str.charAt(i);wd=isWordDelim(c);if(wd){cap=true;}if(cap&&!wd){c=c.toUpperCase();cap=false;}s+=c;}return s;function isWordDelim(c){return c==' '||c=='\n'||c=='\t';}}function xCardinalPosition(e,cp,margin,outside){if(!(e=xGetElementById(e)))return;if(typeof(cp)!='string'){window.status='xCardinalPosition error: cp='+cp+', id='+e.id;return;}var x=xLeft(e),y=xTop(e),w=xWidth(e),h=xHeight(e);var pw,ph,p=xParent(e);if(p==document||p.nodeName.toLowerCase()=='html'){pw=xClientWidth();ph=xClientHeight();}else{pw=xWidth(p);ph=xHeight(p);}var sx=xScrollLeft(p),sy=xScrollTop(p);var right=sx+pw,bottom=sy+ph;var cenLeft=sx+Math.floor((pw-w)/2),cenTop=sy+Math.floor((ph-h)/2);if(!margin)margin=0;else{if(outside)margin=-margin;sx+=margin;sy+=margin;right-=margin;bottom-=margin;}switch(cp.toLowerCase()){case'n':x=cenLeft;if(outside)y=sy-h;else y=sy;break;case'ne':if(outside){x=right;y=sy-h;}else{x=right-w;y=sy;}break;case'e':y=cenTop;if(outside)x=right;else x=right-w;break;case'se':if(outside){x=right;y=bottom;}else{x=right-w;y=bottom-h}break;case's':x=cenLeft;if(outside)y=sy-h;else y=bottom-h;break;case'sw':if(outside){x=sx-w;y=bottom;}else{x=sx;y=bottom-h;}break;case'w':y=cenTop;if(outside)x=sx-w;else x=sx;break;case'nw':if(outside){x=sx-w;y=sy-h;}else{x=sx;y=sy;}break;case'cen':x=cenLeft;y=cenTop;break;case'cenh':x=cenLeft;break;case'cenv':y=cenTop;break;}var o=new Object();o.x=x;o.y=y;return o;}function xClientHeight(){var v=0,d=document,w=window;if(d.compatMode=='CSS1Compat'&&!w.opera&&d.documentElement&&d.documentElement.clientHeight){v=d.documentElement.clientHeight;}else if(d.body&&d.body.clientHeight){v=d.body.clientHeight;}else if(xDef(w.innerWidth,w.innerHeight,d.width)){v=w.innerHeight;if(d.width>w.innerWidth)v-=16;}return v;}function xClientWidth(){var v=0,d=document,w=window;if(d.compatMode=='CSS1Compat'&&!w.opera&&d.documentElement&&d.documentElement.clientWidth){v=d.documentElement.clientWidth;}else if(d.body&&d.body.clientWidth){v=d.body.clientWidth;}else if(xDef(w.innerWidth,w.innerHeight,d.height)){v=w.innerWidth;if(d.height>w.innerHeight)v-=16;}return v;}function xClip(e,t,r,b,l){if(!(e=xGetElementById(e)))return;if(e.style){if(xNum(l))e.style.clip='rect('+t+'px '+r+'px '+b+'px '+l+'px)';else e.style.clip='rect(0 '+parseInt(e.style.width)+'px '+parseInt(e.style.height)+'px 0)';}}function xColEqualizer(){var i,j,h=[];for(i=1,j=0;i<arguments.length;i+=2,++j){h[j]=xHeight(arguments[i]);}h.sort(d);for(i=0;i<arguments.length;i+=2){xHeight(arguments[i],h[0]);}return h[0];function d(a,b){return b-a;}}function xCollapsible(outerEle,bShow){var container=xGetElementById(outerEle);if(!container){return null;}var isUL=container.nodeName.toUpperCase()=='UL';var i,trg,aTgt=xGetElementsByTagName(isUL?'UL':'DIV',container);for(i=0;i<aTgt.length;++i){trg=xPrevSib(aTgt[i]);if(trg&&(isUL||trg.nodeName.charAt(0).toUpperCase()=='H')){aTgt[i].xTrgPtr=trg;aTgt[i].style.display=bShow?'block':'none';trg.style.cursor='pointer';trg.xTgtPtr=aTgt[i];trg.onclick=trg_onClick;}}function trg_onClick(){var tgt=this.xTgtPtr.style;tgt.display=(tgt.display=='none')?"block":"none";}this.displayAll=function(bShow){for(var i=0;i<aTgt.length;++i){if(aTgt[i].xTrgPtr){aTgt[i].style.display=bShow?"block":"none";}}};this.onUnload=function(){if(!container||!aTgt){return;}for(i=0;i<aTgt.length;++i){trg=aTgt[i].xTrgPtr;if(trg){if(trg.xTgtPtr){trg.xTgtPtr.TrgPtr=null;trg.xTgtPtr=null;}trg.onclick=null;}}};}function xColor(e,s){if(!(e=xGetElementById(e)))return'';var c='';if(e.style&&xDef(e.style.color)){if(xStr(s))e.style.color=s;c=e.style.color;}return c;}function xCreateElement(sTag){if(document.createElement)return document.createElement(sTag);else return null;}function xDef(){for(var i=0;i<arguments.length;++i){if(typeof(arguments[i])=='undefined')return false;}return true;}function xDeg(rad){return rad*(180/Math.PI);}function xDeleteCookie(name,path){if(xGetCookie(name)){document.cookie=name+"="+"; path="+((!path)?"/":path)+"; expires="+new Date(0).toGMTString();}}function xDialog(sPos1,sPos2,sPos3,sStyle,sId,sUrl,bHidden){if(document.getElementById&&document.createElement&&document.body&&document.body.appendChild){var e=document.createElement('IFRAME');this.ele=e;e.id=sId;e.name=sId;e.style.position='absolute';e.style.zIndex='1000';e.className=sStyle;e.src=sUrl;document.body.appendChild(e);xShow(e);this.open=false;this.margin=10;this.pos1=sPos1;this.pos2=sPos2;this.pos3=sPos3;this.slideTime=400;if(bHidden)xHide(sId);else this.show();}}xDialog.prototype.show=function(){if(!this.open){var e=this.ele;var pos=xCardinalPosition(e,this.pos1,this.margin,true);xMoveTo(e,pos.x,pos.y);xShow(e);pos=xCardinalPosition(e,this.pos2,this.margin,false);xSlideTo(e,pos.x,pos.y,this.slideTime);this.open=true;}};xDialog.prototype.hide=function(){if(this.open){var e=this.ele;var pos=xCardinalPosition(e,this.pos3,this.margin,true);xSlideTo(e,pos.x,pos.y,this.slideTime);setTimeout("xHide('"+e.id+"')",this.slideTime);this.open=false;}};xDialog.prototype.setUrl=function(sUrl){this.ele.src=sUrl;};xDialog.prototype.resize=function(w,h){xResizeTo(this.ele,w,h);if(this.open){var pos=xCardinalPosition(this.ele,this.pos2,this.margin,true);xSlideTo(this.ele,pos.x,pos.y,this.slideTime);}};function xDisableDrag(id,last){if(!window._xDrgMgr)return;var ele=xGetElementById(id);ele.xDraggable=false;ele.xODS=null;ele.xOD=null;ele.xODE=null;xRemoveEventListener(ele,'mousedown',_xOMD,false);if(_xDrgMgr.mm&&last){_xDrgMgr.mm=false;xRemoveEventListener(document,'mousemove',_xOMM,false);}}function xDisableDrop(id){if(!window._xDrgMgr)return;var e=xGetElementById(id);if(e&&e.xODp){e.xODp=null;for(i=0;i<_xDrgMgr.drops.length;++i){if(e==_xDrgMgr.drops[i]){_xDrgMgr.drops.splice(i,1);}}}}function xDisplay(e,s){if((e=xGetElementById(e))&&e.style&&xDef(e.style.display)){if(xStr(s)){try{e.style.display=s;}catch(ex){e.style.display='';}}return e.style.display;}return null;}function xDocSize(){var b=document.body,e=document.documentElement;var esw=0,eow=0,bsw=0,bow=0,esh=0,eoh=0,bsh=0,boh=0;if(e){esw=e.scrollWidth;eow=e.offsetWidth;esh=e.scrollHeight;eoh=e.offsetHeight;}if(b){bsw=b.scrollWidth;bow=b.offsetWidth;bsh=b.scrollHeight;boh=b.offsetHeight;}return{w:Math.max(esw,eow,bsw,bow),h:Math.max(esh,eoh,bsh,boh)};}function xEach(c,f,s){var l=c.length;for(var i=(s||0);i<l;i++){f(c[i],i,l);}};function xEachUntilReturn(c,f,s){var r,l=c.length;for(var i=(s||0);i<l;i++){r=f(c[i],i,l);if(r!==undefined)break;}return r;};function xEditable(container,trigger){var editElement=null;var container=xGetElementById(container);var trigger=xGetElementById(trigger);var newID=container.id+"_edit";xAddEventListener(container,'click',BeginEdit);function BeginEdit(){if(!editElement){editElement=xCreateElement('input');editElement.setAttribute('id',newID);editElement.setAttribute('name',newID);editElement.setAttribute('value',container.innerHTML);editElement.setAttribute('autocomplete','OFF');xAddEventListener(editElement,'blur',EndEditClick);xAddEventListener(editElement,'keypress',EndEditKey);container.innerHTML='';container.appendChild(editElement);editElement.select();editElement.focus();}else{editElement.select();editElement.focus();}}function EndEditClick(){container.innerHTML=editElement.value;editElement=null;}function EndEditKey(evt){var e=new xEvent(evt);if(e.keyCode==13){container.innerHTML=editElement.value;editElement=null;}}}function xEllipse(e,xRadius,yRadius,radiusInc,totalTime,startAngle,stopAngle){if(!(e=xGetElementById(e)))return;if(!e.timeout)e.timeout=25;e.xA=xRadius;e.yA=yRadius;e.radiusInc=radiusInc;e.slideTime=totalTime;startAngle*=(Math.PI/180);stopAngle*=(Math.PI/180);var startTime=(startAngle*e.slideTime)/(stopAngle-startAngle);e.stopTime=e.slideTime+startTime;e.B=(stopAngle-startAngle)/e.slideTime;e.xD=xLeft(e)-Math.round(e.xA*Math.cos(e.B*startTime));e.yD=xTop(e)-Math.round(e.yA*Math.sin(e.B*startTime));e.xTarget=Math.round(e.xA*Math.cos(e.B*e.stopTime)+e.xD);e.yTarget=Math.round(e.yA*Math.sin(e.B*e.stopTime)+e.yD);var d=new Date();e.C=d.getTime()-startTime;if(!e.moving){e.stop=false;_xEllipse(e);}}function _xEllipse(e){if(!(e=xGetElementById(e)))return;var now,t,newY,newX;now=new Date();t=now.getTime()-e.C;if(e.stop){e.moving=false;}else if(t<e.stopTime){setTimeout("_xEllipse('"+e.id+"')",e.timeout);if(e.radiusInc){e.xA+=e.radiusInc;e.yA+=e.radiusInc;}newX=Math.round(e.xA*Math.cos(e.B*t)+e.xD);newY=Math.round(e.yA*Math.sin(e.B*t)+e.yD);xMoveTo(e,newX,newY);e.moving=true;}else{if(e.radiusInc){e.xTarget=Math.round(e.xA*Math.cos(e.B*e.slideTime)+e.xD);e.yTarget=Math.round(e.yA*Math.sin(e.B*e.slideTime)+e.yD);}xMoveTo(e,e.xTarget,e.yTarget);e.moving=false;if(e.onslideend)e.onslideend();}}var _xDrgMgr={ele:null,mm:false};function xEnableDrag(id,fS,fD,fE,x1,y1,x2,y2){var el=xGetElementById(id);if(el){el.xDraggable=true;el.xODS=fS;el.xOD=fD;el.xODE=fE;el.xREC=null;if(xDef(x1,y1,x2,y2)){el.xREC={x1:x1,y1:y1,x2:x2,y2:y2};}xAddEventListener(el,'mousedown',_xOMD,false);if(!_xDrgMgr.mm){_xDrgMgr.mm=true;xAddEventListener(document,'mousemove',_xOMM,false);}}}function _xOMD(e){var ev=new xEvent(e);if(ev.button!=0)return;var t=ev.target;while(t&&!t.xDraggable){t=xParent(t);}if(t){xPreventDefault(e);t.xDPX=ev.pageX;t.xDPY=ev.pageY;_xDrgMgr.ele=t;xAddEventListener(document,'mouseup',_xOMU,false);if(t.xODS){t.xODS(t,ev.pageX,ev.pageY);}}}function _xOMM(e){var ev=new xEvent(e);if(_xDrgMgr.ele){xPreventDefault(e);var b=true,el=_xDrgMgr.ele;var dx=ev.pageX-el.xDPX;var dy=ev.pageY-el.xDPY;el.xDPX=ev.pageX;el.xDPY=ev.pageY;if(el.xREC){var r=el.xREC,x=xPageX(el)+dx,y=xPageY(el)+dy;var b=(x>=r.x1&&x+xWidth(el)<=r.x2&&y>=r.y1&&y+xHeight(el)<=r.y2);}if(el.xOD){el.xOD(el,dx,dy,b);}else if(b){xMoveTo(el,xLeft(el)+dx,xTop(el)+dy);}}}function _xOMU(e){if(_xDrgMgr.ele){xPreventDefault(e);xRemoveEventListener(document,'mouseup',_xOMU,false);if(_xDrgMgr.ele.xODE){var ev=new xEvent(e);_xDrgMgr.ele.xODE(_xDrgMgr.ele,ev.pageX,ev.pageY);}_xDrgMgr.ele=null;}}function xEnableDrop(id,fD){var e=xGetElementById(id);if(e){e.xODp=fD;if(!_xDrgMgr.drops){_xDrgMgr.drops=new Array();}_xDrgMgr.drops[_xDrgMgr.drops.length]=e;if(!_xDrgMgr.omu){_xDrgMgr.omu=_xOMU;_xOMU=_xOMU2;}}}function _xOMU2(e){var i,z,hz=0,he=null;e=new xEvent(e);for(i=0;i<_xDrgMgr.drops.length;++i){if(xHasPoint(_xDrgMgr.drops[i],e.pageX,e.pageY)){z=xZIndex(_xDrgMgr.drops[i])||0;if(z>=hz){hz=z;he=_xDrgMgr.drops[i];}}}var ele=_xDrgMgr.ele;_xDrgMgr.omu(e);if(he&&he.xODp){he.xODp(ele,e.pageX,e.pageY);}}function xEvalTextarea(){var f=document.createElement('FORM');f.onsubmit='return false';var t=document.createElement('TEXTAREA');t.id='xDebugTA';t.name='xDebugTA';t.rows='20';t.cols='60';var b=document.createElement('INPUT');b.type='button';b.value='Evaluate';b.onclick=function(){eval(this.form.xDebugTA.value);};f.appendChild(t);f.appendChild(b);document.body.appendChild(f);}function xEvent(evt){var e=evt||window.event;if(!e)return;if(e.type)this.type=e.type;if(e.target)this.target=e.target;else if(e.srcElement)this.target=e.srcElement;if(e.relatedTarget)this.relatedTarget=e.relatedTarget;else if(e.type=='mouseover'&&e.fromElement)this.relatedTarget=e.fromElement;else if(e.type=='mouseout')this.relatedTarget=e.toElement;if(xDef(e.pageX,e.pageY)){this.pageX=e.pageX;this.pageY=e.pageY;}else if(xDef(e.clientX,e.clientY)){this.pageX=e.clientX+xScrollLeft();this.pageY=e.clientY+xScrollTop();}if(xDef(e.offsetX,e.offsetY)){this.offsetX=e.offsetX;this.offsetY=e.offsetY;}else if(xDef(e.layerX,e.layerY)){this.offsetX=e.layerX;this.offsetY=e.layerY;}else{this.offsetX=this.pageX-xPageX(this.target);this.offsetY=this.pageY-xPageY(this.target);}this.keyCode=e.keyCode||e.which||0;this.shiftKey=e.shiftKey;this.ctrlKey=e.ctrlKey;this.altKey=e.altKey;this.button=3;if(e.type.indexOf('click')!=-1){this.button=0;}else if(e.type.indexOf('mouse')!=-1){/*@cc_on@if(@_jscript_version)if(e.button==1)this.button=0;else if(e.button==4)this.button=1;else if(e.button==2)this.button=2;@else @*/this.button=e.button;/*@end @*/}}function xFenster(eleId,iniX,iniY,barId,resBtnId,maxBtnId){var me=this;var ele=xGetElementById(eleId);var rBtn=xGetElementById(resBtnId);var mBtn=xGetElementById(maxBtnId);var x,y,w,h,maximized=false;this.onunload=function(){if(!window.opera){xDisableDrag(barId);xDisableDrag(rBtn);mBtn.onclick=ele.onmousedown=null;me=ele=rBtn=mBtn=null;}};this.paint=function(){xMoveTo(rBtn,xWidth(ele)-xWidth(rBtn),xHeight(ele)-xHeight(rBtn));xMoveTo(mBtn,xWidth(ele)-xWidth(mBtn),0);};function barOnDrag(e,mdx,mdy){var x=xLeft(ele)+mdx;var y=xTop(ele)+mdy;if(x<0)x=0;if(y<0)y=0;xMoveTo(ele,x,y);}function resOnDrag(e,mdx,mdy){xResizeTo(ele,xWidth(ele)+mdx,xHeight(ele)+mdy);me.paint();}function fenOnMousedown(){xZIndex(ele,xFenster.z++);}function maxOnClick(){if(maximized){maximized=false;xResizeTo(ele,w,h);xMoveTo(ele,x,y);}else{w=xWidth(ele);h=xHeight(ele);x=xLeft(ele);y=xTop(ele);xMoveTo(ele,xScrollLeft(),xScrollTop());maximized=true;xResizeTo(ele,xClientWidth(),xClientHeight());}me.paint();}xFenster.z++;xMoveTo(ele,iniX,iniY);this.paint();xEnableDrag(barId,null,barOnDrag,null);xEnableDrag(rBtn,null,resOnDrag,null);mBtn.onclick=maxOnClick;ele.onmousedown=fenOnMousedown;xShow(ele);}xFenster.z=0;function xFindAfterByClassName(ele,clsName){var re=new RegExp('\\b'+clsName+'\\b','i');return xWalkToLast(ele,function(n){if(n.className.search(re)!=-1)return n;});}function xFindBeforeByClassName(ele,clsName){var re=new RegExp('\\b'+clsName+'\\b','i');return xWalkToFirst(ele,function(n){if(n.className.search(re)!=-1)return n;});}function xFirstChild(e,t){e=xGetElementById(e);var c=e?e.firstChild:null;while(c){if(c.nodeType==1&&(!t||c.nodeName.toLowerCase()==t.toLowerCase())){break;}c=c.nextSibling;}return c;}function xGetComputedStyle(oEle,sProp,bInt){var s,p='undefined';var dv=document.defaultView;if(dv&&dv.getComputedStyle){s=dv.getComputedStyle(oEle,'');if(s)p=s.getPropertyValue(sProp);}else if(oEle.currentStyle){var i,c,a=sProp.split('-');sProp=a[0];for(i=1;i<a.length;++i){c=a[i].charAt(0);sProp+=a[i].replace(c,c.toUpperCase());}p=oEle.currentStyle[sProp];}else return null;return bInt?(parseInt(p)||0):p;}function xGetCookie(name){var value=null,search=name+"=";if(document.cookie.length>0){var offset=document.cookie.indexOf(search);if(offset!=-1){offset+=search.length;var end=document.cookie.indexOf(";",offset);if(end==-1)end=document.cookie.length;value=unescape(document.cookie.substring(offset,end));}}return value;}function xGetCSSRules(ss){return ss.rules?ss.rules:ss.cssRules;}function xGetEleAtPoint(x,y){var he=null,z,hz=0;var i,list=xGetElementsByTagName('*');for(i=0;i<list.length;++i){if(xHasPoint(list[i],x,y)){z=xZIndex(list[i]);z=z||0;if(z>=hz){hz=z;he=list[i];}}}return he;}function xGetElementById(e){if(typeof(e)=='string'){if(document.getElementById)e=document.getElementById(e);else if(document.all)e=document.all[e];else e=null;}return e;}function xGetElementsByAttribute(sTag,sAtt,sRE,fn){var a,list,found=new Array(),re=new RegExp(sRE,'i');list=xGetElementsByTagName(sTag);for(var i=0;i<list.length;++i){a=list[i].getAttribute(sAtt);if(!a){a=list[i][sAtt];}if(typeof(a)=='string'&&a.search(re)!=-1){found[found.length]=list[i];if(fn)fn(list[i]);}}return found;}function xGetElementsByClassName(c,p,t,f){var r=new Array();var re=new RegExp("(^|\\s)"+c+"(\\s|$)");var e=xGetElementsByTagName(t,p);for(var i=0;i<e.length;++i){if(re.test(e[i].className)){r[r.length]=e[i];if(f)f(e[i]);}}return r;}function xGetElementsByTagName(t,p){var list=null;t=t||'*';p=p||document;if(typeof p.getElementsByTagName!='undefined'){list=p.getElementsByTagName(t);if(t=='*'&&(!list||!list.length))list=p.all;}else{if(t=='*')list=p.all;else if(p.all&&p.all.tags)list=p.all.tags(t);}return list||new Array();}function xGetElePropsArray(ele,eleName){var u='undefined';var i=0,a=new Array();nv('Element',eleName);nv('id',(xDef(ele.id)?ele.id:u));nv('tagName',(xDef(ele.tagName)?ele.tagName:u));nv('xWidth()',xWidth(ele));nv('style.width',(xDef(ele.style)&&xDef(ele.style.width)?ele.style.width:u));nv('offsetWidth',(xDef(ele.offsetWidth)?ele.offsetWidth:u));nv('scrollWidth',(xDef(ele.offsetWidth)?ele.offsetWidth:u));nv('clientWidth',(xDef(ele.clientWidth)?ele.clientWidth:u));nv('xHeight()',xHeight(ele));nv('style.height',(xDef(ele.style)&&xDef(ele.style.height)?ele.style.height:u));nv('offsetHeight',(xDef(ele.offsetHeight)?ele.offsetHeight:u));nv('scrollHeight',(xDef(ele.offsetHeight)?ele.offsetHeight:u));nv('clientHeight',(xDef(ele.clientHeight)?ele.clientHeight:u));nv('xLeft()',xLeft(ele));nv('style.left',(xDef(ele.style)&&xDef(ele.style.left)?ele.style.left:u));nv('offsetLeft',(xDef(ele.offsetLeft)?ele.offsetLeft:u));nv('style.pixelLeft',(xDef(ele.style)&&xDef(ele.style.pixelLeft)?ele.style.pixelLeft:u));nv('xTop()',xTop(ele));nv('style.top',(xDef(ele.style)&&xDef(ele.style.top)?ele.style.top:u));nv('offsetTop',(xDef(ele.offsetTop)?ele.offsetTop:u));nv('style.pixelTop',(xDef(ele.style)&&xDef(ele.style.pixelTop)?ele.style.pixelTop:u));nv('','');nv('xGetComputedStyle()','');nv('top');nv('right');nv('bottom');nv('left');nv('width');nv('height');nv('color');nv('background-color');nv('font-family');nv('font-size');nv('text-align');nv('line-height');nv('content');nv('float');nv('clear');nv('margin');nv('padding');nv('padding-top');nv('padding-right');nv('padding-bottom');nv('padding-left');nv('border-top-width');nv('border-right-width');nv('border-bottom-width');nv('border-left-width');nv('position');nv('overflow');nv('visibility');nv('display');nv('z-index');nv('clip');nv('cursor');return a;function nv(name,value){a[i]=new Object();a[i].name=name;a[i].value=typeof(value)=='undefined'?xGetComputedStyle(ele,name):value;++i;}}function xGetElePropsString(ele,eleName,newLine){var s='',a=xGetElePropsArray(ele,eleName);for(var i=0;i<a.length;++i){s+=a[i].name+' = '+a[i].value+(newLine||'\n');}return s;}function xGetStyleSheetFromLink(cl){return cl.styleSheet?cl.styleSheet:cl.sheet;}function xGetURLArguments(){var idx=location.href.indexOf('?');var params=new Array();if(idx!=-1){var pairs=location.href.substring(idx+1,location.href.length).split('&');for(var i=0;i<pairs.length;i++){nameVal=pairs[i].split('=');params[i]=nameVal[1];params[nameVal[0]]=nameVal[1];}}return params;}function xHasClass(e,c){e=xGetElementById(e);if(!e||!e.className)return false;return(e.className==c)||e.className.match(new RegExp('\\b'+c+'\\b'));};function xHasPoint(e,x,y,t,r,b,l){if(!xNum(t)){t=r=b=l=0;}else if(!xNum(r)){r=b=l=t;}else if(!xNum(b)){l=r;b=t;}var eX=xPageX(e),eY=xPageY(e);return(x>=eX+l&&x<=eX+xWidth(e)-r&&y>=eY+t&&y<=eY+xHeight(e)-b);}function xHasStyleSelector(ss){if(!xHasStyleSheets())return undefined;function testSelector(cr){return cr.selectorText.indexOf(ss)>=0;}return xTraverseDocumentStyleSheets(testSelector);}function xHasStyleSheets(){return document.styleSheets?true:false;}function xHeight(e,h){if(!(e=xGetElementById(e)))return 0;if(xNum(h)){if(h<0)h=0;else h=Math.round(h);}else h=-1;var css=xDef(e.style);if(e==document||e.tagName.toLowerCase()=='html'||e.tagName.toLowerCase()=='body'){h=xClientHeight();}else if(css&&xDef(e.offsetHeight)&&xStr(e.style.height)){if(h>=0){var pt=0,pb=0,bt=0,bb=0;if(document.compatMode=='CSS1Compat'){var gcs=xGetComputedStyle;pt=gcs(e,'padding-top',1);if(pt!==null){pb=gcs(e,'padding-bottom',1);bt=gcs(e,'border-top-width',1);bb=gcs(e,'border-bottom-width',1);}else if(xDef(e.offsetHeight,e.style.height)){e.style.height=h+'px';pt=e.offsetHeight-h;}}h-=(pt+pb+bt+bb);if(isNaN(h)||h<0)return;else e.style.height=h+'px';}h=e.offsetHeight;}else if(css&&xDef(e.style.pixelHeight)){if(h>=0)e.style.pixelHeight=h;h=e.style.pixelHeight;}return h;}function xHex(n,digits,prefix){var p='',n=Math.ceil(n);if(prefix)p=prefix;n=n.toString(16);for(var i=0;i<digits-n.length;++i){p+='0';}return p+n;}function xHide(e){return xVisibility(e,0);}function xHttpRequest(){var _i=this;var _r=null;var _t=null;var _f=null;var _x=false;var _o=null;_i.OK=0;_i.NOXMLOBJ=1;_i.REQERR=2;_i.TIMEOUT=4;_i.RSPERR=8;_i.NOXMLCT=16;_i.status=_i.OK;_i.busy=false;function _oc(){if(_r.readyState==4){if(_t){clearTimeout(_t);}if(_r.status!=200)_i.status=_i.RSPERR;if(_x){var ct=_r.getResponseHeader('Content-Type');if(ct&&ct.indexOf('xml')==-1){_i.status|=_i.NOXMLCT;}}if(_f)_f(_r,_i.status,_o);_i.busy=false;}}function _ot(){_r.abort();_i.status|=_i.TIMEOUT;if(_f)_f(_r,_i.status,_o);_i.busy=false;}this.send=function(m,u,d,t,r,x,o,f){if(!_r||_i.busy){return false;}m=m.toUpperCase();if(m!='POST'){if(d){d='?'+d;if(r){d+='&'+r+'='+Math.round(10000*Math.random());}}else{d='';}}_x=x;_o=o;_f=f;_i.busy=true;_i.status=_i.OK;if(t){_t=setTimeout(_ot,t);}try{if(m=='GET'){_r.open(m,u+d,true);d=null;_r.setRequestHeader('Cache-Control','no-cache');var ct='text/'+(x?'xml':'plain');if(_r.overrideMimeType){_r.overrideMimeType(ct);}_r.setRequestHeader('Content-Type',ct);}else if(m=='POST'){_r.open(m,u,true);_r.setRequestHeader('Method','POST '+u+' HTTP/1.1');_r.setRequestHeader('Content-Type','application/x-www-form-urlencoded');}else{_r.open(m,u+d,true);d=null;}_r.onreadystatechange=_oc;_r.send(d);}catch(e){if(_t){clearTimeout(_t);}_f=null;_i.busy=false;_i.status=_i.REQERR;_i.error=e;return false;}return true;};try{_r=new XMLHttpRequest();}catch(e){try{_r=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{_r=new ActiveXObject('Microsoft.XMLHTTP');}catch(e){_r=null;}}}if(!_r){_i.status=_i.NOXMLOBJ;}}function xHttpRequest2(){this.xmlDoc=null;this.busy=false;this.err={};var _i=this;var _r=null;var _t=null;var _f=null;/*@cc_on var _x=null;@*/function _oc(){if(_r.readyState==4){if(_t){clearTimeout(_t);}_i.busy=false;if(_f){if(_i.xmlDoc==1&&_r.status==200){/*@cc_on@if(@_jscript_version<5.9)if(!_x){_x=document.createElement('xml');document.body.appendChild(_x);}_x.XMLDocument.loadXML(_r.responseText);_i.xmlDoc=_x.XMLDocument;@else @*/_i.xmlDoc=_r.responseXML;/*@end @*/}_f(_i,_r);}}}function _ot(){_i.err.name='Timeout';_r.abort();_i.busy=false;if(_f)_f(_i,null);}this.send=function(m,u,d,t,r,x,f){if(!_r){return false;}if(_i.busy){_i.err.name='Busy';return false;}m=m.toUpperCase();if(m!='POST'){if(d){d='?'+d;if(r){d+='&'+r+'='+Math.round(10000*Math.random());}}else{d='';}}_f=f;_i.xmlDoc=null;_i.err.name=_i.err.message='';_i.busy=true;if(t){_t=setTimeout(_ot,t);}try{if(m=='GET'){_r.open(m,u+d,true);d=null;_r.setRequestHeader('Cache-Control','no-cache');if(x){if(_r.overrideMimeType){_r.overrideMimeType('text/xml');}_r.setRequestHeader('Content-Type','text/xml');_i.xmlDoc=1;}}else if(m=='POST'){_r.open(m,u,true);_r.setRequestHeader('Method','POST '+u+' HTTP/1.1');_r.setRequestHeader('Content-Type','application/x-www-form-urlencoded');}else{_r.open(m,u+d,true);d=null;}_r.onreadystatechange=_oc;_r.send(d);}catch(e){if(_t){clearTimeout(_t);}_f=null;_i.busy=false;_i.err.name=e.name;_i.err.message=e.message;return false;}return true;};try{_r=new XMLHttpRequest();}catch(e){try{_r=new ActiveXObject('Msxml2.XMLHTTP');}catch(e){try{_r=new ActiveXObject('Microsoft.XMLHTTP');}catch(e){_r=null;}}}if(!_r){_i.err.name='Unsupported';}}var xOp7Up,xOp6Dn,xIE4Up,xIE4,xIE5,xNN4,xUA=navigator.userAgent.toLowerCase();if(window.opera){var i=xUA.indexOf('opera');if(i!=-1){var v=parseInt(xUA.charAt(i+6));xOp7Up=v>=7;xOp6Dn=v<7;}}else if(navigator.vendor!='KDE'&&document.all&&xUA.indexOf('msie')!=-1){xIE4Up=parseFloat(navigator.appVersion)>=4;xIE4=xUA.indexOf('msie 4')!=-1;xIE5=xUA.indexOf('msie 5')!=-1;}else if(document.layers){xNN4=true;}xMac=xUA.indexOf('mac')!=-1;function xImgAsyncWait(fnStatus,fnInit,fnError,sErrorImg,sAbortImg,imgArray){var i,imgs=imgArray||document.images;for(i=0;i<imgs.length;++i){imgs[i].onload=imgOnLoad;imgs[i].onerror=imgOnError;imgs[i].onabort=imgOnAbort;}xIAW.fnStatus=fnStatus;xIAW.fnInit=fnInit;xIAW.fnError=fnError;xIAW.imgArray=imgArray;xIAW();function imgOnLoad(){this.wasLoaded=true;}function imgOnError(){if(sErrorImg&&!this.wasError){this.src=sErrorImg;}this.wasError=true;}function imgOnAbort(){if(sAbortImg&&!this.wasAborted){this.src=sAbortImg;}this.wasAborted=true;}}function xIAW(){var me=arguments.callee;if(!me){return;}var i,imgs=me.imgArray?me.imgArray:document.images;var c=0,e=0,a=0,n=imgs.length;for(i=0;i<n;++i){if(imgs[i].wasError){++e;}else if(imgs[i].wasAborted){++a;}else if(imgs[i].complete||imgs[i].wasLoaded){++c;}}if(me.fnStatus){me.fnStatus(n,c,e,a);}if(c+e+a==n){if((e||a)&&me.fnError){me.fnError(n,c,e,a);}else if(me.fnInit){me.fnInit();}}else setTimeout('xIAW()',250);}function xImgRollSetup(p,s,x){var ele,id;for(var i=3;i<arguments.length;++i){id=arguments[i];if(ele=xGetElementById(id)){ele.xIOU=p+id+x;ele.xIOO=new Image();ele.xIOO.src=p+id+s+x;ele.onmouseout=imgOnMouseout;ele.onmouseover=imgOnMouseover;}}function imgOnMouseout(e){if(this.xIOU){this.src=this.xIOU;}}function imgOnMouseover(e){if(this.xIOO&&this.xIOO.complete){this.src=this.xIOO.src;}}}function xInnerHtml(e,h){if(!(e=xGetElementById(e))||!xStr(e.innerHTML))return null;var s=e.innerHTML;if(xStr(h)){e.innerHTML=h;}return s;}function xInsertRule(ss,sel,rule,idx){if(!(ss=xGetElementById(ss)))return false;if(ss.insertRule){ss.insertRule(sel+"{"+rule+"}",idx);}else if(ss.addRule){ss.addRule(sel,rule,idx);}else return false;return true;}function xIntersection(e1,e2,o){var ix1,iy2,iw,ih,intersect=true;var e1x1=xPageX(e1);var e1x2=e1x1+xWidth(e1);var e1y1=xPageY(e1);var e1y2=e1y1+xHeight(e1);var e2x1=xPageX(e2);var e2x2=e2x1+xWidth(e2);var e2y1=xPageY(e2);var e2y2=e2y1+xHeight(e2);if(e1x1<=e2x1){ix1=e2x1;if(e1x2<e2x1)intersect=false;else iw=Math.min(e1x2,e2x2)-e2x1;}else{ix1=e1x1;if(e2x2<e1x1)intersect=false;else iw=Math.min(e1x2,e2x2)-e1x1;}if(e1y2>=e2y2){iy2=e2y2;if(e1y1>e2y2)intersect=false;else ih=e2y2-Math.max(e1y1,e2y1);}else{iy2=e1y2;if(e2y1>e1y2)intersect=false;else ih=e1y2-Math.max(e1y1,e2y1);}if(intersect&&typeof(o)=='object'){o.x=ix1;o.y=iy2-ih;o.w=iw;o.h=ih;}return intersect;}function xLeft(e,iX){if(!(e=xGetElementById(e)))return 0;var css=xDef(e.style);if(css&&xStr(e.style.left)){if(xNum(iX))e.style.left=iX+'px';else{iX=parseInt(e.style.left);if(isNaN(iX))iX=xGetComputedStyle(e,'left',1);if(isNaN(iX))iX=0;}}else if(css&&xDef(e.style.pixelLeft)){if(xNum(iX))e.style.pixelLeft=iX;else iX=e.style.pixelLeft;}return iX;}xLibrary={version:'4.09',license:'GNU LGPL',url:'http://cross-browser.com/'};function xLinearScale(val,iL,iH,oL,oH){var m=(oH-oL)/(iH-iL);var b=oL-(iL*m);return m*val+b;}function xLoadScript(url){if(document.createElement&&document.getElementsByTagName){var s=document.createElement('script');var h=document.getElementsByTagName('head');if(s&&h.length){s.src=url;h[0].appendChild(s);}}}function xMenu1(triggerId,menuId,mouseMargin,openEvent){var isOpen=false;var trg=xGetElementById(triggerId);var mnu=xGetElementById(menuId);if(trg&&mnu){xAddEventListener(trg,openEvent,onOpen,false);}function onOpen(){if(!isOpen){xMoveTo(mnu,xPageX(trg),xPageY(trg)+xHeight(trg));xShow(mnu);xAddEventListener(document,'mousemove',onMousemove,false);isOpen=true;}}function onMousemove(ev){var e=new xEvent(ev);if(!xHasPoint(mnu,e.pageX,e.pageY,-mouseMargin)&&!xHasPoint(trg,e.pageX,e.pageY,-mouseMargin)){xHide(mnu);xRemoveEventListener(document,'mousemove',onMousemove,false);isOpen=false;}}}function xMenu1A(triggerId,menuId,mouseMargin,slideTime,openEvent){var isOpen=false;var trg=xGetElementById(triggerId);var mnu=xGetElementById(menuId);if(trg&&mnu){xHide(mnu);xAddEventListener(trg,openEvent,onOpen,false);}function onOpen(){if(!isOpen){xMoveTo(mnu,xPageX(trg),xPageY(trg));xShow(mnu);xSlideTo(mnu,xPageX(trg),xPageY(trg)+xHeight(trg),slideTime);xAddEventListener(document,'mousemove',onMousemove,false);isOpen=true;}}function onMousemove(ev){var e=new xEvent(ev);if(!xHasPoint(mnu,e.pageX,e.pageY,-mouseMargin)&&!xHasPoint(trg,e.pageX,e.pageY,-mouseMargin)){xRemoveEventListener(document,'mousemove',onMousemove,false);xSlideTo(mnu,xPageX(trg),xPageY(trg),slideTime);setTimeout("xHide('"+menuId+"')",slideTime);isOpen=false;}}}function xMenu1B(openTriggerId,closeTriggerId,menuId,slideTime,bOnClick){xMenu1B.instances[xMenu1B.instances.length]=this;var isOpen=false;var oTrg=xGetElementById(openTriggerId);var cTrg=xGetElementById(closeTriggerId);var mnu=xGetElementById(menuId);if(oTrg&&cTrg&&mnu){xHide(mnu);if(bOnClick)oTrg.onclick=openOnEvent;else oTrg.onmouseover=openOnEvent;cTrg.onclick=closeOnClick;}function openOnEvent(){if(!isOpen){for(var i=0;i<xMenu1B.instances.length;++i){xMenu1B.instances[i].close();}xMoveTo(mnu,xPageX(oTrg),xPageY(oTrg));xShow(mnu);xSlideTo(mnu,xPageX(oTrg),xPageY(oTrg)+xHeight(oTrg),slideTime);isOpen=true;}}function closeOnClick(){if(isOpen){xSlideTo(mnu,xPageX(oTrg),xPageY(oTrg),slideTime);setTimeout("xHide('"+menuId+"')",slideTime);isOpen=false;}}this.close=function(){closeOnClick();}}xMenu1B.instances=new Array();function xMenu5(idUL,btnClass,idAutoOpen){var i,ul,btns,mnu=xGetElementById(idUL);btns=xGetElementsByClassName(btnClass,mnu,'DIV');for(i=0;i<btns.length;++i){ul=xNextSib(btns[i],'UL');btns[i].xClpsTgt=ul;btns[i].onclick=btn_onClick;set_display(btns[i],0);}if(idAutoOpen){var e=xGetElementById(idAutoOpen);while(e&&e!=mnu){if(e.xClpsTgt)set_display(e,1);while(e&&e!=mnu&&e.nodeName!='LI')e=e.parentNode;e=e.parentNode;while(e&&!e.xClpsTgt)e=xPrevSib(e);}}function btn_onClick(){var thisLi,fc,pUl;if(this.xClpsTgt.style.display=='none'){set_display(this,1);var li=this.parentNode;thisLi=li;pUl=li.parentNode;li=xFirstChild(pUl);while(li){if(li!=thisLi){fc=xFirstChild(li);if(fc&&fc.xClpsTgt){set_display(fc,0);}}li=xNextSib(li);}}else{set_display(this,0);}}function set_display(ele,bBlock){if(bBlock){ele.xClpsTgt.style.display='block';ele.innerHTML='-';}else{ele.xClpsTgt.style.display='none';ele.innerHTML='+';}}this.onUnload=function(){for(i=0;i<btns.length;++i){btns[i].xClpsTgt=null;btns[i].onclick=null;}}}function xMoveTo(e,x,y){xLeft(e,x);xTop(e,y);}function xName(e){if(!e)return e;else if(e.id&&e.id!="")return e.id;else if(e.name&&e.name!="")return e.name;else if(e.nodeName&&e.nodeName!="")return e.nodeName;else if(e.tagName&&e.tagName!="")return e.tagName;else return e;}function xNextSib(e,t){e=xGetElementById(e);var s=e?e.nextSibling:null;while(s){if(s.nodeType==1&&(!t||s.nodeName.toLowerCase()==t.toLowerCase())){break;}s=s.nextSibling;}return s;}function xNum(){for(var i=0;i<arguments.length;++i){if(isNaN(arguments[i])||typeof(arguments[i])!='number')return false;}return true;}function xOffsetLeft(e){if(!(e=xGetElementById(e)))return 0;if(xDef(e.offsetLeft))return e.offsetLeft;else return 0;}function xOffsetTop(e){if(!(e=xGetElementById(e)))return 0;if(xDef(e.offsetTop))return e.offsetTop;else return 0;}function xOpacity(e,o){var set=xDef(o);if(!(e=xGetElementById(e)))return 2;if(xStr(e.style.opacity)){if(set)e.style.opacity=o+'';else o=parseFloat(e.style.opacity);}else if(xStr(e.style.filter)){if(set)e.style.filter='alpha(opacity='+(100*o)+')';else if(e.filters&&e.filters.alpha){o=e.filters.alpha.opacity/100;}}else if(xStr(e.style.MozOpacity)){if(set)e.style.MozOpacity=o+'';else o=parseFloat(e.style.MozOpacity);}else if(xStr(e.style.KhtmlOpacity)){if(set)e.style.KhtmlOpacity=o+'';else o=parseFloat(e.style.KhtmlOpacity);}return isNaN(o)?1:o;}function xPad(s,len,c,left){if(typeof s!='string')s=s+'';if(left){for(var i=s.length;i<len;++i)s=c+s;}else{for(var i=s.length;i<len;++i)s+=c;}return s;}function xPageX(e){var x=0;e=xGetElementById(e);while(e){if(xDef(e.offsetLeft))x+=e.offsetLeft;e=xDef(e.offsetParent)?e.offsetParent:null;}return x;}function xPageY(e){var y=0;e=xGetElementById(e);while(e){if(xDef(e.offsetTop))y+=e.offsetTop;e=xDef(e.offsetParent)?e.offsetParent:null;}return y;}function xParaEq(e,xExpr,yExpr,totalTime){if(!(e=xGetElementById(e)))return;e.t=0;e.tStep=.008;if(!e.timeout)e.timeout=25;e.xExpr=xExpr;e.yExpr=yExpr;e.slideTime=totalTime;var d=new Date();e.C=d.getTime();if(!e.moving){e.stop=false;_xParaEq(e);}}function _xParaEq(e){if(!(e=xGetElementById(e)))return;var now=new Date();var et=now.getTime()-e.C;e.t+=e.tStep;t=e.t;if(e.stop){e.moving=false;}else if(!e.slideTime||et<e.slideTime){setTimeout("_xParaEq('"+e.id+"')",e.timeout);var p=xParent(e),centerX,centerY;centerX=(xWidth(p)/2)-(xWidth(e)/2);centerY=(xHeight(p)/2)-(xHeight(e)/2);e.xTarget=Math.round((eval(e.xExpr)*centerX)+centerX)+xScrollLeft(p);e.yTarget=Math.round((eval(e.yExpr)*centerY)+centerY)+xScrollTop(p);xMoveTo(e,e.xTarget,e.yTarget);e.moving=true;}else{e.moving=false;if(e.onslideend)e.onslideend();}}function xParent(e,bNode){if(!(e=xGetElementById(e)))return null;var p=null;if(!bNode&&xDef(e.offsetParent))p=e.offsetParent;else if(xDef(e.parentNode))p=e.parentNode;else if(xDef(e.parentElement))p=e.parentElement;return p;}function xParentChain(e,delim,bNode){if(!(e=xGetElementById(e)))return;var lim=100,s="",d=delim||"\n";while(e){s+=xName(e)+', ofsL:'+e.offsetLeft+', ofsT:'+e.offsetTop+d;e=xParent(e,bNode);if(!lim--)break;}return s;}function xParentNode(ele,n){while(ele&&n--){ele=ele.parentNode;}return ele;}function xPopup(sTmrType,uTimeout,sPos1,sPos2,sPos3,sStyle,sId,sUrl){if(document.getElementById&&document.createElement&&document.body&&document.body.appendChild){var e=document.createElement('IFRAME');this.ele=e;e.id=sId;e.style.position='absolute';e.className=sStyle;e.src=sUrl;document.body.appendChild(e);xShow(e);this.tmr=xTimer.set(sTmrType,this,sTmrType,uTimeout);this.open=false;this.margin=10;this.pos1=sPos1;this.pos2=sPos2;this.pos3=sPos3;this.slideTime=500;this.interval();}}xPopup.prototype.show=function(){this.interval();};xPopup.prototype.hide=function(){this.timeout();};xPopup.prototype.timeout=function(){if(this.open){var e=this.ele;var pos=xCardinalPosition(e,this.pos3,this.margin,true);xSlideTo(e,pos.x,pos.y,this.slideTime);setTimeout("xHide('"+e.id+"')",this.slideTime);this.open=false;}};xPopup.prototype.interval=function(){if(!this.open){var e=this.ele;var pos=xCardinalPosition(e,this.pos1,this.margin,true);xMoveTo(e,pos.x,pos.y);xShow(e);pos=xCardinalPosition(e,this.pos2,this.margin,false);xSlideTo(e,pos.x,pos.y,this.slideTime);this.open=true;}};function xPreventDefault(e){if(e&&e.preventDefault)e.preventDefault();else if(window.event)window.event.returnValue=false;}function xPrevSib(e,t){e=xGetElementById(e);var s=e?e.previousSibling:null;while(s){if(s.nodeType==1&&(!t||s.nodeName.toLowerCase()==t.toLowerCase())){break;}s=s.previousSibling;}return s;}function xRad(deg){return deg*(Math.PI/180);}function xRemoveClass(e,c){e=xGetElementById(e);if(!e)return false;if(xHasClass(e,c))e.className=e.className.replace(new RegExp('(^| )'+c+'($| )','g'),'');return true;};function xRemoveEventListener(e,eT,eL,cap){if(!(e=xGetElementById(e)))return;eT=eT.toLowerCase();if(e.removeEventListener)e.removeEventListener(eT,eL,cap||false);else if(e.detachEvent)e.detachEvent('on'+eT,eL);else e['on'+eT]=null;}function xRemoveEventListener2(e,eT,eL,cap){if(!(e=xGetElementById(e)))return;eT=eT.toLowerCase();if(e==window){if(eT=='resize'&&e.xREL){e.xREL=null;return;}if(eT=='scroll'&&e.xSEL){e.xSEL=null;return;}}if(e.removeEventListener)e.removeEventListener(eT,eL,cap||false);else if(e.detachEvent)e.detachEvent('on'+eT,eL);else e['on'+eT]=null;}function xResizeTo(e,w,h){xWidth(e,w);xHeight(e,h);}function xScrollLeft(e,bWin){var offset=0;if(!xDef(e)||bWin||e==document||e.tagName.toLowerCase()=='html'||e.tagName.toLowerCase()=='body'){var w=window;if(bWin&&e)w=e;if(w.document.documentElement&&w.document.documentElement.scrollLeft)offset=w.document.documentElement.scrollLeft;else if(w.document.body&&xDef(w.document.body.scrollLeft))offset=w.document.body.scrollLeft;}else{e=xGetElementById(e);if(e&&xNum(e.scrollLeft))offset=e.scrollLeft;}return offset;}function xScrollTop(e,bWin){var offset=0;if(!xDef(e)||bWin||e==document||e.tagName.toLowerCase()=='html'||e.tagName.toLowerCase()=='body'){var w=window;if(bWin&&e)w=e;if(w.document.documentElement&&w.document.documentElement.scrollTop)offset=w.document.documentElement.scrollTop;else if(w.document.body&&xDef(w.document.body.scrollTop))offset=w.document.body.scrollTop;}else{e=xGetElementById(e);if(e&&xNum(e.scrollTop))offset=e.scrollTop;}return offset;}function xSelect(sId,fnSubOnChange,sMainName,sSubName,bUnder,iMargin){function s1OnChange(){var io,s2=this.xSelSub;for(io=0;io<s2.options.length;++io){s2.options[io]=null;}var a=this.xSelData,ig=this.selectedIndex;for(io=1;io<a[ig].length;++io){op=new Option(a[ig][io]);s2.options[io-1]=op;}}var s0=xGetElementById(sId);if(!s0||!s0.firstChild||!s0.nodeName||!document.createElement||!s0.form||!s0.form.appendChild){return null;}var s1=document.createElement('SELECT');s1.id=s1.name=sMainName?sMainName:sId+'_main';s1.display='block';s1.style.position='absolute';s1.xSelObj=this;s1.xSelData=new Array();s0.form.appendChild(s1);var ig=0,io,op,og,a=s1.xSelData;og=s0.firstChild;while(og){if(og.nodeName.toLowerCase()=='optgroup'){io=0;a[ig]=new Array();a[ig][io]=og.label;op=og.firstChild;while(op){if(op.nodeName.toLowerCase()=='option'){io++;a[ig][io]=op.innerHTML;}op=op.nextSibling;}ig++;}og=og.nextSibling;}for(ig=0;ig<a.length;++ig){op=new Option(a[ig][0]);s1.options[ig]=op;}var s2=document.createElement('SELECT');s2.id=s2.name=sSubName?sSubName:sId+'_sub';s2.display='block';s2.style.position='absolute';s2.xSelMain=s1;s1.xSelSub=s2;s0.form.appendChild(s2);s1.onchange=s1OnChange;s2.onchange=fnSubOnChange||null;xHide(s0);xMoveTo(s1,xOffsetLeft(s0),xOffsetTop(s0));xShow(s1);iMargin=iMargin||0;if(bUnder){xMoveTo(s2,xOffsetLeft(s0),xOffsetTop(s0)+xHeight(s1)+iMargin);}else{xMoveTo(s2,xOffsetLeft(s0)+xWidth(s1)+iMargin,xOffsetTop(s0));}xShow(s2);s1.onchange();}function xSequence(seq){var ai=0;var stop=true;var running=false;function runSeq(){if(stop){running=false;return;}if(this.onslideend)this.onslideend=null;if(ai>=seq.length)ai=0;var i=ai;++ai;if(seq[i][0]!=-1){setTimeout(runSeq,seq[i][0]);}else{if(seq[i][2]&&seq[i][2][0])seq[i][2][0].onslideend=runSeq;}if(seq[i][1]){if(seq[i][2])seq[i][1].apply(window,seq[i][2]);else seq[i][1]();}}this.run=function(si){if(!running){if(xDef(si)&&si>=0&&si<seq.length)ai=si;stop=false;running=true;runSeq();}};this.stop=function(){stop=true;};this.onUnload=function(){if(!window.opera){for(var i=0;i<seq.length;++i){if(seq[i][2]&&seq[i][2][0]&&seq[i][2][0].onslideend)seq[i][2][0].onslideend=runSeq;}}};}function xSetCookie(name,value,expire,path){document.cookie=name+"="+escape(value)+((!expire)?"":("; expires="+expire.toGMTString()))+"; path="+((!path)?"/":path);}function xSetIETitle(){var ua=navigator.userAgent.toLowerCase();if(!window.opera&&navigator.vendor!='KDE'&&document.all&&ua.indexOf('msie')!=-1&&!document.layers){var i=ua.indexOf('msie')+1;var v=ua.substr(i+4,3);document.title='IE '+v+' - '+document.title;}}function xShow(e){return xVisibility(e,1);}function xSlideCornerTo(e,corner,targetX,targetY,totalTime){if(!(e=xGetElementById(e)))return;if(!e.timeout)e.timeout=25;e.xT=targetX;e.yT=targetY;e.slideTime=totalTime;e.corner=corner.toLowerCase();e.stop=false;switch(e.corner){case'nw':e.xA=e.xT-xLeft(e);e.yA=e.yT-xTop(e);e.xD=xLeft(e);e.yD=xTop(e);break;case'sw':e.xA=e.xT-xLeft(e);e.yA=e.yT-(xTop(e)+xHeight(e));e.xD=xLeft(e);e.yD=xTop(e)+xHeight(e);break;case'ne':e.xA=e.xT-(xLeft(e)+xWidth(e));e.yA=e.yT-xTop(e);e.xD=xLeft(e)+xWidth(e);e.yD=xTop(e);break;case'se':e.xA=e.xT-(xLeft(e)+xWidth(e));e.yA=e.yT-(xTop(e)+xHeight(e));e.xD=xLeft(e)+xWidth(e);e.yD=xTop(e)+xHeight(e);break;default:alert("xSlideCornerTo: Invalid corner");return;}if(e.slideLinear)e.B=1/e.slideTime;else e.B=Math.PI/(2*e.slideTime);var d=new Date();e.C=d.getTime();if(!e.moving)_xSlideCornerTo(e);}function _xSlideCornerTo(e){if(!(e=xGetElementById(e)))return;var now,seX,seY;now=new Date();t=now.getTime()-e.C;if(e.stop){e.moving=false;e.stop=false;return;}else if(t<e.slideTime){setTimeout("_xSlideCornerTo('"+e.id+"')",e.timeout);s=e.B*t;if(!e.slideLinear)s=Math.sin(s);newX=Math.round(e.xA*s+e.xD);newY=Math.round(e.yA*s+e.yD);}else{newX=e.xT;newY=e.yT;}seX=xLeft(e)+xWidth(e);seY=xTop(e)+xHeight(e);switch(e.corner){case'nw':xMoveTo(e,newX,newY);xResizeTo(e,seX-xLeft(e),seY-xTop(e));break;case'sw':if(e.xT!=xLeft(e)){xLeft(e,newX);xWidth(e,seX-xLeft(e));}xHeight(e,newY-xTop(e));break;case'ne':xWidth(e,newX-xLeft(e));if(e.yT!=xTop(e)){xTop(e,newY);xHeight(e,seY-xTop(e));}break;case'se':xWidth(e,newX-xLeft(e));xHeight(e,newY-xTop(e));break;default:e.stop=true;}e.moving=true;if(t>=e.slideTime){e.moving=false;if(e.onslideend)e.onslideend();}}function xSlideTo(e,x,y,uTime){if(!(e=xGetElementById(e)))return;if(!e.timeout)e.timeout=25;e.xTarget=x;e.yTarget=y;e.slideTime=uTime;e.stop=false;e.yA=e.yTarget-xTop(e);e.xA=e.xTarget-xLeft(e);if(e.slideLinear)e.B=1/e.slideTime;else e.B=Math.PI/(2*e.slideTime);e.yD=xTop(e);e.xD=xLeft(e);var d=new Date();e.C=d.getTime();if(!e.moving)_xSlideTo(e);}function _xSlideTo(e){if(!(e=xGetElementById(e)))return;var now,s,t,newY,newX;now=new Date();t=now.getTime()-e.C;if(e.stop){e.moving=false;}else if(t<e.slideTime){setTimeout("_xSlideTo('"+e.id+"')",e.timeout);s=e.B*t;if(!e.slideLinear)s=Math.sin(s);newX=Math.round(e.xA*s+e.xD);newY=Math.round(e.yA*s+e.yD);xMoveTo(e,newX,newY);e.moving=true;}else{xMoveTo(e,e.xTarget,e.yTarget);e.moving=false;if(e.onslideend)e.onslideend();}}function xSmartLoadScript(url){var loadedBefore=false;if(typeof(xLoadedList)!="undefined"){for(i=0;i<xLoadedList.length;i++){if(xLoadedList[i]==url){loadedBefore=true;break;}}}if(document.createElement&&document.getElementsByTagName&&!loadedBefore){var s=document.createElement('script');var h=document.getElementsByTagName('head');if(s&&h.length){s.src=url;h[0].appendChild(s);if(typeof(xLoadedList)=="undefined")xLoadedList=new Array();xLoadedList.push(url);}}}function xSplitter(sSplId,uSplX,uSplY,uSplW,uSplH,bHorizontal,uBarW,uBarPos,uBarLimit,bBarEnabled,uSplBorderW,oSplChild1,oSplChild2){var pane1,pane2,splW,splH;var splEle,barPos,barLim,barEle;function barOnDrag(ele,dx,dy){var bp;if(bHorizontal){bp=barPos+dx;if(bp<uBarLimit||bp>splW-uBarLimit){return;}xWidth(pane1,xWidth(pane1)+dx);xLeft(barEle,xLeft(barEle)+dx);xWidth(pane2,xWidth(pane2)-dx);xLeft(pane2,xLeft(pane2)+dx);barPos=bp;}else{bp=barPos+dy;if(bp<uBarLimit||bp>splH-uBarLimit){return;}xHeight(pane1,xHeight(pane1)+dy);xTop(barEle,xTop(barEle)+dy);xHeight(pane2,xHeight(pane2)-dy);xTop(pane2,xTop(pane2)+dy);barPos=bp;}if(oSplChild1){oSplChild1.paint(xWidth(pane1),xHeight(pane1));}if(oSplChild2){oSplChild2.paint(xWidth(pane2),xHeight(pane2));}}this.paint=function(uNewW,uNewH,uNewBarPos,uNewBarLim){if(uNewW==0){return;}var w1,h1,w2,h2;splW=uNewW;splH=uNewH;barPos=uNewBarPos||barPos;barLim=uNewBarLim||barLim;xMoveTo(splEle,uSplX,uSplY);xResizeTo(splEle,uNewW,uNewH);if(bHorizontal){w1=barPos;h1=uNewH-2*uSplBorderW;w2=uNewW-w1-uBarW-2*uSplBorderW;h2=h1;xMoveTo(pane1,0,0);xResizeTo(pane1,w1,h1);xMoveTo(barEle,w1,0);xResizeTo(barEle,uBarW,h1);xMoveTo(pane2,w1+uBarW,0);xResizeTo(pane2,w2,h2);}else{w1=uNewW-2*uSplBorderW;;h1=barPos;w2=w1;h2=uNewH-h1-uBarW-2*uSplBorderW;xMoveTo(pane1,0,0);xResizeTo(pane1,w1,h1);xMoveTo(barEle,0,h1);xResizeTo(barEle,w1,uBarW);xMoveTo(pane2,0,h1+uBarW);xResizeTo(pane2,w2,h2);}if(oSplChild1){pane1.style.overflow='hidden';oSplChild1.paint(w1,h1);}if(oSplChild2){pane2.style.overflow='hidden';oSplChild2.paint(w2,h2);}};splEle=xGetElementById(sSplId);pane1=xFirstChild(splEle,'DIV');pane2=xNextSib(pane1,'DIV');barEle=xNextSib(pane2,'DIV');pane1.style.zIndex=2;pane2.style.zIndex=2;barEle.style.zIndex=1;barPos=uBarPos;barLim=uBarLimit;this.paint(uSplW,uSplH);if(bBarEnabled){xEnableDrag(barEle,null,barOnDrag,null);barEle.style.cursor=bHorizontal?'e-resize':'n-resize';}splEle.style.visibility='visible';}function xStopPropagation(evt){if(evt&&evt.stopPropagation)evt.stopPropagation();else if(window.event)window.event.cancelBubble=true;}function xStr(s){for(var i=0;i<arguments.length;++i){if(typeof(arguments[i])!='string')return false;}return true;}function xStrEndsWith(s,end){if(!xStr(s,end))return false;var l=s.length;var r=l-end.length;if(r>0)return s.substring(r,l)==end;return s==end;}function xStrReplaceEnd(s,newEnd){if(!xStr(s,newEnd))return s;var l=s.length;var r=l-newEnd.length;if(r>0)return s.substring(0,r)+newEnd;return newEnd;}function xStrStartsWith(s,beg){if(!xStr(s,beg))return false;var l=s.length;var r=beg.length;if(r>l)return false;if(r==l)return s.substring(0,r)==beg;return s==beg;}function xTable(sTableId,sRoot,sCC,sFR,sFRI,sRCell,sFC,sFCI,sCCell,sTC,sCellT){var i,ot,cc=null,fcw,frh,root,fr,fri,fc,fci,tc;var e,t,tr,a,alen,tmr=null;ot=xGetElementById(sTableId);if(!ot||!document.createElement||!document.appendChild||!ot.deleteCaption||!ot.deleteTHead){return null;}fcw=xWidth(ot.rows[1].cells[0]);frh=xHeight(ot.rows[0]);root=document.createElement('div');root.className=sRoot;fr=document.createElement('div');fr.className=sFR;fri=document.createElement('div');fri.className=sFRI;fr.appendChild(fri);root.appendChild(fr);fc=document.createElement('div');fc.className=sFC;fci=document.createElement('div');fci.className=sFCI;fc.appendChild(fci);root.appendChild(fc);tc=document.createElement('div');tc.className=sTC;root.appendChild(tc);if(ot.caption){cc=document.createElement('div');cc.className=sCC;cc.appendChild(ot.caption.firstChild);root.appendChild(cc);ot.deleteCaption();}a=ot.rows[0].cells;alen=a.length;for(i=1;i<alen;++i){e=document.createElement('div');e.className=sRCell;t=document.createElement('table');t.className=sCellT;tr=t.insertRow(0);tr.appendChild(a[1]);e.appendChild(t);fri.appendChild(e);}if(ot.tHead){ot.deleteTHead();}a=ot.rows;alen=a.length;for(i=0;i<alen;++i){e=document.createElement('div');e.className=sCCell;t=document.createElement('table');t.className=sCellT;tr=t.insertRow(0);tr.appendChild(a[i].cells[0]);e.appendChild(t);fci.appendChild(e);}ot=ot.parentNode.replaceChild(root,ot);tc.appendChild(ot);resize();root.style.visibility='visible';xAddEventListener(tc,'scroll',onScroll,false);xAddEventListener(window,'resize',onResize,false);function onScroll(){xLeft(fri,-tc.scrollLeft);xTop(fci,-tc.scrollTop);}function onResize(){if(!tmr){tmr=setTimeout(function(){resize();tmr=null;},500);}}function resize(){var sum=0,cch=0,w,h;if(cc){cch=xHeight(cc);xMoveTo(cc,0,0);xWidth(cc,xWidth(root));}xMoveTo(fr,fcw,cch);xResizeTo(fr,xWidth(root)-fcw,frh);xMoveTo(fri,0,0);xResizeTo(fri,xWidth(ot),frh);xMoveTo(fc,0,cch+frh);xResizeTo(fc,fcw,xHeight(root)-cch);xMoveTo(fci,0,0);xResizeTo(fci,fcw,xHeight(ot));xMoveTo(tc,fcw,cch+frh);xWidth(tc,xWidth(root)-fcw-1);xHeight(tc,xHeight(root)-cch-frh-1);a=ot.rows[0].cells;e=xFirstChild(fri,'div');for(i=0;i<a.length;++i){xMoveTo(e,sum,0);w=xWidth(e,xWidth(a[i]));h=xHeight(e,frh);sum+=w;xResizeTo(xFirstChild(e,'table'),w,h);e=xNextSib(e,'div');}sum=0;a=ot.rows;e=xFirstChild(fci,'div');for(i=0;i<a.length;++i){xMoveTo(e,0,sum);w=xWidth(e,fcw);h=xHeight(e,xHeight(a[i]));sum+=h;xResizeTo(xFirstChild(e,'table'),w,h);e=xNextSib(e,'div');}onScroll();}}function xTableCellVisibility(bShow,sec,nRow,nCol){sec=xGetElementById(sec);if(sec&&nRow<sec.rows.length&&nCol<sec.rows[nRow].cells.length){sec.rows[nRow].cells[nCol].style.visibility=bShow?'visible':'hidden';}}function xTableColDisplay(bShow,sec,nCol){var r;sec=xGetElementById(sec);if(sec&&nCol<sec.rows[0].cells.length){for(r=0;r<sec.rows.length;++r){sec.rows[r].cells[nCol].style.display=bShow?'':'none';}}}function xTableCursor(id,inh,def,hov,sel){var tbl=xGetElementById(id);if(tbl){xTableIterate(tbl,init);}function init(obj,isRow){if(isRow){obj.className=def;obj.onmouseover=trOver;obj.onmouseout=trOut;}else{obj.className=inh;obj.onmouseover=tdOver;obj.onmouseout=tdOut;}}this.unload=function(){xTableIterate(tbl,done);};function done(o){o.onmouseover=o.onmouseout=null;}function trOver(){this.className=hov;}function trOut(){this.className=def;}function tdOver(){this.className=sel;}function tdOut(){this.className=inh;}}function xTableCursor2(id,hov,sel){var tbl=xGetElementById(id);if(tbl){xTableIterate(tbl,init);}function init(obj,isRow){if(isRow){obj.onmouseover=trOver;obj.onmouseout=trOut;}else{obj.onmouseover=tdOver;obj.onmouseout=tdOut;}}this.unload=function(){xTableIterate(tbl,done);};function done(o){o.onmouseover=o.onmouseout=null;}function trOver(){this.className+=" "+hov;}function trOut(){this.className=this.className.replace(hov,"");}function tdOver(){this.className+=" "+sel;}function tdOut(){this.className=this.className.replace(sel,"");}}function xTableHeaderFixed(fixedContainerId,fixedTableClass,fakeBodyId,tableBorder,thBorder){var tables=[];function onEvent(e){e=e||window.event;var r=e.type=='resize'?true:false;for(var i=0;i<tables.length;++i){scroll(tables[i],r);}}function scroll(t,bResize){if(!t){return;}var fhc=xGetElementById(fixedContainerId);var fh=xGetElementById(t.fixedHeaderId);var thead=t.tHead;var st,sl,thy=xPageY(thead);/*@cc_on@if(@_jscript_version==5.6)st=xGetElementById(fakeBodyId).scrollTop;sl=xGetElementById(fakeBodyId).scrollLeft;@else @*/st=xScrollTop();sl=xScrollLeft();/*@end @*/var th=xHeight(t);var tw=xWidth(t);var ty=xPageY(t);var tx=xPageX(t);var fhh=xHeight(fh);if(bResize){xWidth(fh,tw+2*tableBorder);var th1=xGetElementsByTagName('th',t);var th2=xGetElementsByTagName('th',fh);for(var i=0;i<th1.length;++i){xWidth(th2[i],xWidth(th1[i])+thBorder);}}xLeft(fh,tx-sl);if(st<=thy||st>ty+th-fhh){if(fh.style.visibility!='hidden'){fh.style.visibility='hidden';fhc.style.visibility='hidden';}}else{if(fh.style.visibility!='visible'){fh.style.visibility='visible';fhc.style.visibility='visible';}}}function init(){var i,tbl,h,t,con;if(null==(con=xGetElementById(fixedContainerId))){con=document.createElement('div');con.id=fixedContainerId;document.body.appendChild(con);}for(i=0;i<tables.length;++i){tbl=tables[i];h=tbl.tHead;if(h){t=document.createElement('table');t.className=fixedTableClass;t.appendChild(h.cloneNode(true));t.id=tbl.fixedHeaderId='xtfh'+i;con.appendChild(t);}else{tables[i]=null;}}con.style.visibility='hidden';}this.unload=function(){for(var i=0;i<tables.length;++i){tables[i]=null;}};var i,lst;if(arguments.length>5){i=5;lst=arguments;}else{i=0;lst=xGetElementsByTagName('table');}for(;i<lst.length;++i){tables[i]=xGetElementById(lst[i]);}init();onEvent({type:'resize'});/*@cc_on@if(@_jscript_version==5.6)xAddEventListener(fakeBodyId,'scroll',onEvent,false);@else @*/xAddEventListener(window,'scroll',onEvent,false);/*@end @*/xAddEventListener(window,'resize',onEvent,false);}function xTableIterate(sec,fnCallback,data){var r,c;sec=xGetElementById(sec);if(!sec||!fnCallback){return;}for(r=0;r<sec.rows.length;++r){if(false==fnCallback(sec.rows[r],true,r,c,data)){return;}for(c=0;c<sec.rows[r].cells.length;++c){if(false==fnCallback(sec.rows[r].cells[c],false,r,c,data)){return;}}}}function xTableRowDisplay(bShow,sec,nRow){sec=xGetElementById(sec);if(sec&&nRow<sec.rows.length){sec.rows[nRow].style.display=bShow?'':'none';}}function xTableSync(sT1Id,sT2Id,sEvent,fn){var t1=xGetElementById(sT1Id);var t2=xGetElementById(sT2Id);sEvent='on'+sEvent.toLowerCase();t1[sEvent]=t2[sEvent]=function(e){e=e||window.event;var t=e.target||e.srcElement;while(t&&t.nodeName.toLowerCase()!='td'){t=t.parentNode;}if(t){var r=t.parentNode.sectionRowIndex,c=t.cellIndex;var tbl=xGetElementById(this.id==sT1Id?sT2Id:sT1Id);fn(t,tbl.rows[r].cells[c]);}};t1=t2=null;}function xTabPanelGroup(id,w,h,th,clsTP,clsTG,clsTD,clsTS){function onClick(){paint(this);return false;}function onFocus(){paint(this);}function paint(tab){tab.className=clsTS;xZIndex(tab,highZ++);xDisplay(panels[tab.xTabIndex],'block');if(selectedIndex!=tab.xTabIndex){xDisplay(panels[selectedIndex],'none');tabs[selectedIndex].className=clsTD;selectedIndex=tab.xTabIndex;}}var panelGrp,tabGrp,panels,tabs,highZ,selectedIndex;this.select=function(n){if(n&&n<=tabs.length){var t=tabs[n-1];if(t.focus)t.focus();else t.onclick();}};this.onUnload=function(){if(!window.opera)for(var i=0;i<tabs.length;++i){tabs[i].onfocus=tabs[i].onclick=null;}};this.onResize=function(newW,newH){var x=0,i;if(newW){w=newW;xWidth(panelGrp,w);}else w=xWidth(panelGrp);if(newH){h=newH;xHeight(panelGrp,h);}else h=xHeight(panelGrp);xResizeTo(tabGrp[0],w,th);xMoveTo(tabGrp[0],0,0);w-=2;var tw=w/tabs.length;for(i=0;i<tabs.length;++i){xResizeTo(tabs[i],tw,th);xMoveTo(tabs[i],x,0);x+=tw;tabs[i].xTabIndex=i;tabs[i].onclick=onClick;tabs[i].onfocus=onFocus;xDisplay(panels[i],'none');xResizeTo(panels[i],w,h-th-2);xMoveTo(panels[i],0,th);}highZ=i;tabs[selectedIndex].onclick();};panelGrp=xGetElementById(id);if(!panelGrp){return null;}panels=xGetElementsByClassName(clsTP,panelGrp);tabs=xGetElementsByClassName(clsTD,panelGrp);tabGrp=xGetElementsByClassName(clsTG,panelGrp);if(!panels||!tabs||!tabGrp||panels.length!=tabs.length||tabGrp.length!=1){return null;}selectedIndex=0;this.onResize(w,h);}function xTimerMgr(){this.tmr=null;this.timers=new Array();}xTimerMgr.prototype.set=function(type,obj,sMethod,uTime,data){return(this.timers[this.timers.length]=new xTimerObj(type,obj,sMethod,uTime,data));};xTimerMgr.prototype.run=function(){var i,t,d=new Date(),now=d.getTime();for(i=0;i<this.timers.length;++i){t=this.timers[i];if(t&&t.running){t.elapsed=now-t.time0;if(t.elapsed>=t.preset){t.obj[t.mthd](t);if(t.type.charAt(0)=='i'){t.time0=now;}else{t.stop();}}}}};xTimerMgr.prototype.tick=function(t){if(this.tmr)clearInterval(this.tmr);this.tmr=setInterval('xTimer.run()',t);};function xTimerObj(type,obj,mthd,preset,data){this.data=data;this.type=type;this.obj=obj;this.mthd=mthd;this.preset=preset;this.reset();}xTimerObj.prototype.stop=function(){this.running=false;};xTimerObj.prototype.start=function(){this.running=true;};xTimerObj.prototype.reset=function(){var d=new Date();this.time0=d.getTime();this.elapsed=0;this.running=true;};var xTimer=new xTimerMgr();xTimer.tmr=setInterval('xTimer.run()',25);function xTimes(n,f,s){s=s||0;n=n+s;for(var i=s;i<n;i++)f(i);};function xToggleClass(e,c){if(!(e=xGetElementById(e)))return null;if(!xRemoveClass(e,c)&&!xAddClass(e,c))return false;return true;}function xTooltipGroup(grpClassOrIdList,tipClass,origin,xOffset,yOffset,textList){this.c=tipClass;this.o=origin;this.x=xOffset;this.y=yOffset;var i,tips;if(xStr(grpClassOrIdList)){tips=xGetElementsByClassName(grpClassOrIdList);for(i=0;i<tips.length;++i){tips[i].xTooltip=this;}}else{tips=new Array();for(i=0;i<grpClassOrIdList.length;++i){tips[i]=xGetElementById(grpClassOrIdList[i]);if(!tips[i]){alert('Element not found for id = '+grpClassOrIdList[i]);}else{tips[i].xTooltip=this;tips[i].xTooltipText=textList[i];}}}if(!xTooltipGroup.tipEle){var te=document.createElement("div");if(te){te.setAttribute('id','xTooltipElement');te.setAttribute('style','position:absolute;visibility:hidden;');xTooltipGroup.tipEle=document.body.appendChild(te);xAddEventListener(document,'mousemove',xTooltipGroup.docOnMousemove,false);}}}xTooltipGroup.trgEle=null;xTooltipGroup.tipEle=null;xTooltipGroup.docOnMousemove=function(oEvent){var o,e=new xEvent(oEvent);if(e.target&&(o=e.target.xTooltip)){o.show(e.target,e.pageX,e.pageY);}else if(xTooltipGroup.trgEle){xTooltipGroup.trgEle.xTooltip.hide();}};xTooltipGroup.prototype.show=function(trigEle,mx,my){if(xTooltipGroup.trgEle!=trigEle){xTooltipGroup.tipEle.className=trigEle.xTooltip.c;xTooltipGroup.tipEle.innerHTML=trigEle.xTooltipText?trigEle.xTooltipText:trigEle.title;xTooltipGroup.trgEle=trigEle;}var x,y,tipW,trgW,trgX;tipW=xWidth(xTooltipGroup.tipEle);trgW=xWidth(trigEle);trgX=xPageX(trigEle);switch(this.o){case'right':if(trgX+this.x+trgW+tipW<xClientWidth()){x=trgX+this.x+trgW;}else{x=trgX-tipW-this.x;}y=xPageY(trigEle)+this.y;break;case'top':x=trgX+this.x;y=xPageY(trigEle)-xHeight(trigEle)+this.y;break;case'mouse':if(mx+this.x+tipW<xClientWidth()){x=mx+this.x;}else{x=mx-tipW-this.x;}y=my+this.y;break;}xMoveTo(xTooltipGroup.tipEle,x,y);xShow(xTooltipGroup.tipEle);};xTooltipGroup.prototype.hide=function(){xMoveTo(xTooltipGroup.tipEle,-1000,-1000);xTooltipGroup.trgEle=null;};function xTop(e,iY){if(!(e=xGetElementById(e)))return 0;var css=xDef(e.style);if(css&&xStr(e.style.top)){if(xNum(iY))e.style.top=iY+'px';else{iY=parseInt(e.style.top);if(isNaN(iY))iY=xGetComputedStyle(e,'top',1);if(isNaN(iY))iY=0;}}else if(css&&xDef(e.style.pixelTop)){if(xNum(iY))e.style.pixelTop=iY;else iY=e.style.pixelTop;}return iY;}function xTraverseDocumentStyleSheets(cb){var ssList=document.styleSheets;if(!ssList)return undefined;for(i=0;i<ssList.length;i++){var ss=ssList[i];if(!ss)continue;if(xTraverseStyleSheet(ss,cb))return true;}return false;}function xTraverseStyleSheet(ss,cb){if(!ss)return false;var rls=xGetCSSRules(ss);if(!rls)return undefined;var result;for(var j=0;j<rls.length;j++){var cr=rls[j];if(cr.selectorText){result=cb(cr);if(result)return true;}if(cr.type&&cr.type==3&&cr.styleSheet)xTraverseStyleSheet(cr.styleSheet,cb);}if(ss.imports){for(var j=0;j<ss.imports.length;j++){if(xTraverseStyleSheet(ss.imports[j],cb))return true;}}return false;}function xTreeMenu(sUlId,sMainUlClass,sSubUlClass,sLblLiClass,sItmLiClass,sPlusImg,sMinusImg,sImgClass,sImgWidth){this.id=sUlId;function onclick(){if(this.xtmChildUL){var s,uls=this.xtmChildUL.style;if(uls.display!='block'){s=sMinusImg;uls.display='block';xWalkUL(this.xtmParentUL,this.xtmChildUL,function(p,li,c,d){if(c&&c!=d&&c.style.display!='none'){if(sPlusImg){var a=xFirstChild(li,'a');xFirstChild(a,'img').src=sPlusImg;}c.style.display='none';}return true;});}else{s=sPlusImg;uls.display='none';}if(sPlusImg){xFirstChild(this,'img').src=s;}return false;}return true;}var ul=xGetElementById(sUlId);ul.className=sMainUlClass;xWalkUL(ul,null,function(p,li,c){var liCls=sItmLiClass;var a=xFirstChild(li,'a');if(a){var m='Click to toggle sub-menu';if(c){if(sPlusImg){var i=document.createElement('img');i.title=m;a.insertBefore(i,a.firstChild);i.src=sPlusImg;i.className=sImgClass;}liCls=sLblLiClass;c.className=sSubUlClass;c.style.display='none';a.title=m;a.xtmParentUL=p;a.xtmChildUL=c;a.onclick=onclick;}else if(sPlusImg){a.style.paddingLeft=sImgWidth;}}li.className=liCls;return true;});}xTreeMenu.prototype.unload=function(){xWalkUL(xGetElementById(this.id),null,function(p,li,c){var a=xFirstChild(li,'a');if(a&&c){a.xtmParentUL=null;a.xtmChildUL=null;a.onclick=null;}return true;});};function xTriStateImage(idOut,urlOver,urlDown,fnUp){var img;if(typeof Image!='undefined'&&document.getElementById){img=document.getElementById(idOut);if(img){var urlOut=img.src;var i=new Image();i.src=urlOver;i=new Image();i.src=urlDown;img.onmouseover=function(){this.src=urlOver;};img.onmouseout=function(){this.src=urlOut;};img.onmousedown=function(){this.src=urlDown;};img.onmouseup=function(){this.src=urlOver;if(fnUp){fnUp();}};}}this.onunload=function(){if(!window.opera&&img){img.onmouseover=img.onmouseout=img.onmousedown=null;img=null;}};}function xVisibility(e,bShow){if(!(e=xGetElementById(e)))return null;if(e.style&&xDef(e.style.visibility)){if(xDef(bShow))e.style.visibility=bShow?'visible':'hidden';return e.style.visibility;}return null;}function xWalkToFirst(oNode,fnVisit,skip,data){var r=null;while(oNode){if(oNode.nodeType==1&&oNode!=skip){r=fnVisit(oNode,data);if(r)return r;}var n=oNode;while(n=n.previousSibling){if(n!=skip){r=xWalkTreeRev(n,fnVisit,skip,data);if(r)return r;}}oNode=oNode.parentNode;}return r;}function xWalkToLast(oNode,fnVisit,skip,data){var r=null;if(oNode){r=xWalkTree2(oNode,fnVisit,skip,data);if(r)return r;while(oNode){var n=oNode;while(n=n.nextSibling){if(n!=skip){r=xWalkTree2(n,fnVisit,skip,data);if(r)return r;}}oNode=oNode.parentNode;}}return r;}function xWalkTree(n,f){f(n);for(var c=n.firstChild;c;c=c.nextSibling){if(c.nodeType==1)xWalkTree(c,f);}}function xWalkTree2(oNode,fnVisit,skip,data){var r=null;if(oNode){if(oNode.nodeType==1&&oNode!=skip){r=fnVisit(oNode,data);if(r)return r;}for(var c=oNode.firstChild;c;c=c.nextSibling){if(c!=skip)r=xWalkTree2(c,fnVisit,skip,data);if(r)return r;}}return r;}function xWalkTree3(n,f,d,l,b){if(typeof l=='undefined')l=0;if(typeof b=='undefined')b=0;var v=f(n,l,b,d);if(!v)return 0;if(v==1){for(var c=n.firstChild;c;c=c.nextSibling){if(c.nodeType==1){if(!l)++b;if(!xWalkTree3(c,f,d,l+1,b))return 0;}}}return 1;}function xWalkTreeRev(oNode,fnVisit,skip,data){var r=null;if(oNode){if(oNode.nodeType==1&&oNode!=skip){r=fnVisit(oNode,data);if(r)return r;}for(var c=oNode.lastChild;c;c=c.previousSibling){if(c!=skip)r=xWalkTreeRev(c,fnVisit,skip,data);if(r)return r;}}return r;}function xWalkUL(oUL,data,fn){var r,ul,li=xFirstChild(oUL);while(li){ul=xFirstChild(li,'ul');r=fn(oUL,li,ul,data);if(ul){if(!r||!xWalkUL(ul,data,fn)){return 0;};}li=xNextSib(li);}return 1;}function xWidth(e,w){if(!(e=xGetElementById(e)))return 0;if(xNum(w)){if(w<0)w=0;else w=Math.round(w);}else w=-1;var css=xDef(e.style);if(e==document||e.tagName.toLowerCase()=='html'||e.tagName.toLowerCase()=='body'){w=xClientWidth();}else if(css&&xDef(e.offsetWidth)&&xStr(e.style.width)){if(w>=0){var pl=0,pr=0,bl=0,br=0;if(document.compatMode=='CSS1Compat'){var gcs=xGetComputedStyle;pl=gcs(e,'padding-left',1);if(pl!==null){pr=gcs(e,'padding-right',1);bl=gcs(e,'border-left-width',1);br=gcs(e,'border-right-width',1);}else if(xDef(e.offsetWidth,e.style.width)){e.style.width=w+'px';pl=e.offsetWidth-w;}}w-=(pl+pr+bl+br);if(isNaN(w)||w<0)return;else e.style.width=w+'px';}w=e.offsetWidth;}else if(css&&xDef(e.style.pixelWidth)){if(w>=0)e.style.pixelWidth=w;w=e.style.pixelWidth;}return w;}function xWinClass(clsName,winName,w,h,x,y,loc,men,res,scr,sta,too){var thisObj=this;var e='',c=',',xf='left=',yf='top=';this.n=name;if(document.layers){xf='screenX=';yf='screenY=';}this.f=(w?'width='+w+c:e)+(h?'height='+h+c:e)+(x>=0?xf+x+c:e)+(y>=0?yf+y+c:e)+'location='+loc+',menubar='+men+',resizable='+res+',scrollbars='+scr+',status='+sta+',toolbar='+too;this.opened=function(){return this.w&&!this.w.closed;};this.close=function(){if(this.opened())this.w.close();};this.focus=function(){if(this.opened())this.w.focus();};this.load=function(sUrl){if(this.opened())this.w.location.href=sUrl;else this.w=window.open(sUrl,this.n,this.f);this.focus();return false;};function onClick(){return thisObj.load(this.href);}xGetElementsByClassName(clsName,document,'*',bindOnClick);function bindOnClick(e){e.onclick=onClick;}}function xWindow(name,w,h,x,y,loc,men,res,scr,sta,too){var e='',c=',',xf='left=',yf='top=';this.n=name;if(document.layers){xf='screenX=';yf='screenY=';}this.f=(w?'width='+w+c:e)+(h?'height='+h+c:e)+(x>=0?xf+x+c:e)+(y>=0?yf+y+c:e)+'location='+loc+',menubar='+men+',resizable='+res+',scrollbars='+scr+',status='+sta+',toolbar='+too;this.opened=function(){return this.w&&!this.w.closed;};this.close=function(){if(this.opened())this.w.close();};this.focus=function(){if(this.opened())this.w.focus();};this.load=function(sUrl){if(this.opened())this.w.location.href=sUrl;else this.w=window.open(sUrl,this.n,this.f);this.focus();return false;};}var xChildWindow=null;function xWinOpen(sUrl){var features="left=0,top=0,width=600,height=500,location=0,menubar=0,"+"resizable=1,scrollbars=1,status=0,toolbar=0";if(xChildWindow&&!xChildWindow.closed){xChildWindow.location.href=sUrl;}else{xChildWindow=window.open(sUrl,"myWinName",features);}xChildWindow.focus();return false;}var xWinScrollWin=null;function xWinScrollTo(win,x,y,uTime){var e=win;if(!e.timeout)e.timeout=25;var st=xScrollTop(e,1);var sl=xScrollLeft(e,1);e.xTarget=x;e.yTarget=y;e.slideTime=uTime;e.stop=false;e.yA=e.yTarget-st;e.xA=e.xTarget-sl;if(e.slideLinear)e.B=1/e.slideTime;else e.B=Math.PI/(2*e.slideTime);e.yD=st;e.xD=sl;var d=new Date();e.C=d.getTime();if(!e.moving){xWinScrollWin=e;_xWinScrollTo();}}function _xWinScrollTo(){var e=xWinScrollWin||window;var now,s,t,newY,newX;now=new Date();t=now.getTime()-e.C;if(e.stop){e.moving=false;}else if(t<e.slideTime){setTimeout("_xWinScrollTo()",e.timeout);s=e.B*t;if(!e.slideLinear)s=Math.sin(s);newX=Math.round(e.xA*s+e.xD);newY=Math.round(e.yA*s+e.yD);e.scrollTo(newX,newY);e.moving=true;}else{e.scrollTo(e.xTarget,e.yTarget);xWinScrollWin=null;e.moving=false;if(e.onslideend)e.onslideend();}}function xZIndex(e,uZ){if(!(e=xGetElementById(e)))return 0;if(e.style&&xDef(e.style.zIndex)){if(xNum(uZ))e.style.zIndex=uZ;uZ=parseInt(e.style.zIndex);}return uZ;}
function xBackground(e,c,i){if(!(e=xGetElementById(e)))return'';var bg='';if(e.style){if(xStr(c)){e.style.backgroundColor=c;}if(xStr(i)){e.style.backgroundImage=(i!='')?'url('+i+')':null;}bg=e.style.backgroundColor;}return bg;}function xClientHeight(){var v=0,d=document,w=window;if(d.compatMode=='CSS1Compat'&&!w.opera&&d.documentElement&&d.documentElement.clientHeight){v=d.documentElement.clientHeight;}else if(d.body&&d.body.clientHeight){v=d.body.clientHeight;}else if(xDef(w.innerWidth,w.innerHeight,d.width)){v=w.innerHeight;if(d.width>w.innerWidth)v-=16;}return v;}function xClientWidth(){var v=0,d=document,w=window;if(d.compatMode=='CSS1Compat'&&!w.opera&&d.documentElement&&d.documentElement.clientWidth){v=d.documentElement.clientWidth;}else if(d.body&&d.body.clientWidth){v=d.body.clientWidth;}else if(xDef(w.innerWidth,w.innerHeight,d.height)){v=w.innerWidth;if(d.height>w.innerHeight)v-=16;}return v;}function xClip(e,t,r,b,l){if(!(e=xGetElementById(e)))return;if(e.style){if(xNum(l))e.style.clip='rect('+t+'px '+r+'px '+b+'px '+l+'px)';else e.style.clip='rect(0 '+parseInt(e.style.width)+'px '+parseInt(e.style.height)+'px 0)';}}function xColor(e,s){if(!(e=xGetElementById(e)))return'';var c='';if(e.style&&xDef(e.style.color)){if(xStr(s))e.style.color=s;c=e.style.color;}return c;}function xDef(){for(var i=0;i<arguments.length;++i){if(typeof(arguments[i])=='undefined')return false;}return true;}function xDisplay(e,s){if((e=xGetElementById(e))&&e.style&&xDef(e.style.display)){if(xStr(s)){try{e.style.display=s;}catch(ex){e.style.display='';}}return e.style.display;}return null;}function xGetComputedStyle(oEle,sProp,bInt){var s,p='undefined';var dv=document.defaultView;if(dv&&dv.getComputedStyle){s=dv.getComputedStyle(oEle,'');if(s)p=s.getPropertyValue(sProp);}else if(oEle.currentStyle){var i,c,a=sProp.split('-');sProp=a[0];for(i=1;i<a.length;++i){c=a[i].charAt(0);sProp+=a[i].replace(c,c.toUpperCase());}p=oEle.currentStyle[sProp];}else return null;return bInt?(parseInt(p)||0):p;}function xGetElementById(e){if(typeof(e)=='string'){if(document.getElementById)e=document.getElementById(e);else if(document.all)e=document.all[e];else e=null;}return e;}function xGetElementsByTagName(t,p){var list=null;t=t||'*';p=p||document;if(typeof p.getElementsByTagName!='undefined'){list=p.getElementsByTagName(t);if(t=='*'&&(!list||!list.length))list=p.all;}else{if(t=='*')list=p.all;else if(p.all&&p.all.tags)list=p.all.tags(t);}return list||new Array();}function xHasPoint(e,x,y,t,r,b,l){if(!xNum(t)){t=r=b=l=0;}else if(!xNum(r)){r=b=l=t;}else if(!xNum(b)){l=r;b=t;}var eX=xPageX(e),eY=xPageY(e);return(x>=eX+l&&x<=eX+xWidth(e)-r&&y>=eY+t&&y<=eY+xHeight(e)-b);}function xHeight(e,h){if(!(e=xGetElementById(e)))return 0;if(xNum(h)){if(h<0)h=0;else h=Math.round(h);}else h=-1;var css=xDef(e.style);if(e==document||e.tagName.toLowerCase()=='html'||e.tagName.toLowerCase()=='body'){h=xClientHeight();}else if(css&&xDef(e.offsetHeight)&&xStr(e.style.height)){if(h>=0){var pt=0,pb=0,bt=0,bb=0;if(document.compatMode=='CSS1Compat'){var gcs=xGetComputedStyle;pt=gcs(e,'padding-top',1);if(pt!==null){pb=gcs(e,'padding-bottom',1);bt=gcs(e,'border-top-width',1);bb=gcs(e,'border-bottom-width',1);}else if(xDef(e.offsetHeight,e.style.height)){e.style.height=h+'px';pt=e.offsetHeight-h;}}h-=(pt+pb+bt+bb);if(isNaN(h)||h<0)return;else e.style.height=h+'px';}h=e.offsetHeight;}else if(css&&xDef(e.style.pixelHeight)){if(h>=0)e.style.pixelHeight=h;h=e.style.pixelHeight;}return h;}function xHide(e){return xVisibility(e,0);}function xLeft(e,iX){if(!(e=xGetElementById(e)))return 0;var css=xDef(e.style);if(css&&xStr(e.style.left)){if(xNum(iX))e.style.left=iX+'px';else{iX=parseInt(e.style.left);if(isNaN(iX))iX=xGetComputedStyle(e,'left',1);if(isNaN(iX))iX=0;}}else if(css&&xDef(e.style.pixelLeft)){if(xNum(iX))e.style.pixelLeft=iX;else iX=e.style.pixelLeft;}return iX;}xLibrary={version:'4.09',license:'GNU LGPL',url:'http://cross-browser.com/'};function xMoveTo(e,x,y){xLeft(e,x);xTop(e,y);}function xNum(){for(var i=0;i<arguments.length;++i){if(isNaN(arguments[i])||typeof(arguments[i])!='number')return false;}return true;}function xOffsetLeft(e){if(!(e=xGetElementById(e)))return 0;if(xDef(e.offsetLeft))return e.offsetLeft;else return 0;}function xOffsetTop(e){if(!(e=xGetElementById(e)))return 0;if(xDef(e.offsetTop))return e.offsetTop;else return 0;}function xOpacity(e,o){var set=xDef(o);if(!(e=xGetElementById(e)))return 2;if(xStr(e.style.opacity)){if(set)e.style.opacity=o+'';else o=parseFloat(e.style.opacity);}else if(xStr(e.style.filter)){if(set)e.style.filter='alpha(opacity='+(100*o)+')';else if(e.filters&&e.filters.alpha){o=e.filters.alpha.opacity/100;}}else if(xStr(e.style.MozOpacity)){if(set)e.style.MozOpacity=o+'';else o=parseFloat(e.style.MozOpacity);}else if(xStr(e.style.KhtmlOpacity)){if(set)e.style.KhtmlOpacity=o+'';else o=parseFloat(e.style.KhtmlOpacity);}return isNaN(o)?1:o;}function xPageX(e){var x=0;e=xGetElementById(e);while(e){if(xDef(e.offsetLeft))x+=e.offsetLeft;e=xDef(e.offsetParent)?e.offsetParent:null;}return x;}function xPageY(e){var y=0;e=xGetElementById(e);while(e){if(xDef(e.offsetTop))y+=e.offsetTop;e=xDef(e.offsetParent)?e.offsetParent:null;}return y;}function xParent(e,bNode){if(!(e=xGetElementById(e)))return null;var p=null;if(!bNode&&xDef(e.offsetParent))p=e.offsetParent;else if(xDef(e.parentNode))p=e.parentNode;else if(xDef(e.parentElement))p=e.parentElement;return p;}function xResizeTo(e,w,h){xWidth(e,w);xHeight(e,h);}function xScrollLeft(e,bWin){var offset=0;if(!xDef(e)||bWin||e==document||e.tagName.toLowerCase()=='html'||e.tagName.toLowerCase()=='body'){var w=window;if(bWin&&e)w=e;if(w.document.documentElement&&w.document.documentElement.scrollLeft)offset=w.document.documentElement.scrollLeft;else if(w.document.body&&xDef(w.document.body.scrollLeft))offset=w.document.body.scrollLeft;}else{e=xGetElementById(e);if(e&&xNum(e.scrollLeft))offset=e.scrollLeft;}return offset;}function xScrollTop(e,bWin){var offset=0;if(!xDef(e)||bWin||e==document||e.tagName.toLowerCase()=='html'||e.tagName.toLowerCase()=='body'){var w=window;if(bWin&&e)w=e;if(w.document.documentElement&&w.document.documentElement.scrollTop)offset=w.document.documentElement.scrollTop;else if(w.document.body&&xDef(w.document.body.scrollTop))offset=w.document.body.scrollTop;}else{e=xGetElementById(e);if(e&&xNum(e.scrollTop))offset=e.scrollTop;}return offset;}function xShow(e){return xVisibility(e,1);}function xStr(s){for(var i=0;i<arguments.length;++i){if(typeof(arguments[i])!='string')return false;}return true;}function xTop(e,iY){if(!(e=xGetElementById(e)))return 0;var css=xDef(e.style);if(css&&xStr(e.style.top)){if(xNum(iY))e.style.top=iY+'px';else{iY=parseInt(e.style.top);if(isNaN(iY))iY=xGetComputedStyle(e,'top',1);if(isNaN(iY))iY=0;}}else if(css&&xDef(e.style.pixelTop)){if(xNum(iY))e.style.pixelTop=iY;else iY=e.style.pixelTop;}return iY;}var xOp7Up,xOp6Dn,xIE4Up,xIE4,xIE5,xNN4,xUA=navigator.userAgent.toLowerCase();if(window.opera){var i=xUA.indexOf('opera');if(i!=-1){var v=parseInt(xUA.charAt(i+6));xOp7Up=v>=7;xOp6Dn=v<7;}}else if(navigator.vendor!='KDE'&&document.all&&xUA.indexOf('msie')!=-1){xIE4Up=parseFloat(navigator.appVersion)>=4;xIE4=xUA.indexOf('msie 4')!=-1;xIE5=xUA.indexOf('msie 5')!=-1;}else if(document.layers){xNN4=true;}xMac=xUA.indexOf('mac')!=-1;function xVisibility(e,bShow){if(!(e=xGetElementById(e)))return null;if(e.style&&xDef(e.style.visibility)){if(xDef(bShow))e.style.visibility=bShow?'visible':'hidden';return e.style.visibility;}return null;}function xWidth(e,w){if(!(e=xGetElementById(e)))return 0;if(xNum(w)){if(w<0)w=0;else w=Math.round(w);}else w=-1;var css=xDef(e.style);if(e==document||e.tagName.toLowerCase()=='html'||e.tagName.toLowerCase()=='body'){w=xClientWidth();}else if(css&&xDef(e.offsetWidth)&&xStr(e.style.width)){if(w>=0){var pl=0,pr=0,bl=0,br=0;if(document.compatMode=='CSS1Compat'){var gcs=xGetComputedStyle;pl=gcs(e,'padding-left',1);if(pl!==null){pr=gcs(e,'padding-right',1);bl=gcs(e,'border-left-width',1);br=gcs(e,'border-right-width',1);}else if(xDef(e.offsetWidth,e.style.width)){e.style.width=w+'px';pl=e.offsetWidth-w;}}w-=(pl+pr+bl+br);if(isNaN(w)||w<0)return;else e.style.width=w+'px';}w=e.offsetWidth;}else if(css&&xDef(e.style.pixelWidth)){if(w>=0)e.style.pixelWidth=w;w=e.style.pixelWidth;}return w;}function xZIndex(e,uZ){if(!(e=xGetElementById(e)))return 0;if(e.style&&xDef(e.style.zIndex)){if(xNum(uZ))e.style.zIndex=uZ;uZ=parseInt(e.style.zIndex);}return uZ;}

//Funcion ampliar foto
function ampliarFoto(archivo,ancho,alto){ 
   xWidth ('ampliacion',ancho + 6); 
   xHeight ('ampliacion',alto + 6 + 20); 
   xWidth ('c1',ancho); 
   xHeight ('c1',alto); 
   xWidth ('cerrarampliacion',ancho); 

   xInnerHtml('c1','<img src="' + archivo + '" width="' + ancho + '" height="' + alto + '" border="0">'); 

   pos_left = parseInt((xClientWidth()-ancho+3)/2) 
   pos_top = xScrollTop() + parseInt((xClientHeight()-alto)/2) 
   if (pos_top<10) pos_top=10 
   xMoveTo('ampliacion',pos_left,pos_top) 


   setTimeout("xShow('ampliacion')",50) 
 
} 

//Funcion ampliar noticia
function ampliarNoticia(titulo,texto,ancho,alto){ 
   xWidth ('ampliacion',ancho + 6); 
   xHeight ('ampliacion',alto + 6 + 20); 
   xWidth ('c1',ancho); 
   xHeight ('c1',alto); 
   xWidth ('cerrarampliacion',ancho); 

   xInnerHtml('c1','<h1>'+titulo+'</h1><h4 class="noticias">'+texto+'</h4>'); 

   pos_left = parseInt((xClientWidth()-ancho+3)/2) 
   pos_top = xScrollTop() + parseInt((xClientHeight()-alto)/2) 
   if (pos_top<10) pos_top=10 
   xMoveTo('ampliacion',pos_left,pos_top) 


   setTimeout("xShow('ampliacion')",50) 
 
} 

function cerrar_ampliacion(){ 
   xHide('ampliacion'); 
}
//-----------------------------------------------------------------------------------------------------------------

/*--------------------------------------------------------------------------------------------------------------*/
/*Pesta�as*/
function CambiarEstilo(id, id2) {
	var elementosMenu = getElementsByClassName(document, "a", "active");
	for (k = 0; k< elementosMenu.length; k++) {
		elementosMenu[k].className = "nav-link";
	}
	var identity=document.getElementById(id);
	identity.className="nav-link active";
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
/*Fin de pesta�as*/
/*--------------------------------------------------------------------------------------------------------------*/

function cargarCambioIdioma(idioma)
{
	var pagina = document.getElementById("paginaactual").value;
	//Esperar 3 segundos para cambiar de idioma
	setTimeout("cambioidioma()", 3000);
	
	var cambiandoidioma = document.getElementById("cambiandoIdioma").value;

 	var href=document.URL;
  var URLBasica = href.split("/");
	//Local
  var href = URLBasica[0]+"//"+URLBasica[2]+"/"+URLBasica[3]+"/includes/inc_cambio_idioma.php?idioma="+idioma;
  //Servidor
  //var href = URLBasica[0]+"//"+URLBasica[2]+"/"+URLBasica[3]+"includes/inc_cambio_idioma.php?idioma="+idioma;
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

function cambio_foto(pagina,foto,cursor,idioma)
{
	var idgaleria = document.getElementById("IdGaleria");
	var parametros='';
	if (cursor!=0)
	{
		parametros='?cursor='+cursor+'&pagina='+pagina+'&IdGaleria='+idgaleria.value;
	}
	else
	{
		parametros='?pagina='+pagina+'&IdGaleria='+idgaleria.value;
	}
	
	llamada_prototype('../includes/inc_pasarela.php'+parametros,'pasarela');
	llamada_prototype('../includes/inc_foto_principal.php?IdFoto='+foto+'&IdGaleria='+idgaleria.value,'fotoprincipal');

}

function centrarpopup(url, name, w, h)
{
	url += "&IdFoto="+document.getElementById("IdFoto").value;
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

/* <![CDATA[ */var qm_si,qm_li,qm_lo,qm_tt,qm_th,qm_ts,qm_la,qm_ic,qm_ib;var qp="parentNode";var qc="className";var qm_t=navigator.userAgent;var qm_o=qm_t.indexOf("Opera")+1;var qm_s=qm_t.indexOf("afari")+1;var qm_s2=qm_s&&qm_t.indexOf("ersion/2")+1;var qm_s3=qm_s&&qm_t.indexOf("ersion/3")+1;var qm_n=qm_t.indexOf("Netscape")+1;var qm_v=parseFloat(navigator.vendorSub);;function qm_create(sd,v,ts,th,oc,rl,sh,fl,ft,aux,l){var w="onmouseover";var ww=w;var e="onclick";if(oc){if(oc=="all"||(oc=="lev2"&&l>=2)){w=e;ts=0;}if(oc=="all"||oc=="main"){ww=e;th=0;}}if(!l){l=1;qm_th=th;sd=document.getElementById("qm"+sd);if(window.qm_pure)sd=qm_pure(sd);sd[w]=function(e){qm_kille(e)};document[ww]=qm_bo;if(oc=="main"){qm_ib=true;sd[e]=function(event){qm_ic=true;qm_oo(new Object(),qm_la,1);qm_kille(event)};document.onmouseover=function(){qm_la=null;clearTimeout(qm_tt);qm_tt=null;};}sd.style.zoom=1;if(sh)x2("qmsh",sd,1);if(!v)sd.ch=1;}else  if(sh)sd.ch=1;if(oc)sd.oc=oc;if(sh)sd.sh=1;if(fl)sd.fl=1;if(ft)sd.ft=1;if(rl)sd.rl=1;sd.style.zIndex=l+""+1;var lsp;var sp=sd.childNodes;for(var i=0;i<sp.length;i++){var b=sp[i];if(b.tagName=="A"){lsp=b;b[w]=qm_oo;if(w==e)b.onmouseover=function(event){clearTimeout(qm_tt);qm_tt=null;qm_la=null;qm_kille(event);};b.qmts=ts;if(l==1&&v){b.style.styleFloat="none";b.style.cssFloat="none";}}else  if(b.tagName=="DIV"){if(window.showHelp&&!window.XMLHttpRequest)sp[i].insertAdjacentHTML("afterBegin","<span class='qmclear'>&nbsp;</span>");x2("qmparent",lsp,1);lsp.cdiv=b;b.idiv=lsp;if(qm_n&&qm_v<8&&!b.style.width)b.style.width=b.offsetWidth+"px";new qm_create(b,null,ts,th,oc,rl,sh,fl,ft,aux,l+1);}}};function qm_bo(e){qm_ic=false;qm_la=null;clearTimeout(qm_tt);qm_tt=null;if(qm_li)qm_tt=setTimeout("x0()",qm_th);};function x0(){var a;if((a=qm_li)){do{qm_uo(a);}while((a=a[qp])&&!qm_a(a))}qm_li=null;};function qm_a(a){if(a[qc].indexOf("qmmc")+1)return 1;};function qm_uo(a,go){if(!go&&a.qmtree)return;if(window.qmad&&qmad.bhide)eval(qmad.bhide);a.style.visibility="";x2("qmactive",a.idiv);};;function qa(a,b){return String.fromCharCode(a.charCodeAt(0)-(b-(parseInt(b/2)*2)));};function qm_oo(e,o,nt){if(!o)o=this;if(qm_la==o&&!nt)return;if(window.qmv_a&&!nt)qmv_a(o);if(window.qmwait){qm_kille(e);return;}clearTimeout(qm_tt);qm_tt=null;qm_la=o;if(!nt&&o.qmts){qm_si=o;qm_tt=setTimeout("qm_oo(new Object(),qm_si,1)",o.qmts);return;}var a=o;if(a[qp].isrun){qm_kille(e);return;}if(qm_ib&&!qm_ic)return;var go=true;while((a=a[qp])&&!qm_a(a)){if(a==qm_li)go=false;}if(qm_li&&go){a=o;if((!a.cdiv)||(a.cdiv&&a.cdiv!=qm_li))qm_uo(qm_li);a=qm_li;while((a=a[qp])&&!qm_a(a)){if(a!=o[qp]&&a!=o.cdiv)qm_uo(a);else break;}}var b=o;var c=o.cdiv;if(b.cdiv){var aw=b.offsetWidth;var ah=b.offsetHeight;var ax=b.offsetLeft;var ay=b.offsetTop;if(c[qp].ch){aw=0;if(c.fl)ax=0;}else {if(c.ft)ay=0;if(c.rl){ax=ax-c.offsetWidth;aw=0;}ah=0;}if(qm_o){ax-=b[qp].clientLeft;ay-=b[qp].clientTop;}if(qm_s2&&!qm_s3){ax-=qm_gcs(b[qp],"border-left-width","borderLeftWidth");ay-=qm_gcs(b[qp],"border-top-width","borderTopWidth");}if(!c.ismove){c.style.left=(ax+aw)+"px";c.style.top=(ay+ah)+"px";}x2("qmactive",o,1);if(window.qmad&&qmad.bvis)eval(qmad.bvis);c.style.visibility="inherit";qm_li=c;}else  if(!qm_a(b[qp]))qm_li=b[qp];else qm_li=null;qm_kille(e);};function qm_gcs(obj,sname,jname){var v;if(document.defaultView&&document.defaultView.getComputedStyle)v=document.defaultView.getComputedStyle(obj,null).getPropertyValue(sname);else  if(obj.currentStyle)v=obj.currentStyle[jname];if(v&&!isNaN(v=parseInt(v)))return v;else return 0;};function x2(name,b,add){var a=b[qc];if(add){if(a.indexOf(name)==-1)b[qc]+=(a?' ':'')+name;}else {b[qc]=a.replace(" "+name,"");b[qc]=b[qc].replace(name,"");}};function qm_kille(e){if(!e)e=event;e.cancelBubble=true;if(e.stopPropagation&&!(qm_s&&e.type=="click"))e.stopPropagation();};function qm_pure(sd){if(sd.tagName=="UL"){var nd=document.createElement("DIV");nd.qmpure=1;var c;if(c=sd.style.cssText)nd.style.cssText=c;qm_convert(sd,nd);var csp=document.createElement("SPAN");csp.className="qmclear";csp.innerHTML="&nbsp;";nd.appendChild(csp);sd=sd[qp].replaceChild(nd,sd);sd=nd;}return sd;};function qm_convert(a,bm,l){if(!l)bm[qc]=a[qc];bm.id=a.id;var ch=a.childNodes;for(var i=0;i<ch.length;i++){if(ch[i].tagName=="LI"){var sh=ch[i].childNodes;for(var j=0;j<sh.length;j++){if(sh[j]&&(sh[j].tagName=="A"||sh[j].tagName=="SPAN"))bm.appendChild(ch[i].removeChild(sh[j]));if(sh[j]&&sh[j].tagName=="UL"){var na=document.createElement("DIV");var c;if(c=sh[j].style.cssText)na.style.cssText=c;if(c=sh[j].className)na.className=c;na=bm.appendChild(na);new qm_convert(sh[j],na,1)}}}}}/* ]]> */