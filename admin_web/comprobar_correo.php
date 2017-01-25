<?
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
		mysql_query($query,$link);
		header("Location:comprobar_correo.php");
	}
	else
	{
		print ("<center><h1>Correo en Hospi Tauro</h1>");
		//Query para comprobar el correo que tengo
		$query="select * from correo";
		$query_correo=mysql_query($query,$link);

		//Obtener el numero de filas devuelto
		$filas=mysql_num_rows($query_correo);

		print ("<table width=\"100%\" border=\"1\">");
			print ("<tr>");
				print ("<th width=\"10%\"> Eliminar");
				print ("<th width=\"20%\"> Nombre");
				print ("<th width=\"20%\"> Email");
				print ("<th> Mensaje");
				print ("<th width=\"20%\"> IP");
				for ($x=0; $x < $filas; $x++)
				{
					print ("<tr>");
						print ("<td><a href=comprobar_correo.php?ideliminar=".mysql_result($query_correo,$x,"IdCorreo").">Eliminar</a>");
						//print ("<td><a onclick=llamada_prototype('comprobar_correo.php?ideliminar=".mysql_result($query_correo,$x,"IdCorreo")."','principal'); href=#>Eliminar</a>");
						print ("<td>".mysql_result($query_correo,$x,"Nombre"));
						print ("<td>".mysql_result($query_correo,$x,"Email"));
						print ("<td>".mysql_result($query_correo,$x,"Mensaje"));
						print ("<td>".mysql_result($query_correo,$x,"IP"));
				}
		print ("</table>");
	}
?>