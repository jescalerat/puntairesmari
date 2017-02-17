<?php
session_start();

// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
"op_comunidades"=>"comunidades",
"op_provincias"=>"provincias",
"op_municipios"=>"municipios"
);

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

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

require_once($ruta."conf/conexion.php");
require_once($ruta."conf/traduccion.php");
require_once($ruta."conf/funciones.php");

$link=Conectarse();
$tabla=$listadoSelects[$selectDestino];

if (strcmp("provincias",$tabla)==0)
{
	$opcioncombo=cambiarAcentos(_PROVINCIAS);
	$opciones=explode("@", $opcionSeleccionada);
	$query="SELECT IdProvincia, IdComunidad, Provincia FROM $tabla WHERE IdComunidad=".($opciones[0]*1)." order by Provincia";
	$consulta=mysqli_query($link, $query) or die(mysql_error());
}
else if (strcmp("municipios",$tabla)==0)
{
	$opcioncombo=cambiarAcentos(_MUNICIPIOS);
	$opciones=explode("@", $opcionSeleccionada);
	$query="SELECT IdMunicipio, IdProvincia, Municipio FROM $tabla WHERE IdProvincia=".($opciones[0]*1)." order by Municipio";
	$consulta=mysqli_query($link, $query) or die(mysql_error());
}

$llamada=$_SERVER['HTTP_REFERER'];
$buscaradmin=strstr($llamada,"admin");
$admin=1;
if ($buscaradmin===false)$admin=0;

// Comienzo a imprimir el select
echo "<select name='".$selectDestino."' id='".$selectDestino."' onChange='gestionCargaDatos(this.id,".$admin.")'>";
echo "<option value='0'>".$opcioncombo."</option>";
while($registro=mysqli_fetch_row($consulta))
{
	// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
	//$registro[2]=htmlentities($registro[2]);
	
/*	if (strcmp("provincias",$tabla)==0){$registro[2]=htmlentities($registro[2]);}
	else if (strcmp("municipios",$tabla)==0){$registro[3]=htmlentities($registro[3]);}*/
	// Imprimo las opciones del select
	//echo "<option value='".$registro[0]."@".$registro[1]."'>".$registro[2]."</option>";
	
	if (strcmp("provincias",$tabla)==0)echo "<option value='".$registro[0]."@".$registro[1]."'>".cambiarAcentos($registro[2])."</option>";
	else if (strcmp("municipios",$tabla)==0)echo "<option value='".$registro[0]."@".$registro[1]."@1'>".cambiarAcentos($registro[2])."</option>";
}			
echo "</select>";

?>