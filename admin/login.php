<?php
	session_start();
?>
<body onload="login.usuario.focus();">
<?
  	$ruta = substr($_SERVER['SCRIPT_FILENAME'], 0, strrpos($_SERVER['SCRIPT_FILENAME'], '/'));
  	$ruta2 = substr($ruta, 0, strrpos($ruta, '/'));
	$_SESSION["ruta"] = $ruta2.="/";
?>
	<form name="login" method="post" action="comprobar.php">
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<h1><center>ADMINISTRACI&Oacute;N USUARIOS</center></h1>
		<table border="0" class="index" width="20%" align="center">
			<tr>
				<td width="11%" valign="top" align="center">
					<img src="imagenes/hospitalense.gif"/>
				</td>
			</tr>
			<tr>
				<td width="11%" valign="top" align="center">
					<fieldset> <!-- Etiqueta para mostrar un recuadro dentro del cual están los input box del Usuario y la Contraseña -->
						Usuario:
						<br>
						<input type="text" name="usuario" size="15" maxlength="10"/>
						<br>
						Contrase&ntilde;a:
						<br>
						<input type="password" name="password" size="15" maxlength="15"/>
					</fieldset>
					<center><button type="submit" name="boton_index">Entrar</button></center>
				</td>
			</tr>
		</table>
	</form> <!-- Final del formulario de introducir Usuario y password -->
