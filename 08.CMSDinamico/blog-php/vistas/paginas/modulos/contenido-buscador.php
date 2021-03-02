<?php 


if(isset($rutas[0])){

	$articulos = ControladorBlog::ctrBuscador(0, 5, $rutas[0]);
	$totalArticulos = ControladorBlog::ctrTotalBuscador($rutas[0]);
	$totalPaginas = ceil(count($totalArticulos)/5);
	
	$articulosDestacados = ControladorBlog::ctrArticulosDestacados(null, null);

}


/*=============================================
Revisar si viene paginación de buscador
=============================================*/

if(isset($rutas[1]) && is_numeric($rutas[1])){

	$paginaActual = $rutas[1];

	$desde = ($rutas[1] - 1)*5;
	$cantidad = 5;

	$articulos = ControladorBlog::ctrBuscador($desde, $cantidad, $rutas[0]);

}else{

	$paginaActual = 1;
}

$anuncios = ControladorBlog::ctrTraerAnuncios("inicio");

?>


<!--=====================================
CONTENIDO INICIO
======================================-->

<div class="container-fluid bg-white contenidoInicio pb-4">
	
	<div class="container">

		<!-- BREADCRUMB -->

		<ul class="breadcrumb bg-white p-0 mb-2 mb-md-4">

			<li class="breadcrumb-item inicio"><a href="<?php echo $blog["dominio"]; ?>">Inicio</a></li>

			<li class="breadcrumb-item active">Artículos relacionados con: <?php echo $rutas[0]; ?> </li>

		</ul>
		
		<div class="row">
			
			<!-- COLUMNA IZQUIERDA -->

			<div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5">

			<?php if (count($articulos) != 0): ?>
					
				<?php foreach ($articulos as $key => $value): ?>
				

					<!-- ARTÍCULOS -->

					<div class="row">
						
						<div class="col-12 col-lg-5">

							<a href="<?php echo $blog["dominio"].$value["ruta_categoria"]."/".$value["ruta_articulo"]; ?>"><h5 class="d-block d-lg-none py-3"><?php echo $value["titulo_articulo"]; ?></h5></a>
				
							<a href="<?php echo $blog["dominio"].$value["ruta_categoria"]."/".$value["ruta_articulo"]; ?>"><img src="<?php echo $blog["dominio"];?><?php echo $value["portada_articulo"]; ?>" alt="<?php echo $value["titulo_articulo"]; ?>" class="img-fluid" width="100%"></a>

						</div>

						<div class="col-12 col-lg-7 introArticulo">
							
							<a href="<?php echo $blog["dominio"].$value["ruta_categoria"]."/".$value["ruta_articulo"]; ?>"><h4 class="d-none d-lg-block w-75"><?php echo $value["titulo_articulo"]; ?></h4></a>
							
							<p class="my-2 my-lg-5"><?php echo $value["descripcion_articulo"]; ?></p>

							<a href="<?php echo $blog["dominio"].$value["ruta_categoria"]."/".$value["ruta_articulo"]; ?>" class="float-right">Leer Más</a>

							<div class="fecha"><?php echo $value["fecha_articulo"]; ?></div>

						</div>


					</div>

					<hr class="mb-4 mb-lg-5" style="border: 1px solid #79FF39">
					
				<?php endforeach ?>



				<div class="container d-none d-md-block">
					
					<ul class="pagination justify-content-center" totalPaginas="<?php echo $totalPaginas; ?>" paginaActual="<?php echo $paginaActual; ?>" rutaPagina="<?php echo $rutas[0]; ?>"></ul>

				</div>

			<?php else: ?>

				<h1>Error 404</h1>
				<h3>Página no encontrada</h3>
				<a href="<?php echo $blog["dominio"];?>" class="btn btn-primary">Volver</a>


			<?php endif ?>

			</div>

			<!-- COLUMNA DERECHA -->

			<div class="d-none d-md-block pt-md-4 pt-lg-0 col-md-4 col-lg-3">

				
				<!-- Artículos destacados -->

				<div class="my-4">
					
					<h4>Artículos Destacados</h4>

					<?php foreach ($articulosDestacados as $key => $value): 


						$categoria = ControladorBlog::ctrMostrarCategorias("id_categoria", $value["id_cat"]); 


					?>

						<div class="d-flex my-3">
						
							<div class="w-100 w-xl-50 pr-3 pt-2">
								
								<a href="<?php echo $blog["dominio"].$categoria[0]["ruta_categoria"]."/".$value["ruta_articulo"];?>">

									<img src="<?php echo $blog["dominio"].$value["portada_articulo"]; ?>" alt="<?php echo $value["titulo_articulo"];?>" class="img-fluid">

								</a>

							</div>

							<div>

								<a href="<?php echo $blog["dominio"].$categoria[0]["ruta_categoria"]."/".$value["ruta_articulo"];?>" class="text-secondary">

									<p class="small"><?php echo substr($value["descripcion_articulo"],0,-150)."...";?></p>

								</a>

							</div>

						</div>
						
					<?php endforeach ?>


				</div>

				<!-- PUBLICIDAD -->

				
				<?php foreach ($anuncios as $key => $value): ?>

					<?php echo $value["codigo_anuncio"]; ?>
					
				<?php endforeach ?>


			</div>

		</div>

	</div>

</div>