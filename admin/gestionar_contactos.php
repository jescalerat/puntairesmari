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
	
	$idencuentro=null;
	if (isset($_GET['IdEncuentro'])){
		$idencuentro=$_GET['IdEncuentro'];
	}
	
	$idEncuentroInsert = "";
	if (isset($_POST['op_encuentro']) || isset($_POST['idEncuentro']))
	{
		if (isset($_POST['op_encuentro']))
		{
			$idEncuentroInsert = $_POST['op_encuentro'];
		}
		if (isset($_POST['idEncuentro']))
		{
			$idEncuentroInsert = $_POST['idEncuentro'];
		}
	}
	

	if (isset($_POST['contacto']) && $idEncuentroInsert != "")
	{
		$contacto=$_POST['contacto'];
		
		print ("Encuentro: ".$idEncuentroInsert);
		print ("<br>Contacto: ".$contacto);
  	
		$query="insert into contactos (IdEncuentro,Contacto) values (".$idEncuentroInsert.",\"".$contacto."\")";
		$qresultado=mysqli_query ($link, $query);

		if ($qresultado<>1)
		{
			$error=1;
			print ("<p>Query error: ".$query."<br>");
		}
?>		
		
		<table border="0" width="100%">
			<tr>
				<td><a href="index.php">Indice</a></td>
				<td><a href="gestionar_contactos.php?IdEncuentro=<?= $idEncuentroInsert ?>">Otro contacto</a></td>
				<td><a href="gestionar_lugar.php">Otro lugar</a></td>
			</tr>
		</table>
<?php 
		mysqli_free_result($qresultado);
	}
	else if (!isset($idencuentro))
	{
?>		
		<form name="contactos" id="contactos" method="post">
<?php 			
			$query="select e.idencuentro, concat(e.Dia,\"-\",e.Mes,\"-\",e.Anyo) as dia, m.municipio from encuentros e, municipios m where e.IdMunicipio=m.IdMunicipio order by m.Municipio";
			$q=mysqli_query ($link, $query);

			//Obtener el numero de filas devuelto
			$total_registros=mysqli_num_rows($q);
?>					
			<select name="op_encuentro" id="op_encuentro">
				<option value="0">Encuentro</option>
<?php 				
				while($registro=mysqli_fetch_row($q))
				{
?>
					<option value="<?= $registro[0] ?>"><?= $registro[1] ?> - <?= $registro[2] ?></option>
<?php 					
				}
				mysqli_free_result($q);
?>		
			</select>
			
			<p>
				Contacto: <input tipe="text" id="contacto" name="contacto" size="30" maxlength="100"/>
			</p>
			<p>
				<input type="submit" name="enviar" id="enviar" value="Guardar"/>
			</p>
		</form>
		<p><a href="index.php">Indice</a></p>
<?php 		
	}
	else
	{
?>
		<form name="contactos" id="contactos" method="post">
			<input type="hidden" id="idEncuentro" name="idEncuentro" value="<?= $idencuentro ?>">
			<p>
				Contacto: <input tipe="text" id="contacto" name="contacto" size="30" maxlength="100"/>
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
