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
    <div class="col-md-12">
        <h1>Sistemas operativos</h1>
        <a href="./?view=newos" class="btn btn-default pull-right">Nuevo Sistema Operativo</a>
        <br><br>
        
<form class="form-horizontal" role="form">
    <input type="hidden" name="view" value="oss">
        <?php
            $brands = BrandData::getAll();
        ?>
        <div class="form-group">
            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Palabra clave">
                </div>
            </div>

            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-delicious"></i></span>
                    <select id="brand_id" name="brand_id" class="form-control">
                    <option value="">MARCA</option>
                    <?php foreach($brands as $bra):?>
                        <option value="<?php echo $bra->id; ?>" <?php if(isset($_GET["brand_id"]) && $_GET["brand_id"]==$bra->id){ echo "selected"; } ?>><?php echo $bra->name; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                    <select id="platform_id" name="platform_id" class="form-control">
                        <?php if(isset($_GET["platform_id"]) && $_GET["brand_id"]!=""){
                            $platforms = PlatformData::getAllByBrandId($_GET["brand_id"]);
                        ?>
                            <option value="">PLATAFORMA</option>
                            <?php foreach($platforms as $pla):?>
                                <option value="<?php echo $pla->id; ?>" <?php if(isset($_GET["platform_id"]) && $_GET["platform_id"]==$pla->id){ echo "selected"; } ?>><?php echo $pla->name; ?></option>
                            <?php endforeach; 
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-lg-3">
            <button class="btn btn-primary btn-block">Buscar</button>
            </div>

  </div>
</form>

<?php
$platforms= array();
if((isset($_GET["q"]) && isset($_GET["brand_id"]) && isset($_GET["platform_id"]) ) && ($_GET["q"]!="" || $_GET["brand_id"]!="" || $_GET["platform_id"]!="") ) {
$sql = "select distinct os.* from os as os, platform as pla where ";
if($_GET["q"]!=""){
	$sql .= " os.name like '%$_GET[q]%' and os.description like '%$_GET[q] %' ";
}

if($_GET["brand_id"]!=""){
if($_GET["q"]!=""){
	$sql .= " and ";
}
    $sql .= " pla.brand_id = ".$_GET["brand_id"];
    $sql .= " and os.platform_id = pla.id";
}

if($_GET["platform_id"]!=""){
if($_GET["q"]!="" || $_GET["brand_id"]!=""){
	$sql .= " and ";
}
    $sql .= " os.platform_id = ".$_GET["platform_id"];
}
		$oss = OsData::getBySQL($sql);
}else{
		$oss = OsData::getAll();

}
		if(count($oss)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Marca</th>
            <th>Plataforma</th>
            <th>Sistema Operativo</th>
			<th>Descripción</th>
			<th></th>
			</thead>
			<?php
			foreach($oss as $os){
                $brand = null;
				$platform = null;
				if($os->platform_id!=null){
                    $platform = $os->getPlatform();
                    $brand  = $platform->getBrand();
				}
				?>
				<tr>
                    <td><?php if($brand!=null ){ echo $brand->name;} ?></td>
                    <td><?php if($platform!=null ){ echo $platform->name;} ?></td>
                    <td><?php echo $os->name; ?></td>
                    <td><?php echo $os->description; ?></td>
                    <td style="width:130px;">
                        <a href="index.php?view=editos&id=<?php echo $os->id;?>" class="btn btn-warning btn-xs">Editar</a>
                        <a href="index.php?action=delos&id=<?php echo $os->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
                    </td>
				</tr>
				<?php

			}

		}else{
			echo "<p class='alert alert-danger'>No hay Sistemas Operativos</p>";
		}
        ?>

	</div>
</div>
