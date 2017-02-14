<?php
	session_start();
/*	if (!isset($_SESSION['registrado']))
	{
		header("Location:login.php?abrirpagina=2");	
	}*/

	require_once("../conf/conexion.php");
	$link=Conectarse();

	if (isset($_GET['ideliminar']))
	{
		$query="delete from visitas where IdVisitas=".$_GET['ideliminar'];
		mysqli_query($link, $query);
		header("Location:comprobar_visitas.php");
	}
	else
	{
		
		//Query para comprobar las visitas que tengo
		$query="select * from visitas order by Fecha desc, Hora, IP";
		$qvisitas=mysqli_query($link, $query);
		$rowvisitas=mysqli_fetch_array($qvisitas, MYSQLI_BOTH);
		mysqli_free_result($qvisitas);
		
		$qvisitas=mysqli_query($link, $query);

?>
		<center><h1>Visitas en Puntaires Mari</h1>
		
		<table width="100%" border="1">
			<tr>
				<th width="12%"> Eliminar</th>
				<th width="22%"> IP</th>
				<th width="22%"> Hora</th>
				<th width="22%"> Fecha</th>
				<th width="22%"> Idioma</th>
			</tr>

<?php 

				$fecha_actual=$rowvisitas["Fecha"];
				while($visitas=mysqli_fetch_array($qvisitas, MYSQLI_BOTH))
				{
					$ip_usuario=$visitas["IP"];
	
					$fecha_futura=$visitas["Fecha"];
					if (strcmp($fecha_actual,$fecha_futura)!=0)
					{
						//Query para contar las visitas que tengo al dia
						$query="select count(Fecha) as visitas_dia from visitas where Fecha=\"".$fecha_actual."\"";
						$query_visitas_dia=mysqli_query($link, $query);
						$rowvisitasdia=mysqli_fetch_array($query_visitas_dia, MYSQLI_BOTH);

						//Query para contar las visitas distintas que tengo al dia
						$query="select count(distinct IP) as visitas_dia_distintas from visitas where Fecha=\"".$fecha_actual."\"";
						$query_visitas_dis_dia=mysqli_query($link, $query);
						$rowvisitasdisdia=mysqli_fetch_array($query_visitas_dis_dia, MYSQLI_BOTH);
?>
						<tr bgcolor="green">
							<td><a onclick="llamada_prototype('comprobar_paginas_vistas.php?fecha=<?= $fecha_actual ?>','principal');" href="#" target="_top"><?= $fecha_actual ?></a></td>
							<td>Visitas dia:</td>
							<td><?= $rowvisitasdia["visitas_dia"] ?></td>
							<td>Visitas dia distintas:</td>
							<td><?= $rowvisitasdisdia["visitas_dia_distintas"] ?></td>
						</tr>
<?php 						
						$fecha_actual=$visitas["Fecha"];
						mysqli_free_result($query_visitas_dia);
						mysqli_free_result($query_visitas_dis_dia);
					}
?>
					<tr>
						<td><a onclick="llamada_prototype('comprobar_visitas.php?ideliminar=<?= $visitas["IdVisitas"] ?>','principal');" href="#">Eliminar</a></td>
						<td><a onclick="llamada_prototype('comprobar_paginas_vistas.php?fecha=<?= $visitas["Fecha"] ?>&IP=<?= $visitas["IP"] ?>','principal');" href="#"><?= $ip_usuario ?></a></td>
						<td><?= $visitas["Hora"] ?></td>
						<td><?= $visitas["Fecha"] ?></td>
						<td><?= $visitas["Idioma"] ?></td>
					</tr>
<?php 
				}

				//Query para contar las visitas que tengo al dia
				$query="select count(Fecha) as visitas_dia from visitas where Fecha=\"".$fecha_actual."\"";
				$query_visitas_dia=mysqli_query($link, $query);
				$rowvisitasdia=mysqli_fetch_array($query_visitas_dia, MYSQLI_BOTH);

				//Query para contar las visitas distintas que tengo al dia
				$query="select count(distinct IP) as visitas_dia_distintas from visitas where Fecha=\"".$fecha_actual."\"";
				$query_visitas_dis_dia=mysqli_query($link, $query);
				$rowvisitasdisdia=mysqli_fetch_array($query_visitas_dis_dia, MYSQLI_BOTH);
?>
				<tr bgcolor="green">
					<td><a onclick="llamada_prototype('comprobar_paginas_vistas.php?fecha=<?= $fecha_actual ?>','principal');" href="#" target="_top"><?= $fecha_actual ?></a></td>
					<td>Visitas dia:</td>
					<td><?= $rowvisitasdia["visitas_dia"] ?></td>
					<td>Visitas dia distintas:</td>
					<td><?= $rowvisitasdisdia["visitas_dia_distintas"] ?></td>
				</tr>
		</table>
<?php
		mysqli_free_result($qvisitas); 	
		mysqli_free_result($query_visitas_dia);
		mysqli_free_result($query_visitas_dis_dia);
	}
?>