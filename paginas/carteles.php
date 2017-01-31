<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=4;
	
	require_once($_SESSION["ruta"]."conf/traduccion.php");
	require_once($_SESSION["ruta"]."conf/funciones.php");
	require_once($_SESSION["ruta"]."conf/conexion.php");
	$link=Conectarse();
?>
		<table border="0" width="100%">
			<tr>
				<td>
					<?php require_once($_SESSION["ruta"]."includes/inc_carteles.php"); ?>
				</td>
			</tr>
		</table>
		
<?php
	if (!isset($_GET["guardar"])){
		$dia = $_GET["dia"];
		$mes = $_GET["mes"];
		$ano = $_GET["ano"];
		$idencuentro = $_GET["idencuentro"];
		
		$observaciones=$idencuentro.": ".$dia."-".$mes."-".$ano;
		
		if (!isset($_SESSION["admin_web"]))
		{
			//Query para insertar los valores en la base de datos
			$query="insert into paginas_vistas (IP,Hora,Fecha,Pagina,Observaciones) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",\"".$observaciones."\")";
			mysqli_query($link, $query);
		}
	}
?>

	<input type="hidden" name="paginaactual" id="paginaactual" value="<?= $_SESSION["pagina"] ?>">
