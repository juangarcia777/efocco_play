<?php 
require(dirname(__FILE__)."/../config.php"); 
$session = new SESSION();
$session->UserLogado();
$db = new DB();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>EFOCCO - Escola Técnica e Treinamentos</title>

	<meta name="keywords" content="escola tecnica, efocco, cursos, ead, lencois paulista" />
	<meta http-equiv="Content-Language" content="pt-br">
	    <meta name="robots" content="no follow" />
	    <meta name="author" content="SIS Tecnologia" />
	    <meta name="description" content="Efocco / Efocco Play a sua plataforma de cursos on-line."/>

	    
	
	
	<!-- Favicon -->
	
	<link rel="icon" href="<?php echo RAIZ_AVA; ?>favicon.ico" type="image/x-icon">
	
	<!-- vector map CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

	<!-- Calendar CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet" type="text/css"/>

	<!-- Jasny-bootstrap CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
	

	<!-- Bootstrap Colorpicker CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- select2 CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- switchery CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- bootstrap-select CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- bootstrap-tagsinput CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
	
	<!-- bootstrap-touchspin CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- multi-select CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
	
	<!-- Bootstrap Switches CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>

	<!-- Bootstrap Datetimepicker CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>

	<!--alerts CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

	<!-- Bootstrap Dropzone CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>vendors/bower_components/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css"/>

	<!-- Custom CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="<?php echo SISTEMA_AVA; ?>assets/css/custom.css" rel="stylesheet" type="text/css">

	<!-- Custom CSS -->
	<link href="<?php echo SISTEMA_AVA; ?>assets/css/sweetalert.css" rel="stylesheet" type="text/css">

	<base href="<?php echo SISTEMA_AVA; ?>">

</head>
<body>

	<div id="preloader"><div id="status"><div class="spinner"></div></div></div>
	
	<?php include("modais.php"); ?>

	<div class="wrapper">

    	<?php include("menu_topo.php"); ?>

			<?php 
				if($GerenteAva==0){
					include("menu.php"); 	
				}				
			?>


			
			