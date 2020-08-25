<?php 
require(dirname(__FILE__)."/../config.php"); 
$session = new SESSION();
$session->UserLogado();

?>
<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <title>EfoccoPlay</title>
    <link rel="icon" href="<?php echo RAIZ_AVA; ?>favicon.ico" type="image/x-icon">
    <meta name="keywords" content="escola tecnica, efocco, cursos, ead, lencois paulista" />
      <meta name="robots" content="follow,index,all" />
      <meta name="author" content="SIS Tecnologia" />
      <meta name="description" content="Efocco Play a sua plataforma de cursos on-line."/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS
    ============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo SITE_AVA; ?>assets/css/vendor/bootstrap.min.css">
    
    <!-- nice-select CSS -->
    <link rel="stylesheet" href="<?php echo SITE_AVA; ?>assets/css/plugins/nice-select.css">
    <!-- perfect scrollbar css -->
    <link rel="stylesheet" href="<?php echo SITE_AVA; ?>assets/css/plugins/perfect-scrollbar.css">
   
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?php echo SITE_AVA; ?>assets/css/style.css">
    <!-- ICONES -->
    <link rel="stylesheet" href="<?php echo SITE_AVA; ?>assets/css/icones/icofont.min.css">

    <!-- BUTTON ON-OFF JS -->
    <link rel="stylesheet" href="<?php echo SITE_AVA; ?>assets/css/plugins/bootstrap4-toggle.min.css">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="<?php echo SITE_AVA; ?>assets/css/custom_new.css">

    <!-- Aulas Style CSS -->
    <link rel="stylesheet" href="<?php echo SITE_AVA; ?>assets/css/aulas_new.css">
    <link rel="stylesheet" href="<?php echo SITE_AVA; ?>assets/css/checkbox.css">

    <link rel="stylesheet" href="<?php echo SITE_AVA; ?>assets/js/swettalert/sweetalert2.min.css">

    

    <?php if(isset($_SESSION['DarkThemeAVA'])){ ?>
        <!-- Dark Style CSS -->
        <link rel="stylesheet" href="<?php echo SITE_AVA; ?>assets/css/dark.css"  id="dark_theme">
    <?php } ?>    

    <base href="<?php echo SITE_AVA; ?>">

</head>

<body>

    <div id="preloader"><div id="status"><div class="spinner"><img src="images/icon01.png"></div></div></div>