<?
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
		mysql_query($query,$link);
		header("Location:comprobar_visitas.php");
	}
	else
	{
		print ("<center><h1>Visitas en Hospi Tauro</h1>");
		//Query para comprobar las visitas que tengo
		$query="select * from visitas order by Fecha desc, Hora, IP";
		$query_visitas=mysql_query($query,$link);

		//Obtener el numero de filas devuelto
		$filas=mysql_num_rows($query_visitas);

		print ("<table width=\"100%\" border=\"1\">");
			print ("<tr>");
				print ("<th width=\"12%\"> Eliminar");
				print ("<th width=\"22%\"> IP");
				print ("<th width=\"22%\"> Hora");
				print ("<th width=\"22%\"> Fecha");
				print ("<th width=\"22%\"> Idioma");


				$fecha_actual=mysql_result($query_visitas,0,"Fecha");
				for ($x=0; $x < $filas; $x++)
				{
					$ip_usuario=mysql_result($query_visitas,$x,"IP");
	
					$fecha_futura=mysql_result($query_visitas,$x,"Fecha");
					if (strcmp($fecha_actual,$fecha_futura)!=0)
					{
						//Query para contar las visitas que tengo al dia
						$query="select count(Fecha) as visitas_dia from visitas where Fecha=\"".$fecha_actual."\"";
						$query_visitas_dia=mysql_query($query,$link);

						//Query para contar las visitas distintas que tengo al dia
						$query="select count(distinct IP) as visitas_dia_distintas from visitas where Fecha=\"".$fecha_actual."\"";
						$query_visitas_dis_dia=mysql_query($query,$link);

						print ("<tr bgcolor=green>");
							print ("<td><a href=comprobar_paginas_vistas.php?fecha=".$fecha_actual.">".$fecha_actual."</a>");
							//print ("<td><a onclick=llamada_prototype('comprobar_paginas_vistas.php?fecha=".$fecha_actual."','principal'); href=# target=_top>".$fecha_actual."</a>");
							print ("<td>Visitas dia:");
							print ("<td>".mysql_result($query_visitas_dia,0,"visitas_dia"));
							print ("<td>Visitas dia distintas:");
							print ("<td>".mysql_result($query_visitas_dis_dia,0,"visitas_dia_distintas"));
						$fecha_actual=mysql_result($query_visitas,$x,"Fecha");
					}
					print ("<tr>");
						print ("<td><a href=comprobar_visitas.php?ideliminar=".mysql_result($query_visitas,$x,"IdVisitas").">Eliminar</a>");
						print ("<td><a href=comprobar_paginas_vistas.php?fecha=".mysql_result($query_visitas,$x,"Fecha")."&IP=".mysql_result($query_visitas,$x,"IP").">".$ip_usuario);
						//print ("<td><a onclick=llamada_prototype('comprobar_visitas.php?ideliminar=".mysql_result($query_visitas,$x,"IdVisitas")."','principal'); href=#>Eliminar</a>");
						//print ("<td><a onclick=llamada_prototype('comprobar_paginas_vistas.php?fecha=".mysql_result($query_visitas,$x,"Fecha")."&IP=".mysql_result($query_visitas,$x,"IP")."','principal'); href=#>".$ip_usuario);
						print ("<td>".mysql_result($query_visitas,$x,"Hora"));
						print ("<td>".mysql_result($query_visitas,$x,"Fecha"));
						print ("<td>".mysql_result($query_visitas,$x,"Idioma"));
				}

				//Query para contar las visitas que tengo al dia
				$query="select count(Fecha) as visitas_dia from visitas where Fecha=\"".$fecha_actual."\"";
				$query_visitas_dia=mysql_query($query,$link);

				//Query para contar las visitas distintas que tengo al dia
				$query="select count(distinct IP) as visitas_dia_distintas from visitas where Fecha=\"".$fecha_actual."\"";
				$query_visitas_dis_dia=mysql_query($query,$link);

				print ("<tr bgcolor=green>");
					print ("<td><a href=comprobar_paginas_vistas.php?fecha=".$fecha_actual.">".$fecha_actual."</a>");
					print ("<td>Visitas dia:");
					print ("<td>".mysql_result($query_visitas_dia,0,"visitas_dia"));
					print ("<td>Visitas dia distintas:");
					print ("<td>".mysql_result($query_visitas_dis_dia,0,"visitas_dia_distintas"));
		print ("</table>");
	}
?>