<?php
    if (isset($_POST['mensaje']))
    {
        $mensaje=$_POST['mensaje'];
        $mensaje1=str_replace("\\","",$mensaje);
        
        $mensaje2=explode(";",$mensaje1);
        
        $total_query=count($mensaje2)-1;
        
        $error=0;
        for ($x=0;$x<$total_query;$x++)
        {
            $query=$mensaje2[$x];
            $qresultado=mysqli_query($link, $query);
            
            if ($qresultado<>1)
            {
                $error=1;
                print ("Query error: ".$query."<br>");
            }
        }
        
        if ($error==0)
        {
            print ("TODO CORRECTO");
        }
    }
?>

	<h1 class="text-center">Modificar Base de datos</h1>
	
	<div class="container">
    	<form role="form" id="bbdd" method="post" action="bbdd.php">
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
