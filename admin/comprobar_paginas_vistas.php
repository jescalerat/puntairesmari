<?php
	session_start();
	/*if (!isset($_SESSION['registrado']))
	{
		header("Location:login.php");	
	}*/

	require_once("../conf/conexion.php");
	require_once("../conf/funciones.php");
	$link=Conectarse();

	if (isset($_GET['ideliminar']))
	{
		$query="delete from paginas_vistas where IdPaginasVistas=".$_GET['ideliminar'];
		mysqli_query($link, $query);
		header("Location:comprobar_paginas_vistas.php");
	}
	else
	{
		$subtitulo="";		
		if (isset($_GET['IP']))
		{
			$query="select * from paginas_vistas where IP=\"".$_GET['IP']."\" and Fecha=\"".$_GET['fecha']."\" order by Fecha desc, Hora desc, IP";
			$subtitulo = "Fecha: ".$_GET['fecha']." IP: ".$_GET['IP'];
			
		}
		else if (isset($_GET['fecha']))
		{
			$query="select * from paginas_vistas where Fecha=\"".$_GET['fecha']."\" order by Fecha desc, Hora desc, IP";
			$subtitulo = "Fecha: ".$_GET['fecha'];
		}
		else
		{
			$query="select * from paginas_vistas order by Fecha desc, Hora desc, IP";
		}

		//Query para comprobar las visitas que tengo
		$qvisitas=mysqli_query($link, $query);
?>
		<center><h1>Paginas vistas en Puntaires Mari</h1>
		<center><h3><?= $subtitulo ?></h3>
		
		<table width="100%" border="1">
			<tr>
				<th width="10%"> Eliminar</th>
				<th width="18%"> IP</th>
				<th width="18%"> Hora</th>
				<th width="18%"> Fecha</th>
				<th width="18%"> Pagina</th>
				<th width="18%"> Observaciones");</th>
			</tr>

<?php 				
				while($visitas=mysqli_fetch_array($qvisitas, MYSQLI_BOTH))
				{
					$ip_usuario=$visitas["IP"];
?>
					<tr>
						<td><a onclick="llamada_prototype('comprobar_paginas_vistas.php?ideliminar=<?= $visitas["IdPaginasVistas"] ?>','principal');" href="#">Eliminar</a></td>
						<td><?= $ip_usuario ?></td>
						<td><?= $visitas["Hora"] ?></td>
						<td><?= $visitas["Fecha"] ?></td>
						
<?php 						
						if ($visitas["Pagina"]==1)
						{
							$pagina_vista="Principal";
						}
						else if ($visitas["Pagina"]==2)
						{
							$pagina_vista="Calendario";
						}
						else if ($visitas["Pagina"]==3)
						{
							$pagina_vista="Encuentros";
						}
						else if ($visitas["Pagina"]==4)
						{
							$pagina_vista="Carteles";
						}
						else if ($visitas["Pagina"]==5)
						{
							$pagina_vista="Contactos";
						}
						else if ($visitas["Pagina"]==6)
						{
							$pagina_vista="Paginas amigas";
						}
						else if ($visitas["Pagina"]==7)
						{
							$pagina_vista="Contactar";
						}
?>						
						<td><?= $pagina_vista ?></td>
<?php 						
						$observaciones=$visitas["Observaciones"];
						
						$idencuentro=substr($observaciones, 0, strpos($observaciones, ":"));
						if ($idencuentro!=0)
						{
							$query="select * from encuentros where IdEncuentro=".$idencuentro;
							$qfiesta=mysqli_query($link, $query);
							$rowfiesta=mysqli_fetch_array($qfiesta, MYSQLI_BOTH);
	
							$query="select * from municipios where IdMunicipio=".$rowfiesta["IdMunicipio"];
							$qmunicipio=mysqli_query($link, $query);
							$rowmunicipio=mysqli_fetch_array($qmunicipio, MYSQLI_BOTH);
	
							$observaciones=cambiarAcentos($rowmunicipio["Municipio"]);
							
							mysqli_free_result($qfiesta);
							mysqli_free_result($qmunicipio);
						}
						else if ($visitas["Pagina"]==6)
						{
							if ($observaciones==1)$observaciones="Hospitalense";
							/*else if ($observaciones==2)$observaciones="Bous al carrer";
							else if ($observaciones==3)$observaciones="Dinamico Batllo";
							else if ($observaciones==4)$observaciones="Els Bous la nostra aficio";*/
						}
						else
						{						
							$observaciones=cambiarAcentos($observaciones);
						}
?>						
						<td><?= $observaciones ?></td>
<?php 						
				}
			mysqli_free_result($qvisitas);
?>				
		</table>
<?php 		
	}
?>