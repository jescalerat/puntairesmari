$(document).ready(function(){
	var admin = location.pathname.indexOf('admin');
	//var tam = location.pathname.indexOf('/', 10);
	//var path = location.pathname.substring(0, tam);
	var path = location.pathname;

	if (admin == -1){
		var pathRecargaEncuentros = 'https://puntairesmari.webcindario.com/includes/inc_lista_encuentros.php';
		var pathComunidades = 'https://puntairesmari.webcindario.com/conf/comunidades.php';
		var pathProvincias = 'https://puntairesmari.webcindario.com/conf/provincias.php';
		var pathMunicipios = 'https://puntairesmari.webcindario.com/conf/municipios.php';

	} else {
		var path = location.pathname.substring(0, admin);

		var municipios = location.pathname.indexOf('gestionar_municipios');
		if (municipios != -1){
			var pathRecargaEncuentros = 'https://puntairesmari.webcindario.com/admin/includes/inc_lista_municipios.php';	
		}
		var encuentros = location.pathname.indexOf('gestionar_encuentros');
		if (encuentros != -1){
			var pathRecargaEncuentros = 'https://puntairesmari.webcindario.com/admin/includes/inc_lista_encuentros.php';	
		}
		var contactos = location.pathname.indexOf('gestionar_contactos');
		if (contactos != -1){
			var pathRecargaEncuentros = 'https://puntairesmari.webcindario.com/admin/includes/inc_lista_encuentros.php';	
		}
		var carteles = location.pathname.indexOf('gestionar_carteles');
		if (carteles != -1){
			var pathRecargaEncuentros = 'https://puntairesmari.webcindario.com/admin/includes/inc_lista_encuentros.php';	
		}
		
		var pathAdminListadoRutas = path + '/admin/includes/inc_listado_rutas.php';
		var pathAdminResultados =  path + '/admin/resultados.php';
		var pathComunidades = path + 'conf/comunidades.php';
		var pathProvincias = path + 'conf/provincias.php';
		var pathMunicipios = path + 'conf/municipios.php';

	}

	$("#comunidadSelect").jCombo({ url: pathComunidades, selected_value : '150' } );;
	$("#provinciaSelect").jCombo({ url: pathProvincias+"?id=",
	parent: "#comunidadSelect",
	selected_value: '63000'
	});  
	$("#municipioSelect").jCombo({ url: pathMunicipios+"?id=",
	parent: "#provinciaSelect",
	selected_value: '63000'
	});  
   
	/*$("#anyoSelect").change(function () {
		$("#anyoSelect option:selected").each(function () {
			idAnyoPass = $(this).val();
			$("#idAnyoH").val(idAnyoPass);
			$("#recargaEncuentros").load(pathRecargaEncuentros,{
				'anyo':idAnyoPass
			});
		});            
		$("#comunidadSelect").val('__jc__');
		$("#provinciaSelect").val('__jc__');
		$("#municipioSelect").val('__jc__');
	});*/
	
	$("#anyoSelect").change(function () {
		$("#anyoSelect option:selected").each(function () {
			var texto = '';
			if ($("#cargandotexto").val()!=null){
				texto = $("#cargandotexto").val();
			}
			idAnyoPass = $(this).val();
			$("#idAnyoH").val(idAnyoPass);
		    var parametros = {
		    		'anyo':idAnyoPass
		    };
		    recargaDatos (parametros, pathRecargaEncuentros);
		    
		    $("#comunidadSelect").val('__jc__');
			$("#provinciaSelect").val('__jc__');
			$("#municipioSelect").val('__jc__');
		});
	});            


	$("#comunidadSelect").change(function () {
		$("#comunidadSelect option:selected").each(function () {
			var texto = '';
			if ($("#cargandotexto").val()!=null){
				texto = $("#cargandotexto").val();
			}
			idComunidadPass = $(this).val();
			$("#idComunidadH").val(idComunidadPass);
			idAnyoPass = $("#idAnyoH").val();
		    var parametros = {
		    		'anyo':idAnyoPass,
					'idComunidad':idComunidadPass
		    };
		    recargaDatos (parametros, pathRecargaEncuentros);
		});
	});            

	$("#provinciaSelect").change(function () {
		$("#provinciaSelect option:selected").each(function () {
			var texto = '';
			if ($("#cargandotexto").val()!=null){
				texto = $("#cargandotexto").val();
			}
			idProvinciaPass = $(this).val();
			$("#idProvinciaH").val(idProvinciaPass);
			idAnyoPass = $("#idAnyoH").val();
			idComunidadPass = $("#idComunidadH").val();
		    var parametros = {
		    		'anyo':idAnyoPass,
					'idComunidad':idComunidadPass,
					'idProvincia':idProvinciaPass
		    };
		    recargaDatos (parametros, pathRecargaEncuentros);
		});
	});            

	$("#municipioSelect").change(function () {
		$("#municipioSelect option:selected").each(function () {
			var texto = '';
			if ($("#cargandotexto").val()!=null){
				texto = $("#cargandotexto").val();
			}
			idMunicipioPass = $(this).val();
			$("#idMunicipioH").val(idMunicipioPass);
			idAnyoPass = $("#idAnyoH").val();
			idComunidadPass = $("#idComunidadH").val();
			idProvinciaPass = $("#idProvinciaH").val();
		    var parametros = {
		    		'anyo':idAnyoPass,
					'idComunidad':idComunidadPass,
					'idProvincia':idProvinciaPass,
					'idMunicipio':idMunicipioPass
		    };
		    recargaDatos (parametros, pathRecargaEncuentros);
		});
	}); 

});

function recargaDatos (parametros, path){
	var texto = '';
	if ($("#cargandotexto").val()!=null){
		texto = $("#cargandotexto").val();
	}

    $.ajax({
        data:  parametros,
        url:   path,
        type:  'post',
        beforeSend: function () {
                $("#recargaEncuentros").html("<img src='imagenes/loading.gif' align='middle' />"+texto);
        },
        success:  function (response) {
                $("#recargaEncuentros").html(response);
        }
    });

}