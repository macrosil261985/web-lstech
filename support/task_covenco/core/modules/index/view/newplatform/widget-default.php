<?php
$brands = BrandData::getAll();
?>

<div class="row">
    <div class="col-md-10">
        <h2>Plataforma</h2>
        <form class="form-horizontal" role="form" method="post" action="./?action=addplatform">

            <div class="panel panel-default">
            <div class="panel-heading">Nueva</div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Marca</label>
                        <div class="col-lg-4">
                            <select name="brand_id" required class="form-control">
                            <option value="">-- SELECCIONE --</option>
                            <?php foreach($brands as $bra):?>
                                <option value="<?php echo $bra->id; ?>"><?php echo $bra->name; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-lg-10">
                        <input type="text" name="name" required class="form-control" id="name" placeholder="Nombre">
                        </div>
                    </div>

                </div>
            </div>
            <br>
                            
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-default">Agregar Plataforma</button>
                </div>
            </div>

        </form>

    </div>
</div>