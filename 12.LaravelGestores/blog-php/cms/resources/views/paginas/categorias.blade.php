@extends('plantilla')

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Categorías</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Categorías</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          <!-- Default box -->
          <div class="card">

            <div class="card-header">

              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearCategoria">Crear nueva categoría</button>

            </div>

            <div class="card-body">

            {{--   @foreach ($categorias as $element)
                  {{ $element }}
                @endforeach --}}

              <table class="table table-bordered table-striped dt-responsive" id="tablaCategorias" width="100%">
              
                <thead>
                  
                  <tr>
                    
                    <th width="10px">#</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Palabras claves</th>
                    <th>Ruta</th>
                    <th width="200px">Imagen</th>
                    <th>Acciones</th>

                  </tr>


                </thead>

                <tbody>
                  

                </tbody>  

              </table>

            </div>

            <!-- /.card-body -->
        
          </div>
          <!-- /.card -->
        </div>

      </div>

    </div>

  </section>
  <!-- /.content -->
</div>

<!--=====================================
Crear Categorías
======================================-->
<div class="modal" id="crearCategoria">

  <div class="modal-dialog">

    <div class="modal-content">

      <form action="{{url('/')}}/categorias" method="post" enctype="multipart/form-data">

       @csrf
        
        <div class="modal-header bg-info">
          
          <h4 class="modal-title">Crear Categoría</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <div class="modal-body">
          
           {{-- Título categoría --}}

           <div class="input-group mb-3">

            <div class="input-group-append input-group-text">
              <i class="fas fa-list-ul"></i>
            </div>

            <input type="text" class="form-control" name="titulo_categoria" placeholder="Ingrese el título de la categoría" value="{{old("titulo_categoria")}}" required> 

          </div> 

          {{-- Descripción categoría --}}

          <div class="input-group mb-3">
     
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>

            <input type="text" class="form-control" name="descripcion_categoria" placeholder="Ingrese la descripción de la categoría" value="{{old("descripcion_categoria")}}" maxlength="30" required> 

          </div> 

          {{-- Ruta categoría --}}

          <div class="input-group mb-3">
     
            <div class="input-group-append input-group-text">
              <i class="fas fa-link"></i>
            </div>

            <input type="text" class="form-control inputRuta" name="ruta_categoria" placeholder="Ingrese la ruta de la categoría" value="{{old("ruta_categoria")}}" required> 

          </div> 

          <hr class="pb-2">

          {{-- Palabras claves categoría --}}

          <div class="form-group mb-3">
            
            <label>Palabras Claves <span class="small">(Separar por comas)</span></label>

             <input type="text" class="form-control" value="categoría" name="p_claves_categoria" data-role="tagsinput" required>

          </div>

          {{-- Imagen de portada --}}

          <hr class="pb-2">

          <div class="form-group my-2 text-center">
            
              <div class="btn btn-default btn-file">
               
                <i class="fas fa-paperclip"></i> Adjuntar Imagen de la Categoría
              
                <input type="file" name="img_categoria" required>

              </div>

              <img class="previsualizarImg_img_categoria img-fluid py-2">

              <p class="help-block small">Dimensiones: 1024px * 250px | Peso Max. 2MB | Formato: JPG o PNG</p>
          </div>

        </div>

        <div class="modal-footer d-flex justify-content-between">
          
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>

        </div>

      </form>

    </div>
    
  </div>

</div>

<!--=====================================
Editar Categorías
======================================-->

@if (isset($status))

  @if ($status == 200)

    @foreach ($categoria as $key => $value)
  
      <div class="modal" id="editarCategoria">

        <div class="modal-dialog">

          <div class="modal-content">

            <form action="{{url('/')}}/categorias/{{$value->id_categoria}}" method="post" enctype="multipart/form-data">

              @method('PUT')

              @csrf
              
              <div class="modal-header bg-info">
                
                <h4 class="modal-title">Editar Categoría</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>

              <div class="modal-body">
                
                 {{-- Título categoría --}}

                 <div class="input-group mb-3">

                  <div class="input-group-append input-group-text">
                    <i class="fas fa-list-ul"></i>
                  </div>

                  <input type="text" class="form-control" name="titulo_categoria" placeholder="Ingrese el título de la categoría" value="{{$value->titulo_categoria}}" required> 

                </div> 

                {{-- Descripción categoría --}}

                <div class="input-group mb-3">
           
                  <div class="input-group-append input-group-text">
                    <i class="fas fa-pencil-alt"></i>
                  </div>

                  <input type="text" class="form-control" name="descripcion_categoria" placeholder="Ingrese la descripción de la categoría" value="{{$value->descripcion_categoria}}" maxlength="30" required> 

                </div> 

                {{-- Ruta categoría --}}

                <div class="input-group mb-3">
           
                  <div class="input-group-append input-group-text">
                    <i class="fas fa-link"></i>
                  </div>

                  <input type="text" class="form-control inputRuta" name="ruta_categoria" placeholder="Ingrese la ruta de la categoría" value="{{$value->ruta_categoria}}" required> 

                </div> 

                <hr class="pb-2">

                {{-- Palabras claves categoría --}}

                <div class="form-group mb-3">
                  
                  <label>Palabras Claves <span class="small">(Separar por comas)</span></label>

                  @php
                              
                    $tags = json_decode($value->p_claves_categoria, true);

                    $p_claves_categoria = "";
                    
                    foreach ($tags as $element) {
                      
                      $p_claves_categoria .= $element.",";

                    }

                  @endphp


                   <input type="text" class="form-control" value="{{$p_claves_categoria}}" name="p_claves_categoria" data-role="tagsinput" required>

                </div>

                {{-- Imagen de portada --}}

                <hr class="pb-2">

                <div class="form-group my-2 text-center">
                  
                    <div class="btn btn-default btn-file">
                     
                      <i class="fas fa-paperclip"></i> Adjuntar Imagen de la Categoría
                    
                      <input type="file" name="img_categoria">

                    </div>

                    <img src="{{url('/')}}/{{$value->img_categoria}}" class="previsualizarImg_img_categoria img-fluid py-2">

                    <input type="hidden" value="{{$value->img_categoria}}" name="imagen_actual">

                    <p class="help-block small">Dimensiones: 1024px * 250px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>

              </div>

              <div class="modal-footer d-flex justify-content-between">
                
                <div>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>

                <div>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

              </div>

            </form>

          </div>
          
        </div>

      </div>

    @endforeach

    <script>$("#editarCategoria").modal()</script>

  @endif

@endif

@if (Session::has("ok-crear"))

  <script>
      notie.alert({ type: 1, text: '¡La categoría ha sido creada correctamente!', time: 10 })
 </script>

@endif

@if (Session::has("no-validacion"))

  <script>
      notie.alert({ type: 2, text: '¡Hay campos no válidos en el formulario!', time: 10 })
 </script>

@endif

@if (Session::has("error"))

  <script>
      notie.alert({ type: 3, text: '¡Error en el gestor de categorías!', time: 10 })
 </script>

@endif

@if (Session::has("ok-editar"))

  <script>
      notie.alert({ type: 1, text: '¡La categoría ha sido actualizada correctamente!', time: 10 })
 </script>

@endif

@if (Session::has("no-borrar"))

  <script>
      notie.alert({ type: 3, text: '¡Error al borrar la categoría!', time: 10 })
 </script>

@endif

@endsection