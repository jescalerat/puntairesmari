<?php
	session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=1;
	
	if (!isset($link))
	{
		$esAdmin = strripos($_SESSION["ruta"], "admin");
		
		$ruta = $_SESSION["ruta"];
		
		if ($esAdmin){
			$arrRura = explode("/", $_SESSION["ruta"]);
		
			$cuentaArray = count($arrRura) - 2;
		
			$ruta = "";
			for ($i = 0; $i < $cuentaArray; $i++) {
				$ruta .= $arrRura[$i]."/";
			}
		}
		
    	require_once($ruta."conf/traduccion.php");
		require_once($ruta."conf/funciones.php");
		require_once($ruta."conf/conexion.php");
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
		mysqli_query($link, $query);
	}
?>

<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?= $_SESSION["pagina"] ?>">
</form>