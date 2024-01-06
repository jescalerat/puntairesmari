<?php					
	require_once("includes/cabecera.php");
?>
	<div class="row">
		<div class="col-3" id="menu">
<?php					
			$opcion = "N";
			$idMunicipio = 0;
			if(isset($_GET['idMunicipio'])){
			    $idMunicipio = $_GET['idMunicipio'];
			}
			if(isset($_GET['opcion'])){
			    $opcion = $_GET['opcion'];
			}
			require_once("includes/menu.php");
?>
		</div>
		<div class="col-9" id="principal">
<?php					
			require_once("includes/inc_gestionar_municipios.php");
?>
		</div>
	</div>

	<div class="row">
		<div class="col" id="pie">
<?php
			require_once("includes/pie.php");
?>
		</div>
	</div>