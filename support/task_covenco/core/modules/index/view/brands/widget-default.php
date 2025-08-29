<div class="row">
	<div class="col-md-12">
		<h1>Marcas</h1>
		<a href="index.php?view=newbrand" class="btn btn-default pull-right"><i class='fa fa-th-list'></i> Nueva Marca</a>
		<br><br>

		<?php
		$brands = BrandData::getAll();
		if(count($brands)>0){
		// si hay registros
		?>

		<table class="table table-bordered table-hover">
		<thead>
		<th>Nombre</th>
		<th></th>
		</thead>
		<?php
		foreach($brands as $brand){
			?>
			<tr>
			<td><?php echo $brand->name; ?></td>
			<td style="width:130px;">
				<a href="index.php?view=editbrand&id=<?php echo $brand->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?view=delbrand&id=<?php echo $brand->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
			</td>
			</tr>
			<?php

		}
		
		}else{
			echo "<p class='alert alert-danger'>No hay marcas</p>";
		}

	?>

	</div>
</div>