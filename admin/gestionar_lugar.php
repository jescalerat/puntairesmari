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
	$link=Conectarse();
	
	if (isset($_POST['op_comunidades'])&&isset($_POST['op_provincias'])&&isset($_POST['op_municipios']))
  	{
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
	  	print ("<br>A�o: ".$anyo);
	  	$idMunicipio=explode("@",$municipio);
	  	$idcomunidad=$idMunicipio[2];
	  	$idprovincia=$idMunicipio[1];
	  	$idmunicipio=$idMunicipio[0];
	  	
	  	$query="insert into encuentros (IdMunicipio,Descripcion,Dia,Mes,Anyo) values (".$idmunicipio.",\"".$descripcion."\",\"".$dia."\",".$mes.",".$anyo.")";
	    $qresultado=mysql_query ($query,$link);
	
		if ($qresultado<>1)
		{
			$error=1;
			print ("<p>Query error: ".$query."<br>");
		}
			
		$idencuentro = mysql_insert_id();
?>		
	<table border="0" width="100%">
		<tr>
			<td><a href="index.php">Indice</a></td>
			<td><a href="gestionar_lugar.php">Otro lugar</a></td>
			<td><a href="gestionar_cartel.php?IdEncuentro=<?= $idencuentro ?>&IdMunicipio=<?= $idmunicipio ?>">Insertar cartel</a></td>
			<td><a href="gestionar_contactos.php?IdEncuentro=<?= $idencuentro ?>">Insertar contactos</a></td>
		</tr>
	</table>
<?php 	
	}
	else
	{
?>
		<form name="encuentros" id="encuentros" method="post">
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
				<input type="submit" name="enviar" id="enviar" value="Guardar"/>
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
