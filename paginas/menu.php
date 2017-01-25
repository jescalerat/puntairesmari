<?php
	//Calcular espacio menú según la cantidad de botones que haya
	$botones=4;
	$tantopociento=100/$botones;
?>

<table border="0" width="100%" align="center">
	<tr>
		<td width="<?= $tantopociento ?>%" align="center">
			<a name="anchorinicio" href="#" id="anchorinicio" onclick="llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/principal.php','principal');">
					<img src="" name="btninicio" border="0" id="btninicio">
			</a>
		</td>
		<td width="<?= $tantopociento ?>%" align="center">
			<a name="anchorcalendario" href="#" id="anchorcalendario" onclick="llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php','principal');">
					<img src="" name="btncalendario" border="0" id="btncalendario">
			</a>
		</td>
		<td width="<?= $tantopociento ?>%" align="center">
			<a name="anchorpaginasamigas" href="#" id="anchorpaginasamigas" onclick="llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/paginas_amigas.php','principal');">
					<img src="" name="btnpaginasamigas" border="0" id="btnpaginasamigas">
			</a>
		</td>
		<td width="<?= $tantopociento ?>%" align="center">
			<a name="anchorcontactar" href="#" id="anchorcontactar" onclick="llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/contactar.php','principal');">
					<img src="" name="btncontactar" border="0" id="btncontactar">
			</a>
		</td>
	</tr>
</table>

<script>
	animarboto(document.getElementById("anchorinicio"), document.getElementById("btninicio"), 'inicio', 1, <?= $_SESSION['idiomapagina'] ?>);	
	animarboto(document.getElementById("anchorcalendario"), document.getElementById("btncalendario"), 'calendario', 1, <?= $_SESSION['idiomapagina'] ?>);	
	animarboto(document.getElementById("anchorpaginasamigas"), document.getElementById("btnpaginasamigas"), 'paginasamigas', 1, <?= $_SESSION['idiomapagina'] ?>);
	animarboto(document.getElementById("anchorcontactar"), document.getElementById("btncontactar"), 'contactar', 1, <?= $_SESSION['idiomapagina'] ?>);
</script>