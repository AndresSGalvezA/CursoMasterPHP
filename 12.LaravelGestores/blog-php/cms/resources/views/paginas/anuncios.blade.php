@extends('plantilla')

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <!-- Content Header (Page header) -->
  <div class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1 class="m-0 text-dark">Anuncios</h1>

        </div><!-- /.col -->

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{ url("/") }}">Inicio</a></li>

            <li class="breadcrumb-item active">Anuncios</li>

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

            <div class="card-header">

              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearAnuncio">Crear nuevo anuncio</button>

            </div>

            <div class="card-body">

          {{--@foreach ($anuncios as $element)
              {{$element}}
            @endforeach --}}

              <table class="table table-bordered table-striped dt-responsive" id="tablaAnuncios" width="100%">

                <thead>

                  <tr>

                    <th width="10px">#</th>
                    <th width="500px">Código</th>
                    <th>Página</th>
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
