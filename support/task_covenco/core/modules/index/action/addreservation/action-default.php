<?php

$event = new EventData();
$event->title = "Orden de Servicio";//$_POST["title"];

$event->client_id = $_POST["client_id"];
$event->user_id = $_POST["user_id"];
//$_SESSION["user_id"];
$event->sdate_at = $_POST["sdate_at"];
$event->stime_at = $_POST["stime_at"];
$event->fdate_at = $_POST["fdate_at"];
$event->ftime_at = $_POST["ftime_at"];
$event->brand_id = $_POST["brand_id"];
$event->platform_id = $_POST["platform_id"];

$event->modeltype = $_POST["modeltype"];
$event->serialnumber = $_POST["serialnumber"];

$ticketnumber ="NULL";
if($_POST["ticketnumber"]!=""){ $ticketnumber = $_POST["ticketnumber"]; }
$event->ticketnumber = $ticketnumber;

$event->description = htmlspecialchars($_POST["description"]);

$category_id = "NULL";
if($_POST["category_id"]!=""){ $category_id = $_POST["category_id"]; }
$event->category_id = $category_id;

$project_id = "NULL";
if($_POST["project_id"]!=""){ $project_id = $_POST["project_id"]; }
$event->project_id = $project_id;

$event->priority_id = $_POST["priority_id"];
$event->status_id = $_POST["status_id"]; 

//print("antes del if 1");
//print($_FILES['upfile']['tmp_name']);
//echo '-';


if (!file_exists($_FILES['upfile']['tmp_name']) || !is_uploaded_file($_FILES['upfile']['tmp_name'])) 
{
    //echo 'No upload';
    $event->add();
}
else
{
    //echo 'Yes upload';// Your file has been uploaded
    $upfile = new Upload($_FILES["upfile"]);
    if($upfile->uploaded){
      $upfile->Process("storage/uploads/");
      if($upfile->processed){
        $event->upfile = $upfile->file_dst_name;
        $event->add_with_file();
      }
    }else{
        $event->add();
    }    
}

/*
if(isset($_FILES["file"])){
    $file = new Upload($_FILES["file"]);
    echo 'no';
    if($file->uploaded){
      $file->Process("storage/products/");
      print("2");
      if($file->processed){
        $product->file = $file->file_dst_name;
        $prod = $product->add_with_file();
        print("3");
      }
    }else{
        $rt= $r->add();
        print("4");
    }
}else{
    echo 'si';
    print("else del if");
  $rt= $r->add();

}
*/
//print("despues del if");
//$r->add();

Core::redir("./index.php?view=reservations");
?>