<?php
	$idencuentro = $_GET["idencuentro"];

	$query="select * from encuentros where IdEncuentro = ".$idencuentro;
	$qlugar=mysqli_query ($link, $query);
	$rowlugar=mysqli_fetch_array($qlugar, MYSQLI_BOTH);
	
	$query="select * from municipios where IdMunicipio = ".$rowlugar["IdMunicipio"];
	$qmunicipio=mysqli_query ($link, $query);
	$rowmunicipio=mysqli_fetch_array($qmunicipio, MYSQLI_BOTH);
	
	$query="select * from provincias where IdProvincia = ".$rowmunicipio["IdProvincia"];
	$qprovincia=mysqli_query ($link, $query);
	$rowprovincia=mysqli_fetch_array($qprovincia, MYSQLI_BOTH);
?>	
	<table border="0" width="100%">
		<tr>
			<td align="center"><h1><?= cambiarAcentos($rowmunicipio["Municipio"]) ?> (<?= cambiarAcentos($rowprovincia["Provincia"]) ?>)</h1></td>
		</tr>
		<tr>
			<td align="center"><h3><?= cambiarAcentos($rowlugar["Descripcion"]) ?></h3></td>
		</tr>
	</table>	
	
<?php 	
	//Si me viene desde la busqueda de fotos para poder modificar el estilo de la pestaña
	$busquedaFotoVideo = 0;
	if (isset($_GET["busquedafotovideo"])){
		$busquedaFotoVideo = $_GET["busquedafotovideo"];
	}

	$dia = $_GET["dia"];
	$mes = $_GET["mes"];
	$ano = $_GET["ano"];
	
	$idfiestames = "";
	if (isset($_GET["idfiestasmes"])){
		$idfiestames = $_GET["idfiestasmes"];
	}
	$tmp = stripslashes($idfiestames);
    $tmp = urldecode($tmp);
    $tmp = unserialize($tmp); 
	$tmp = serialize($tmp);
    $tmp = urlencode($tmp);
    
    mysqli_free_result($qlugar);
    mysqli_free_result($qmunicipio);
    mysqli_free_result($qprovincia);
?>
<form name="cambiar_boton" method="post">
	<ul id="tabnav">
		<li class="activo" id="bt1"><a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/carteles.php?idencuentro=<?= $idencuentro ?>&guardar=0','ContTabul');CambiarEstilo('bt1');"><?= _CARTELES ?></a></li>
		<li class="inactivo" id="bt2"><a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/contactos.php?idencuentro=<?= $idencuentro ?>&guardar=0','ContTabul');CambiarEstilo('bt2');"><?= _CONTACTOS ?></a></li>
	</ul>
	<div id="ContTabul">
<?php
		require_once($_SESSION["ruta"]."includes/inc_carteles.php");
?>
	</div>	
</form>
<a href="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php?dia=<?= $dia ?>&mes=<?= $mes ?>&ano=<?= $ano ?>&idfiesta=<?= $tmp ?>','principal');"><?= _VOLVER ?></a>