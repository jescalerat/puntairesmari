<html>
	<head>
		<script type="text/javascript" src="../js/funciones.js"></script>
		<script type="text/javascript" src="../js/prototype.js"></script>
		<script type="text/javascript" src="../js/ajax.js"></script>
	</head>
	<body>
		<form action="javascript:llamada_prototype('duplicar_encuentro.php','principal',2);" method="post" name="dupEncuentros" id="dupEncuentros">
<?php
	require_once("../conf/funciones.php");
	require_once("../conf/conexion.php");
	require_once("../conf/traduccion.php");
	$link=Conectarse();
	
	$idencuentro=null;
	if (isset($_GET['IdEncuentro'])){
		$idencuentro=$_GET['IdEncuentro'];
	}
	
	$idEncuentroInsert = "";
	$descripcion = "";
	$dia = "";
	$mes = "";
	$anyo = "";
	if (isset($_GET['IdEncuentro']))
	{
	    $idEncuentroInsert = $_GET['IdEncuentro'];
		
		$query="select * from encuentros where IdEncuentro=".$idEncuentroInsert;
		$qEncuentro=mysqli_query ($link, $query);
		$rowEncuentro=mysqli_fetch_array($qEncuentro, MYSQLI_BOTH);
	
		$descripcion = $rowEncuentro["Descripcion"];
		$dia = $rowEncuentro["Dia"];
		$mes = $rowEncuentro["Mes"];
		$anyo = $rowEncuentro["Anyo"];
	}

	$idEncuentroEliminar = $idencuentro ? $idencuentro : $idEncuentroInsert;
	
	if (isset($_POST['idEncuentro']))
	{
	    $idEncuentroInsert=$_POST['idEncuentro'];
	    $idencuentro=$_POST['idEncuentro'];
	    $descripcion=$_POST['descripcion'];
	    $dia=$_POST['dia'];
	    $mes=$_POST['mes'];
	    $anyo=$_POST['anyo'];
	    print ("<br>Descripcion: ".$descripcion);
	    print ("<br>Dia: ".$dia);
	    print ("<br>Mes: ".$mes);
	    print ("<br>Año: ".$anyo);
	    
	    $query="select * from encuentros where IdEncuentro=".$_POST['idEncuentro'];
	    $qIdMunicipio=mysqli_query ($link, $query);
	    $rowIdMunicipio=mysqli_fetch_array($qIdMunicipio, MYSQLI_BOTH);
	    $idMunicipio = $rowIdMunicipio["IdMunicipio"];
	    
	    $query="select idencuentro from encuentros order by idencuentro desc limit 1";
	    $qIdEncuentro=mysqli_query ($link, $query);
	    $rowIdEncuentro=mysqli_fetch_array($qIdEncuentro, MYSQLI_BOTH);
	    $idencuentro = $rowIdEncuentro["idencuentro"] + 1;
	    
	    $query="insert into encuentros (IdEncuentro,IdMunicipio,Descripcion,Dia,Mes,Anyo) values (".$idencuentro.",".$idMunicipio.",\"".$descripcion."\",\"".$dia."\",".$mes.",".$anyo.")";
	    $qresultado=mysqli_query ($link, $query);
	    
	    if ($qresultado<>1)
	    {
	        $error=1;
	        print ("<p>Query error: ".$query."<br>");
	    }
	    
	    $idencuentro = mysqli_insert_id($link);
	    print ("<br>Insert: ".$query.";<br>");

?>		
		
		<table border="0" width="100%">
			<tr>
				<td><a href="#" onclick="llamada_prototype('gestionar_contactos.php?IdEncuentro=<?= $idencuentro ?>','principal');">Insertar Contacto</a></td>
				<td><a href="#" onclick="llamada_prototype('gestionar_carteles.php?IdEncuentro=<?= $idencuentro ?>','principal');">Insertar cartel</a></td>
				<td><a href="#" onclick="llamada_prototype('gestionar_lugar.php','principal');">Otro lugar</a></td>
			</tr>
		</table>
<?php 
	}
	else if (!isset($idencuentro))
	{
		generaComunidades(1);
?>				
		<p>
			<select disabled="disabled" name="op_provincias" id="op_provincias">
				<option value="0">Provincias</option>
			</select>
		</p>
		<p>
			<select disabled="disabled" name="op_municipios" id="op_municipios">
				<option value="0">Municipios</option>
			</select>
		</p>
		
		<p>
			<input type="submit" name="enviar" id="enviar" value="Buscar encuentro" onclick="return ejecutarAccion('duplicar_encuentro.php');"/>
		</p>
			
<?php 
		if (isset($_POST['op_municipios'])){
			$idMunicipio=explode("@",$_POST['op_municipios']);
			$idmunicipio=$idMunicipio[0];
			
			$query="select * from encuentros where IdMunicipio = ".$idmunicipio." order by anyo desc, mes desc, dia desc";
			$qencuentros=mysqli_query ($link, $query);
			$filas=mysqli_num_rows($qencuentros);
			
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
						
						$dias=$encuentros["Dia"]."/".$encuentros["Mes"]."/".$encuentros["Anyo"];
						
						$desc = $rowmunicipio["Municipio"]." (".$rowprovincia["Provincia"].")";
						if ($encuentros["Descripcion"] != null){
							$desc .= " --- ".$encuentros["Descripcion"];
						}
?>				
						<tr>
							<td><a href="javascript:llamada_prototype('duplicar_encuentro.php?IdEncuentro=<?= $encuentros["IdEncuentro"] ?>','principal');"><?= cambiarAcentos($desc) ?></a></td>
							<td><?= $dias ?></td>
						</tr>
<?php 				
					}
?>			
				</table>
<?php 			
			}
				
			mysqli_free_result($qencuentros);
		}
	}
	else
	{
?>
		<input type="hidden" id="idEncuentro" name="idEncuentro" value="<?= $idencuentro ?>">
		<p>
			Descripci&oacute;n: <input tipe="text" id="descripcion" name="descripcion" size="30" maxlength="100"  value="<?= $descripcion ?>"/>
		</p>
		<p>
			Dia: <input tipe="text" id="dia" name="dia" size="30" maxlength="50" value="<?= $dia ?>"/>
		</p>
		<p>
			Mes: <input tipe="text" id="mes" name="mes" size="30" maxlength="50" value="<?= $mes ?>"/>
		</p>
		<p>
			A&ntilde;yo: <input tipe="text" id="anyo" name="anyo" size="30" maxlength="50" value="<?= $anyo ?>"/>
		</p>
		<p>
			<input type="submit" name="enviar" id="enviar" value="Guardar" onclick="return ejecutarAccion('duplicar_encuentro.php');"/>
		</p>
<?php 			
	}
?>
    		<input type="hidden" id="provinciasString" name="provinciasString" value="<?= cambiarAcentos(_PROVINCIAS) ?>">
    		<input type="hidden" id="municipiosString" name="municipiosString" value="<?= cambiarAcentos(_MUNICIPIOS) ?>">

		</form>
	</body>
</html>	
