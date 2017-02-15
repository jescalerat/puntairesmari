<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=5;
	
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
	$link=Conectarse();
?>
		<table border="0" width="100%">
			<tr>
				<td>
					<?php require_once($ruta."includes/inc_contactos.php"); ?>
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