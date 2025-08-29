<div class="row">
	<div class="col-md-12">
		<h1>Plataformas</h1>
		<a href="./?view=newplatform" class="btn btn-default pull-right">Nueva Plataforma</a>
		<br><br>

<form class="form-horizontal" role="form">
    <input type="hidden" name="view" value="platforms">
	<?php
		$brands = BrandData::getAll();
	?>

	<div class="form-group">
		<div class="col-lg-4">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-search"></i></span>
				<input type="text" name="q" value="<?php if(isset($_GET["q"]) && $_GET["q"]!=""){ echo $_GET["q"]; } ?>" class="form-control" placeholder="Palabra clave">
			</div>
		</div>

		<div class="col-lg-4">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-delicious"></i></span>
				<select name="brand_id" class="form-control">
				<option value="">MARCA</option>
				<?php foreach($brands as $bra):?>
					<option value="<?php echo $bra->id; ?>" <?php if(isset($_GET["brand_id"]) && $_GET["brand_id"]==$bra->id){ echo "selected"; } ?>><?php echo $bra->name; ?></option>
				<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="col-lg-4">
			<button class="btn btn-primary btn-block">Buscar</button>
		</div>

	</div>
</form>

<?php
echo $_GET["brand_id"];
$platforms= array();
if((isset($_GET["q"]) && isset($_GET["brand_id"]) ) && ($_GET["q"]!="" || $_GET["brand_id"]!="" ) ) {
$sql = "select * from platform where ";
if($_GET["q"]!=""){
	$sql .= " name like '%$_GET[q]%' and description like '%$_GET[q] %' ";
}

if($_GET["brand_id"]!=""){
if($_GET["q"]!=""){
	$sql .= " and ";
}
	$sql .= " brand_id = ".$_GET["brand_id"];
}

		$platforms = PlatformData::getBySQL($sql);

}else{
		$platforms = PlatformData::getAll();

}
		if(count($platforms)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Marca</th>
			<th>Plataforma</th>
			<th>Descripción</th>
			<th></th>
			</thead>
			<?php
			foreach($platforms as $pla){
				$brand = null;
				if($pla->brand_id!=null){
				$brand  = $pla->getBrand();
				}

				?>
				<tr>
                    <td><?php if($brand!=null ){ echo $brand->name;} ?></td>
                    <td><?php echo $pla->name; ?></td>
                    <td><?php echo $pla->description; ?></td>
                    <td style="width:130px;">
                        <a href="index.php?view=editplatform&id=<?php echo $pla->id;?>" class="btn btn-warning btn-xs">Editar</a>
                        <a href="index.php?action=delplatform&id=<?php echo $pla->id;?>" class="btn btn-danger btn-xs">Eliminar</a>
                    </td>
				</tr>
				<?php

			}

		}else{
			echo "<p class='alert alert-danger'>No hay Plataformas</p>";
		}

		?>

	</div>
</div>