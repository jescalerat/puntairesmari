<html>
	<head>
		<script type="text/javascript" src="../js/funciones.js"></script>
		<script type="text/javascript" src="../js/prototype.js"></script>
		<script type="text/javascript" src="../js/ajax.js"></script>
	</head>
	<body>
		<form action="javascript:llamada_prototype('gestionar_contactos.php','principal',2);" method="post" name="contactos" id="contactos">
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

	$idEncuentroEliminar = $idencuentro ? $idencuentro : $idEncuentroInsert;
	
	if (isset($_GET['ideliminar']))
	{
	    $query="delete from contactos_encuentros where IdContacto=".$_GET['ideliminar']." and IdEncuentro=".$_GET['IdEncuentro'];
	    mysqli_query($link, $query);
	    print ("<br>Delete: ".$query.";<br>");
	}
	
	if (isset($_GET['ideliminarContacto']))
	{
	    $query="delete from contactos_encuentros where IdContacto=".$_GET['ideliminarContacto']." and IdEncuentro=".$_GET['IdEncuentro'];
	    mysqli_query($link, $query);
	    print ("<br>Delete: ".$query.";<br>");
	    
	    $query="delete from contactos where IdContacto=".$_GET['ideliminarContacto'];
	    mysqli_query($link, $query);
	    print ("<br>Delete: ".$query.";<br>");
	}
	
	
	require_once("gestionar_contactos_otros.php");

	if ((isset($_POST['contacto']) || isset($_POST['idsContactos'])) && $idEncuentroInsert != "")
	{
	    if (isset($_POST['contacto'])  && $_POST['contacto'] != ""){
    		$contacto=$_POST['contacto'];
    		
    		print ("Encuentro: ".$idEncuentroInsert);
    		print ("<br>Contacto: ".$contacto);
    		
    		$query="select idcontacto from contactos order by idcontacto desc limit 1";
    	    $qIdContacto=mysqli_query ($link, $query);
    		$rowIdContacto=mysqli_fetch_array($qIdContacto, MYSQLI_BOTH);
    		$idcontacto = $rowIdContacto["idcontacto"] + 1;
      	
    		$query="insert into contactos (IdContacto,Contacto) values (".$idcontacto.",\"".$contacto."\")";
    		$qresultado=mysqli_query ($link, $query);
    
    		if ($qresultado<>1)
    		{
    			$error=1;
    			print ("<p>Query error: ".$query."<br>");
    		}
    		print ("<br>Insert: ".$query.";<br>");
    		
    		$query="insert into contactos_encuentros (IdContacto,IdEncuentro) values (".$idcontacto.",".$idEncuentroInsert.")";
    		$qresultado=mysqli_query ($link, $query);
    		
    		if ($qresultado<>1)
    		{
    		    $error=1;
    		    print ("<p>Query error: ".$query."<br>");
    		}
    		print ("<br>Insert: ".$query.";<br>");
	    } else {
	        foreach($_POST['idsContactos'] as $idContacto){
	            $query="insert into contactos_encuentros (IdContacto,IdEncuentro) values (".$idContacto.",".$idEncuentroInsert.")";
	            $qresultado=mysqli_query ($link, $query);
	            
	            if ($qresultado<>1)
	            {
	                $error=1;
	                print ("<p>Query error: ".$query."<br>");
	            }
	            print ("<br>Insert: ".$query.";<br>");
	        }
	    }
?>		
		
		<table border="0" width="100%">
			<tr>
				<td><a href="#" onclick="llamada_prototype('gestionar_contactos.php?IdEncuentro=<?= $idEncuentroInsert ?>','principal');">Otro Contacto</a></td>
				<td><a href="#" onclick="llamada_prototype('gestionar_carteles.php?IdEncuentro=<?= $idEncuentroInsert ?>','principal');">Insertar cartel</a></td>
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
			<input type="submit" name="enviar" id="enviar" value="Buscar encuentro" onclick="return ejecutarAccion('gestionar_contactos.php');"/>
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
							<td><a href="javascript:llamada_prototype('gestionar_contactos.php?IdEncuentro=<?= $encuentros["IdEncuentro"] ?>','principal');"><?= cambiarAcentos($desc) ?></a></td>
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
			Contacto: <input tipe="text" id="contacto" name="contacto" size="30" maxlength="100"/>
		</p>
		<p>
			<input type="submit" name="enviar" id="enviar" value="Guardar" onclick="return ejecutarAccion('gestionar_contactos.php');"/>
		</p>
<?php 			
	}

	$idEncuentroBuscar = 0;
	if ($idEncuentroInsert != "" || isset($idencuentro)){
		if ($idEncuentroInsert != ""){
			$idEncuentroBuscar = $idEncuentroInsert;
		} else {
			$idEncuentroBuscar = $idencuentro;
		}
	}
	
	if ($idEncuentroBuscar != 0){
		$query="select c.Contacto, c.IdContacto from contactos c, contactos_encuentros ce ";
		$query.="where c.IdContacto=ce.IdContacto and ce.IdEncuentro = ".$idEncuentroBuscar;
		$qcontactos=mysqli_query ($link, $query);
		$filas=mysqli_num_rows($qcontactos);
		
		if ($filas>0)
		{
?>			
			<table border="1" width="100%">
				<tr>
					<th align="center"><?= cambiarAcentos(_CONTACTOS) ?></th>
					<th align="center" width="10%">Eliminar</th>
					<th align="center" width="10%">Eliminar Contacto</th>
				</tr>
<?php 
				while($contactos=mysqli_fetch_array($qcontactos, MYSQLI_BOTH))
				{			
?>
					<tr>
						<td><?= $contactos["Contacto"] ?></td>
						<td><a onclick="llamada_prototype('gestionar_contactos.php?ideliminar=<?= $contactos["IdContacto"] ?>&IdEncuentro=<?= $idEncuentroEliminar ?>','principal');" href="#">Eliminar</a></td>
						<td><a onclick="llamada_prototype('gestionar_contactos.php?ideliminarContacto=<?= $contactos["IdContacto"] ?>&IdEncuentro=<?= $idEncuentroEliminar ?>','principal');" href="#">Eliminar</a></td>
					</tr>
<?php 
				}			
?>
			</table>
<?php 			
		}
			
		mysqli_free_result($qcontactos);
	}
?>	

    		<input type="hidden" id="provinciasString" name="provinciasString" value="<?= cambiarAcentos(_PROVINCIAS) ?>">
    		<input type="hidden" id="municipiosString" name="municipiosString" value="<?= cambiarAcentos(_MUNICIPIOS) ?>">

		</form>
	</body>
</html>	
