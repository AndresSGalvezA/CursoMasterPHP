<!--=====================================
MENU
======================================-->

<div class="container-fluid menu">

	<a href="#" class="btnClose">X</a>

	<ul class="nav flex-column text-center">

	<?php $listaCategorias = array();  ?>

	<?php foreach ($totalArticulos as $key => $value): ?>

		<?php foreach ($categorias as $key2 => $value2): ?>

			<?php if ($value["id_cat"] == $value2["id_categoria"]): ?>

				<?php array_push($listaCategorias, $value2["id_categoria"])?>

			<?php endif ?>
		
		<?php endforeach ?>
		
	<?php endforeach ?>

	<?php foreach (array_unique($listaCategorias) as $key => $value): ?>

			<li class="nav-item">

				<a class="nav-link text-white" href="<?php echo $blog["dominio"].$categorias[$key]["ruta_categoria"]; ?>"><?php echo $categorias[$key]["descripcion_categoria"] ?></a>

			</li>

		
	<?php endforeach ?>

	</ul>

</div>