<?php

   function quitar_tildes($cadena) {
      $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
      $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
      $texto = str_replace($no_permitidas, $permitidas ,$cadena);
      return $texto;
   }

   require('./PHPMailer			<p class="text-center wow fadeInDown animated" style="visibility: visible;"><i class="fa fa-mobile"></i>&nbsp +56 9 4445 0035  &nbsp &nbsp| &nbsp &nbsp  <i class="fa fa-link"></i>&nbsp <a target="_blank" href="http://www.lstechpartners.com" title="Servicios Integrales de Informática, Telecomunicación.">www.lstechpartners.com</a>  &nbsp &nbsp| &nbsp &nbsp  <i class="fa fa-envelope"></i>&nbsp <a href="mailto:c.labbe@lstechpartners.com">c.labbe@lstechpartners.com</a></p>PHPMailerAutoload.php');
   
   if(isset($_POST['enviarboton'])){

		if($_POST['name'] == '' ){
		    $error1 = '<div class="alert alert-danger error" role="alert">Ingrese su nombre</div>';
		}else if($_POST['email'] == ''){
			$error2 = '<div class="alert alert-danger error" role="alert">Ingrese un email correcto</div>';
		}else if($_POST['subject'] == ''){
			$error3 = '<div class="alert alert-danger error" role="alert">Ingrese un asunto</div>';
		}else if($_POST['message'] == ''){
			$error4 = '<div class="alert alert-danger error" role="alert">Ingrese un mensaje</div>';
		}else{

		$dest   = "c.labbe@lstechpartners.com";
		$nombre = 	quitar_tildes(isset($_POST['name'])?$_POST['name']:0);
		$email  = 	quitar_tildes(isset($_POST['email'])?$_POST['email']:0);
		$asunto = 	quitar_tildes(isset($_POST['subject'])?$_POST['subject']:0);
		$mensaje = 	quitar_tildes(isset($_POST['message'])?$_POST['message']:0);
	   
		$cuerpo='

			 <!DOCTYPE html>
			 <html lang="es">
			 <head>
				<title>Envio de Correo</title>
				<meta charset="utf-8">
				<style type="text/css">
				   html {
					  font-family:Arial, Helvetica, sans-serif;
					  font-size: 15px;
				   }
				   .container {
					  width: 80%;
					  margin-left: 15px;
				   }
				   .panel-default {
					  border-color: #ddd;
					  margin-left: 15px;
				   }
				   .panel {	
					  border-radius: 4px;
					  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
					  box-shadow: 0 1px 1px rgba(0,0,0,.05);
				   }
				   .panel-heading {
					  background-color: #ddd;
					  padding: 10px 15px;
					  border: 1px solid #ddd;
					  border-top-left-radius: 3px;
					  border-top-right-radius: 3px;
					  font-size: 17px;
					  -webkit-box-sizing: border-box;
					  -moz-box-sizing: border-box;
					  box-sizing: border-box;
				   }
				   .table {
					  border: 1px solid #ddd;
					  width: 100%;
					  max-width: 100%;
					  margin-bottom: 5px;
					  border-collapse: collapse;
				   }
				   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
					  padding: 8px;
					  line-height: 1.42857143;
					  vertical-align: top;
					  border: 1px solid #ddd;
				   }
				   td{
					  font-size: 16px; 
				   }
				   span{
					  font-weight: bold;
				   }
				   .panel-body {
					  padding: 8px;
					  border: 1px solid #ddd;
					  border-bottom-left-radius: 3px;
					  border-bottom-right-radius: 3px;
				   }
				   .text-danger {
					  color: #a94442;
					  font-size: 16px;
				   }
				   .text-primary {
					  color: #337ab7;
					  font-size: 16px;
				   }
				</style>
			 </head>
			 <body>
				<div class="container">

				   <HR width=100%> 
				   <p>Estimados(as).</p>
				   <p>Gracias por ponerse en contacto con nosotros. Lo m&aacute;s pronto posible nos pondremos en contacto con usted.</p>
				   <br>
				   <div class="panel panel-default">
					  <div class="panel-heading">
						 Resumen: Mensaje Enviado					
					  </div>
					  <table class="table table-bordered" width="100%" border="0">        
						 <tr>
							<td style="width: 25% ">				  
							   <span>Nombre</span>&nbsp;</td>
							<td style="width: 75% " class="text-primary">&nbsp;'.$nombre.'</td>
						 </tr>
						 <tr>
							<td>
							   <span>Correo</span>&nbsp; </td>
							<td class="text-danger">&nbsp;'.$email.'</td>
						 </tr>						 
						 <tr>
							<td>
							   <span>Asunto</span>&nbsp; </td>
							<td class="text-danger">&nbsp;'.$asunto.'</td>
						 </tr>
						 <tr>
							<td>
							   <span>Mensaje</span>&nbsp; 
							</td>
							<td class="text-danger">&nbsp;'.$mensaje.'</td>
						 </tr> 

					  </table>
				   </div>
				   <HR width=100%> 
				   <p>Atento a sus comentarios, cordiales saludos.<br><br></p>

				   <div class="text-center col-md-3 col-xs-10 wow fadeInUp" data-wow-delay="100ms">
						<img src="/images/logo.png" alt="logo empresa LS Tech Partners" />
						<P>www.lstechpartners.com</P>
						<P>+(56-9) 3118 7110</P>
						<P>c.labbe@lstechpartners.com</P>
				   </div>       

				</div>
			 </body>
		  </html>      
		  ';
					

		  $mail = new PHPMailer;
		  $mail->isSendmail();
		  $mail->From = $dest;
		  $mail->FromName = "LS Tech Partners";
		  $mail->addAddress($dest , "LS Tech Partners");
		  $mail->addBCC($email, $nombre);
		  $mail->Subject = utf8_decode($asunto);	
		  $mail->msgHTML($cuerpo);
		  $mail->AltBody = utf8_decode($asunto);

		  if (!$mail->send()) {
			 $result = '<div class="alert alert-danger text-center">
						  <strong>Error!</strong> Problemas en el envio de correo.
						</div>';
		  } else {

			 $result = '<div class="alert alert-success">
						  <strong>Gracias por ponerse en contacto con nosotros!</strong> Tan pronto como sea posible nos pondremos en contacto.
						</div>';

			 $dest                      ="";
			 $nombre                    ="";
			 $email                     ="";
			 $asunto                    ="";
			 $mensaje                   ="";
			 $_POST['enviarboton']      ="";
             $_POST['name']             ="";
             $_POST['email']            ="";
             $_POST['asunto']           ="";
             $_POST['message']          ="";
             $sql                       ="";
		  }   
            
		}  
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Somos una empresa que brinda servicios informáticos, enfocados en la integración de tecnología a las empresas, dando soluciones de optimización de recursos, además de dar soluciones a diferentes modelos de negocios. El trabajo es personalizado e íntegro, dando una solución de integración en un marco tecnológico en un bien de la producción empresarial.">
    <meta name="author" content="LS Tech Partners">
    <title>Soluciones tecnológicas a medida para cada necesidad | LS Tech Partners</title>
	<meta property="title" content="Soluciones tecnológicas a medida para cada necesidad | LS Tech Partners">
	<meta name="keywords" content="Digital Experience, Raqueo, Datacenter, Transformación Digital">
	<meta name="robots" content="index, follow">

	<!-- core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/font-awesome.min.css" rel="stylesheet">
    <link href="./css/animate.min.css" rel="stylesheet">
    <link href="./css/owl.carousel.css" rel="stylesheet">
    <link href="./css/owl.transitions.css" rel="stylesheet">
    <link href="./css/prettyPhoto.css" rel="stylesheet">
    
    <link href="./css/main.css" rel="stylesheet">
    <link href="./css/responsive.css" rel="stylesheet">
    
    
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="./images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./images/ico/apple-touch-icon-57-precomposed.png">
       
    <link rel='stylesheet' href='estilos.css'>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js'></script>
    <script src='./js/funciones.js'></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    
</head><!--/head-->

<body id="home" class="homepage">

    <header id="top-header" class="navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->
                    
                    <!-- logo -->
                    <div class="navbar-brand">
                        <a class="smooth-scroll" data-section="#home" href="#home" >
                            <img class="logo" src="./images/logo_blanco.png" alt="logo empresa LS Tech Partners">
                        </a>
                    </div>
                    <!-- /logo -->
                </div>

                <!-- main nav main-menu-->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="container-fluid">
                        <ul id="nav" class="nav navbar-nav">
                            <li class="scroll"><a href="#home" data-section="#home">Inicio</a></li>
                            <li class="scroll"><a href="#services" data-section="#services">Servicios</a></li>
                            <li class="scroll"><a href="#features" data-section="#features">Características</a></li>
                            <li class="scroll"><a href="#about" data-section="#about">Nuestra Empresa</a></li>
                            
                            <!-- descoment for suport section
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Soporte <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="scroll"><a href="/support/task_covenco/">Covenco S.A.</a></li> -->
                                    <!--<li role="separator" class="divider"></li>-->
                            <!--    </ul>
                            </li> -->

                            <li class="scroll"><a href="#contact-area" data-section="#contact-area">Contacto</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- /main nav -->
                
            </div>
        </header>

    <section id="main-slider">
    	<div class="owl-carousel">
            <div class="item" id="slider0">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel-content text-center">
                                    <div class="espacio"></div>
                                    <img class="axiologo" src="./images/logo.png" alt="">
                                    <h5 class="c-gray-1">Servicios Integrales de Informática, Infraestructura, Asesoría, Telecomunicación y más.</h5>
                                    <a class="btn btn-primary btn-lg" href="#about" data-section="#about">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
      
            <div class="item" id="slider1">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel-content text-center">
                                    <h2 class="t-shadow">Con nuestros servicios profesionales respaldaremos tu <span>gestión TI</span>.</h2>
                                    <p></p>
									<!-- <img src="./images/logo.png" alt=""> -->
									<h5 class="t-shadow">Servicios Integrales de Informática, Infraestructura, Telecomunicación y más.</h5>
                                    <a class="btn btn-primary btn-lg" href="#about" data-section="#about">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <div class="item" id="slider2">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel-content text-center">

                                    <h2 class="t-shadow">Nuestro objetivo principal es SATISFACER continuamente a nuestros  <span>Clientes</span></h2>
									<p></p>
									<!-- <img src="./images/logo.png" alt=""> -->
									<h5 class="t-shadow">Servicios Integrales de Informática, Infraestructura, Telecomunicación y más.</h5>
                                    <a class="btn btn-primary btn-lg" href="#features" data-section="#features">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->

            <div class="item" id="slider3">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel-content text-center">
                                    <h2 class="t-shadow"> Brindamos servicios informáticos enfocados en la <span> integración </span> de tecnología.</h2>
									<p></p>
									<!-- <img src="./images/logo.png" alt=""> -->
									<h5 class="t-shadow">Servicios Integrales de Informática, Infraestructura, Telecomunicación y más.</h5>
                                    <a class="btn btn-primary btn-lg" href="#services" data-section="#services">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            
        </div><!--/.owl-carousel-->
    </section><!--/#main-slider-->


    <section id="services" >
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Nuestros Servicios</h2>
                <p class="text-center wow fadeInDown">Conscientes de la importancia del desarrollo tecnológico actual para el crecimiento de las empresas. 
                	<br><b> LS Tech Partners</b> ofrece servicios de TI que se adaptan a las necesidades de cada empresa, adecuando los servicios en términos de calidad, satisfacción y niveles de servicios en los proyectos tecnológicos.</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="features-item">
                            <div class="features-icon">
                                <i class="fa fa-server"></i>
                            </div>
                            <h3 class="features-title font-alt">Infraestructura para Data Center</h3>
                            <p class="text-center wow fadeInDown animated">El núcleo de tu negocio debe ser soportado por tecnologías confiables con el soporte adecuado. Networking, servidores, storage, virtualización y monitoreo todo integrado para armar, potenciar y renovar su data center.</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="features-item">
                            <div class="features-icon">
                                <i class="fa fa-cubes"></i>
                            </div>
                            <h3 class="features-title font-alt">Desarrollo de Proyectos</h3>
                            <p class="text-center wow fadeInDown animated"> Nuestro equipo de profesionales se hará cargo de sus proyectos por completo, acompañándolo durante todo el ciclo de vida.</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="features-item">
                            <div class="features-icon">
                                <i class="fa fa-laptop"></i>
                            </div>
                            <h3 class="features-title font-alt">Asesoría y Consultoría</h3>
                            <p class="text-center wow fadeInDown animated"> Ponemos a tu disposición a nuestros consultores para apoyar en las etapas de análisis, evaluación, diseño, renovación y optimización de sus actuales recursos.</p>
                        </div>
                    </div>
					
					 <div class="col-sm-6 col-md-3 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="features-item">
                            <div class="features-icon">
                                <i class="fa fa-database"></i>
                            </div>
                            <h3 class="features-title font-alt">Migración Base de Datos</h3>
                            <p class="text-center wow fadeInDown animated">Gestionamos el proceso de migración de datos entre bases, el proceso se produce durante una actualización de hardware o la transferencia de un sistema existente a otro completamente nuevo.</p>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->  
			
                <div class="col-sm-6 wow fadeInLeft">                    
                    <br><br>
					<h4 class="column-title text-left c-blue-1"> <i class="fa fa-pencil"></i>&nbsp Breve lista de servicios que hemos realizado</h4>
					<p><i class="fa fa-angle-double-right"></i> Monitoreo de infraestructura TI (Servicios, Storage, Servidores, BD, etc.).</p>
					<p><i class="fa fa-angle-double-right"></i> Instalación, configuración e implementación.</p>
					<p><i class="fa fa-angle-double-right"></i> Diseño y Arquitectura en soluciones TI.</p>
					<p><i class="fa fa-angle-double-right"></i> Consultoría de Proyectos TIC.</p>
					<p><i class="fa fa-angle-double-right"></i> Soporte de 2do y 3er Nivel.</p>
					<p><i class="fa fa-angle-double-right"></i> Soluciones en High Availability y Data Replicator ( HA y DR ).</p>
					<p><i class="fa fa-angle-double-right"></i> Migración entre Sites: P2P (Físico a Físico), P2V (Físico a Virtual), V2P (Virtual a Físico) y V2V (Virtual a Virtual).</p>
					<p><i class="fa fa-angle-double-right"></i> Implementación de plataformas Blade Flex System de Lenovo, Blade System c7000 de HP, IBM storwize V7000 Hyperswap storage, IBM storwize v7000 unified storage , etc...</p>
					<p><i class="fa fa-angle-double-right"></i> Implementación, migración y administración de Sistemas Operativos, Base de Datos, Switch y redes SAN.</p>
					<p><i class="fa fa-angle-double-right"></i> Plataformas de Almacenamiento y servidores (Físicas & Virtuales).</p>
					<p><i class="fa fa-angle-double-right"></i> Servidores de Aplicaciones y Web Server.</p>
					
				</div>

				<div class="col-sm-6 wow fadeInRight">
                    <img class="img-responsive visible-desk logo-icono" src="./images/icono.png" alt="logo empresa LS Tech Partners">
                </div>



		</div><!--/.container-->
    </section><!--/#services-->


    <section id="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Características</h2>
                <p class="text-center wow fadeInDown">Contamos con profesionales de primer nivel, con certificaciones y experiencia en las diversas tecnologías provistas, <br> y con alianzas estratégicas claves para el éxito de cada uno de los proyectos y servicio.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="media service-box wow fadeInLeft">
                        <div class="pull-left">
                            <i class="fa fa-server"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Tecnologías de servidores x86</h4>
                            <p>Dentro de nuestro equipo, contamos con un especialista experto en plataforma X86, Ex Lab Services Specialist Consultant de IBM</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInLeft">
                        <div class="pull-left">
                            <i class="fa fa-linux">  <i class="fa fa-windows"></i></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Solaris OS, Red Hat, Unix y Windows Server - Microsoft</h4>
                            <p>Contamos con bastos conocimientos y experiencia en los diversos sistemas operativos existentes en el mundo.</p>
                        </div>
                    </div>
				</div>
				<div class="col-sm-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-cloud-download"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Virtualización VMware & Hyper-V</h4>
                            <p>Las soluciones de virtualización que entregamos optimizan el uso del hardware, estandarizan las herramientas de administración y agilizan la puesta en marcha de nuevos servidores y servicios.</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <i class="fa fa-eye"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Arquitectura de Soluciones TI</h4>
                            <p>Nuestros Arquitectos de soluciones TI,  son profesionales con la experiencia necesaria para poder entender y dar solución a los requerimientos de nuestros clientes teniendo una visión end-to-end. Son los  encargados de escuchar las necesidades del cliente y diseñar una solución, mapeando los requerimientos funcionales hacia la integración de la tecnologías.</p>
                        </div>
                    </div>

                </div>
            </div><!--/.row-->
			<h4 class="column-title"></h4>
        </div><!--/.container-->
    </section><!--/#characteristics-->

		
    <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Bienvenido a nuestra compañia</h2> 
                <center> <img class="axiologo" src="./images/logo.png" alt="logo empresa LS Tech Partners"> </center>
                <p class="text-center wow fadeInDown"><b>LS Tech Partners</b> es una empresa chilena que nace con el fin de satisfacer la necesidad que manifiestan los clientes de recibir un servicio personalizado, eficiente y de excelencia en las áreas de tecnología.</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-sm-6 col-md-4 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="features-item">
                            <h3 class="features-title font-alt">Un poco más sobre nosotros</h3>
                            <p>Somos un grupo de profesionales altamente especializados con más de 15 años de experiencia, y una amplia trayectoria en diferentes áreas; Esto nos permite comprender las necesidades de nuestros clientes y entregar soluciones de calidad para sus negocios. Somos amantes de la tecnología y la innovación y es por ello que cada desafío lo enfrentamos con pasión y gratitud.
                          
					        <p>Nuestra meta es ser un referente en el área de servicios tecnológicos.</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="features-item">
                            <h3 class="features-title font-alt">Nuestra Misión</h3>
                            <P>Proporcionar servicios especializados en el ámbito de las TI que ayuden a nuestros clientes a solucionar sus problemas con agilidad, proporcionando un valor agregado a través de altos conocimientos técnicos. Implementamos, asesoramos, desarrollamos y ayudamos a la pequeña, mediana y gran empresa, a lograr sus objetivos y metas. Para nosotros es primordial poder garantizar calidad y seguridad en lo que hacemos</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="features-item">
                            <h3 class="features-title font-alt">Nuestra Visión</h3>
                            <p>Ser una empresa reconocida del ámbito tecnológico, destacada nacional e internacionalmente, en la que la gran calidad de nuestros servicios y profesionalismo, sea la garantía para el éxito de nuestros clientes en sus objetivos. Queremos entregar al mundo mejores oportunidades, desarrollando productos eficaces y accesibles para todos. </p>
                        </div>
                    </div>
					
					 <div class="col-sm-6 col-md-4 col-lg-3 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="features-item">
                            <h3 class="features-title font-alt">Nuestros Valores</h3>
                            <p>Los valores que ayudan a <b>LS Tech Partners</b> a lograr su misión son el profesionalismo, compromiso con el éxito del cliente, lealtad y confidencialidad, responsabilidad y honestidad, agilidad y calidad en las soluciones y servicios entregados.</p>
                        </div>
                    </div>

                </div>    
            </div><!--/.row-->  
			<h4 class="column-title"></h4>
		</div><!--/.container-->
    </section><!--/#about-->


<script>
   function onSubmit(token) {
     document.getElementById("main-contact-form").submit();
   }
 </script>

	<section id="contact-area">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown animated" style="visibility: visible;">Contacto</h2>
                    <p class="text-center wow fadeInDown animated" style="visibility: visible;">Si te interesa conocer más acerca de nuestros servicios, soluciones e implementaciones, no dudes en contactarnos <br>  Tus consultas son importantes para nosotros.</p>
                </div>
				
                <form id="main-contact-form" name="contact-form" method="post" action="#contact-area" class='contacto'>

                    <div class="col-lg-6 animated animate-from-left" style="opacity: 1; left: 0px;">
                            <div class="form-group">
                                <label for="name">Tu nombre</label>
                                <input type='text' id="name" name='name' class="form-control" placeholder="Nombre" requerido value='<?php if(isset($_POST[' name '])){ echo $_POST['name ']; } ?>'>
                                <?php if(isset($errors)){ echo $errors[1]; } ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Dirección de correo electrónico</label>
                                <input type='email' id="email" name="email" class="form-control" placeholder="ejemplo@mail.com" requerid value='<?php if(isset($_POST[' email '])){ $_POST['email ']; } ?>'>
                                <?php if(isset($errors)){ echo $errors[2]; } ?>
                            </div>
                            <div class="form-group">
                                <label for="subject">Asunto</label>
                                <input type='text' id="subject" name="subject" class="form-control" placeholder="Asunto" requerido value='<?php if(isset($_POST[' subject '])){ $_POST['subject ']; } ?>'>
                                <?php if(isset($errors)){ echo $errors[3]; } ?>
                            </div>
                        </div>

                        <div class="col-lg-6 animated animate-from-right" style="opacity: 1; right: 0px;">
                            <div class="form-group">
                                <label for="message">Tu mensaje</label>
                                <textarea name="message" id="message" class="form-control" rows="8" placeholder="Mensaje" requerido><?php if(isset($_POST['message'])){ $_POST['message']; } ?></textarea>
                                <?php if(isset($errors)){ echo $errors[4]; } ?>
                            </div>
                        </div>
                    
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <input type='submit' value='Enviar mensaje' id='enviarboton' name='enviarboton' class="enviarboton btn btn-primary btn-lg btn-send-msg g-recaptcha" data-sitekey="6LcyO78hAAAAAISrZgacloRdB7UldKUTXUG2A5wR" data-callback='onSubmit' >
                            <br>                           
                        </div>
                </form>


            </div>
			<h4 class="column-title"></h4>
			<p class="text-center wow fadeInDown animated" style="visibility: visible;"><i class="fa fa-mobile"></i>&nbsp +56 9 8819 7122  &nbsp &nbsp| &nbsp &nbsp  <i class="fa fa-link"></i>&nbsp <a target="_blank" href="http://www.axiodpm.com" title="Servicios Integrales de Informática, Telecomunicación.">www.axiodpm.com</a>  &nbsp &nbsp| &nbsp &nbsp  <i class="fa fa-envelope"></i>&nbsp <a href=”mailto:ventas@axiodpm.com”>ventas@axiodpm.com</a></p>
			
        </div>
    </section><!--/#bottom-->
    

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="text-center">
                        www.lstechpartners.com &copy; 2025.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mousescroll.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/main.js"></script>
   
</body>
</html>