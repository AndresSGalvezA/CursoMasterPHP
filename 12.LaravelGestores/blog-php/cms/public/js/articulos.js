/*=============================================
DataTable Servidor de artículos
=============================================*/

// $.ajax({

// 	url: ruta+"/articulos",
// 	success: function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	},
// 	error: function (jqXHR, textStatus, errorThrown) {
//         console.error(textStatus + " " + errorThrown);
//     }

// })

/*=============================================
DataTable de artículos
=============================================*/

var tablaArticulos = $("#tablaArticulos").DataTable({
	
	processing: true,
  	serverSide: true,

  	ajax:{
  		url: ruta+"/articulos"		
  	},

  	"columnDefs":[{
  		"searchable": true,
  		"orderable": true,
  		"targets": 0
  	}],

  	"order":[[0, "desc"]],

  	 columns: [{
	    data: 'id_articulo',
	    name: 'id_articulo'

	  }, 
	  {
	    data: 'titulo_categoria',
	    name: 'titulo_categoria'

	  }, 
	  {
	    data: 'portada_articulo',
	    name: 'portada_articulo',
	    render: function(data, type, full, meta) {

	      return '<img src="'+ruta+'/'+data+'" class="img-fluid">'

	    },
	    orderable: false

	  }, 
	  {
	    data: 'titulo_articulo',
	    name: 'titulo_articulo'

	  }, 
	  {
	    data: 'descripcion_articulo',
	    name: 'descripcion_articulo'

	  }, 
	  {
	    data: 'p_claves',
	    name: 'p_claves'

	  }, 
	  {
	    data: 'ruta_articulo',
	    name: 'ruta_articulo',
	    render: function(data, type, full, meta) {

	      return '<p class="validarRuta">'+data+'</p>'

	     }

	  }, 
	  {
	    data: 'cont_articulo',
	    name: 'cont_articulo',

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

tablaArticulos.on('order.dt search.dt', function(){

	tablaArticulos.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){ cell.innerHTML = i+1})


}).draw();