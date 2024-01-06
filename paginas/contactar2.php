<?php
    session_start();
    unset($_SESSION["pagina"]);
    $_SESSION["pagina"]=62;
    
    require_once("../includes/conexiones.php");
    require_once("../includes/inc_contactar2.php");
    
    if (!isset($_SESSION["admin_web"]))
    {
        //Query para insertar los valores en la base de datos
        $query="insert into paginas_vistas (IP,Hora,Fecha,Pagina,Observaciones) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",\"\")";
        mysqli_query($link, $query);
    }
?>
