<html>
	<head>
		<script type="text/javascript" src="../js/funciones.js"></script>
		<script type="text/javascript" src="../js/prototype.js"></script>
		<script type="text/javascript" src="../js/ajax.js"></script>
	</head>
	<body>
<?php
	require_once("../conf/funciones.php");
	require_once("../conf/conexion.php");
	require_once("../conf/traduccion.php");
	$link=Conectarse();
	
	if (isset($_POST['op_comunidades'])&&isset($_POST['op_provincias'])&&isset($_POST['op_municipios']))
  	{
  		print("Entra");
	  	$comunidad=$_POST['op_comunidades'];
	  	$provincia=$_POST['op_provincias'];
	  	$municipio=$_POST['op_municipios'];
		$descripcion=$_POST['descripcion'];
	  	$dia=$_POST['dia'];
	  	$mes=$_POST['mes'];
	  	$anyo=$_POST['anyo'];
	  	print ("Comunidad: ".$comunidad);
	  	print ("<br>Provincia: ".$provincia);
	  	print ("<br>Lugar: ".$municipio);
		print ("<br>Descripcion: ".$descripcion);
	  	print ("<br>Dia: ".$dia);
	  	print ("<br>Mes: ".$mes);
	  	print ("<br>Año: ".$anyo);
	  	$idMunicipio=explode("@",$municipio);
	  	$idcomunidad=$idMunicipio[2];
	  	$idprovincia=$idMunicipio[1];
	  	$idmunicipio=$idMunicipio[0];
	  	
	  	$query="insert into encuentros (IdMunicipio,Descripcion,Dia,Mes,Anyo) values (".$idmunicipio.",\"".$descripcion."\",\"".$dia."\",".$mes.",".$anyo.")";
	    $qresultado=mysqli_query ($link, $query);
	
		if ($qresultado<>1)
		{
			$error=1;
			print ("<p>Query error: ".$query."<br>");
		}
			
		$idencuentro = mysqli_insert_id($link);
?>		
	<table border="0" width="100%">
		<tr>
			<td><a href="#" onclick="llamada_prototype('gestionar_lugar.php','principal');">Otro lugar</a></td>
			<td><a href="#" onclick="llamada_prototype('gestionar_carteles.php?IdEncuentro=<?= $idencuentro ?>','principal');">Insertar cartel</a></td>
			<td><a href="#" onclick="llamada_prototype('gestionar_contactos.php?IdEncuentro=<?= $idencuentro ?>','principal');">Insertar contactos</a></td>
		</tr>
	</table>
<?php 	
	}
	else
	{
?>
		<form action="javascript:llamada_prototype('gestionar_lugar.php','principal',2);" method="post" name="encuentros" id="encuentros">
<?php 		
			if(isset($_GET['IdMunicipio']))
			{
				$query="select * from municipios where IdMunicipio=".$_GET['IdMunicipio'];
				$qmunicipio=mysqli_query ($link, $query);
				$rowmunicipio=mysqli_fetch_array($qmunicipio, MYSQLI_BOTH);
				print ("Municipio: ".$rowmunicipio["Municipio"]);
	
				$query="select * from provincias where IdProvincia=".$rowmunicipio["IdProvincia"];
				$qprovincia=mysqli_query ($link, $query);
				$rowprovincia=mysqli_fetch_array($qprovincia, MYSQLI_BOTH);
?>				
				<input type="hidden" id="op_comunidades" name="op_comunidades" value="<?= $rowprovincia["IdComunidad"] ?>">
				<input type="hidden" id="op_provincias" name="op_provincias" value="<?= $rowmunicipio["IdProvincia"] ?>">
				<input type="hidden" id="op_municipios" name="op_municipios" value="<?= $_GET['IdMunicipio'] ?>">
<?php 				
				mysqli_free_result($qmunicipio);
				mysqli_free_result($qprovincia);
			}
			else
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
<?php 				
			}
?>			
			<p>
				Descripci&oacute;n: <input tipe="text" id="descripcion" name="descripcion" size="30" maxlength="50"/>
			</p>
			<p>
				Dia: <input tipe="text" id="dia" name="dia" size="30" maxlength="50"/>
			</p>
			<p>
				Mes: <input tipe="text" id="mes" name="mes" size="30" maxlength="50"/>
			</p>
			<p>
				Año: <input tipe="text" id="anyo" name="anyo" value="2017" size="30" maxlength="50"/>
			</p>
			<p>
				<input type="submit" name="enviar" id="enviar" value="Guardar" onclick="return ejecutarAccion('gestionar_lugar.php');"/>
			</p>
		</form>
		<p><a href="index.php">Indice</a></p>
<?php 		
	}
?>
		<input type="hidden" id="provinciasString" name="provinciasString" value="<?= cambiarAcentos(_PROVINCIAS) ?>">
		<input type="hidden" id="municipiosString" name="municipiosString" value="<?= cambiarAcentos(_MUNICIPIOS) ?>">

	</body>
</html>	
