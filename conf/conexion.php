<?php
function Conectarse()
{
    //Conexión localhost
    $enlace = mysqli_connect("localhost","root","", "puntairesmari");
    //Conexión web webcindario
    //$enlace = mysqli_connect("mysql.webcindario.com","puntairesmari","Torres2008", "puntairesmari");
    
    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    mysqli_query ($enlace, "SET NAMES 'utf8'");
    return $enlace;
}
?>
