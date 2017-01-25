<?php
		$query="select distinct Anyo from encuentros ";
		$query.="order by Anyo desc";
		
		$q=mysqli_query ($link, $query);
		$rowano=mysqli_fetch_array($q, MYSQLI_BOTH);
		//$filas=mysql_num_rows($q);
?>		
		<table border="0" width="100%" align="center">
			<tr>
				<td><h1><?= _BUSCADORENCUENTROS ?></h1></td>
			</tr>
			<tr>
				<td>
					<select name="anyobuscador" id="anyobuscador" onChange="location=this.options[this.selectedIndex].value">
<?php 					
					if (isset($_GET["ano"]) && $_GET["ano"]==$rowano["Anyo"])
					{
?>						
						<option value="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php?ano=<?= $rowano["Anyo"] ?>','principal')" selected><?= $rowano["Anyo"] ?>
<?php 						
					}
					else
					{
?>					
						<option value="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php?ano=<?= $rowano["Anyo"] ?>','principal')"><?= $rowano["Anyo"] ?>	
<?php 
					}
					
					while($anos=mysqli_fetch_array($q, MYSQLI_BOTH))
					{
						if (isset($_GET["ano"]) && $_GET["ano"]==$anos["Anyo"])
						{
?>							
							<option value="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php?ano=<?= $anos["Anyo"] ?>','principal')" selected><?= $anos["Anyo"] ?>
<?php 
						}
						else
						{
?>
							<option value="javascript:llamada_prototype('<?= $_SESSION["rutaservidor"] ?>paginas/calendario.php?ano=<?= $anos["anyo"] ?>','principal')"><?= $anos["anyo"] ?>							
<?php 
						}
					}
?>					
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<div id="comunidades">
						<?php generaComunidades(0); ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="provincias">
						<select disabled="disabled" name="op_provincias" id="op_provincias">
							<option value="0"><?= cambiarAcentos(_PROVINCIAS) ?></option>
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div id="municipios">
						<select disabled="disabled" name="op_municipios" id="op_municipios">
							<option value="0"><?= cambiarAcentos(_MUNICIPIOS) ?></option>
						</select>
					</div>
				</td>
			</tr>
		</table>

<input type="hidden" id="comunidadesString" name="comunidadesString" value="<?= cambiarAcentos(_COMUNIDADES) ?>">
<input type="hidden" id="provinciasString" name="provinciasString" value="<?= cambiarAcentos(_PROVINCIAS) ?>">
<input type="hidden" id="municipiosString" name="municipiosString" value="<?= cambiarAcentos(_MUNICIPIOS) ?>">
