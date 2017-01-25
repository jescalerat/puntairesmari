<?
	session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=7;

	if (!isset($link))
	{
	    require_once($_SESSION["ruta"]."conf/conexion.php");
	    $link=Conectarse();
	}

	require_once($_SESSION["ruta"]."conf/funciones.php");
  $link=Conectarse();
	$paginaver = $_GET["p"];

	if ($paginaver!=0)
	{
		if (!isset($_SESSION["admin_web"]))
		{
			$observaciones=$paginaver;
	  	//Query para insertar los valores en la base de datos
	    $query="insert into paginas_vistas (IP,Hora,Fecha,Pagina,Observaciones) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",\"".$observaciones."\")";
			mysql_query($query,$link);
		}	
		
		if ($paginaver == 1)
		{
			$web = "http://www.latalanquera.com";
		}
		else if ($paginaver == 2)
		{
			$web = "http://www.bousalcarrer.com";
		}	
		else if ($paginaver == 3)
		{
			$web = "http://dinamicobatllo.sportsontheweb.net";
		}
		else if ($paginaver == 4)
		{
			$web = "http://www.elsbouslanostraaficio.es";
		}
		else if ($paginaver == 184)
		{
			$web = "http://www.copabaixllobregat.com";
		}	
		else if ($paginaver == 185)
		{
			$web = "http://www.barmontalban.es";
		}	
		else if ($paginaver == 186)
		{
			$web = "http://www.geocities.com/makinesrenault";
		}	
		else if ($paginaver == 187)
		{
			$web = "http://aretecup.areteocio.com";	
		}	
		
		header("Location:".$web);
	}
	else
	{
		print ("<table border=0 width=100%>");
		print ("<tr>");
			print ("<td>");
					require_once($_SESSION["ruta"]."includes/inc_paginasamigas.php");
		print ("</table>");
		
		if (!isset($_SESSION["admin_web"]))
		{
			$observaciones=$paginaver;
	  	//Query para insertar los valores en la base de datos
	    $query="insert into paginas_vistas (IP,Hora,Fecha,Pagina,Observaciones) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",\"".$observaciones."\")";
			mysql_query($query,$link);
		}
	}
?>

<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?print ($_SESSION["pagina"]);?>">
</form>