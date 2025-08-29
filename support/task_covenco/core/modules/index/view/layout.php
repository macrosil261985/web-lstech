<?php
// Handle AJAX request (start)
if( isset($_POST['ajax']) && isset($_POST['brand_id']) ){
 echo $_POST['brand_id'];
 exit;
}
// Handle AJAX request (end)
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>.: Task Covenco v2.0 :.</title>

    <!-- Bootstrap core CSS -->
    <link href="res/bootstrap3/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <script src="js/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<?php if(isset($_GET["view"]) && $_GET["view"]=="home"):?>
<link href='res/fullcalendar.min.css' rel='stylesheet' />
<link href='res/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='res/js/moment.min.js'></script>
<script src='res/fullcalendar.min.js'></script>
<?php endif; ?>

  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">Task Covenco<sup><small><span class="label label-primary">v2.0</span></small></sup> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
<?php 
$u=null;
if(Session::getUID()!=""):
  $u = UserData::getById(Session::getUID());
?>
         <ul class="nav navbar-nav">
<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-pencil-square-o"></i> Agregar <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="./?view=newreservation">Orden de servicio</a></li>
          <li><a href="./?view=newnote">Nota</a></li>
          <li><a href="./?view=newtask">Tarea</a></li>
          <li><a href="./?view=newclient">Cliente</a></li>
          <li><a href="./?view=newbrand">Marca</a></li>
          <li><a href="./?view=newplatform">Plataforma</a></li>
          <li><a href="./?view=newos">Sistema operativo</a></li>
          <li><a href="./?view=newproject">Proyecto</a></li>
          <li><a href="./?view=newcategory">Categoria</a></li>
          <li><a href="./?view=newcontact">Contacto</a></li>
        </ul>
        </li>

        </ul> 
          <ul class="nav navbar-nav side-nav">
          <li><a href="index.php?view=home"><i class="fa fa-home"></i> Inicio</a></li>
          <li><a href="index.php?view=reservations"><i class="fa fa-calendar"></i> Orden de servicio</a></li>
          <li><a href="index.php?view=notes"><i class="fa fa-file-text"></i> Notas</a></li>
          <li><a href="index.php?view=tasks"><i class="fa fa-tasks"></i> Tareas</a></li>
          <li><a href="index.php?view=clients"><i class="fa fa-briefcase"></i> Clientes</a></li>
          <li><a href="index.php?view=brands"><i class="fa fa-delicious"></i> Marcas</a></li>
          <li><a href="index.php?view=platforms"><i class="fa fa-cubes"></i> Plataformas</a></li>
          <li><a href="index.php?view=oss"><i class="fa fa-linux"></i> Sistemas operativos</a></li>
          <li><a href="index.php?view=projects"><i class="fa fa-flask"></i> Proyectos</a></li>
          <li><a href="index.php?view=categories"><i class="fa fa-th-list"></i> Categorias</a></li>
          <li><a href="index.php?view=contacts"><i class="fa fa-book"></i> Contactos</a></li>
          <?php if($u->is_admin):?>
            <li><a href="index.php?view=users"><i class="fa fa-users"></i> Especialistas </a></li>
          <?php endif;?>
          <li><a href="index.php?view=reports"><i class="fa fa-bar-chart"></i> Reporte </a></li>
          <!--<li><a href="index.php?view=changelog"><i class="fa fa-filter"></i> Log de cambios </a></li>-->
        </ul>

<?php endif;?>


<?php if(Session::getUID()!=""):?>
<?php 
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID());
  $user = $u->name." ".$u->lastname;

  }?>
    <ul class="nav navbar-nav navbar-right navbar-user">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <b>INNOVA SCIA</b> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a target="_blank" href="http://www.innovascia.com/">Sitio Web</a></li>
        </ul>
      </li>

      <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-user"></i>
          <b><?php echo $user; ?></b> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=configuration">Cambio Clave</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
        </li>
        </ul>
<?php else:?>
<?php endif; ?>

        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

<?php 
  // puedo cargar otras funciones iniciales
  // dentro de la funcion donde cargo la vista actual
  // como por ejemplo cargar el corte actual
  View::load("login");

?>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->

<script src="res/bootstrap3/js/bootstrap.min.js"></script>

  </body>
</html>
