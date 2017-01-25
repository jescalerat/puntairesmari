<?
	session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=5;
	
	require_once($_SESSION["ruta"]."conf/traduccion.php");
	require_once($_SESSION["ruta"]."conf/funciones.php");
	
	print ("<table border=0 width=100%>");
		print ("<tr>");
			print ("<td>");
					require_once($_SESSION["ruta"]."includes/inc_contactos.php");
			print ("</td>");
		print ("</tr>");
	print ("</table>");

	$dia = $_GET["dia"];
	$mes = $_GET["mes"];
	$ano = $_GET["ano"];
	$idencuentro = $_GET["idencuentro"];
	
	$observaciones=$idencuentro.": ".$dia."-".$mes."-".$ano;
	
	if (!isset($_SESSION["admin_web"]))
	{
		//Query para insertar los valores en la base de datos
		$query="insert into paginas_vistas (IP,Hora,Fecha,Pagina,Observaciones) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",\"".$observaciones."\")";
		mysql_query($query,$link);
	}
?>

<input type="hidden" name="paginaactual" id="paginaactual" value="<?print ($_SESSION["pagina"]);?>">