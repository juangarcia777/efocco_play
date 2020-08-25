<?php 
require("config.php"); 
?>
<!DOCTYPE html>
<html lang="en-gb">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Efocco Play</title>
    <link rel="icon" href="<?php echo RAIZ_AVA; ?>favicon.ico" type="image/x-icon">
    <meta name="keywords" content="escola tecnica, efocco, cursos, ead, lencois paulista" />
      <meta name="robots" content="follow,index,all" />
      <meta name="author" content="SIS Tecnologia" />
      <meta name="description" content="Efocco Play a sua plataforma de cursos on-line."/>
    
    <link rel="shortcut icon" type="image/png" href="https://via.placeholder.com/16x16" >
    <link rel="stylesheet" href="assets/css/icones/icofont.min.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">        
    <link rel="stylesheet" href="assets/css/custom_new.css" />
    <link rel="stylesheet" href="assets/css/login/login.css" />
    
</head>

<body>

<div id="preloader"><div id="status"><div class="spinner"><img src="images/icon01.png"></div></div></div>

      <div class="container h-100">
      <div class="row h-100 justify-content-center align-items-center">


        <div class="col-md-5">
        <div class="card padding-login-card ">

                <center><img src="images/logo-junto.png" style="max-height: 70px"></center>
                  
                  <div class="col-md-12 text-center mtop30 mbottom20">
                  	<h6>SISTEMA EM ATUALIZAÇÃO</h6>
                    <p class="info-login">Bom dia, estamos atualizando nossa plataforma para melhorar seu aprendizado.
                    	<br><br>
                    	Nossa previsão de retorno é hoje <b><?php echo date("d/m"); ?> às 12hs.</b>

                    </p>
                  </div>

             

        </div>      

        <div class="col-md-12 mtop20">
                    <center><small class="copy">Todos os Direitos Reservados <b>Efocco Play</b> 2020</small></center>
                  </div> 

        </div>      


      </div>
      </div>



<?php require ("includes/footer.php"); ?>