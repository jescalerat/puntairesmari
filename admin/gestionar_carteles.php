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
		
		$query="select idcartel from carteles order by idcartel desc limit 1";
	    $qIdCartel=mysqli_query ($link, $query);
		$rowIdCartel=mysqli_fetch_array($qIdCartel, MYSQLI_BOTH);
		$idcartel = $rowIdCartel["idcartel"] + 1;
  	
		$query="insert into carteles (IdCartel,IdEncuentro,Carteles) values (".$idcartel.",".$idEncuentroInsert.",\"".$cartel."\")";
		$qresultado=mysqli_query ($link, $query);

		if ($qresultado<>1)
		{
			$error=1;
			print ("<p>Query error: ".$query."<br>");
		}
		print ("<br>Insert: ".$query.";<br>");
?>		
		
		<table border="0" width="100%">
			<tr>
				<td><a href="#" onclick="llamada_prototype('gestionar_carteles.php?IdEncuentro=<?= $idEncuentroInsert ?>','principal');">Otro Cartel</a></td>
				<td><a href="#" onclick="llamada_prototype('gestionar_contactos.php?IdEncuentro=<?= $idEncuentroInsert ?>','principal');">Insertar Conctacto</a></td>
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
				<input type="submit" name="enviar" id="enviar" value="Buscar encuentro" onclick="return ejecutarAccion('gestionar_carteles.php');"/>
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
								<td><a href="javascript:llamada_prototype('gestionar_carteles.php?IdEncuentro=<?= $encuentros["IdEncuentro"] ?>','principal');"><?= cambiarAcentos($desc) ?></a></td>
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
?>	
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

<?php 			

	$idEncuentroBuscar = 0;
	if ($idEncuentroInsert != "" || isset($idencuentro)){
		if ($idEncuentroInsert != ""){
			$idEncuentroBuscar = $idEncuentroInsert;
		} else {
			$idEncuentroBuscar = $idencuentro;
		}
	}

	if ($idEncuentroBuscar != 0){
		$query="select * from carteles where IdEncuentro = ".$idEncuentroBuscar;
		$qcarteles=mysqli_query ($link, $query);
		$filas=mysqli_num_rows($qcarteles);
		
		if ($filas>0)
		{
?>			
			<table border="1" width="100%">
				<tr>
					<th align="center"><?= cambiarAcentos(_CARTELES) ?></th>
				</tr>
<?php 
				while($carteles=mysqli_fetch_array($qcarteles, MYSQLI_BOTH))
				{			
?>
					<tr>
						<td>
							<img src="<?= $carteles["Carteles"] ?>" name="btndocumento" border="0" id="btndocumento" height="150px" width="150px">
						</td>
					</tr>
<?php 
				}			
?>
			</table>
<?php 			
		}
	
		mysqli_free_result($qcarteles);
	}
?>	

		<p><a href="http://tinypic.com" target="_black">Tinypic</a></p>
		<p>Email: jet_431@hotmail.com</p>
		<p>Contraseña: Torres2008</p>

		<input type="hidden" id="provinciasString" name="provinciasString" value="<?= cambiarAcentos(_PROVINCIAS) ?>">
		<input type="hidden" id="municipiosString" name="municipiosString" value="<?= cambiarAcentos(_MUNICIPIOS) ?>">
	
	</body>
</html>	
