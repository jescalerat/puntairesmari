<?php

    //1 --- Inicio
    //2 --- Calendario
    //3 --- Buscador
    //4 --- Encuentro
    //5 --- Paginas amigas
    //6 --- Contactar

	$idioma=1;
	if (isset($_SESSION['idiomapagina'])){
		$idioma=$_SESSION['idiomapagina'];
	}

	if ($idioma==1) //Español
	{
		//General
		define ('_VOLVER','Volver');
		define ('_CARGANDO','Cargando...');
		
		//Cambio idioma
		define ('_ESPANYOL','Español');
		define ('_INGLES','Inglés');
		define ('_CATALAN','Catalán');
		define ('_CAMBIOIDIOMA','Cambio idioma');
		define ('_CAMBIANDOIDIOMA','Cambiando idioma');
		
		//Inicio
		define ('_BUENOSDIAS','Buenos días');
		define ('_BUENASTARDES','Buenas tardes');
		define ('_BUENASNOCHES','Buenas noches');

		//Menu
		define ('_MENUINICIO','Inicio');
		define ('_MENUBUSCADOR','Buscador');
		define ('_MENUPAGINASAMIGAS','Páginas amigas');
		define ('_MENUCONTACTAR','Contactar');
		
		//Calendario
		define ('_ENCUENTROSDIA','Encuentros el ');
		define ('_ENCUENTROSCOMUNIDAD','Encuentros en la comunidad de ');
		define ('_ENCUENTROSPROVINCIA','Encuentros en la provincia de ');
		define ('_ENCUENTROSMUNICIPIO','Encuentros en el municipio de ');
		define ('_LUGAR','Lugar');
		define ('_DIA','Día');
		
		//Municipios
		define ('_BUSCADORENCUENTROS','Buscador');
		define ('_MUNIANYOS','Año');
		define ('_MUNIPAISES','Paises');
		define ('_MUNICOMUNIDADES','Comunidades');
		define ('_MUNIPROVINCIAS','Provincias');
		define ('_MUNIMUNICIPIOS','Municipios');
		define ('_TOTAL','Total');
		
		//Pestañas Encuentros
		define ('_CARTELES','Carteles');
		define ('_CONTACTOS','Contactos');
	
		//Pestañas Encuentros Carteles
		define ('_SINCARTEL','Carteles no disponibles');
		
		//Pestañas Encuentros Contactos
		define ('_SINCONTACTO','Contactos no disponibles');
		
		//Contacta
		define ('_TITULO','Mensaje al webmaster'); 
		define ('_INTRODUCENOMBRE','Introduce tu nombre o alias'); 
		define ('_EMAIL','Email'); 
		define ('_MENSAJE','Tu mensaje'); 
		define ('_ENVIAR','Enviar'); 
		define ('_INSTRUCCION1','Todos los campos son obligatorios'); 
		define ('_INSTRUCCION2','En caso de error siga las instrucciones:'); 
		define ('_ERROR1','Introduce un nombre o alias para poder comunicarme contigo'); 
		define ('_ERROR2','Introduce una direcci�n de correo para poder comunicarme contigo'); 
		define ('_ERROR3','Introduce el mensaje que me quieres transmitir'); 
		define ('_RESPUESTA1','Gracias por dar su opinión');
		define ('_RESPUESTA2','En menos de 24 horas me pondré en contacto con usted para resolver sus dudas');
		define ('_OTRACONSULTA','Otra consulta');
		define ('_CONTACTAR','Si hay algún problema con el formulario envíeme un mensaje a esta dirección <a href=mailto:puntairesmari@gmail.com>puntairesmari@gmail.com</a>. Gracias');
		
		//Días de la semana
		define ('_LUNES','Lunes'); 
		define ('_MARTES','Martes'); 
		define ('_MIERCOLES','Miércoles'); 
		define ('_JUEVES','Jueves'); 
		define ('_VIERNES','Viernes'); 
		define ('_SABADO','Sábado'); 
		define ('_DOMINGO','Domingo'); 
	
		//Meses del a�o
		define ('_ENERO','Enero'); 
		define ('_FEBRERO','Febrero'); 
		define ('_MARZO','Marzo'); 
		define ('_ABRIL','Abril'); 
		define ('_MAYO','Mayo'); 
		define ('_JUNIO','Junio'); 
		define ('_JULIO','Julio'); 
		define ('_AGOSTO','Agosto'); 
		define ('_SEPTIEMBRE','Septiembre'); 
		define ('_OCTUBRE','Octubre'); 
		define ('_NOVIEMBRE','Noviembre'); 
		define ('_DICIEMBRE','Diciembre'); 
		
		//D�as de la semana abreviados
		define ('_LUNESABR','Lun'); 
		define ('_MARTESABR','Mar'); 
		define ('_MIERCOLESABR','Mie'); 
		define ('_JUEVESABR','Jue'); 
		define ('_VIERNESABR','Vie'); 
		define ('_SABADOABR','Sáb'); 
		define ('_DOMINGOABR','Dom'); 
	
		//Meses del a�o abreviados
		define ('_ENEROABR','Ene'); 
		define ('_FEBREROABR','Feb'); 
		define ('_MARZOABR','Mar'); 
		define ('_ABRILABR','Abr'); 
		define ('_MAYOABR','May'); 
		define ('_JUNIOABR','Jun'); 
		define ('_JULIOABR','Jul'); 
		define ('_AGOSTOABR','Ago'); 
		define ('_SEPTIEMBREABR','Sep'); 
		define ('_OCTUBREABR','Oct'); 
		define ('_NOVIEMBREABR','Nov'); 
		define ('_DICIEMBREABR','Dic'); 
	}
	else if ($idioma==2) //Ingles
	{
		//General
		define ('_VOLVER','Return');
	
		//Presentacion
		define ('_SALTAR','Skip intro');
	
		//Cambio idioma
		define ('_ESPANYOL','Spanish');
		define ('_INGLES','English');
		define ('_CATALAN','Catalan');
		define ('_CAMBIOIDIOMA','Change language');
		define ('_CAMBIANDOIDIOMA','Changing language');
		
		//Inicio
		define ('_BUENOSDIAS','Good morning');
		define ('_BUENASTARDES','Good evening');
		define ('_BUENASNOCHES','Good night');
			
		//Calendario
		define ('_ENCUENTROSDIA','Festivities on ');
		define ('_ENCUENTROSCOMUNIDAD','Festivities in the community of ');
		define ('_ENCUENTROSPROVINCIA','Festivities in the province of ');
		define ('_ENCUENTROSMUNICIPIO','Festivities in the town of ');
		define ('_LUGAR','Place');
		define ('_DIA','Day');
		
		//Calendario Buscador
		define ('_BUSCADORENCUENTROS','Searcher');
		define ('_PAISES','Countries');
		define ('_COMUNIDADES','Communities');
		define ('_PROVINCIAS','Provinces');
		define ('_MUNICIPIOS','Towns');
	
		//Pesta�as Encuentros
		define ('_CARTELES','Posters');
		define ('_CONTACTOS','Contacts');
		
		//Pesta�as Encuentros Carteles
		define ('_SINCARTEL','Poster not available');
	
		//Pesta�as Encuentros Contactos
		define ('_SINCONTACTO','Contacts not available');
		
		//Contacta
		define ('_TITULO','Message to webmaster'); 
		define ('_INTRODUCENOMBRE','Insert your name or alias'); 
		define ('_EMAIL','Email'); 
		define ('_MENSAJE','Your message'); 
		define ('_ENVIAR','Send'); 
		define ('_INSTRUCCION1','All the fields are obligatory'); 
		define ('_INSTRUCCION2','In case of error it follows the instructions:'); 
		define ('_ERROR1','Insert your name or alias to be able to communicate to me with you'); 
		define ('_ERROR2','Insert your email to be able to communicate to me with you'); 
		define ('_ERROR3','Insert your message to be able to communicate to me with you'); 
		define ('_RESPUESTA1','Thanks to give its opinion');
		define ('_RESPUESTA2','In less than 24 hours I will put myself in contact with you to solve its doubts');
		define ('_OTRACONSULTA','Any question');
		define ('_CONTACTAR','If you have some problem with the form send me a message to this direction <a href=mailto:puntairesmari@gmail.com>puntairesmari@gmail.com</a>. Thanks you');
		
		//D�as de la semana
		define ('_LUNES','Monday'); 
		define ('_MARTES','Tuesday'); 
		define ('_MIERCOLES','Wednesday'); 
		define ('_JUEVES','Thursday'); 
		define ('_VIERNES','Friday'); 
		define ('_SABADO','Saturday'); 
		define ('_DOMINGO','Sunday'); 
	
		//Meses del a�o
		define ('_ENERO','January'); 
		define ('_FEBRERO','February'); 
		define ('_MARZO','March'); 
		define ('_ABRIL','April'); 
		define ('_MAYO','May'); 
		define ('_JUNIO','June'); 
		define ('_JULIO','July'); 
		define ('_AGOSTO','August'); 
		define ('_SEPTIEMBRE','September'); 
		define ('_OCTUBRE','October'); 
		define ('_NOVIEMBRE','November'); 
		define ('_DICIEMBRE','December'); 
		
		//D�as de la semana abreviados
		define ('_LUNESABR','Mon'); 
		define ('_MARTESABR','Tue'); 
		define ('_MIERCOLESABR','Wed'); 
		define ('_JUEVESABR','Thu'); 
		define ('_VIERNESABR','Fri'); 
		define ('_SABADOABR','Sat'); 
		define ('_DOMINGOABR','Sun'); 
	
		//Meses del a�o abreviados
		define ('_ENEROABR','Jan'); 
		define ('_FEBREROABR','Feb'); 
		define ('_MARZOABR','Mar'); 
		define ('_ABRILABR','Apr'); 
		define ('_MAYOABR','May'); 
		define ('_JUNIOABR','Jun'); 
		define ('_JULIOABR','Jul'); 
		define ('_AGOSTOABR','Aug'); 
		define ('_SEPTIEMBREABR','Sep'); 
		define ('_OCTUBREABR','Oct'); 
		define ('_NOVIEMBREABR','Nov'); 
		define ('_DICIEMBREABR','Dec'); 
	}
	else if ($idioma==3) //Catalan
	{
		//General
		define ('_VOLVER','Tornar');
	
		//Presentacion
		define ('_SALTAR','Saltar presentaci�');
	
		//Cambio idioma
		define ('_ESPANYOL','Espanyol');
		define ('_INGLES','Angl�s');
		define ('_CATALAN','Catal�');
		define ('_CAMBIOIDIOMA','Canvi d\'idioma');
		define ('_CAMBIANDOIDIOMA','Canviant idioma');
		
		//Inicio
		define ('_BUENOSDIAS','Bon dia');
		define ('_BUENASTARDES','Bona tarda');
		define ('_BUENASNOCHES','Bona nit');
			
		//Calendario
		define ('_ENCUENTROSDIA','Trobades el ');
		define ('_ENCUENTROSCOMUNIDAD','Trobades a la comunitat de ');
		define ('_ENCUENTROSPROVINCIA','Trobades a la prov�ncia de ');
		define ('_ENCUENTROSMUNICIPIO','Trobades al municipi de ');	
		define ('_LUGAR','Lloc');
		define ('_DIA','Dia');
		
		//Calendario Buscador
		define ('_BUSCADORENCUENTROS','Cercador');
		define ('_PAISES','Pa�sos');
		define ('_COMUNIDADES','Comunitats');
		define ('_PROVINCIAS','Prov�ncies');
		define ('_MUNICIPIOS','Municipis');
	
		//Pesta�as Encuentros
		define ('_CARTELES','Cartells');
		define ('_CONTACTOS','Contactes');
	
		//Pesta�as Encuentros Carteles
		define ('_SINCARTEL','Cartells no disponibles');
	
		//Pesta�as Encuentros Contactos
		define ('_SINCONTACTO','Contactes no disponibles');
		
		//Contacta
		define ('_TITULO','Missatge al webmaster'); 
		define ('_INTRODUCENOMBRE','Introdueix el teu nom o �lies'); 
		define ('_EMAIL','Email'); 
		define ('_MENSAJE','El teu missatge'); 
		define ('_ENVIAR','Enviar'); 
		define ('_INSTRUCCION1','Tots els camps s�n obligatoris'); 
		define ('_INSTRUCCION2','En cas d\'error seguiu les instruccions:'); 
		define ('_ERROR1','Introdueix un nom o �lies per poder comunicar amb tu'); 
		define ('_ERROR2','Introdueix una adre�a de correu per poder comunicar amb tu'); 
		define ('_ERROR3','Introdueix el missatge que em vols transmetre'); 
		define ('_RESPUESTA1','Gr�cies per donar la seva opini�');
		define ('_RESPUESTA2','En menys de 24 hores em posar� en contacte amb vost� per resoldre els seus dubtes');
		define ('_OTRACONSULTA','Una altra consulta');
		define ('_CONTACTAR','Si hi ha algun problema amb el formulari envieu un missatge a aquesta adre�a <a href=mailto:puntairesmari@gmail.com>puntairesmari@gmail.com</a>. Gràcies');
		
		//D�as de la semana
		define ('_LUNES','Dilluns'); 
		define ('_MARTES','Dimarts'); 
		define ('_MIERCOLES','Dimecres'); 
		define ('_JUEVES','Dijous'); 
		define ('_VIERNES','Divendres'); 
		define ('_SABADO','Dissabte'); 
		define ('_DOMINGO','Diumenge'); 
	
		//Meses del a�o
		define ('_ENERO','Gener'); 
		define ('_FEBRERO','Febrer'); 
		define ('_MARZO','Mar�'); 
		define ('_ABRIL','Abril'); 
		define ('_MAYO','Maig'); 
		define ('_JUNIO','Juny'); 
		define ('_JULIO','Juliol'); 
		define ('_AGOSTO','Agost'); 
		define ('_SEPTIEMBRE','Setembre'); 
		define ('_OCTUBRE','Octubre'); 
		define ('_NOVIEMBRE','Novembre'); 
		define ('_DICIEMBRE','Desembre'); 
		
		//D�as de la semana abreviados
		define ('_LUNESABR','Dil'); 
		define ('_MARTESABR','Dim'); 
		define ('_MIERCOLESABR','Dc'); 
		define ('_JUEVESABR','Dij'); 
		define ('_VIERNESABR','Div'); 
		define ('_SABADOABR','Dis'); 
		define ('_DOMINGOABR','Diu'); 
	
		//Meses del a�o abreviados
		define ('_ENEROABR','Gen'); 
		define ('_FEBREROABR','Feb'); 
		define ('_MARZOABR','Mar'); 
		define ('_ABRILABR','Abr'); 
		define ('_MAYOABR','Mai'); 
		define ('_JUNIOABR','Jun'); 
		define ('_JULIOABR','Jul'); 
		define ('_AGOSTOABR','Ago'); 
		define ('_SEPTIEMBREABR','Set'); 
		define ('_OCTUBREABR','Oct'); 
		define ('_NOVIEMBREABR','Nov'); 
		define ('_DICIEMBREABR','Des'); 
	}
	/*else if ($idioma==3) //Italiano
	{
		//Usuarios
		define ('_BIENVENIDA','Benvenuto ');
		define ('_POSICIONBIENVENIDA1','La vostra squadra occupa ');
		define ('_POSICIONBIENVENIDA2',' posizione');
		define ('_NOUSUARIO1','Se non siete l\'utente ');
		define ('_NOUSUARIO2',' rimuovere prego la sessione');
		define ('_ANONIMO','anonimo');
		define ('_USUARIO','Utente');
		define ('_PASSWORD','Parola d\'accesso');
		define ('_ENTRAR','Entrare');
		define ('_REGISTRAR','Registrazione');
		define ('_NOENCONTRADO','Il nome dell\'utente o della parola d\'accesso è non valido');
		define ('_ERRORREGISTRO','Il nome dell\'utente già esiste');
	
		//Registro
		define ('_TITULOREGISTRO','MODULO DI REGISTRAZIONE');
		define ('_ALIASREGISTRO','Alias');
		define ('_PASSWORDREGISTRO','Parola d\'accesso');
		define ('_EMAILREGISTRO','E-mail');
		define ('_EQUIPOREGISTRO','Squadra');
		define ('_SELECCIONAEQUIPOREGISTRO','Selezionare la vostra squadra');
		define ('_OTROEQUIPOREGISTRO','L\'altra squadra');
		define ('_NOJUEGAREGISTRO','Non gioca');
		define ('_ENVIARREGISTRO','Inviare');
		define ('_TIPOERROR1REGISTRO','Lo pseudonimo non esiste');
		define ('_TIPOERROR2REGISTRO','La parola d\'accesso non esiste');
		define ('_TIPOERROR3REGISTRO','Il E-mail non esiste');
		define ('_TIPOERROR4REGISTRO','La squadra non esiste');
		define ('_REGISTROCORRECTO','Esso siete stati registrati correttamente con i seguenti dati');
	
		//Fotos
		define ('_FOTOSTEMPORADA','STAGIONE DELLE FOTO 2006/07'); 
		define ('_AMPLIAR','Preme per estendere l\'immagine');
		define ('_CERRAR','Fine');
	---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		http://www.allwords.com
	
		//Página resultados
		define ('_IDA','First leg'); 
		define ('_VUELTA','Second leg'); 
		define ('_INCIDENCIAS','Information'); 
		define ('_JORNADA','Matchday'); 
		define ('_SINDATOS','No information');
		define ('_APLAZADO','Postponed');
		define ('_SUSPENDIDO','Suspended ');
		define ('_PROMOCION','Promote');
	
		//Página quiniela
		define ('_VOLVERQUINIELA','Return to quiniela'); 
		define ('_PARTIDOS','Matches'); 
		define ('_PARTIDO','Match'); 
		define ('_PRONOSTICOS','Prognoses');
		define ('_PRONOSTICO','Prognose');
		define ('_QUINIELAFORO1','QUINIELA'); 
		define ('_QUINIELAFORO2','CATALUNYA F&Uacute;TBOL'); 
		define ('_QUINIELAFORO3','F&Uacute;TBOL CATALUNYA'); 
		define ('_QUINIELAWEB','QUINIELA WEB'); 
		define ('_PROXIMAMENTE','AVAILABLE NEXT'); 
		define ('_JUGADORES','Participant players'); 
		define ('_NOMBRE','Name'); 
		define ('_ACIERTOS','Successes'); 
		define ('_POSICION','Position'); 
		define ('_PARTIDOSJUGADOS','Played matchs'); 
		define ('_SINPRONOSTICO','There are no prognoses'); 
		define ('_SOLOREGISTRADOS','Only for registered users');
		define ('_ENVIARQUINIELA','Send');
		define ('_TIEMPOTERMINADO','El tiempo para rellenar la quiniela a terminado');
	
		//Página encuesta
		define ('_ENCUESTA','Poll'); 
		define ('_PREGUNTA','Who you think that Liga will win?'); 
		define ('_EQUIPOENCUESTA','Team'); 
		define ('_PUNTOSENCUESTA','Points'); 
		define ('_ENVIARENCUESTA','Vote');
		define ('_ERRORENCUESTA','Choose a team');
		define ('_EQUIPOELEGIDO','The team that you have chosen is');
		define ('_EQUIPOVALIDADO','You already voted. The chosen equipment was');
		define ('_RESULTADOSENCUESTA','As the survey goes');
		define ('_PORCENTAGESENCUESTA','Percentage');
		define ('_VOTANTESSENCUESTA','Voters');
		
		//Página goleadores
		define ('_VOLVERRESULTADOS','Return to results'); 
		define ('_VOLVERPROMOCION','Return to promote');
		define ('_CAMPO','Stadium'); 
		define ('_SOLOREGISTRADOSCOMENTARIOS','Registered if you want to leave your commentary');
		define ('_FECHAPARTIDO','Date');
	
		//Página clasificación
		define ('_CLASIFICACION','league table position'); 
		define ('_EQUIPO','Team'); 
		define ('_PUNTOS','Points'); 
		define ('_JUGADOS','Played'); 
		define ('_GANADOS','Win'); 
		define ('_EMPATADOS','Draw'); 
		define ('_PERDIDOS','Lost'); 
		define ('_GF','G. F.'); 
		define ('_GC','G. A.'); 
		define ('_HASTAJORNADA','until the matchday '); 
		define ('_PARTIDOSCASA','Matches played local'); 
		define ('_PARTIDOSFUERA','Matches played visitor'); 
		define ('_PARTIDOS1VUELTA','Matches played 1st leg'); 
		define ('_PARTIDOS2VUELTA','Matches played 2nd leg'); 
		define ('_ASCIENDE','Ascends to 1ª Regional'); 
		define ('_PROMOCIONA','Promotes for 1ª Regional'); 
		define ('_DESCIENDE','Descends to 3ª Regional'); 
		define ('_SANCION','Sanctioned with ');
		define ('_VOLVERCLASIFICACION','Return to league table position');
	
		//Campos
		define ('_CAMPOS','Stadiums');
		define ('_DIRECCION','Address'); 
		define ('_POBLACION','City'); 
		define ('_EQUIPOS','Teams');
		define ('_VOLVERCAMPOS','Return to stadiums'); 
		define ('_BUSCAR','Send');
		define ('_BUSCARPOBLACION','All the fields of the following city have looked for: ');
		define ('_BUSCARTODO','One has looked for by Name of the stadium, Address and City the following word: ');
		define ('_BUSCARTOTAL','Total stadiums: ');
		define ('_BUSCARANTERIOR','Previous');
		define ('_BUSCARSIGUIENTE','Next');
		define ('_COMOLLEGAR','How to arrive');
		define ('_COCHE','Car'); 
		define ('_TREN','Train'); 
		define ('_METRO','Underground');
		define ('_BUS','Bus'); 
		define ('_TRAM','Tram'); 
		define ('_FFCC','FGC'); 
	
		//Otros equipos
		define ('_CAMPOOTROSEQUIPOS','Stadium');
		define ('_WEB','Web'); 
		define ('_DIRECCIONLOCALSOCIAL','Social local direction'); 
		define ('_POBLACIONLOCALSOCIAL','Social local city'); 
		define ('_DIA','Date of match'); 
		define ('_HORA','Hour of match'); 
		define ('_CAMISETA','T-Shirt'); 
		define ('_PANTALON','Trousers'); 
		define ('_TELEFONO','Telephone'); 
		define ('_FECHAOTROSEQUIPOS','Date'); 
		define ('_LOCAL','Local'); 
		define ('_RESULTADO','Result'); 
		define ('_VISITANTE','Visitor'); 
		define ('_VOLVEROTROSEQUIPOS','Return to others teams'); 
		define ('_VOLVERCLUB','Return to club');
	
		//Página ficha
		define ('_VOLVEREQUIPO','Return to team'); 
		define ('_NOMBRECOMPLETO','Real name'); 
		define ('_GOLESTOTALES','Total Goals'); 
		define ('_GOLESJUGADA','Goals'); 
		define ('_GOLESPENALTY','Penalty goals'); 
		define ('_GOLESPROPIAPUERTA','Own goals'); 
		define ('_ALTA','Bought'); 
		define ('_BAJA','Sold');
		define ('_PROCEDENCIA','Previous Club'); 
		define ('_DESTINO','Next Club'); 
		define ('_DEMARCACION','Position'); 
		define ('_NACIONALIDAD','Nationality'); 
		define ('_SELECCION','International'); 
		define ('_COMUNITARIO','Communitarian'); 
		define ('_PORTERO','Goalkeeper'); 
		define ('_DEFENSA','Defender'); 
		define ('_CENTROCAMPISTA','Midfielder'); 
		define ('_DELANTERO','Striker'); 
		define ('_SI','Yes');
		define ('_NO','No');
	
		//Página tabla goleadores
		//Página tabla goleadores
		define ('_GOLEADORES1','Goals Scored Dinamico Batllo');
		define ('_GOLEADORES2','Goals Scored');
		define ('_JUGADOR','Player');
		define ('_EQUIPOTG','Team');
		define ('_TOTAL','Total');
		define ('_JUGADA','Goal');
		define ('_PENALTY','Penalty');
	
		//Página comentarios
		define ('_COMENTARIOS','Commentaries');
		define ('_AUTOR','Author');
		define ('_COMENTARIO','Commentary');
		define ('_NOCOMENT','No commentaries');
	
		//Página partidos pendientes
		define ('_PARTIDOSPENDIENTES','Pending matches');
		define ('_PARTPENJORNADA','Matchday');
		define ('_PARTPENFECHA','Predicted date');
		define ('_PARTPENPARTIDO','Match');
		define ('_PARTPENCAUSA','Cause');
	
		//Contacta
		define ('_TITULO','Message to webmaster'); 
		define ('_INTRODUCENOMBRE','Insert your name or alias'); 
		define ('_EMAIL','Email'); 
		define ('_MENSAJE','Your message'); 
		define ('_ENVIAR','Send'); 
		define ('_INSTRUCCION1','All the fields are obligatory'); 
		define ('_INSTRUCCION2','In case of error it follows the instructions:'); 
		define ('_ERROR1','Insert your name or alias to be able to communicate to me with you'); 
		define ('_ERROR2','Insert your email to be able to communicate to me with you'); 
		define ('_ERROR3','Insert your message to be able to communicate to me with you'); 
		define ('_RESPUESTA1','Thanks to give its opinion');
		define ('_RESPUESTA2','In less than 24 hours I will put myself in contact with you to solve its doubts');
		define ('_OTRACONSULTA','Any question');
		//define ('_CONTACTAR','If you have some problem with the form send me a message to this direction <a href=mailto:dinamicobatllo@iespana.es>dinamicobatllo@iespana.es</a>. Thanks you');
		define ('_CONTACTAR','If you have some problem with the form send me a message to this direction <a href=mailto:webmaster@dinamicobatllo.tuocio.es>webmaster@dinamicobatllo.tuocio.es</a>. Thanks you');
	
		//Días de la semana
		define ('_LUNES','Monday'); 
		define ('_MARTES','Tuesday'); 
		define ('_MIERCOLES','Wednesday'); 
		define ('_JUEVES','Thursday'); 
		define ('_VIERNES','Friday'); 
		define ('_SABADO','Saturday'); 
		define ('_DOMINGO','Sunday'); 
	
		//Meses del año
		define ('_ENERO','January'); 
		define ('_FEBRERO','February'); 
		define ('_MARZO','March'); 
		define ('_ABRIL','April'); 
		define ('_MAYO','May'); 
		define ('_JUNIO','June'); 
		define ('_JULIO','July'); 
		define ('_AGOSTO','August'); 
		define ('_SEPTIEMBRE','September'); 
		define ('_OCTUBRE','October'); 
		define ('_NOVIEMBRE','November'); 
		define ('_DICIEMBRE','December'); 
	
		//Menú
		define ('_MENUINICIO','Home'); 
		define ('_MENUCLUB','Club'); 
		define ('_MENUGOLEADORES','Goals Scored'); 
		define ('_MENURESULTADOS','Results'); 
		define ('_MENUQUINIELA','Quiniela');
		define ('_MENUENCUESTA','Poll'); 
		define ('_MENUPROMOCION','Promotes'); 
		define ('_MENUFOTOS','Photos'); 
		define ('_MENUCLASIFICACION','League table position');
		define ('_MENUCLASIFICACIONCASA','Local');
		define ('_MENUCLASIFICACIONFUERA','Visitor');
		define ('_MENUCLASIFICACION1VUELTA','1st leg');
		define ('_MENUCLASIFICACION2VUELTA','2nd leg');
		define ('_MENUCAMPOS','Stadiums');
		define ('_MENUEQUIPOS','Others teams');
		define ('_MENUPAGINASAMIGAS','Friendly pages'); 
		define ('_MENUPUBLICIDAD','Partners'); 
		define ('_MENUCONTACTA','Contact us'); 
	 
	     //Pantalla indice
		define ('_INDICEPARTANTERIOR','Previous match');
		define ('_INDICEPARTSIGUIENTE','Next match');
	}*/
?>