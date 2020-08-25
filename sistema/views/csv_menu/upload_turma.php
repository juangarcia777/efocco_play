<?php
	
	include("../../includes/topo.php");
?>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper">

			<?php

				include("../../includes/menu_topo.php");

			?>

			<?php

				include("../../includes/menu_admin.php");

			?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">UPLOAD DE ARQUIVO CSV - TURMA</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<ol class="breadcrumb">
							<li class="active"><span>página inicial</span></li>
						</ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				

				<!-- Row -->
					<div class="row">

						<div class="col-sm-12">

							<div class="alert alert-warning alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="ti-alert pr-15"></i><a href="<?php echo ADMIN_DIR; ?>views/csv_menu/csv_padrao/turmas.csv" style="color: white;">Clique aqui</a> para fazer o download do padrão de CSV para upload da Turma!
							</div>

							<?php

							if (isset($_SESSION['retorna_csv_turmas']) && $_SESSION['retorna_csv_turmas'] == 1) {
								# ERRO DE ENVIO DE ARQUIVO CSV

								echo '

									<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<i class="ti-na pr-15"></i>Eita! Houve algum erro na importação do seu CSV. 
									</div>

								';

							}

							else if (isset($_SESSION['retorna_csv_turmas']) && $_SESSION['retorna_csv_turmas'] == 2) {

								echo '

								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<i class="ti-check pr-15"></i>Eba! Seu CSV de Turmas foi importado com sucesso! 
								</div>


								';

							}

							else if (isset($_SESSION['retorna_csv_turmas']) && $_SESSION['retorna_csv_turmas'] == 3) {

								echo '

									<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<i class="ti-na pr-15"></i>Ops! O arquivo que você subiu não é do tipo CSV (.csv). 
									</div>

								';

							}

							unset($_SESSION['retorna_csv_turmas']);

							?>

							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">UPLOAD DE ARQUIVO CSV</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
												<form method="post" action="controlers/csv/leitura_csv_turmas.php" enctype="multipart/form-data">
													<div class="form-group mb-30">
														<label class="control-label mb-10 text-left">Carregar Arquivo</label>
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
															<span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Selecionar Arquivo</span> <span class="fileinput-exists btn-text">Alterar</span>
															<input type="file" name="file" required="required">
															</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remover</span></a> 
														</div>
													</div>
												<button class="btn  btn-success" type="submit" style="float: right;">Enviar</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->

				<!-- /Row -->
			</div>


			<?php

			include("../../includes/rodape.php");

			?>


		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    <?php

    		include("../../includes/include_js.php");

    ?>

</body>
</html>
