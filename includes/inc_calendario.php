<?php
    $mostrarVolver = 1;
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


    $tipo_semana = 1;
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
		
	//Inicializar array para saber los dias de fiesta
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
	<br/>
	<table class="table text-center">
		<tr>
			<td style="padding:0;" colspan="7">
				<table class="table text-center">
					<tr>
						<td width="15%"><a href="javascript:llamada_prototype('paginas/calendario.php?mes=<?= $mes ?>&ano=<?= $AnoAnteriorAno ?>','principal')"><img src="imagenes/atras2.gif" border="0"></a></td>
						<td width="15%"><a href="javascript:llamada_prototype('paginas/calendario.php?mes=<?= $MesAnterior ?>&ano=<?= $AnoAnterior ?>','principal')"><img src="imagenes/atras.gif" border="0"></a></td>
						<td class="text-center" nowrap><b><?= cambiarAcentos($ARRMES[$mes]) ?> - <?= $ano ?></b></td>
						<td width="15%"><a href="javascript:llamada_prototype('paginas/calendario.php?mes=<?= $MesSiguiente ?>&ano=<?= $AnoSiguiente ?>','principal')"><img src="imagenes/avanzar.gif" border="0"></a></td>
						<td width="15%"><a href="javascript:llamada_prototype('paginas/calendario.php?mes=<?= $mes ?>&ano=<?=$AnoSiguienteAno ?>','principal')"><img src="imagenes/avanzar2.gif" border="0"></a></td>
					</tr>
				</table>
			</td>		
		</tr>
		<tr>		
<?php 
		foreach($ARRDIASSEMANA AS $key){
?>
			<td style="padding:0;" bgcolor="#ccccff" class="text-center"><b><?= cambiarAcentos($key) ?></b></td>
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
					<td style="padding:0;" bgcolor="<?= $bgcolor ?>">
						<table class="table">
							<tr>
								<td style="padding:0;" align="center" bgcolor="<?= $bgcolor ?>"><?= $c ?></td>
							</tr>
							<tr>
								<td style="padding:0;" bgcolor="<?= $bgcolor ?>">
									<a href="javascript:llamada_prototype('paginas/lista_encuentros.php?dia=<?= $c ?>&mes=<?= $mes ?>&anyo=<?= $ano ?>&mostrarVolver=<?= $mostrarVolver ?>','principal')"><img src="imagenes/fiesta.gif" width="30px" height="30px" border="0"/></a>
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
				<td bgcolor="<?= $bgcolor ?>" class="text-center" valign="middle"><?= $c ?></td>
<?php 				
				}
				$c++;
			}else{
?>
				<td>&nbsp;</td>
<?php 				
			}
			if($b == 6) print '</tr>';
			$b++;
			$contadordias++;
		}
?>			
		<tr><td class="text-center" colspan="7"></td></tr>
	</table>