<?php 
    session_start();
    unset($_SESSION["pagina"]);
    $_SESSION["pagina"]=4;

    require_once("../includes/conexiones.php");
	require_once("../includes/inc_encuentros.php");
	
	if (!isset($_SESSION["admin_web"]))
	{
	    //Query para insertar los valores en la base de datos
	    $query="insert into paginas_vistas (IP,Hora,Fecha,Pagina,Observaciones) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",\"".$_GET["idencuentro"]."\")";
	    mysqli_query($link, $query);
	}
?>