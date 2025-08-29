<div class="row">
	<div class="col-md-12">
	  <h2>Especialista</h2>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=adduser" role="form">
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
              <label for="inputEmail1" class="col-lg-2 control-label">Nick</label>
              <div class="col-md-6">
                <input type="text" name="username" required class="form-control" id="username" placeholder="Nombre de usuario">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
              <div class="col-md-6">
                <input type="text" name="email" required class="form-control" id="email" placeholder="Email">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Teléfono</label>
              <div class="col-md-6">
                <input type="text" name="phone" required class="form-control" id="phone" placeholder="Teléfono">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Contrase&ntilde;a</label>
              <div class="col-md-6">
                <input type="password" name="password" required class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail1" class="col-lg-2 control-label">Es administrador</label>
              <div class="col-md-6">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="is_admin"> 
                  </label>
                </div>
              </div>
            </div>

          </div>
        </div>
        <br>

        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-default">Agregar Especialista</button>
          </div>
        </div>
    </form>
	</div>
</div>