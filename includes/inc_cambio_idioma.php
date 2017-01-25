<?
	session_start();
?>
<html>
<head>
<META NAME="TITLE" CONTENT="Nos vamos de fiesta">
<META NAME="DESCRIPTION" CONTENT="Fiestas y toros">
<META NAME="KEYWORDS" CONTENT="fiestas,toros,recortes,anillas">
<META NAME="AUTHOR" CONTENT="jet">
<META HTTP-EQUIV="EXPIRES" CONTENT="Mon, 31 Dec 2054 00:00:01 PST">
<META HTTP-EQUIV="CHARSET" CONTENT="ISO-8859-1">
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="Español">
<META HTTP-EQUIV="VW96.OBJECT TYPE" CONTENT="Pag. Personal">
<META NAME="RATING" CONTENT="General">
<META NAME="REVISIT-AFTER" CONTENT="7 days">
<META NAME="Subject" CONTENT="Deportes">
<META NAME="Revisit" CONTENT="1 day">
<META NAME="Distribution" CONTENT="Global">
<META NAME="Robots" CONTENT="All">
<title>Nos vamos de fiesta</title>
<script src="../js/ajax.js" language="JavaScript"></script>
<script src="../js/funciones.js" language="JavaScript"></script>
<script src="../js/prototype.js" language="JavaScript"></script>
<script src="../js/scripts.js" language="JavaScript"></script>
<link rel="StyleSheet" type="text/css" href="../css/plantilla.css">
<link rel="stylesheet" type="text/css" href="../css/gb_styles.css" media="all">
    <script type="text/javascript">
	var GB_ROOT_DIR = "../js/greybox/";
	var GB_IMATGES_DIR = "../imagenes/greybox/";
	var SALT = 0;
</script>
<script type="text/javascript" src="../js/greybox/AJS.js"></script>
<script type="text/javascript" src="../js/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="../js/greybox/gb_scripts.js"></script>
</head>
	<body>
		<?
			require_once($_SESSION["ruta"]."conf/funciones.php");
			require_once($_SESSION["ruta"]."conf/traduccion.php");
			require_once($_SESSION["ruta"]."conf/conexion.php");
	    $link=Conectarse();
			
			$query="select * from idiomas where IdIdioma in (".$_SESSION["idiomapagina"].",".$_GET["idioma"].")";
			$qidioma=mysql_query($query,$link);
			
			$ruta1=$_SESSION["rutaservidor"]."imagenes/".mysql_result($qidioma,0,"Ruta");
			$ruta2=$_SESSION["rutaservidor"]."imagenes/".mysql_result($qidioma,1,"Ruta");
			$rutatmp=$_SESSION["rutaservidor"]."imagenes/".mysql_result($qidioma,1,"Ruta");

			if(mysql_result($qidioma,0,"IdIdioma")!=$_SESSION["idiomapagina"])
			{
				$ruta2=$ruta1;
				$ruta1=$rutatmp;
			}
			
			$idioma1=cambiarAcentos(mysql_result($qidioma,0,"Ruta"));
			$idioma2=cambiarAcentos(mysql_result($qidioma,1,"Ruta"));
			
			$_SESSION["idiomapagina"]=$_GET["idioma"];
		?>
		
		<table border="0" width="100%">
			<tr>
				<td colspan="3" align="center">
					<?print(cambiarAcentos(_CAMBIANDOIDIOMA));?>
				</td>
			</tr>
			<tr>
				<td align="center">
					<img src="<?print($ruta1);?>" width="50" height="50" alt="<?print($idioma1);?>" title="<?print($idioma1);?>" border="0"></a>
				</td>
				<td align="center">
					<img src="<?print($_SESSION["rutaservidor"]);?>imagenes/siguiente.gif" width="50" height="50" alt="<?print(cambiarAcentos(_CAMBIANDOIDIOMA));?>" title="<?print(cambiarAcentos(_CAMBIANDOIDIOMA));?>" border="0"></a>
				</td>
				<td align="center">
					<img src="<?print($ruta2);?>" width="50" height="50" alt="<?print($idioma2);?>" title="<?print($idioma2);?>" border="0"></a>
				</td>
			</tr>
	</body>
</html>
