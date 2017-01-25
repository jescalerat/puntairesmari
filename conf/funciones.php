<?php
//Devuelve la dirección IP real del cliente 
function getRealIP()
{
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );
   
   return $client_ip;
}

function getRealIP2()
{
   
   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );
   
      // los proxys van añadiendo al final de esta cabecera
      // las direcciones ip que van "ocultando". Para localizar la ip real
      // del usuario se comienza a mirar por el principio hasta encontrar
      // una dirección ip que no sea del rango privado. En caso de no
      // encontrarse ninguna se toma como valor el REMOTE_ADDR
   
      $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
   
      reset($entries);
      while (list(, $entry) = each($entries))
      {
         $entry = trim($entry);
         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
         {
            // http://www.faqs.org/rfcs/rfc1918.html
            $private_ip = array(
                  '/^0\./',
                  '/^127\.0\.0\.1/',
                  '/^192\.168\..*/',
                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
                  '/^10\..*/');
   
            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
   
            if ($client_ip != $found_ip)
            {
               $client_ip = $found_ip;
               break;
            }
         }
      }
   }
   else
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );
   }
   
   return $client_ip;
}

function generaComunidades($admin)
{
	$link=Conectarse();
	$query = "select IdComunidad, Comunidad from comunidades order by Comunidad asc";
	$consulta=mysqli_query($link, $query);
	
	// Voy imprimiendo el primer select compuesto por las comunidades
	echo "<select name='op_comunidades' id='op_comunidades' onChange='gestionCargaDatos(this.id,".$admin.")'>";
	echo "<option value='0'>".cambiarAcentos(_COMUNIDADES)."</option>";
	while($registro=mysqli_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".cambiarAcentos($registro[1])."</option>";
	}
	echo "</select>";
}

function generaTipoFotos($x)
{
	$link=Conectarse();
	$query = "select IdTipoFotoN1, TipoFotoN1 from tiposfotosn1 order by TipoFotoN1";
	$consulta=mysql_query($link, $query);

	// Voy imprimiendo el primer select compuesto por las comunidades
	echo "<select name=\"op_tipofoton1".$x."\" id=\"op_tipofoton1".$x."\" onChange='cargaDatosFotos(this.id,".$x.")'>";
	echo "<option value='0'>TipoFotoN1</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".cambiarAcentos($registro[1])."</option>";
	}
	echo "</select>";
}

function diaSemana($diaDeSemana)
{
	switch ($diaDeSemana) {
		case 1:
			$diaS=_LUNES; 
			break;
		case 2:
			$diaS=_MARTES;
			break;
		case 3:
			$diaS=_MIERCOLES;
			break;
		case 4:
			$diaS=_JUEVES;
			break;
		case 5:
			$diaS=_VIERNES;
			break;
		case 6:
			$diaS=_SABADO;
			break;
		case 7:
			$diaS=_DOMINGO;
			break;
	}
	return $diaS;
}

function mesAny($mes)
{
	if($mes==1||strcmp($mes,"Enero")==0)
	{
		$mesany=_ENERO;
	}
	else if($mes==2||strcmp($mes,"Febrero")==0)
	{
		$mesany=_FEBRERO;
	}
	else if($mes==3||strcmp($mes,"Marzo")==0)
	{
		$mesany=_MARZO;
	}
	else if($mes==4||strcmp($mes,"Abril")==0)
	{
		$mesany=_ABRIL;
	}
	else if($mes==5||strcmp($mes,"Mayo")==0)
	{
		$mesany=_MAYO;
	}
	else if($mes==6||strcmp($mes,"Junio")==0)
	{
		$mesany=_JUNIO;
	}
	else if($mes==7||strcmp($mes,"Julio")==0)
	{
		$mesany=_JULIO;
	}
	else if($mes==8||strcmp($mes,"Agosto")==0)
	{
		$mesany=_AGOSTO;
	}
	else if($mes==9||strcmp($mes,"Septiembre")==0)
	{
		$mesany=_SEPTIEMBRE;
	}
	else if($mes==10||strcmp($mes,"Octubre")==0)
	{
		$mesany=_OCTUBRE;
	}
	else if($mes==11||strcmp($mes,"Noviembre")==0)
	{
		$mesany=_NOVIEMBRE;
	}
	else if($mes==12||strcmp($mes,"Diciembre")==0)
	{
		$mesany=_DICIEMBRE;
	}
	return $mesany;
}

function superindice($jornada)
{
	if ($_SESSION['idiomapagina']==1)
	{
		$devuelveSuperindice="&ordf;";
	}
	else if ($_SESSION['idiomapagina']==2)
	{
		if ($jornada==1)
		{
			$devuelveSuperindice="st";
		}
		else if ($jornada==2)
		{
			$devuelveSuperindice="nd";
		}
		else
		{
			$devuelveSuperindice="th";
		}
	}
	else
	{
		if ($jornada==1)
		{
			$devuelveSuperindice="st";
		}
		else if ($jornada==2)
		{
			$devuelveSuperindice="nd";
		}
		else
		{
			$devuelveSuperindice="th";
		}
	}
	return $devuelveSuperindice;
}

function fecha($dia,$mes,$any)
{
	if ($_SESSION['idiomapagina']==1)
	{
		$fechadevuelta=$dia." de ".mesAny($mes)." del ".$any;
	}
	else if ($_SESSION['idiomapagina']==2)
	{
		$fechadevuelta=mesAny($mes)." ".$dia." of ".$any;
	}
	else if ($_SESSION['idiomapagina']==3)
	{
		$particula=" de ";
		if ($mes==4||$mes==8){$particula=" d'";}
		$fechadevuelta=$dia.$particula.mesAny($mes)." del ".$any;
	}
	else
	{
		$fechadevuelta=mesAny($mes)." ".$dia." of ".$any;
	}
	return $fechadevuelta;
}

function diaFinal($mes)
{
	$diaF=31;
	if ($mes==2)
	{
		$diaF=28;
	}
	else if ($mes==4||$mes==6||$mes==9||$mes==11)
	{
		$diaF=30;
	}
	return $diaF;
}

function devolverDia($fecha)
{
	$fechacompleta=explode("-",$fecha);
	$dia=$fechacompleta[0];
	return $dia;
}

function devolverMes($fecha)
{
	$fechacompleta=explode("-",$fecha);
	$mes=$fechacompleta[1];
	return $mes;
}

function devolverAny($fecha)
{
	$fechacompleta=explode("-",$fecha);
	$any=$fechacompleta[2];
	return $any;
}

function devolverFecha($fecha)
{
	$fechacompleta=explode("-",$fecha);
	$dia=$fechacompleta[0];
	$fechacompleta=explode("-",$fecha);
	$mes=mesAny($fechacompleta[1]);
	$fechacompleta=explode("-",$fecha);
	$any=$fechacompleta[2];
	$fechaTraducida=$dia."-".$mes."-".$any;
	return $fechaTraducida;
}

function cambiarAcentos($cadena) {
	$long=strlen($cadena);
	$devuelveCadena="";

	for ($x=0;$x<$long;$x++)
	{
		if(strcmp($cadena[$x],"á")==0)
		{
			$devuelveCadena=$devuelveCadena."&aacute;";
		}
		else if(strcmp($cadena[$x],"Á")==0)
		{
			$devuelveCadena=$devuelveCadena."&Aacute;";
		}
		else if(strcmp($cadena[$x],"à")==0)
		{
			$devuelveCadena=$devuelveCadena."&agrave;";
		}
		else if(strcmp($cadena[$x],"À")==0)
		{
			$devuelveCadena=$devuelveCadena."&Agrave;";
		}
		else if(strcmp($cadena[$x],"é")==0)
		{
			$devuelveCadena=$devuelveCadena."&eacute;";
		}
		else if(strcmp($cadena[$x],"É")==0)
		{
			$devuelveCadena=$devuelveCadena."&Eacute;";
		}
		else if(strcmp($cadena[$x],"è")==0)
		{
			$devuelveCadena=$devuelveCadena."&egrave;";
		}
		else if(strcmp($cadena[$x],"È")==0)
		{
			$devuelveCadena=$devuelveCadena."&Egrave;";
		}
		else if(strcmp($cadena[$x],"í")==0)
		{
			$devuelveCadena=$devuelveCadena."&iacute;";
		}
		else if(strcmp($cadena[$x],"Í")==0)
		{
			$devuelveCadena=$devuelveCadena."&Iacute;";
		}
		else if(strcmp($cadena[$x],"ó")==0)
		{
			$devuelveCadena=$devuelveCadena."&oacute;";
		}
		else if(strcmp($cadena[$x],"Ó")==0)
		{
			$devuelveCadena=$devuelveCadena."&Oacute;";
		}
		else if(strcmp($cadena[$x],"ò")==0)
		{
			$devuelveCadena=$devuelveCadena."&ograve;";
		}
		else if(strcmp($cadena[$x],"Ò")==0)
		{
			$devuelveCadena=$devuelveCadena."&Ograve;";
		}
		else if(strcmp($cadena[$x],"ú")==0)
		{
			$devuelveCadena=$devuelveCadena."&uacute;";
		}
		else if(strcmp($cadena[$x],"Ú")==0)
		{
			$devuelveCadena=$devuelveCadena."&Uacute;";
		}
		else if(strcmp($cadena[$x],"ä")==0)
		{
			$devuelveCadena=$devuelveCadena."&auml;";
		}
		else if(strcmp($cadena[$x],"Ä")==0)
		{
			$devuelveCadena=$devuelveCadena."&Auml;";
		}
		else if(strcmp($cadena[$x],"ë")==0)
		{
			$devuelveCadena=$devuelveCadena."&euml;";
		}
		else if(strcmp($cadena[$x],"Ë")==0)
		{
			$devuelveCadena=$devuelveCadena."&Euml;";
		}
		else if(strcmp($cadena[$x],"ï")==0)
		{
			$devuelveCadena=$devuelveCadena."&iuml;";
		}
		else if(strcmp($cadena[$x],"Ï")==0)
		{
			$devuelveCadena=$devuelveCadena."&Iuml;";
		}
		else if(strcmp($cadena[$x],"ö")==0)
		{
			$devuelveCadena=$devuelveCadena."&ouml;";
		}
		else if(strcmp($cadena[$x],"Ö")==0)
		{
			$devuelveCadena=$devuelveCadena."&Ouml;";
		}
		else if(strcmp($cadena[$x],"ü")==0)
		{
			$devuelveCadena=$devuelveCadena."&uuml;";
		}
		else if(strcmp($cadena[$x],"Ü")==0)
		{
			$devuelveCadena=$devuelveCadena."&Uuml;";
		}
		else if(strcmp($cadena[$x],"ç")==0)
		{
			$devuelveCadena=$devuelveCadena."&ccedil;";
		}
		else if(strcmp($cadena[$x],"Ç")==0)
		{
			$devuelveCadena=$devuelveCadena."&Ccedil;";
		}
		else if(strcmp($cadena[$x],"ñ")==0)
		{
			$devuelveCadena=$devuelveCadena."&ntilde;";
		}
		else if(strcmp($cadena[$x],"Ñ")==0)
		{
			$devuelveCadena=$devuelveCadena."&Ntilde;";
		}
		else if(strcmp($cadena[$x],"ª")==0)
		{
			$devuelveCadena=$devuelveCadena."&ordf;";
		}
		else if(strcmp($cadena[$x],"º")==0)
		{
			$devuelveCadena=$devuelveCadena."&ordm;";
		}
		else if(strcmp($cadena[$x],"¿")==0)
		{
			$devuelveCadena=$devuelveCadena."&iquest;";
		}
		else if(strcmp($cadena[$x],"¡")==0)
		{
			$devuelveCadena=$devuelveCadena."&iexcl;";
		}		
		else
		{
			$devuelveCadena=$devuelveCadena.$cadena[$x];
		}
	}
	return $devuelveCadena;
}

function tratarDiaEncuentro($dia,$mes,$anyo)
{
	$fecha=fecha($dia,$mes,$anyo);
	
	return $fecha;
}
function tratarConjuncionY()
{
	if ($_SESSION['idiomapagina']==1)
	{
		$conjuncion="y";
	}
	else if ($_SESSION['idiomapagina']==2)
	{
		$conjuncion="and";
	}
	else if ($_SESSION['idiomapagina']==3)
	{
		$conjuncion="i";
	}
	else
	{
		$conjuncion="y";
	}
	return $conjuncion;
}

function gestionarFotos($foto)
{
	$fotoVuelta="";
	$gestionfoto=explode(" ",$foto);
	$tmp = $gestionfoto[1]*1;
	if ($tmp>0&&$tmp<=31)
	{
		$fotoVuelta=constant($gestionfoto[0]).$tmp;
	}
	else
	{
		$fotoVuelta=constant($foto);
	}
	return $fotoVuelta;
}
?>