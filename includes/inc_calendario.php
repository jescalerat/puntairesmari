<?php
	/*if (!isset($link))
	{
	    require_once($_SESSION["ruta"]."conf/conexion.php");
	    $link=Conectarse();
	}*/
	
	$dia = "";
	$mes = "";
	$ano = "";
	if(isset($_GET["dia"])){
		$dia = $_GET["dia"];
	}
	if(isset($_GET["mes"])){
		$mes = $_GET["mes"];
	}
	if(isset($_GET["ano"])){
		$ano = $_GET["ano"];
	}

	if (isset($_GET["opcion"]))
	{
		session_start();
		$esAdmin = strripos($_SESSION["ruta"], "admin");
		
		$ruta = $_SESSION["ruta"];
		
		if ($esAdmin){
			$arrRura = explode("/", $_SESSION["ruta"]);
		
			$cuentaArray = count($arrRura) - 2;
		
			$ruta = "";
			for ($i = 0; $i < $cuentaArray; $i++) {
				$ruta .= $arrRura[$i]."/";
			}
		}
		require_once($ruta."conf/traduccion.php");
		require_once($ruta."conf/funciones.php");
		require_once($ruta."conf/conexion.php");
		$link=Conectarse();
		
		$idcomunidad=0;
		$idprovincia=0;
		$idmunicipio=0;
		$opcion = $_GET["opcion"];

		$opciones=explode("@", $opcion);
		$totalopciones=count($opciones);
		
		$idopcion1=$opciones[0]*1;
		$idopcion2=0;
		if ($totalopciones == 2){
			$idopcion2=$opciones[1]*1;
		}
		$idopcion3=0;
		if ($totalopciones == 3){
			$idopcion3=$opciones[2]*1;
		}
		
		if ($totalopciones==1){$idcomunidad=$idopcion1;}
		else if ($totalopciones==2){$idprovincia=$idopcion1;$idcomunidad=$idopcion2;}
		else if ($totalopciones==3){$idmunicipio=$idopcion1;$idprovincia=$idopcion2;$idcomunidad=$idopcion3;}
		
		//Query para ordernar las fiestas por municipio. Hay que unir todas las tablas 1 por 1
		$query="select * from encuentros e, municipios m, provincias pro, comunidades c ";
		$query.="where e.IdMunicipio=m.IdMunicipio and ";
		$query.="m.IdProvincia=pro.IdProvincia and ";
		$query.="pro.IdComunidad=c.IdComunidad and ";

		if ($idmunicipio!=0)
		{
			$tipofiesta=cambiarAcentos(_ENCUENTROSMUNICIPIO);
			$query.="m.IdMunicipio=".$idmunicipio." and ";
			$query.="anyo=".$ano." ";
			$query.="order by m.Municipio";

			$querymunicipio="select * from municipios where IdMunicipio=".$idmunicipio;
			$q=mysqli_query ($link, $querymunicipio);
			$rowmunicipio=mysqli_fetch_array($q, MYSQLI_BOTH);
			$lugar=cambiarAcentos($rowmunicipio["Municipio"]);
			mysqli_free_result($q);
		}
		else if ($idprovincia!=0)
		{
			$tipofiesta=cambiarAcentos(_ENCUENTROSPROVINCIA);
			$query.="pro.IdProvincia=".$idprovincia." and ";
			$query.="anyo=".$ano." ";
			$query.="order by m.Municipio";

			$queryprovincia="select * from provincias where IdProvincia=".$idprovincia;
			$q=mysqli_query ($link, $queryprovincia);
			$rowprovincia=mysqli_fetch_array($q, MYSQLI_BOTH);
			$lugar=cambiarAcentos($rowprovincia["Provincia"]);
			mysqli_free_result($q);
		}
		else if ($idcomunidad!=0)
		{
			$tipofiesta=cambiarAcentos(_ENCUENTROSCOMUNIDAD);
			$query.="c.IdComunidad=".$idcomunidad." and ";
			$query.="anyo=".$ano." ";
			$query.="order by m.Municipio";			

			$querycomunidad="select * from comunidades where IdComunidad=".$idcomunidad;
			$q=mysqli_query ($link, $querycomunidad);
			$rowcomunidad=mysqli_fetch_array($q, MYSQLI_BOTH);
			$lugar=cambiarAcentos($rowcomunidad["Comunidad"]);
			mysqli_free_result($q);
		}

		$qencuentros=mysqli_query ($link, $query);
		$filas=mysqli_num_rows($qencuentros);
?>
	<h1><?= $tipofiesta.$lugar ?></h1>
<?php 
		if ($filas>0)
		{
?>			
			<table border="1" width="100%">
				<tr>
					<th align="center" width="70%"><?= cambiarAcentos(_LUGAR) ?></th>
					<th align="center"><?= cambiarAcentos(_DIA) ?></th>
				</tr>
<?php 
				while($encuentros=mysqli_fetch_array($qencuentros, MYSQLI_BOTH))
				{
					$query="select * from municipios where IdMunicipio = ".$encuentros["IdMunicipio"];
					$qmunicipio=mysqli_query ($link, $query);
					$rowmunicipio=mysqli_fetch_array($qmunicipio, MYSQLI_BOTH);
					
					$query="select * from provincias where IdProvincia = ".$rowmunicipio["IdProvincia"];
					$qprovincia=mysqli_query ($link, $query);
					$rowprovincia=mysqli_fetch_array($qprovincia, MYSQLI_BOTH);
					
					$dias=tratarDiaEncuentro($encuentros["Dia"], $encuentros["Mes"], $encuentros["Anyo"]);
					
					$desc = $rowmunicipio["Municipio"]." (".$rowprovincia["Provincia"].")";
					if ($encuentros["Descripcion"] != null){
						$desc .= " --- ".$encuentros["Descripcion"];
					}
?>				
				<tr>
					<td><a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/encuentros.php?idencuentro=<?= $encuentros["IdEncuentro"] ?>&opcion=<?= $opcion ?>','principal')"><?= cambiarAcentos($desc) ?></a></td>
					<td><?= $dias ?></td>
				</tr>
<?php 				
				}
?>			
			</table>
<?php 			
		}
		if ($idmunicipio!=0)
		{
			$opcion=$idprovincia."@".$idcomunidad;
?>			
			<br><a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>includes/inc_calendario.php?opcion=<?= $opcion ?>','calendario');gestionCargaDatos('op_provincias',0);"><?= cambiarAcentos(_VOLVER) ?></a>
<?php 			
		}
		else if ($idprovincia!=0)
		{
			$opcion=$idcomunidad;
?>			
			<br><a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>includes/inc_calendario.php?opcion=<?= $opcion ?>','calendario');gestionCargaDatos('op_comunidades',0);"><?= cambiarAcentos(_VOLVER) ?></a>
<?php 			
		}
		else
		{
?>			
			<br><a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php','principal');"><?= cambiarAcentos(_VOLVER) ?></a>
<?php 						
		}
		mysqli_free_result($qencuentros);
	}
	elseif ($dia)
	{
		$tmp = $_SESSION["IdsEncuentrosMes"];

		$fiestasmes = explode(", ",$tmp[$dia][0]);
		$tamany = sizeof($fiestasmes)-1;
		$ids = 0;
		for ($x=0;$x<$tamany;$x++)
		{
			$ids .=$fiestasmes[$x];
			if ($tamany-1!=$x)$ids .=", ";
		}
    
		$query="select * from encuentros where IdEncuentro in (".$ids.")";
		$q=mysqli_query ($link, $query);
		
		$tmp = serialize($tmp);
		$tmp = urlencode($tmp);
?>		
		<h1><?= _ENCUENTROSDIA ?> <?= fecha($dia,$mes,$ano) ?></h1>
		<table border="0" width="100%">
<?php 		
		while($encuentros=mysqli_fetch_array($q, MYSQLI_BOTH))
		{
			$query="select * from municipios where IdMunicipio = ".$encuentros["IdMunicipio"];
			$qmunicipio=mysqli_query ($link, $query);
			$rowmunicipio=mysqli_fetch_array($qmunicipio, MYSQLI_BOTH);

			$query="select * from provincias where IdProvincia = ".$rowmunicipio["IdProvincia"];
			$qprovincia=mysqli_query ($link, $query);
			$rowprovincia=mysqli_fetch_array($qprovincia, MYSQLI_BOTH);
			
			mysqli_free_result($qmunicipio);
			mysqli_free_result($qprovincia);
?>
				<tr>
					<td><a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/encuentros.php?idencuentro=<?= $encuentros["IdEncuentro"] ?>&dia=<?= $dia ?>&mes=<?= $mes ?>&ano=<?= $ano ?>','principal')"><?= cambiarAcentos($rowmunicipio["Municipio"]) ?> (<?= cambiarAcentos($rowprovincia["Provincia"]) ?>)</a></td>
				</tr>
<?php 				
		}
		mysqli_free_result($q);
?>		
		</table>
		<br><a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php?mes=<?= $mes ?>&ano=<?= $ano ?>','principal')"><?= cambiarAcentos(_VOLVER) ?></a>
<?php 		
	}
	else
	{
		$tipo_semana = 0;
		$tipo_mes = 0;
	
		$MESCOMPLETO[1] = _ENERO;
		$MESCOMPLETO[2] = _FEBRERO;
		$MESCOMPLETO[3] = _MARZO;
		$MESCOMPLETO[4] = _ABRIL;
		$MESCOMPLETO[5] = _MAYO;
		$MESCOMPLETO[6] = _JUNIO;
		$MESCOMPLETO[7] = _JULIO;
		$MESCOMPLETO[8] = _AGOSTO;
		$MESCOMPLETO[9] = _SEPTIEMBRE;
		$MESCOMPLETO[10] = _OCTUBRE;
		$MESCOMPLETO[11] = _NOVIEMBRE;
		$MESCOMPLETO[12] = _DICIEMBRE;
		
		$MESABREVIADO[1] = _ENEROABR;
		$MESABREVIADO[2] = _FEBREROABR;
		$MESABREVIADO[3] = _MARZOABR;
		$MESABREVIADO[4] = _ABRILABR;
		$MESABREVIADO[5] = _MAYOABR;
		$MESABREVIADO[6] = _JUNIOABR;
		$MESABREVIADO[7] = _JULIOABR;
		$MESABREVIADO[8] = _AGOSTOABR;
		$MESABREVIADO[9] = _SEPTIEMBREABR;
		$MESABREVIADO[10] = _OCTUBREABR;
		$MESABREVIADO[11] = _NOVIEMBREABR;
		$MESABREVIADO[12] = _DICIEMBREABR;
		
		$SEMANACOMPLETA[0] = _LUNES;
		$SEMANACOMPLETA[1] = _MARTES;
		$SEMANACOMPLETA[2] = _MIERCOLES;
		$SEMANACOMPLETA[3] = _JUEVES;
		$SEMANACOMPLETA[4] = _VIERNES;
		$SEMANACOMPLETA[5] = _SABADO;
		$SEMANACOMPLETA[6] = _DOMINGO;
		
		$SEMANAABREVIADA[0] = _LUNESABR;
		$SEMANAABREVIADA[1] = _MARTESABR;
		$SEMANAABREVIADA[2] = _MIERCOLESABR;
		$SEMANAABREVIADA[3] = _JUEVESABR;
		$SEMANAABREVIADA[4] = _VIERNESABR;
		$SEMANAABREVIADA[5] = _SABADOABR;
		$SEMANAABREVIADA[6] = _DOMINGOABR;
		
		////////////////////////////////////
		if($tipo_semana == 0){
			$ARRDIASSEMANA = $SEMANACOMPLETA;
		}elseif($tipo_semana == 1){
			$ARRDIASSEMANA = $SEMANAABREVIADA;
		}
		if($tipo_mes == 0){
			$ARRMES = $MESCOMPLETO;
		}elseif($tipo_mes == 1){
			$ARRMES = $MESABREVIADO;
		}
		
		if(!$dia) $dia = date('d');
		if(!$mes) $mes = date('n');
		if(!$ano) $ano = date('Y');
		
		$TotalDiasMes = date('t',mktime(0,0,0,$mes,$dia,$ano));
		$DiaSemanaEmpiezaMes = date('w',mktime(0,0,0,$mes,1,$ano));
		$DiaSemanaTerminaMes = date('w',mktime(0,0,0,$mes,$TotalDiasMes,$ano));
		if ($DiaSemanaEmpiezaMes == 0) $DiaSemanaEmpiezaMes = 7;
		$EmpiezaMesCalOffset = $DiaSemanaEmpiezaMes;
		$TerminaMesCalOffset = 6 - $DiaSemanaTerminaMes;
		$TotalDeCeldas = $TotalDiasMes + $DiaSemanaEmpiezaMes + $TerminaMesCalOffset;
		
		
		if($mes == 1){
			$MesAnterior = 12;
			$MesSiguiente = $mes + 1;
			$AnoAnterior = $ano - 1;
			$AnoSiguiente = $ano;
		}elseif($mes == 12){
			$MesAnterior = $mes - 1;
			$MesSiguiente = 1;
			$AnoAnterior = $ano;
			$AnoSiguiente = $ano + 1;
		}else{
			$MesAnterior = $mes - 1;
			$MesSiguiente = $mes + 1;
			$AnoAnterior = $ano;
			$AnoSiguiente = $ano;
			$AnoAnteriorAno = $ano - 1;
			$AnoSiguienteAno = $ano + 1;
		}
		
		$query="select * from encuentros where Mes = ".$mes." and Anyo = ".$ano;
		$q=mysqli_query ($link, $query);
		
		//Inicializar array para saber los d�as de fiesta
		for ($x=1;$x<=31;$x++)
		{
			$fechasfiestames[$x][0]=0;
			$idencuentromes[$x][0]=0;
		}
    
		//$idfiestames = "";
		while($encuentros=mysqli_fetch_array($q, MYSQLI_BOTH))
		{
			$encuentrosDia = $encuentros["Dia"];
			$fechasfiestames[$encuentrosDia][0]=1;
			$idencuentromes[$encuentrosDia][0].=$encuentros["IdEncuentro"].", ";
		}
	
		unset($_SESSION["IdsEncuentrosMes"]);
		$_SESSION["IdsEncuentrosMes"] = $idencuentromes;
?>		
		<table class="calendario" align="center" border="0" cellpadding="1" cellspacing="1">
			<tr>
				<td colspan="10">
					<table border="0" align="center" width="1%" class="calendario">
						<tr>
							<td width="1%"><a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php?mes=<?= $mes ?>&ano=<?= $AnoAnteriorAno ?>','principal')"><img src="imagenes/atras2.gif" border="0"></a></td>
							<td width="1%"><a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php?mes=<?= $MesAnterior ?>&ano=<?= $AnoAnterior ?>','principal')"><img src="imagenes/atras.gif" border="0"></a></td>
							<td width="1%" colspan="1" align="center" nowrap><b><?= cambiarAcentos($ARRMES[$mes]) ?> - <?= $ano ?></b></td>
							<td width="1%"><a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php?mes=<?= $MesSiguiente ?>&ano=<?= $AnoSiguiente ?>','principal')"><img src="imagenes/avanzar.gif" border="0"></a></td>
							<td width="1%"><a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php?mes=<?= $mes ?>&ano=<?=$AnoSiguienteAno ?>','principal')"><img src="imagenes/avanzar2.gif" border="0"></a></td>
						</tr>
					</table>
				</td>		
			</tr>
			<tr>		
<?php 
			foreach($ARRDIASSEMANA AS $key){
?>
				<td bgcolor="#ccccff" align="center"><b><?= cambiarAcentos($key) ?></b></td>
<?php				
			}
?>		
			</tr>
<?php 		
		$contadordias=1;
		$b = 0;
		$c = 0;
		for($a=2;$a <= $TotalDeCeldas;$a++){ 
			if(!$b) $b = 0;
			if($b == 7) $b = 0;
			if($b == 0) print '<tr>';
			if(!$c) $c = 1;
			if($a > $EmpiezaMesCalOffset AND $c <= $TotalDiasMes){
				$hayFiesta = false;
				if($fechasfiestames[$c][0] == 1){
					if($c == date('d') && $mes == date('m') && $ano == date('Y')){
						$bgcolor = "#ffcc99";
					}elseif($b == 6){
						$bgcolor = "#99cccc";
					}else{
						$bgcolor = "#EEEEEE";
					}
?>					
					<td bgcolor="<?= $bgcolor ?>">
						<table border="0" width="100%">
							<tr>
								<td align="center"><?= $c ?></td>
							</tr>
							<tr>
								<td>
									<a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php?dia=<?= $c ?>&mes=<?= $mes ?>&ano=<?= $ano ?>','principal')"><img src="imagenes/fiesta.gif" border="0"/></a>
								</td>
							</tr>
						</table>
					</td>
<?php 					
					$hayFiesta = true;
				}
				elseif($c == date('d') && $mes == date('m') && $ano == date('Y')){
					$bgcolor = "#ffcc99";
				}elseif($b == 6){
					$bgcolor = "#99cccc";
				}else{
					$bgcolor = "#EEEEEE";
				}
				
				if (!$hayFiesta){
?>				
				<td bgcolor="<?= $bgcolor ?>" width="60" height="60" align="center" valign="middle"><?= $c ?></td>
<?php 				
				}
				$c++;
			}else{
?>
				<td width="60" height="60">&nbsp;</td>
<?php 				
			}
			if($b == 6) print '</tr>';
			$b++;
			$contadordias++;
		}
?>		
			<tr><td align="center" colspan="10"></a></td></tr>
		</table>
<?php 		
	}

?>