<?php 
$user = ClientData::getById($_GET["id"]);
?>

<div class="row">
	<div class="col-md-12">
	    <h2>Cliente</h2>

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateclient" role="form">
            <div class="panel panel-default">
                <div class="panel-heading">Editar</div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-md-6">
                        <input type="text" name="name" required value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Dirección</label>
                        <div class="col-md-6">
                        <input type="text" name="address" required value="<?php echo $user->address;?>" class="form-control"  id="username" placeholder="Direccion">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Contacto</label>
                        <div class="col-md-6">
                        <input type="text" name="contact" required value="<?php echo $user->contact;?>" class="form-control" id="contact" placeholder="Contacto">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Telefono</label>
                        <div class="col-md-6">
                        <input type="text" name="phone" required value="<?php echo $user->phone;?>"  class="form-control" id="phone" placeholder="Telefono">
                        </div>
                    </div>

                </div>
            </div>
            <br>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                <input type="hidden" name="id" value="<?php echo $user->id;?>">
                <button type="submit" class="btn btn-default">Actualizar Cliente</button>
                </div>
            </div>

        </form>
	</div>
</div>