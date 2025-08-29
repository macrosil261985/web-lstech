<div class="row">
	<div class="col-md-12">
	    <h2>Cliente</h2>
		<form class="form-horizontal" method="post" id="addclient" action="index.php?view=addclient" role="form">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo</div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-md-6">
                        <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Dirección</label>
                        <div class="col-md-6">
                        <input type="text" name="address" required class="form-control"  id="address" placeholder="Direccion">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Contacto</label>
                        <div class="col-md-6">
                        <input type="text" name="contact" required class="form-control" id="contact" placeholder="Contacto">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Teléfono</label>
                        <div class="col-md-6">
                        <input type="text" name="phone" required class="form-control" id="phone" placeholder="Telefono">
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-default">Agregar Cliente</button>
                </div>
            </div>

        </form>
	</div>
</div> 