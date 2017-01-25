<?php
	require_once($_SESSION["ruta"]."conf/traduccion.php");
	require_once($_SESSION["ruta"]."conf/funciones.php");
?>
<form name="form_reloj">
	<table border="0" width="50%" align="center">
		<tr>
			<td width="50%" align="center" valign="bottom">
				 <input type="text" name="reloj" size="10" class="reloj" onfocus="window.document.form_reloj.reloj.blur()">
			</td>
			<td width="50%" align="center" valign="middle">
				<?php
					$hora = date("G");
					
					if ($hora>=5 && $hora<=7)
					{
				?>
						<img src="imagenes/dia1.gif" border="0">
				<?php 
					}
					elseif ($hora>=8 && $hora<=10)
					{
				?>
						<img src="imagenes/dia2.gif" border="0">
				<?php 
					}
					elseif ($hora>=11 && $hora<=13)
					{
				?>
						<img src="imagenes/dia3.gif" border="0">
				<?php 
					}
					elseif ($hora>=14 && $hora<=16)
					{
				?>
						<img src="imagenes/dia4.gif" border="0">
				<?php 
					}
					elseif ($hora>=17 && $hora<=19)
					{
				?>
						<img src="imagenes/dia5.gif" border="0">
				<?php 
					}
					elseif ($hora>=20 && $hora<=22)
					{
				?>
						<img src="imagenes/dia6.gif" border="0">
				<?php 
					}
					elseif ($hora==23 || $hora==0 || $hora==1)
					{
				?>
						<img src="imagenes/dia7.gif" border="0">
				<?php 
					}
					elseif ($hora>=2 && $hora<=4)
					{
				?>
						<img src="imagenes/dia8.gif" border="0">
				<?php 
					}
				?>
			</td>
		</tr>
		<tr>
			<td align="center" valign="middle">			    
				<?php
					$dia=date("j");
					$mes=date("n");
					$ano=date("Y");
				?>
					<center><?= fecha($dia,$mes,$ano) ?></center>
			</td>
			<td align="center" valign="middle">
				<?php
					$hora = date("G");
					
					if ($hora>=6 && $hora<=14)
					{
						print (cambiarAcentos(_BUENOSDIAS));
					}
					elseif ($hora>=15 && $hora<=20)
					{
						print (cambiarAcentos(_BUENASTARDES));
					}				
					elseif (($hora>=21 && $hora<=23) || ($hora>=0 && $hora<=5))
					{
						print (cambiarAcentos(_BUENASNOCHES));
					}				
				?>
			</td>
		</tr>
	</table>
</form>