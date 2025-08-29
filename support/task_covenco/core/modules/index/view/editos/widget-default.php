<?php 
$os = OsData::getById($_GET["id"]);
$platforms = PlatformData::getAll();
?>

<div class="row">
	<div class="col-md-10">
	    <h2>Editar Plataforma</h2>
        <form class="form-horizontal" role="form" method="post" action="./?action=updateos">

            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Plataforma</label>
                <div class="col-lg-10">
                    <select name="project_id" class="form-control">
                    <option value="">-- SELECCIONE --</option>
                    <?php foreach($brands as $bra):?>
                        <option value="<?php echo $bra->id; ?>" <?php if($bra->id==$platform->brand_id){ echo "selected"; }?>><?php echo $bra->name; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
                <div class="col-lg-10">
                <input type="text" name="name" value="<?php echo $platform->name;?>" required class="form-control" id="name" placeholder="Nombre">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                <input type="hidden" name="id" value="<?php echo $platform->id; ?>">
                <button type="submit" class="btn btn-default">Actualizar Plataforma</button>
                </div>
            </div>

        </form>

	</div>
</div>