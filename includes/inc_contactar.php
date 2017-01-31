<table border="0" width="100%">
	<tr>
		<td width=60%>
			<form action="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/contactar2.php','principal', 1);" method="POST" name="contactar" id="contactar">
				<table align="center" border="0" width="100%">
					<tr>
						<td colspan="2"><center><h1><?= strtoupper(_TITULO) ?></h1></center></td>
					</tr>
					<tr>
						<td width="50%">
							<div align="right">
								<?= cambiarAcentos(_INTRODUCENOMBRE) ?>:
							</div>
						</td>
						<td>
							<input type="text" size="40" name="nombre" id="nombre">
						</td>
					</tr>
					<tr>
						<td>
							<div align="right">
								<?= cambiarAcentos(_EMAIL) ?>:
							</div>
						</td>
						<td>
							<input type="text" size="40" name="email" id="email">
						</td>
					</tr>
					<tr>
						<td>
							<div align="right">
								<?= cambiarAcentos(_MENSAJE) ?>:
							</div>
						</td>
						<td>
							<textarea rows="10" cols="30" name="mensaje" id="mensaje"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<center>
								<button type="submit" name="submit" onclick="return validar(1);"><?= _ENVIAR ?></button>
							</center>
						</td>
					</tr>
				</table>
			</form>
		<td valign="top">
			<form name="errores">
				<table border="0" width="100%">
					<tr>
						<td>
							<?= cambiarAcentos(_INSTRUCCION1) ?>
							<p></p>
							<?= cambiarAcentos(_INSTRUCCION2) ?>
							<p></p>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="nombreerror" id="nombreerror" value="" class="error_contactar" size="70">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="emailerror" id="emailerror" value="" class="error_contactar" size="70">
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="mensajeerror" id="mensajeerror" value="" class="error_contactar" size="70">
						</td>
					</tr>
				</table>
			</form>

			<form name="tipoerrores">
				<br><input type="hidden" name="tipoerror1" id="tipoerror1" value="<?= cambiarAcentos(_ERROR1) ?>">
				<br><input type="hidden" name="tipoerror2" id="tipoerror2" value="<?= cambiarAcentos(_ERROR2) ?>">
				<br><input type="hidden" name="tipoerror3" id="tipoerror3" value="<?= cambiarAcentos(_ERROR3) ?>">
			</form>

			<p></p><center><?= cambiarAcentos(_CONTACTAR) ?></center>
		</td>
	</tr>
</table>