
<?php
$brand_id = "NULL";
if($_POST["brand_id"]!=""){
     $brand_id = $_POST["brand_id"];
     $platformsByBrandId = PlatformData::getAllByBrandId($brand_id);
    }

$platform_id = "NULL";
if($_POST["platform_id_edit"]!=""){
      $platform_id = $_POST["platform_id_edit"];    
    }    
?>

<option value="">-- SELECCIONE --</option>
<?php foreach($platformsByBrandId as $pla):?>
  <option value="<?php echo $pla->id; ?>"<?php if($pla->id==$platform_id){ echo "selected"; }?>><?php echo $pla->name; ?></option>
<?php endforeach; ?>