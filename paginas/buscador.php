<?php
    session_start();
    unset($_SESSION["pagina"]);
    $_SESSION["pagina"]=3;

    require_once("../includes/conexiones.php");
?>

<form class="col">
	<div class="row">
		<div class="col-9" id="recargaEncuentros">

		</div>
		<div class="col-3" id="buscador">
<?php 
            require_once("../includes/inc_municipios.php");
?>
		</div>
	</div>
</form>
	
	<script type="text/javascript" src="js/jquery.jCombo.min.js"></script>
	<script type="text/javascript" src="js/lugares.js"></script>
	
<?php 
    //El insert de paginas vistas en inc_listas_encuentros.php
?>
<form name="buscapagina">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?= $_SESSION["pagina"] ?>">
</form>