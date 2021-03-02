/*=============================================
CAPTURANDO LA RUTA DE MI CMS
=============================================*/

var ruta = $("#ruta").val();

/*=============================================
AGREGAR RED
=============================================*/

$(document).on("click", ".agregarRed", function(){

	var url = $("#url_red").val();
	var icono = $("#icono_red").val().split(",")[0];
	var color = $("#icono_red").val().split(",")[1];

	$(".listadoRed").append(`

		<div class="col-lg-12">
      
        <div class="input-group mb-3">
          
          <div class="input-group-prepend">
            
            <div class="input-group-text text-white" style="background:`+color+`">
              
                <i class="`+icono+`"></i>

            </div>

          </div>

          <input type="text" class="form-control" value="`+url+`">

          <div class="input-group-prepend">
            
            <div class="input-group-text" style="cursor:pointer">
              
                <span class="bg-danger px-2 rounded-circle eliminarRed" red="`+icono+`" url="`+url+`">&times;</span>

            </div>

          </div>

        </div>

      </div>

	`)

	//Actualizar el registro de la BD

	var listaRed = JSON.parse($("#listaRed").val());
	
	listaRed.push({

		 "url": url,
		 "icono": icono,
		 "background": color

	})

	$("#listaRed").val(JSON.stringify(listaRed));

})

/*=============================================
ELIMINAR RED
=============================================*/
$(document).on("click", ".eliminarRed", function(){

	var listaRed = JSON.parse($("#listaRed").val());

	var red = $(this).attr("red");
	var url = $(this).attr("url");

	for(var i = 0; i < listaRed.length; i++){

		if(red == listaRed[i]["icono"] && url == listaRed[i]["url"]){
			
			listaRed.splice(i, 1);
			
			$(this).parent().parent().parent().parent().remove();

			$("#listaRed").val(JSON.stringify(listaRed));

		}

	}



})

/*=============================================
PREVISUALIZAR IMÁGENES TEMPORALES
=============================================*/
$("input[type='file']").change(function(){

	var imagen = this.files[0];
	var tipo = $(this).attr("name");
	
	/*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

    	$("input[type='file']").val("");

    	notie.alert({

		    type: 3,
		    text: '¡La imagen debe estar en formato JPG o PNG!',
		    time: 7

		 })

    }else if(imagen["size"] > 2000000){

    	$("input[type='file']").val("");

    	notie.alert({

		    type: 3,
		    text: '¡La imagen no debe pesar más de 2MB!',
		    time: 7

		 })

    }else{

    	var datosImagen = new FileReader;
    	datosImagen.readAsDataURL(imagen);

    	$(datosImagen).on("load", function(event){

    		var rutaImagen = event.target.result;

    		$(".previsualizarImg_"+tipo).attr("src", rutaImagen);

    	})

    }


})

/*=============================================
SUMMERNOTE
=============================================*/

$(".summernote-sm").summernote({

	height: 300,
	callbacks: {

		onImageUpload: function(files){

			for(var i = 0; i < files.length; i++){

				upload_sm(files[i]);

			}

		}

	}

});

$(".summernote-smc").summernote({

	height: 300,
	callbacks: {

		onImageUpload: function(files){

			for(var i = 0; i < files.length; i++){

				upload_smc(files[i]);

			}

		}

	}

});

/*=============================================
SUBIR IMAGEN AL SERVIDOR
=============================================*/

function upload_sm(file){

	var datos = new FormData();	
	datos.append('file', file, file.name);
	datos.append("ruta", ruta);

	$.ajax({
		url: ruta+"/ajax/upload.php",
		method: "POST",
		data: datos,
		contentType: false,
		cache: false,
		processData: false,
		success: function (respuesta) {

			$('.summernote-sm').summernote("insertImage", respuesta);

		},
		error: function (jqXHR, textStatus, errorThrown) {
          console.error(textStatus + " " + errorThrown);
      }

	})

}

function upload_smc(file){

	var datos = new FormData();	
	datos.append('file', file, file.name);
	datos.append("ruta", ruta);

	$.ajax({
		url: ruta+"/ajax/upload.php",
		method: "POST",
		data: datos,
		contentType: false,
		cache: false,
		processData: false,
		success: function (respuesta) {

			$('.summernote-smc').summernote("insertImage", respuesta);

		},
		error: function (jqXHR, textStatus, errorThrown) {
          console.error(textStatus + " " + errorThrown);
      }

	})

}


/*=============================================
Preguntar antes de Eliminar Registro
=============================================*/

$(document).on("click", ".eliminarRegistro", function(){

	var action = $(this).attr("action"); 
  	var method = $(this).attr("method");
  	var pagina = $(this).attr("pagina");
  	// var token = $(this).children("[name='_token']").attr("value");
  	var token = $(this).attr("token");


  	swal({
  		 title: '¿Está seguro de eliminar este registro?',
  		 text: "¡Si no lo está puede cancelar la acción!",
  		 type: 'warning',
  		 showCancelButton: true,
  		 confirmButtonColor: '#3085d6',
  		 cancelButtonColor: '#d33',
  		 cancelButtonText: 'Cancelar',
  		 confirmButtonText: 'Si, eliminar registro!'
  	}).then(function(result){

  		if(result.value){

  			var datos = new FormData();
  			datos.append("_method", method);
  			datos.append("_token", token);

  			$.ajax({

  				url: action,
  				method: "POST",
  				data: datos,
  				cache: false,
  				contentType: false,
        		processData: false,
        		success:function(respuesta){

        			 if(respuesta == "ok"){

    			 		swal({
		                    type:"success",
		                    title: "¡El registro ha sido eliminado!",
		                    showConfirmButton: true,
		                    confirmButtonText: "Cerrar"
			                    
			             }).then(function(result){

			             	if(result.value){

			             		window.location = ruta+'/'+pagina; 

			             	}


			             })

        			 }

        		},
		        error: function (jqXHR, textStatus, errorThrown) {
		            console.error(textStatus + " " + errorThrown);
		        }

  			})

  		}

  	})

})


/*=============================================
DataTable Servidor de administradores
=============================================*/

// $.ajax({

// 	url: ruta+"/administradores",
// 	success: function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	},
// 	error: function (jqXHR, textStatus, errorThrown) {
//         console.error(textStatus + " " + errorThrown);
//     }

// })

/*=============================================
DataTable de administradores
=============================================*/

var tablaAdministradores = $("#tablaAdministradores").DataTable({
	
	processing: true,
  	serverSide: true,

  	ajax:{
  		url: ruta+"/administradores"		
  	},

  	"columnDefs":[{
  		"searchable": true,
  		"orderable": true,
  		"targets": 0
  	}],

  	"order":[[0, "desc"]],

  	columns: [
	  	{
	    	data: 'id',
	    	name: 'id'
	  	},
	  	{
	  		data: 'name',
	    	name: 'name'
	  	},
	  	{
	  		data: 'email',
	    	name: 'email'
	  	},
	  	{
	  		data: 'foto',
	    	name: 'foto',
	    	render: function(data, type, full, meta){

	    		if(data == null){

	    			return '<img src="'+ruta+'/img/administradores/admin.png" class="img-fluid rounded-circle">'

	    		}else{

	    			return '<img src="'+ruta+'/'+data+'" class="img-fluid rounded-circle">'
	    		}

	    	},

	    	orderable: false
	  	},
	  	{
	  		data: 'rol',
	    	name: 'rol',
	    	render: function(data, type, full, meta){

	    		if(data == null){

	    			return 'administrador'

	    		}else{

	    			return data
	    		}

	    	},

	    	orderable: true

	  	},
	  	{
	  		data: 'acciones',
	    	name: 'acciones'
	  	}

	],
 	"language": {

	    "sProcessing": "Procesando...",
	    "sLengthMenu": "Mostrar _MENU_ registros",
	    "sZeroRecords": "No se encontraron resultados",
	    "sEmptyTable": "Ningún dato disponible en esta tabla",
	    "sInfo": "Mostrando registros del _START_ al _END_",
	    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
	    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
	    "sInfoPostFix": "",
	    "sSearch": "Buscar:",
	    "sUrl": "",
	    "sInfoThousands": ",",
	    "sLoadingRecords": "Cargando...",
	    "oPaginate": {
	      "sFirst": "Primero",
	      "sLast": "Último",
	      "sNext": "Siguiente",
	      "sPrevious": "Anterior"
	    },
	    "oAria": {
	      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
	      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	    }

  	}

});

tablaAdministradores.on('order.dt search.dt', function(){

	tablaAdministradores.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){ cell.innerHTML = i+1})


}).draw();