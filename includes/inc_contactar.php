<br/>
<div class="container">
	<form role="form" id="needs-validation" method="post" action="javascript:llamada_prototype('paginas/contactar2.php','principal','2','needs-validation');">
		<div class="row">
			<div class="input-field col">
				<h1 class="text-center"><?= strtoupper(_TITULO) ?></h1>
			</div>
		</div>
		<div class="form-group">
        	<label class="col control-label" for="nombre">
        		<?= cambiarAcentos(_INTRODUCENOMBRE) ?>
        	</label>
        	<div class="col-sm-10">
            	<input class="form-control" type="text" name="nombre" id="nombre" required="required" autofocus>
            </div>
        </div>
        <div class="form-group">
        	<label class="col control-label" for="email">
        		<?= cambiarAcentos(_EMAIL) ?>
        	</label>
            <div id="correo" class="col-sm-10">
                <input class="form-control" type="email" name="correo" id="correo" required>
            </div>
            <div class="invalid-feedback">Prueba mensaje</div>
        </div>
        <div class="form-group">
        	<label class="col control-label" for="mensaje">
        		<?= cambiarAcentos(_MENSAJE) ?>
        	</label>
            <div class="col-sm-10">
            	<textarea id="mensaje" name="mensaje" class="form-control" rows="3" cols="80" required="required"></textarea>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col">
                <p class="text-center"><button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button></p>
            </div>
        </div>
	</form>
</div>
