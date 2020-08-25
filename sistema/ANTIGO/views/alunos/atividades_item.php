<?php
	
	include("../../includes/topo.php");
?>
<link rel="stylesheet" href="<?php echo SISTEMA_DIR ?>src/scss/atividades_item.css">
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

				include("../../includes/menu.php");

			?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

            <?php require '../../controlers/alunos/pega_atividade.php' ?>

				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">EFOCCO - Escola Técnica e Treinamentos </h5>
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
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Atividades Recentes</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="panel-group accordion-struct" id="accordion_1" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default">
												<div class="panel-heading activestate" role="tab" id="heading_1">
													<a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_1" aria-expanded="true">Atividade 1</a> 
												</div>
												<div id="collapse_1" class="panel-collapse collapse in" role="tabpanel">
													<div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer la.<br>
													<div class="col-sm-12">
													<a href="../atividade/1" class="btn btn-success ">IR PARA ATIVIDADE</a>
													</div>
													 </div>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_2">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_2" aria-expanded="false">Atividade 2 </a>
												</div>
												<div id="collapse_2" class="panel-collapse collapse" role="tabpanel">
													<div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica.<br>
													<a href="../atividade/2" class="btn  btn-success  ">IR PARA ATIVIDADE</a> </div>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_3">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_3" aria-expanded="false" >Atividade 3</a>
												</div>
												<div id="collapse_3" class="panel-collapse collapse" role="tabpanel">
													<div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, inable VHS.<br>
													<a href="../atividade/1" class="btn  btn-success  ">IR PARA ATIVIDADE</a>
													</div>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_4">
													<a  class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_4" aria-expanded="false"> Atividade 4</a>
												</div>
												<div id="collapse_4" class="panel-collapse collapse" role="tabpanel">
													<div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, inable VHS.<br>
													<a href="../atividade/1" class="btn  btn-success  ">IR PARA ATIVIDADE</a>
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
