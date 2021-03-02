/*=============================================
Probar la conexión con DataTable de Opiniones
=============================================*/

// $.ajax({

//   url: ruta + "/opiniones",
//   success: function(respuesta) {

//     console.log("respuesta", respuesta);

//   },
//   error: function (jqXHR, textStatus, errorThrown) {
//       console.error(textStatus + " " + errorThrown);
//   }

// })

/*=============================================
DataTable de Opiniones
=============================================*/

var tablaOpiniones = $("#tablaOpiniones").DataTable({

  processing: true,
  serverSide: true,

  ajax: {
    url: ruta + "/opiniones"
  },

  "columnDefs": [{
            "searchable": true,
            "orderable": true,
            "targets": 0
        }],
  "order": [[ 0, 'desc' ]],
  columns: [{
    data: 'id_opinion',
    name: 'id_opinion'

  }, {
    data: 'titulo_articulo',
    name: 'titulo_articulo'

  }, {
    data: 'nombre_opinion',
    name: 'nombre_opinion'

  }, {
    data: 'correo_opinion',
    name: 'correo_opinion'

  }, {
    data: 'foto_opinion',
    name: 'foto_opinion',
    render: function(data, type, full, meta) {

       return '<img src="'+ruta+'/'+data+'" class="img-fluid">'

     },

    orderable: false

  }, {
    data: 'contenido_opinion',
    name: 'contenido_opinion'

  }, {
    data: 'fecha_opinion',
    name: 'fecha_opinion'

  }, {
    data: 'aprobacion_opinion',
    name: 'aprobacion_opinion'

  }, {
    data: 'name',
    name: 'name'

  }, {
    data: 'respuesta_opinion',
    name: 'respuesta_opinion'

  }, {
    data: 'fecha_respuesta',
    name: 'fecha_respuesta'

  }, {
    data: 'acciones',
    name: 'acciones'

  }],
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
})

tablaOpiniones.on( 'order.dt search.dt', function () {
    tablaOpiniones.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();
