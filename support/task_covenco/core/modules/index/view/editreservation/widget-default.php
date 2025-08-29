<?php
$clients = ClientData::getAll();
$users = UserData::getAll();
$reservation = EventData::getById($_GET["id"]);
$brands = BrandData::getAll();
$platforms = PlatformData::getAll();
$proyects = ProjectData::getAll();
$categories = CategoryData::getAll();

$priorities = PriorityData::getAll();
$statuses = StatusData::getAll();
?>

<script> 
window.onload=function() {

      var brand_id = $("#brand_id").val();
      var platform_id_edit = $("#platform_id_edit").val();
      $.ajax({
          type: 'post',
          url: "./?action=listplatform",
          data: {brand_id:brand_id, platform_id_edit:platform_id_edit},
          success: function(data){
                    $("#platform_id").html(data);
         }
      });

}

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
	  <h2>Evento - Editar</h2>
	  <br>
    <form class="form-horizontal" role="form" method="post" action="./?action=updatereservation">

      <input id="platform_id_edit" name="platform_id_edit" type="hidden" value="<?php echo $reservation->platform_id; ?>">

      <div class="panel panel-default">
        <div class="panel-heading">Actividad</div>
        <div class="panel-body">

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Cliente</label>
            <div class="col-lg-4">
              <select name="client_id" disabled class="form-control">
                <option value="">-- SELECCIONE --</option>
                <?php foreach($clients as $cli):?>
                  <option value="<?php echo $cli->id; ?>" <?php if($cli->id==$reservation->client_id){ echo "selected"; }?>><?php echo $cli->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Especialista</label>
            <div class="col-lg-4">
              <select name="user_id" disabled class="form-control">
                <option value="">-- SELECCIONE --</option>
                <?php foreach($users as $us):?>
                  <option value="<?php echo $us->id; ?>" <?php if($us->id==$reservation->user_id){ echo "selected"; }?>><?php echo $us->name." ".$us->lastname; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Fecha de inicio</label>
            <div class="col-lg-4">
              <input type="date" name="sdate_at" value="<?php echo $reservation->sdate_at; ?>" required class="form-control" id="inputEmail1" placeholder="Fecha">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Hora de inicio</label>    
            <div class="col-lg-4">
              <input type="time" name="stime_at" value="<?php echo $reservation->stime_at; ?>" required class="form-control" id="inputEmail1" placeholder="Hora">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Fecha de término</label>
            <div class="col-lg-4">
              <input type="date" name="fdate_at" value="<?php echo $reservation->fdate_at; ?>" required class="form-control" id="inputEmail1" placeholder="Fecha">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Hora de término</label>    
            <div class="col-lg-4">
              <input type="time" name="ftime_at" value="<?php echo $reservation->ftime_at; ?>" required class="form-control" id="inputEmail1" placeholder="Hora">
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
                  <option value="<?php echo $bra->id; ?>"<?php if($bra->id==$reservation->brand_id){ echo "selected"; }?>><?php echo $bra->name; ?></option>
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
              <input type="text" name="modeltype" value="<?php echo $reservation->modeltype; ?>" required class="form-control" id="modeltype" placeholder="Model Type">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Serial Number</label>
            <div class="col-lg-4">
              <input type="text" name="serialnumber" value="<?php echo $reservation->serialnumber; ?>" required class="form-control" id="serialnumber" placeholder="Serial Number">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Número Ticket</label>
            <div class="col-lg-4">
              <input type="text" name="ticketnumber" value="<?php echo $reservation->ticketnumber; ?>" class="form-control" id="ticketnumber" placeholder="Ticket Number">
            </div>
          </div>

        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Actividades Realizadas</div>
        <div class="panel-body">

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Descripcion</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="5" name="description" placeholder="Descripcion"><?php echo $reservation->description;?></textarea>
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
                  <?php foreach($priorities as $pri):?>
                    <option value="<?php echo $pri->id; ?>"<?php if($pri->id==$reservation->priority_id){ echo "selected"; }?>><?php echo $pri->name; ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
            <div class="col-lg-4">
              <select name="status_id" class="form-control" required>
                <?php foreach($statuses as $sta):?>
                  <option value="<?php echo $sta->id; ?>"<?php if($sta->id==$reservation->status_id){ echo "selected"; }?>><?php echo $sta->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Proyecto</label>
            <div class="col-lg-4">
              <select name="project_id" class="form-control">
              <option value="">-- SELECCIONE --</option>
                <?php foreach($proyects as $pro):?>
                  <option value="<?php echo $pro->id; ?>" <?php if($pro->id==$reservation->project_id){ echo "selected"; }?>><?php echo $pro->name; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail1" class="col-lg-2 control-label">Categoria</label>
            <div class="col-lg-4">
              <select name="category_id" class="form-control">
              <option value="">-- SELECCIONE --</option>
                <?php foreach($categories as $cat):?>
                  <option value="<?php echo $cat->id; ?>" <?php if($cat->id==$reservation->category_id){ echo "selected"; }?>><?php echo $cat->name; ?></option>
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
            <div class="col-lg-4">
              <input type="file" name="upfile" id="upfile" placeholder="">
              <?php if($reservation->upfile!=""):?>
                <br>
                <img src="storage/uploads/<?php echo $reservation->upfile;?>" class="img-responsive">
              <?php endif;?>
            </div>
          </div>

        </div>
      </div>  


        <br>

        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
          <input type="hidden" name="id" value="<?php echo $reservation->id; ?>">
            <button type="submit" class="btn btn-default">Actualizar Evento</button>
          </div>
        </div>

    </form>
	</div>
</div>