<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=2;
	
	require_once($_SESSION["ruta"]."conf/traduccion.php");
	require_once($_SESSION["ruta"]."conf/funciones.php");
	require_once($_SESSION["ruta"]."conf/conexion.php");
	$link=Conectarse();
?>	
	<table border="0" width="100%">
		<tr>
			<td width="70%" valign="top">
				<div id="calendario">
					<?php require_once($_SESSION["ruta"]."includes/inc_calendario.php"); ?>
				</div>
			</td>
			<td valign="top">
				<div id="buscador">
					<?php require_once($_SESSION["ruta"]."includes/inc_calendario_buscador.php"); ?>
				</div>
			</td>
		</tr>
	</table>
	
<?php 	
	$dia = "";
	$mes = "";
	$ano = "";
	if(isset($_GET["dia"])){
		$dia = $_GET["dia"];
	}
	if(isset($_GET["mes"])){
		$mes = $_GET["mes"];
	}
	if(isset($_GET["ano"])){
		$ano = $_GET["ano"];
	}
	
	$observaciones=$dia."-".$mes."-".$ano;
	
	if (!isset($_SESSION["admin_web"]))
	{
		//Query para insertar los valores en la base de datos
		$query="insert into paginas_vistas (IP,Hora,Fecha,Pagina,Observaciones) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",\"".$observaciones."\")";
		mysqli_query($link, $query);
	}
?>
<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?= $_SESSION["pagina"] ?>">
</form>
