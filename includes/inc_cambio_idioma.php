<?php
	session_start();
	unset($_SESSION["admin_web"]);
	if (isset($_GET["admin_web"]))
	{
		$_SESSION["admin_web"]=$_GET["admin_web"];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="TITLE" content="Puntaires Mari"/>
		<meta name="DESCRIPTION" content="Calendario de bolillos"/>
		<meta name="KEYWORDS" content="bolillos,boixets,encuentro,trobada"/>
		<meta name="AUTHOR" content="jet"/>
		<meta http-equiv="EXPIRES" content="Mon, 31 Dec 2054 00:00:01 PST"/>
		<meta http-equiv="CHARSET" content="UTF-8"/>
		<meta http-equiv="content-LANGUAGE" content="Espa�ol"/>
		<meta http-equiv="VW96.OBJECT TYPE" content="Pag. Personal"/>
		<meta name="RATING" content="General"/>
		<meta name="REVISIT-AFTER" content="7 days"/>
		<meta name="Subject" content="Ocio"/>
		<meta name="Revisit" content="1 day"/>
		<meta name="Distribution" content="Global"/>
		<meta name="Robots" content="All"/>
	
		<title>Puntaires Mari</title>	

		<script type="text/javascript" src="../js/funciones.js"></script>
		<script type="text/javascript" src="../js/prototype.js"></script>
		<script type="text/javascript" src="../js/scripts.js"></script>
		<script type="text/javascript" src="../js/ajax.js"></script>
		
		<link rel="stylesheet" href="../css/plantilla.css">
		<link rel="stylesheet" href="../css/gb_styles.css">
		
		<script type="text/javascript">
			var GB_ROOT_DIR = "../js/greybox/";
			var GB_IMATGES_DIR = "../imagenes/greybox/";
			var SALT = 0;
		</script>
		<script type="text/javascript" src="../js/greybox/AJS.js"></script>
		<script type="text/javascript" src="../js/greybox/AJS_fx.js"></script>
		<script type="text/javascript" src="../js/greybox/gb_scripts.js"></script>

	</head>
	<body>
		<?php
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
			require_once($ruta."conf/traduccion.php");
			require_once($ruta."conf/conexion.php");
	    	$link=Conectarse();
			
			$query="select * from idiomas where IdIdioma in (".$_SESSION["idiomapagina"].",".$_GET["idioma"].")";
			$qidioma=mysqli_query($link, $query);
			$rowidioma1=mysqli_fetch_array($qidioma, MYSQLI_BOTH);
			$rowidioma2=mysqli_fetch_array($qidioma, MYSQLI_BOTH);
			
			$ruta1=$_SESSION["rutaservidor"]."imagenes/".$rowidioma1["Ruta"];
			$ruta2=$_SESSION["rutaservidor"]."imagenes/".$rowidioma2["Ruta"];
			$rutatmp=$_SESSION["rutaservidor"]."imagenes/".$rowidioma2["Ruta"];

			if($rowidioma1["IdIdioma"] != $_SESSION["idiomapagina"])
			{
				$ruta2=$ruta1;
				$ruta1=$rutatmp;
			}
			
			$idioma1=cambiarAcentos($rowidioma1["Ruta"]);
			$idioma2=cambiarAcentos($rowidioma2["Ruta"]);
			
			$_SESSION["idiomapagina"]=$_GET["idioma"];
		?>
		
		<table border="0" width="100%">
			<tr>
				<td colspan="3" align="center">
					<?= cambiarAcentos(_CAMBIANDOIDIOMA) ?>
				</td>
			</tr>
			<tr>
				<td align="center">
					<img src="<?= $ruta1 ?>" width="50" height="50" alt="<?= $idioma1 ?>" title="<?= $idioma1 ?>" border="0"></a>
				</td>
				<td align="center">
					<img src="<?= $_SESSION["rutaservidor"] ?>imagenes/siguiente.gif" width="50" height="50" alt="<?= cambiarAcentos(_CAMBIANDOIDIOMA) ?>" title="<?= cambiarAcentos(_CAMBIANDOIDIOMA) ?>" border="0"></a>
				</td>
				<td align="center">
					<img src="<?= $ruta2 ?>" width="50" height="50" alt="<?= $idioma2 ?>" title="<?= $idioma2 ?>" border="0"></a>
				</td>
			</tr>
	</body>
</html>
