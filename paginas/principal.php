<?
	session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=1;
	
	if (!isset($link))
	{
    require_once($_SESSION["ruta"]."conf/traduccion.php");
		require_once($_SESSION["ruta"]."conf/funciones.php");
		require_once($_SESSION["ruta"]."conf/conexion.php");
	}
	$link=Conectarse();

	
	$presentacion = "Bienvenido a la web de la fiesta nacional.<br><br>";
	$presentacion .= "Aqu� podr�s encontrar fotos, fechas... de los festejos m�s populares del pa�s.<br><br>";
	$presentacion .= "Adem�s te animo a colaborar para que el noble arte del recorte, els bous al carrer... no caiga en el olvido enviando cr�nicas, fotos y fiestas que sean conocidas por t�.<br><br>";
	$presentacion .= "Desde Hospitalet al Mundo.<br><br>";
	$presentacion .= "Porque la tradici�n... hay que respetarla.";
	
	print (cambiarAcentos($presentacion));
	
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