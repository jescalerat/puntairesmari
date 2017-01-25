<?
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
		mysql_query($query,$link);
		header("Location:comprobar_paginas_vistas.php");
	}
	else
	{
		print ("<center><h1>Paginas vistas en Hospi Tauro</h1>");

		if (isset($_GET['IP']))
		{
			$query="select * from paginas_vistas where IP=\"".$_GET['IP']."\" and Fecha=\"".$_GET['fecha']."\" order by Fecha, Hora, IP";
			print ("<center><h3>Fecha: ".$_GET['fecha']." IP: ".$_GET['IP']."</h3>");
		}
		else if (isset($_GET['fecha']))
		{
			$query="select * from paginas_vistas where Fecha=\"".$_GET['fecha']."\" order by Fecha, Hora, IP";
			print ("<center><h3>Fecha: ".$_GET['fecha']."</h3>");
		}
		else
		{
			$query="select * from paginas_vistas order by Fecha, Hora, IP";
		}

		//Query para comprobar las visitas que tengo
		$query_visitas=mysql_query($query,$link);

		//Obtener el numero de filas devuelto
		$filas=mysql_num_rows($query_visitas);

		print ("<table width=\"100%\" border=\"1\">");
			print ("<tr>");
				print ("<th width=\"10%\"> Eliminar");
				print ("<th width=\"18%\"> IP");
				print ("<th width=\"18%\"> Hora");
				print ("<th width=\"18%\"> Fecha");
				print ("<th width=\"18%\"> Pagina");
				print ("<th width=\"18%\"> Observaciones");

				for ($x=0; $x < $filas; $x++)
				{

					$ip_usuario=mysql_result($query_visitas,$x,"IP");

					print ("<tr>");
						print ("<td><a href=comprobar_paginas_vistas.php?ideliminar=".mysql_result($query_visitas,$x,"IdPaginasVistas").">Eliminar</a>");
						//print ("<td><a onclick=llamada_prototype('comprobar_paginas_vistas.php?ideliminar=".mysql_result($query_visitas,$x,"IdPaginasVistas")."','principal'); href=#>Eliminar</a>");
						print ("<td>".$ip_usuario);
						print ("<td>".mysql_result($query_visitas,$x,"Hora"));
						print ("<td>".mysql_result($query_visitas,$x,"Fecha"));
						
						
						if (mysql_result($query_visitas,$x,"Pagina")==1)
						{
							$pagina_vista="Principal";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==2)
						{
							$pagina_vista="Calendario";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==3)
						{
							$pagina_vista="Ficha fiestas";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==4)
						{
							$pagina_vista="Ficha programa";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==41)
						{
							$pagina_vista="Bajar fichero";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==5)
						{
							$pagina_vista="Ficha fotos";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==51)
						{
							$pagina_vista="Galeria";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==6)
						{
							$pagina_vista="Presentacion";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==7)
						{
							$pagina_vista="Paginas amigas";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==8)
						{
							$pagina_vista="Foro";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==9)
						{
							$pagina_vista="Contactar";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==10)
						{
							$pagina_vista="Ficha cronicas";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==11)
						{
							$pagina_vista="Ficha videos";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==12)
						{
							$pagina_vista="Salida web";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==13)
						{
							$pagina_vista="Buscar fotos";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==14)
						{
							$pagina_vista="Video multimedia";
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==15)
						{
							$pagina_vista="Tienda";
						}
						
						print ("<td>".$pagina_vista);
						
						$observaciones=mysql_result($query_visitas,$x,"Observaciones");
						
						$idfiesta=substr($observaciones, 0, strpos($observaciones, ":"));
						if ($idfiesta!=0)
						{
							$query="select * from fiestas where IdFiesta=".$idfiesta;
							$queryfiesta=mysql_query($query,$link);
	
							$query="select * from municipios where provincias_comunidades_IdComunidad=".mysql_result($queryfiesta,0,"municipios_provincias_comunidades_IdComunidad")." and provincias_comunidades_paises_IdPais=".mysql_result($queryfiesta,0,"municipios_provincias_comunidades_paises_IdPais")." and provincias_IdProvincia=".mysql_result($queryfiesta,0,"municipios_provincias_IdProvincia")." and IdMunicipio=".mysql_result($queryfiesta,0,"municipios_IdMunicipio");
							$querymunicipio=mysql_query($query,$link);
	
							$observaciones=cambiarAcentos(mysql_result($querymunicipio,0,"Municipio"));
						}
						else if (mysql_result($query_visitas,$x,"Pagina")==7)
						{
							if ($observaciones==1)$observaciones="La Talanquera";
							else if ($observaciones==2)$observaciones="Bous al carrer";
							else if ($observaciones==3)$observaciones="Dinamico Batllo";
							else if ($observaciones==4)$observaciones="Els Bous la nostra aficio";
						}
						else
						{						
							$observaciones=cambiarAcentos($observaciones);
						}
						print ("<td>".$observaciones);
				}
		print ("</table>");
	}
?>