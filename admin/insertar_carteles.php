<?php					
	require_once("includes/cabecera.php");
?>
	<div class="row">
		<div class="col-3" id="menu">
<?php					
			$opcion = "N";
			$idCartel = 0;
			$idEncuentro = 0;
			if(isset($_GET['idCartel'])){
			    $idCartel = $_GET['idCartel'];
			}
			if(isset($_GET['idEncuentro'])){
			    $idEncuentro = $_GET['idEncuentro'];
			}
			if(isset($_GET['opcion'])){
			    $opcion = $_GET['opcion'];
			}
			require_once("includes/menu.php");
?>
		</div>
		<div class="col-9" id="principal">
<?php					
			require_once("includes/inc_insertar_carteles.php");
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