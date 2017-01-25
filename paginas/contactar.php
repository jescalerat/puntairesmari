<?
  session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=9;
	
	require_once($_SESSION["ruta"]."conf/traduccion.php");
	require_once($_SESSION["ruta"]."conf/funciones.php");
	print ("<table border=0 width=100%>");
		print ("<tr>");
				print ("<td>");
					require_once($_SESSION["ruta"]."includes/inc_contactar.php");
				print ("</td>");
		print ("</tr>");
	print ("</table>");		


  if (!isset($link))
  {
      require_once($_SESSION["ruta"]."conf/conexion.php");
      $link=Conectarse();
  }

	if (!isset($_SESSION["admin_web"]))
	{
   	//Query para insertar los valores en la base de datos
    $query="insert into paginas_vistas (IP,Hora,Fecha,Pagina) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].")";
		mysql_query($query,$link);
	}
?>

<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?print ($_SESSION["pagina"]);?>">
</form>