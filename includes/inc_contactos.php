<?
	if (!isset($link))
	{
	    require_once($_SESSION["ruta"]."conf/conexion.php");
	    $link=Conectarse();
	}

	$idencuentro = $_GET["idencuentro"];

	$query="select * from contactos where IdEncuentro = ".$idencuentro;
	$q=mysql_query ($query,$link);
	
	//Obtener el numero de filas devuelto
	$total_registros=mysql_num_rows($q);
	
	print ("<table border=\"0\" width=\"100%\">");
		print ("<tr>");
			if ($total_registros==0)
			{
				print ("<td>".cambiarAcentos(_SINCONTACTO)."</td>");
			}
			else
			{
				print ("<td>");
					for ($x=0;$x<$total_registros;$x++)
					{
						print(cambiarAcentos(mysql_result($q,$x,"Contacto")));
						print ("<br>");
					}
				print ("</td>");
			}
		print ("</tr>");
	print ("</table>");	
?>