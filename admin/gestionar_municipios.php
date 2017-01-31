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

	if (isset($_POST['op_comunidades'])&&isset($_POST['op_provincias'])&&isset($_POST['municipio']))
	{
		$comunidad=$_POST['op_comunidades'];
		$provincia=$_POST['op_provincias'];
		$municipio=$_POST['municipio'];
		print ("Pais: ".$comunidad);
		print ("<br>Comunidad: ".$comunidad);
		print ("<br>Provincia: ".$provincia);
		print ("<br>Lugar: ".$municipio);
		$idProvincia=explode("@",$provincia);
		$idcomunidad=$idProvincia[1];
		$idprovincia=$idProvincia[0];

  	
		$query="insert into municipios (IdProvincia,Municipio) values (".$idprovincia.",\"".$municipio."\")";
		$qresultado=mysqli_query ($link, $query);

		if ($qresultado<>1)
		{
			$error=1;
			print ("<p>Query error: ".$query."<br>");
		}
		
		//Buscar el ultimo id de la comunidad, la provincia y el pais
		$query="select IdMunicipio from municipios order by idmunicipio desc limit 0,1";
		$qidmunicipio=mysqli_query ($link, $query);
		$rowmunicipio=mysqli_fetch_array($qidmunicipio, MYSQLI_BOTH);

		$proximoid = $rowmunicipio["IdMunicipio"];
?>
		<table border="0" width="100%">
			<tr>
				<td><a href="index.php">Indice</a></td>
				<td><a href="gestionar_municipios.php">Otro municipio</a></td>
				<td><a href="gestionar_lugar.php?IdMunicipio=<?= $proximoid ?>">Insertar encuentro</a></td>
			</tr>
		</table>
<?php 					
	}
	else
	{
?>		
		<form name="encuentros" id="encuentros" method="post">
			<?php generaComunidades(1); ?>
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
				Municipio: <input tipe="text" id="municipio" name="municipio" size="30" maxlength="50"/>
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
