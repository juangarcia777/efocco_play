<?php
	
	include("../../includes/topo.php");
?>
<style>
	.btn-success {
		font-size: 12px;
	}
	#eye {
		text-align: center;
	}
</style>
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

				<div class="row">
					<div class="col-sm-12">
					<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Aulas</h6>
									</div>
									<div class="clearfix"></div>
								</div>


							<?php require '../../controlers/alunos/pega_aulas.php' ?>


							</div>
					</div>
				</div>
				



				<!-- Row -->
				<div class="row">
					

				<!-- Bordered Table -->
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">atividades a serem entregues</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
										  <table class="table table-hover table-bordered mb-0">
											<thead>
											  <tr>
												<th>Atividades</th>
												<th>Data de Entrega</th>
												<th style="text-align:center">Atividades</th>
												</tr>
											</thead>
											<tbody>

											<?php require '../../controlers/alunos/lista_for_disciplinas.php'; ?>

											</tbody>
										  </table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Bordered Table -->
				</div>
				<!-- Row -->

			

			

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
