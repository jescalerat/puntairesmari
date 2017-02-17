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
	

	if (isset($_POST['cartel']) && $idEncuentroInsert != "")
	{
		$cartel=$_POST['cartel'];
		
		print ("Encuentro: ".$idEncuentroInsert);
		print ("<br>Cartel: ".$cartel);
  	
		$query="insert into carteles (IdEncuentro,Carteles) values (".$idEncuentroInsert.",\"".$cartel."\")";
		$qresultado=mysqli_query ($link, $query);

		if ($qresultado<>1)
		{
			$error=1;
			print ("<p>Query error: ".$query."<br>");
		}
?>		
		
		<table border="0" width="100%">
			<tr>
				<td><a href="#" onclick="llamada_prototype('gestionar_carteles.php?IdEncuentro=<?= $idEncuentroInsert ?>','principal');">Otro Cartel</a></td>
				<td><a href="#" onclick="llamada_prototype('gestionar_lugar.php','principal');">Otro lugar</a></td>
			</tr>
		</table>
<?php 
	}
	else if (!isset($idencuentro))
	{
?>		
		<form action="javascript:llamada_prototype('gestionar_carteles.php','principal',2);" method="post" name="carteles" id="carteles">
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
				Cartel: <input tipe="text" id="cartel" name="cartel" size="30" maxlength="100"/>
			</p>
			<p>
				<input type="submit" name="enviar" id="enviar" value="Guardar" onclick="return ejecutarAccion('gestionar_carteles.php');"/>
			</p>
		</form>
<?php 		
	}
	else
	{
?>
		<form action="javascript:llamada_prototype('gestionar_carteles.php','principal',2);" method="post" name="carteles" id="carteles">
			<input type="hidden" id="idEncuentro" name="idEncuentro" value="<?= $idencuentro ?>">
			<p>
				Cartel: <input tipe="text" id="cartel" name="cartel" size="30" maxlength="100"/>
			</p>
			<p>
				<input type="submit" name="enviar" id="enviar" value="Guardar" onclick="return ejecutarAccion('gestionar_carteles.php');"/>
			</p>
		</form>
<?php 		
	}
?>
	</body>
</html>	
