/*=============================================
Probar la conexión con DataTable de Anuncios
=============================================*/

// $.ajax({

//   url: ruta + "/anuncios",
//   success: function(respuesta) {

//     console.log("respuesta", respuesta);

//   },
//   error: function (jqXHR, textStatus, errorThrown) {
//       console.error(textStatus + " " + errorThrown);
//   }

// })


/*=============================================
DataTable de Anuncios
=============================================*/

var tablaAnuncios = $("#tablaAnuncios").DataTable({

  processing: true,
  serverSide: true,

  ajax: {
    url: ruta + "/anuncios"
  },

  "columnDefs": [{
            "searchable": true,
            "orderable": true,
            "targets": 0
        }],
  "order": [[ 0, 'desc' ]],
  columns: [{
    data: 'id_anuncio',
    name: 'id_anuncio'

  }, {
    data: 'codigo_anuncio',
    name: 'codigo_anuncio'

  }, {
    data: 'pagina_anuncio',
    name: 'pagina_anuncio'

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

tablaAnuncios.on( 'order.dt search.dt', function () {
    tablaAnuncios.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
} ).draw();
