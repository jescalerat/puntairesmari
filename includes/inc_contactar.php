<table border="0" width="100%">
	<tr>
		<td width=60%>
			<form action="javascript:llamada_prototype('<?print($_SESSION["rutaservidor"]);?>paginas/contactar2.php','principal', 1);" method="POST" name="contactar" id="contactar">
			<table align="center" border=0 width=100%>
				<tr>
					<td colspan=2><center><h1><?print(strtoupper(_TITULO));?></h1></center>
				<tr>
					<td width="50%"><div align="right"><?print(cambiarAcentos(_INTRODUCENOMBRE));?>:
					<td><input type="text" size="40" name="nombre" id="nombre">
				<tr>
					<td><div align="right"><?print(cambiarAcentos(_EMAIL));?>:
					<td><input type="text" size="40" name="email" id="email">
				<tr>
					<td><div align="right"><?print(cambiarAcentos(_MENSAJE));?>:
					<td><textarea rows=10 cols=30 name="mensaje" id="mensaje"></textarea>
				<tr>
					<td colspan=2><center><button type=submit name=submit onclick="return validar(1);"><?print(_ENVIAR);?></button></center>
			</table>
			</form>
		<td valign="top">
			<form name="errores">
			<table border=0 width=100%>
				<tr>
					<td>
						<?print(cambiarAcentos(_INSTRUCCION1));?>
						<p>
						<?print(cambiarAcentos(_INSTRUCCION2));?>
						<p>
				<tr>
					<td><input type="text" name="nombreerror" id="nombreerror" value="" class="error_contactar" size=70>
				<tr>
					<td><input type="text" name="emailerror" id="emailerror" value="" class="error_contactar" size=70>
				<tr>
					<td><input type="text" name="mensajeerror" id="mensajeerror" value="" class="error_contactar" size=70>
			</table>
			</form>

			<form name="tipoerrores">
				<br><input type="hidden" name="tipoerror1" id="tipoerror1" value="<?print(cambiarAcentos(_ERROR1));?>">
				<br><input type="hidden" name="tipoerror2" id="tipoerror2" value="<?print(cambiarAcentos(_ERROR2));?>">
				<br><input type="hidden" name="tipoerror3" id="tipoerror3" value="<?print(cambiarAcentos(_ERROR3));?>">
			</form>

			<p><center><?print(cambiarAcentos(_CONTACTAR));?></center>
</table>