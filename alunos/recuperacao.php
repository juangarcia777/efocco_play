<?php 
require("config.php"); 
?>
<!DOCTYPE html>
<html lang="en-gb">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo TITLE; ?></title>
    <link rel="icon" href="<?php echo RAIZ_AVA; ?>favicon.ico" type="image/x-icon">
    <meta name="keywords" content="escola tecnica, efocco, cursos, ead, lencois paulista" />
      <meta name="robots" content="follow,index,all" />
      <meta name="author" content="SIS Tecnologia" />
      <meta name="description" content="Efocco Play a sua plataforma de cursos on-line."/>

    <base href="<?php echo SITE_AVA; ?>">
    
    <link rel="shortcut icon" type="image/png" href="https://via.placeholder.com/16x16" >
    <link rel="stylesheet" href="assets/css/icones/icofont.min.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">        
    <link rel="stylesheet" href="assets/css/custom_new2.css" />
    <link rel="stylesheet" href="assets/css/<?php echo COLOR; ?>" />
    <link rel="stylesheet" href="assets/css/login/login.css" />
    
</head>

<body style="background-image: url(../images/<?php echo BACKGROUND; ?>);">

<div id="preloader"><div id="status"><div class="spinner"><img src="images/icon01.png"></div></div></div>

      <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">


        <div class="col-md-5">
        <div class="card padding-login-card ">

                <center><img src="../images/<?php echo LOGO_LOGIN; ?>" style="max-height: 70px"></center>
                  
                  <div class="col-md-12 text-center mtop20 mbottom10">
                    <p class="info-login">Recuperação de acesso.</p>
                  </div>

                  <form method="post" class="formulario-form">
                    
                      <div class="col-md-12">
                        <label class="login-label">Digite seu E-mail</label>
                        <input type="text" class="form-control " id="email" name="email" required>                        
                      </div>  

                    <div class="col-md-12 mtop20" id="localButton">
                      <button type="button" id="enviar" class="submit-btn">
                        <i class="icofont-spinner icon-button-form-post hide"></i> 
                        <i class="icofont-email"></i>
                        Enviar e-mail
                      </button>  
                    </div>

                    <div class="col-md-12 mtop20 hide" id="load">
                      <button type="button" id="enviar" class="submit-btn">
                      <div class="spinner-border text-light" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      </button>  
                    </div>

                  </form>

        </div>      

        <div class="col-md-12 mtop20">
                    <center><small class="copy">Todos os Direitos Reservados <b>Efocco Play</b> 2020</small></center>
                  </div> 

        </div>      


      </div>
      </div>



<?php require ("includes/footer.php"); ?>

<script src="./assets/js/recuperacao.js"></script>