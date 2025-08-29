<div class="row">
	<div class="col-md-12">
		<h1>Especialistas</h1>
		<a href="index.php?view=newuser" class="btn btn-default pull-right"><i class='glyphicon glyphicon-user'></i> Nuevo Especialista</a>
		<br><br>
		<?php
		?>
		<?php
		$users = UserData::getAll();
		if(count($users)>0){
			// si hay usuarios
		?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Nick</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Activo</th>
			<th>Admin</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
				<td><?php echo $user->username; ?></td>
				<td><?php echo $user->email; ?></td>
				<td><?php echo $user->phone; ?></td>
				<td>
					<?php if($user->is_active):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if($user->is_admin):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td style="width:30px;"><a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a></td>
				</tr>
			<?php
			}

		}else{
			// no hay usuarios
			echo "<p class='alert alert-danger'>No hay Especialistas</p>";
		}

		?>

	</div>
</div>