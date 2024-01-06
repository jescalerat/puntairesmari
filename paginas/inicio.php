<?php

    unset($_SESSION["pagina"]);
    $_SESSION["pagina"]=1;

    require_once("conf/funciones.php");
    idiomaPagina();
    require_once("conf/traduccion.php");
    require_once("conf/conexion.php");
    $link=Conectarse();
    
    require_once("includes/inc_calendario.php");
    
    if (!isset($_SESSION["admin_web"]))
    {
        //Query para insertar los valores en la base de datos
        $query="insert into paginas_vistas (IP,Hora,Fecha,Pagina,Observaciones) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",\"\")";
        mysqli_query($link, $query);
    }
?>

<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?= $_SESSION["pagina"] ?>">
</form>