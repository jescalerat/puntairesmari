<?
/*
Autores: Javier Escalera.
Nombre: bajar_fichero.php
Explicación: página que sirve para descargar un fichero. Aparece un gestor de descarga.
*/
  	session_start();
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=41;
	
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
	
	require_once($ruta."conf/funciones.php");
	 
	//Encontrado en: http://www.el-hacker.com/foro/index.php/topic,15152.0
	$f = "../programas/".$_GET["f"];

	$file = basename($f); 
	$url = $f;
	header ("Content-Disposition: attachment; filename=".basename($f)." ");
	header ("Content-Type: application/octet-stream");
	header ("Content-Length: ".filesize($url));readfile($url);
	
	if (!isset($_SESSION["admin_web"]))
	{
   	//Query para insertar los valores en la base de datos
    $query="insert into paginas_vistas (IP,Hora,Fecha,Pagina,Observaciones) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",\"".$$_GET["f"]."\")";
		mysql_query($query,$link);
	}
?> 