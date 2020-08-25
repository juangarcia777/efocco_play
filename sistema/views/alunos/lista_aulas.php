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

				include("../../includes/menu.php");

			?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">EFOCCO - Escola Técnica e Treinamentos</h5>
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
					

				<!-- Bordered Table -->
					<div class="col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Todas as Aulas</h6>
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
												<th>Disciplina</th>
												<th>Data de Entrega</th>
												</tr>
											</thead>
											<tbody>

											<?php require '../../controlers/alunos/lista_atividades.php'; ?>

											 
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
			
				<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="add-event-wrap">
											<div class="calendar-event btn btn-success">My Event One <a href="javascript:void(0);" class="remove-calendar-event"><i class="fa fa-times fa-fw"></i></a></div>
											<div class="calendar-event btn btn-info">My Event Two <a href="javascript:void(0);" class="remove-calendar-event"><i class="fa fa-times fa-fw"></i></a></div>
											<div class="calendar-event btn btn-warning">My Event Three <a href="javascript:void(0);" class="remove-calendar-event"><i class="fa fa-times fa-fw"></i></a></div>
											<div class="calendar-event btn btn-primary">My Event Four <a href="javascript:void(0);" class="remove-calendar-event"><i class="fa fa-times fa-fw"></i></a></div>
										</div>
										<div class="calendar-wrap mt-40">
										  <div id="calendar"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

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
