<div class="row">
	<div class="col-md-12">
		<h1>Clientes</h1>
		<a href="index.php?view=newclient" class="btn btn-default pull-right"><i class='fa fa-male'></i> Nuevo Cliente</a>
		<br><br>
		<?php
		$clients = ClientData::getAll();
		if(count($clients)>0){
			// si hay usuarios
		?>

			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre</th>
			<th>Dirección</th>
			<th>Contacto</th>
			<th>Teléfono</th>
			<th></th>
			</thead>
			<?php
			foreach($clients as $client){
				?>
				<tr>
				<td><?php echo $client->name; ?></td>
				<td><?php echo $client->address; ?></td>
				<td><?php echo $client->contact; ?></td>
				<td><?php echo $client->phone; ?></td>
				<td style="width:130px;">
				  <a href="index.php?view=editclient&id=<?php echo $client->id;?>" class="btn btn-warning btn-xs">Editar</a>
				  <a href="index.php?view=delclient&id=<?php echo $client->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
				</td>
				</tr>
				<?php

			}

		}else{
			echo "<p class='alert alert-danger'>No hay Clientes</p>";
		}

		?>

	</div>
</div>