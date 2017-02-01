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

	if (isset($_POST['op_fiestas']))
	{
	  	$idfiesta=$_POST['op_fiestas'];
	  	$programa=$_POST['programa'];
	  	$fichero=$_POST['fichero'];
	  	print ("IdFiesta: ".$idfiesta);
	  	print ("<br>Programa: ".$programa);
	  	print ("<br>Fichero: ".$fichero);
	  	
	  	$query="select IdFiesta,municipios_provincias_comunidades_paises_IdPais,municipios_provincias_comunidades_IdComunidad, municipios_provincias_IdProvincia, municipios_IdMunicipio from fiestas where IdFiesta =".$idfiesta;
		$qfiesta=mysql_query ($query,$link);
			
		$idpais=mysql_result($qfiesta,0,"municipios_provincias_comunidades_paises_IdPais");
		$idcomunidad=mysql_result($qfiesta,0,"municipios_provincias_comunidades_IdComunidad");
		$idprovincia=mysql_result($qfiesta,0,"municipios_provincias_IdProvincia");
		$idmunicipio=mysql_result($qfiesta,0,"municipios_IdMunicipio");
			
	  	$query="insert into programas (fiestas_IdFiesta,fiestas_municipios_provincias_comunidades_paises_IdPais,fiestas_municipios_provincias_comunidades_IdComunidad,fiestas_municipios_provincias_IdProvincia,fiestas_municipios_IdMunicipio,Programa,Fichero) values (".$idfiesta.",".$idpais.",".$idcomunidad.",".$idprovincia.",".$idmunicipio.",\"".$programa."\",\"".$fichero."\")";
	    $qresultado=mysql_query ($query,$link);

		if ($qresultado<>1)
		{
			$error=1;
			print ("<p>Query error: ".$query."<br>");
		}
?>		
		<table border="0" width="100%">
			<tr>
				<td><a href="index.php">Indice</a></td>
				<td><a href="gestionar_lugar.php">Otro encuentro</a></td>
			</tr>
		</table>
<?php 		
	}
	else
	{
?>
		<form name="programas" id="programas" method="post">
<?php 		
	  		if(isset($_GET['IdFiesta']))
	  		{
	  		
				$query="select * from municipios where provincias_comunidades_IdComunidad=".$_GET['IdComunidad']." and provincias_IdProvincia=".$_GET['IdProvincia']." and IdMunicipio=".$_GET['IdMunicipio'];
				$qmunicipio=mysqli_query ($link, $query);
				$rowmunicipio=mysqli_fetch_array($qmunicipio, MYSQLI_BOTH);
?>
		  		Municipio: <?= $rowmunicipio["Municipio"] ?>
		  		<p>
		  			IdFiesta: <input tipe="text" id="op_fiestas" name="op_fiestas" value=<?= $_GET['IdEncuentro'] ?> size="30" readonly/>
		  		</p>
<?php 	  		
		  	}
		  	else
		  	{
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
<?php 					
			}
?>
			<p>
				Fichero: <input tipe="text" id="fichero" name="fichero" value="<?= strtolower($rowmunicipio["Municipio"]) ?>2017.pdf" size="30" maxlength="50"/>
			</p>
	  		<p>
	  			<input type="submit" name="enviar" id="enviar" value="Guardar"/>
	  		</p>
		</form>
		<p><a href="index.php">Indice</a></p>
<?php 		
	}
?>

	</body>
</html>	
