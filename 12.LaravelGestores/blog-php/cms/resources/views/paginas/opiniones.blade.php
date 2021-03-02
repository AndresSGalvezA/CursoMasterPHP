@extends('plantilla')

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

   <!-- Content Header (Page header) -->
  <div class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0 text-dark">Opiniones</h1>
          
        </div><!-- /.col -->
        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{ url("/") }}">Inicio</a></li>

            <li class="breadcrumb-item active">Opiniones</li>

          </ol>

        </div><!-- /.col -->

      </div><!-- /.row -->

    </div><!-- /.container-fluid -->

  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-12">

          <div class="card card-primary card-outline">

            <div class="card-body">

              <table class="table table-bordered table-striped dt-responsive" id="tablaOpiniones" width="100%">

                <thead>

                  <tr>

                    <th width="10px">#</th>
                    <th>Artículo</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Foto</th>  
                    <th>Opinión</th> 
                    <th>Fecha Opinión</th> 
                    <th>Aprobación</th> 
                    <th>Administrador</th> 
                    <th>Respuesta</th>
                    <th>fecha Respuesta</th>                 
                    <th>Acciones</th>         

                  </tr> 

                </thead>  

              </table>

      
            </div>

          </div>

        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->

  </div>
  <!-- /.content -->
</div>

@endsection