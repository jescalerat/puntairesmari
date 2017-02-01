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

		<script type="text/javascript" src="js/funciones.js"></script>
		<script type="text/javascript" src="js/prototype.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>
		<script type="text/javascript" src="js/ajax.js"></script>
		
		<link rel="stylesheet" href="css/plantilla.css">

</head>
<?php

	$ruta = substr($_SERVER['SCRIPT_FILENAME'], 0, strrpos($_SERVER['SCRIPT_FILENAME'], '/'));
	$_SESSION["ruta"] = $ruta.="/";
	//Servidor local
	$_SESSION["rutaservidor"] = "http://".$_SERVER["SERVER_NAME"].":8081/workspace/puntairesmari/";
	//Servidor internet
	//$_SESSION["rutaservidor"] = "http://".$_SERVER["SERVER_NAME"]."/";
	
	if (isset($_SESSION["pagina"]))
	{
		$pagina=$_SESSION["pagina"];
	}
	else
	{
		$pagina=1;
	}
	
	//Comprobar idioma del navegador cliente
	if ($_SERVER['HTTP_ACCEPT_LANGUAGE'] != ''){
		// Miramos que idiomas ha definido:
		$idiomas = explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']); # Convertimos HTTP_ACCEPT_LANGUAGE en array
		/* Recorremos el array hasta que encontramos un idioma del visitante que coincida con los idiomas en que est� disponible nuestra web */
		if (substr($idiomas[0], 0, 2) == "es"){$idioma = 1;}
		else if (substr($idiomas[0], 0, 2) == "en"){$idioma = 2;}
		else if (substr($idiomas[0], 0, 2) == "ca"){$idioma = 3;}
		//else if (substr($idiomas[0], 0, 2) == "gl"){$idioma = 4;}
		else {$idioma=1;}
	}
	
	if (!isset($_SESSION["idiomapagina"]))
	{
		$_SESSION["idiomapagina"]=$idioma;
	}
	
	require_once("conf/traduccion.php");
	require_once("conf/funciones.php");
	require_once("conf/conexion.php");
	$link=Conectarse();
?>	

	<body class="principal" onload="mueveReloj();">

		<table border="0" width="100%">
			<tr>
				<td>
					<div id="cambioidioma">
						<?php require_once($_SESSION["ruta"]."paginas/cambioidioma.php"); ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="reloj">
						<?php require_once($_SESSION["ruta"]."paginas/reloj.php"); ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<?php require_once($_SESSION["ruta"]."paginas/menu.php"); ?>
				</td>
			</tr>
			<tr>
				<td>
					<div id="principal">
						<?php require_once($_SESSION["ruta"]."paginas/calendario.php"); ?>
					</div>
				</td>
			</tr>
		</table>
		
		<div id="contador">
		<?php
			/*
			Obtener algunos datos sobre las personas que me visitan
		
			Direccion real: getRealIP()
			Hora: date("H:i:s")
			Fecha: date("Y-m-d")
			Idioma: substr($idiomas[0], 0, 2)
		
			*/
		
			
			//Contador de visitas
			$query="select * from contador";
			$qcontador=mysqli_query ($link, $query);
			$rowcontador=mysqli_fetch_array($qcontador, MYSQLI_BOTH);
		  
			$contador = $rowcontador["Contador"];
		  
			//Insertar visitas unicas
			$query="select * from visitas where IP=\"".getRealIP()."\" and Fecha=\"".date("Y-m-d")."\" and Idioma=".$_SESSION["idiomapagina"];
			$qvisitas=mysqli_query ($link, $query);
			
			//Obtener el numero de filas devuelto
			$total_registros=mysqli_num_rows($qvisitas);
			if ($total_registros==0)
			{
				if (!isset($_SESSION["admin_web"]))
				{
					//Query para insertar los valores en la base de datos
					$query="insert into visitas (IP,Hora,Fecha,Idioma) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["idiomapagina"].")";
					mysqli_query($link, $query);
					
					$contador++;
					$query="update contador set contador=".$contador." where IdContador=1";
					mysqli_query ($link, $query);
				}
			}
		?>
			
			<h1 class="contador"><?= $contador ?></h1>
		</div>
	</body>
</html>
