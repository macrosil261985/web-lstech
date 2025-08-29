
<?php
$clients = ClientData::getAll();
$users = UserData::getAll();
$brands = BrandData::getAll();
$platforms = PlatformData::getAll();
$priorities = PriorityData::getAll();
$statuses = StatusData::getAll();
$proyects = ProjectData::getAll();
$categories = CategoryData::getAll();
?>

<script> 
  $(document).ready(function(){
    $("#brand_id").change(function(){
    var brand_id = $("#brand_id").val();

    $.ajax({
            type: 'post',
            url: "./?action=listplatform",
            data: 'brand_id=' + brand_id,
            success: function(data){
                      $("#platform_id").html(data);
            }
    });
  });
});
</script>

<div class="row">
  <div class="col-md-10">
    <h2>Orden de Servicio</h2>
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="./?action=addreservation">
      <div class="panel panel-default">
        <div class="panel-heading">Actividad</div>
        <div class="panel-body">

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Cliente</label>
            <div class="col-lg-4">
              <select name="client_id" required class="form-control">
                <option value="">-- SELECCIONE --</option>
                <?php foreach($clients as $cli):?>
                  <option value="<?php echo $cli->id; ?>"><?php echo $cli->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Especialista</label>
            <div class="col-lg-4">
              <select name="user_id" required class="form-control">
                <option value="">-- SELECCIONE --</option>
                <?php foreach($users as $us):?>
                  <option value="<?php echo $us->id; ?>"><?php echo $us->name." ".$us->lastname; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Fecha de inicio</label>
            <div class="col-lg-4">
              <input type="date" name="sdate_at" required class="form-control" id="inputEmail1" placeholder="DD-MM-AAAA">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Hora de inicio</label>    
            <div class="col-lg-4">
              <input type="time" name="stime_at" required class="form-control" id="inputEmail1" placeholder="HH:MM">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Fecha de término</label>
            <div class="col-lg-4">
              <input type="date" name="fdate_at" class="form-control" id="inputEmail1" placeholder="DD-MM-AAAA">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Hora de término</label>    
            <div class="col-lg-4">
              <input type="time" name="ftime_at" class="form-control" id="inputEmail1" placeholder="HH:MM">
            </div>
          </div>

        </div>
      </div>
     
      <div class="panel panel-default">
        <div class="panel-heading">Identificación de equipo</div>
        <div class="panel-body">

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Marca</label>
            <div class="col-lg-4">
              <select name="brand_id" id="brand_id" class="form-control">
                <option value="">-- SELECCIONE --</option>
                <?php foreach($brands as $bra):?>
                  <option value="<?php echo $bra->id; ?>"><?php echo $bra->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Plataforma</label>
            <div class="col-lg-4">
              <select id="platform_id" name="platform_id" class="form-control">

              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Model Type</label>
            <div class="col-lg-4">
              <input type="text" name="modeltype" required class="form-control" id="modeltype" placeholder="Model Type">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Serial Number</label>
            <div class="col-lg-4">
              <input type="text" name="serialnumber" required class="form-control" id="serialnumber" placeholder="Serial Number">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Número Ticket</label>
            <div class="col-lg-4">
              <input type="text" name="ticketnumber" class="form-control" id="ticketnumber" placeholder="Ticket Number">
            </div>
          </div>

        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Actividades Realizadas</div>
        <div class="panel-body">

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Descripción</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="5" name="description" placeholder="Descripción"></textarea>
            </div>
          </div>

        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Seguimiento</div>
        <div class="panel-body">

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Prioridad</label>
            <div class="col-lg-4">
              <select name="priority_id" class="form-control" required>
                <option value="">-- SELECCIONE --</option>
                  <?php foreach($priorities as $p):?>
                    <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
            <div class="col-lg-4">
              <select name="status_id" class="form-control" required>
                <?php foreach($statuses as $p):?>
                  <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
            <div class="col-lg-4">
              <select name="category_id" class="form-control">
                <option value="">-- SELECCIONE --</option>
                <?php foreach($categories as $p):?>
                  <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Proyecto</label>
            <div class="col-lg-4">
              <select name="project_id" class="form-control">
                <option value="">-- SELECCIONE --</option>
                <?php foreach($proyects as $p):?>
                  <option value="<?php echo $p->id; ?>"><?php echo $p->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Archivos</div>
        <div class="panel-body">

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Archivos</label>
            <div class="col-md-4">
              <input type="file" name="upfile" id="upfile" placeholder="">
            </div>
          </div>

        </div>
      </div>      
      <br>
      
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <button type="submit" class="btn btn-default">Agregar orden de servicio</button>
        </div>
      </div>
    </form>

  </div>
</div>