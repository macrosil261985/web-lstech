<?php $user = BrandData::getById($_GET["id"]);?>

<div class="row">
	<div class="col-md-12">
    	<h2>Marca</h2>

		<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatebrand" role="form">
            <div class="panel panel-default">
                <div class="panel-heading">Editar</div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
                        <div class="col-md-6">
                        <input type="text" name="name" required value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Nombre">
                        </div>
                    </div>

                </div>
            </div>
            <br>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
                <button type="submit" class="btn btn-primary">Actualizar Marca</button>
                </div>
            </div>
        </form>
	</div>
</div>