<?php
	session_start();
	/*if (!isset($_SESSION['registrado']))
	{
		header("Location:login.php");	
	}*/

	require_once("../conf/conexion.php");
	$link=Conectarse();

	if (isset($_GET['ideliminar']))
	{
		$query="delete from correo where IdCorreo=".$_GET['ideliminar'];
		mysqli_query($link, $query);
		header("Location:comprobar_correo.php");
	}
	else
	{
		//Query para comprobar el correo que tengo
		$query="select * from correo";
		$qcorreo=mysqli_query($link, $query);
		
?>
		<center><h1>Correo en Puntaires Mari</h1>
		
		<table width="100%" border="1">
			<tr>
				<th width="10%"> Eliminar</th>
				<th width="20%"> Nombre</th>
				<th width="20%"> Email</th>
				<th> Mensaje</th>
				<th width="20%"> IP</th>
			</tr>
<?php 				
				while($correos=mysqli_fetch_array($qcorreo, MYSQLI_BOTH))
				{
?>
					<tr>
						<td><a onclick="llamada_prototype('comprobar_correo.php?ideliminar=<?= $correos["IdCorreo"] ?>','principal');" href="#">Eliminar</a></td>
						<td><?= $correos["Nombre"] ?></td>
						<td><?= $correos["Email"] ?></td>
						<td><?= $correos["Mensaje"] ?></td>
						<td><?= $correos["IP"] ?></td>
					</tr>
<?php 
				}
?>
		</table>
<?php		
	}
?>