<?php 
require("config.php"); 
$session = new SESSION();
$session->UserLogado();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>EFOCCO - Escola Técnica e Treinamentos</title>
		
		<meta name="author" content="SIS TECNOLOGIA"/>
		<!--GOOGLE TAGS-->            
	    <meta name="keywords" content="escola tecnica, efocco, cursos, ead, lencois paulista" />
	    <meta name="robots" content="no follow" />
	    <meta name="author" content="SIS Tecnologia" />
	    <meta name="description" content="Efocco / Efocco Play a sua plataforma de cursos on-line."/>

	    
		
		<!-- Favicon -->
		<link rel="icon" href="<?php echo RAIZ_AVA; ?>favicon.ico" type="image/x-icon">
		
		<!-- vector map CSS -->
		<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		<!-- Custom CSS -->
		<link href="assets/css/style.css" rel="stylesheet" type="text/css">
		<link href="assets/css/custom2.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		
		<div class="wrapper pa-0">
		
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">

						<div class="table-cell vertical-align-middle">

							<div class="auth-form  ml-auto mr-auto no-float">
								
								<div class="alert alert-success text-center alerta-index msg_sucesso thin upper" 
									<?php if(isset($_SESSION['logout'])){
										echo 'style="display:block;"'; 
										unset($_SESSION['logout']);
									}?>>
								        Logout efetuado com sucesso!
							    </div>



							    <?php
							    if (isset($_SESSION['ErrorAVA'])) {
							    	echo '
							    		<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<i class="ti-na pr-15"></i>'.$_SESSION['ErrorAVA'].'
										</div>
										';
							    	unset($_SESSION['ErrorAVA']);
							    }
							    ?>

								<div class="panel panel-default card-view mb-0">
									<div class="panel-heading">
										<div style="text-align: center;">
											<img src="assets/imgs/logos/efocco_logo.png">
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="panel-wrapper collapse in">
										<div class="panel-body">
											<div class="row">
												<div class="col-sm-12 col-xs-12">
													<div class="form-wrap">
														<form action="login" method="post">
															<div class="form-group">
																<label class="control-label mb-10" for="exampleInputEmail_2">CPF</label>
																<div class="input-group">
																	<input type="text" class="form-control cpf" required="required" id="exampleInputEmail_2" placeholder="CPF" name="usuario">
																	<div class="input-group-addon"><i class="icon-doc"></i></div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label mb-10" for="exampleInputpwd_2">Senha</label>
																<div class="input-group">
																	<input type="password" class="form-control" required="required" id="exampleInputpwd_2" placeholder="Senha" name="password">
																	<div class="input-group-addon"><i class="icon-lock"></i></div>
																</div>
															</div>
															
															
															<div class="form-group">
																<button type="submit" class="btn btn-success btn-block">login</button>
															</div>
														</form>
													</div>
												</div>	
											</div>
										</div>

									</div>

								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="assets/js/jquery.slimscroll.js"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="assets/js/dropdown-bootstrap-extended.js"></script>
		
		<!-- Init JavaScript -->
		<script src="assets/js/init.js"></script>

		<script src="js/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
		<script src="js/custom2_new.js"></script>
	</body>
</html>
