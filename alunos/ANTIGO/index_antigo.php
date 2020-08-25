<?php 
require("config.php"); 
$session = new SESSION();
$session->UserLogado();
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
                  
                  <div class="col-md-12 text-center mtop20 mbottom10">
                    <p class="info-login">Informe seu CPF e senha para<br> acessar o sistema.</p>
                  </div>

                  <form method="post" action="login" class="formulario-form">
                    
                    <?php
                      @session_start();
                      if(isset($_SESSION['ErrorAVA'])){
                        echo '<div class="col-md-12 mbottom20">';
                        echo '<div class="alert alert-danger text-pequeno">';
                          echo '<i class="icofont-warning"></i> '.$_SESSION['ErrorAVA'];
                        echo '</div>';
                        echo '</div>';
                        unset($_SESSION['ErrorAVA']);
                      }
                    ?>

                    
                      <div class="col-md-12">
                        <label class="login-label">CPF</label>
                        <input type="text" class="form-control cpf" name="cpf" required>                        
                      </div>  

                      <div class="col-md-12 mtop10">
                        <label class="login-label">Senha</label>
                        <input class="form-control" name="password" type="password" required>                        
                      </div>  
                    
                    <div class="col-md-12 mtop20">
                      <button type="submit" class="submit-btn">
                        <i class="icofont-spinner icon-button-form-post hide"></i> 
                        <i class="icofont-ui-play"></i>
                        Acessar
                      </button>                
                    </div>

                    <div class="col-md-12 text-center mtop30">
                      <a href="" class="texto-varios hide">Primeiro acesso? Clique aqui!</a>

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