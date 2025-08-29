<div class="row">
	<div class="col-md-12">
	<h2>Contacto</h2>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addcontact" role="form">

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
            <label for="inputEmail1" class="col-lg-2 control-label">Apellido</label>
            <div class="col-md-6">
              <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Empresa</label>
            <div class="col-md-6">
              <input type="text" name="company" required class="form-control"  id="company" placeholder="Empresa">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Direccion</label>
            <div class="col-md-6">
              <input type="text" name="address" required class="form-control"  id="address" placeholder="Direccion">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
            <div class="col-md-6">
              <input type="text" name="email" required class="form-control" id="email" placeholder="Email">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Telefono</label>
            <div class="col-md-6">
              <input type="text" name="phone" required class="form-control" id="phone" placeholder="Telefono">
            </div>
          </div>

        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <button type="submit" class="btn btn-default">Agregar Contacto</button>
        </div>
      </div>

    </form>
	</div>
</div>