<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	
	if (!isset($link))
	{
		require_once($_SESSION["ruta"]."conf/conexion.php");
	  	require_once($_SESSION["ruta"]."conf/funciones.php");
	  	require_once($_SESSION["ruta"]."conf/traduccion.php");
	    $link=Conectarse();
	}
  
	$query="select * from idiomas where IdIdioma <> ".$_SESSION['idiomapagina'];
	$qidiomas=mysqli_query ($link, $query);
	$filas=mysqli_num_rows($qidiomas);
	$tantopociento=100/$filas;
?>
<form name="cambiar_idioma" id="cambiar_idioma" method="post">
	<center>
	<table border="0" width="50%">
		<tr>
			<?php
				while($idiomas=mysqli_fetch_array($qidiomas, MYSQLI_BOTH))
				{
			?>
					<td width="<?= $tantopociento ?>%" align="center">
						<a href="#"
							onclick="cargarCambioIdioma(<?= $idiomas["IdIdioma"] ?>)"
							title="<?= cambiarAcentos(_CAMBIARIDIOMA) ?>">
							<img src="imagenes/<?= $idiomas["Ruta"] ?>" width="30" height="20" alt="<?= cambiarAcentos(constant($idiomas["Idioma"])) ?>" title="<?= cambiarAcentos(constant($idiomas["Idioma"])) ?>" border="0"></a>
						</a>
					</td>
			<?php
				}
			?>	
		</tr>
	</table>
	</center>
</form>

<input type="hidden" name="cambiandoIdioma" id="cambiandoIdioma" value="<?= _CAMBIOIDIOMA ?>">