<?php
$brands = BrandData::getAll();
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
<!--
<script src="res/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
-->
<div class="row">
    <div class="col-md-10">
        <h2>Sistema Operativo</h2>

        <form class="form-horizontal" role="form" method="post" action="./?action=addos">
            <div class="panel panel-default">
            <div class="panel-heading">Nuevo</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Marca</label>
                        <div class="col-lg-4">
                            <select id="brand_id" name="brand_id" required class="form-control">
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
                            <select id="platform_id" name="platform_id" required class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Nombre Sistema Operativo</label>
                        <div class="col-lg-10">
                        <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
                        </div>
                    </div>

                </div>
            </div>
            <br>
            
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-default">Agregar Sistema Operativo</button>
                </div>
            </div>
        </form>

</div>
</div>