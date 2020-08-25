<?php include("../../includes/topo.php"); ?>


        <!-- Main Content -->
		
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
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Ingresso de Alunos</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="sm-graph-box">
										<div class="row">
											<div class="col-xs-6">
												<div id="sparkline_1"></div>
											</div>
											<div class="col-xs-6">
												<div class="counter-wrap text-right">
													<span class="counter-cap"><i class="fa  fa-level-up txt-success"></i></span><span class="counter">23</span><span>%</span>
												</div>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Cursos Abertos</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="sm-graph-box">
											<div class="row">
												<div class="col-xs-6">
													<div id="sparkline_2"></div>
												</div>
												<div class="col-xs-6">
													<div class="counter-wrap text-right">
														<span class="counter-cap"><i class="fa  fa-level-up txt-success"></i></span><span class="counter">12</span><span>m</span>
													</div>	
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Visitas Diárias</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="sm-graph-box">
											<div class="row">
												<div class="col-xs-6">
													<div id="sparkline_6"></div>
												</div>
												<div class="col-xs-6">
													<div class="counter-wrap text-right">
														<span class="counter-cap"><i class="fa  fa-level-down txt-danger"></i></span><span class="counter">1122</span>
													</div>	
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						
					</div>
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"><i class="icon-share mr-10"></i>Relação de Alunos com as Visitas diárias</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
                                <div class="panel-body">
									<canvas id="chart_1" height="417"></canvas>	
								</div>
                            </div>
                        </div>
					</div>
				</div>
				<!-- /Row -->
				
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"><i class="icon-pie-chart mr-10"></i>Acesso de Alunos Diários</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<canvas id="chart_6_1" height="280"></canvas>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"><i class="icon-pie-chart mr-10"></i>Atividades</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<canvas id="chart_6" height="280"></canvas>
								</div>
							</div>
						</div>	
					</div>
					<div class="col-lg-6 col-md-12">
                        <div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"><i class="icon-clock mr-10"></i>Status de Atividades</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div id="morris_extra_line_chart" class="morris-chart" style="height:280px;"></div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
				
				<!-- Row -->
				<div class="row">

					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-green">
										<div class="row ma-0">
											<div class="col-xs-5 text-center pa-0 icon-wrap-left">
												<i class="icon-graduation txt-light"></i>
											</div>
											<div class="col-xs-7 text-center data-wrap-right">
												<h6 class="txt-light">Acesso de Alunos</h6>
												<span class="txt-light counter counter-anim">45678</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="row ma-0">
											<div class="col-xs-5 text-center pa-0 icon-wrap-left">
												<i class="icon-graduation txt-light"></i>
											</div>
											<div class="col-xs-7 text-center data-wrap-right">
												<h6 class="txt-light">Alunos Não Acessaram</h6>
												<span class="txt-light counter counter-anim">15842</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-green">
										<div class="row ma-0">
											<div class="col-xs-5 text-center pa-0 icon-wrap-left">
												<i class="icon-doc txt-light"></i>
											</div>
											<div class="col-xs-7 text-center data-wrap-right">
												<h6 class="txt-light">Atividades Entregues</h6>
												<span class="txt-light counter counter-anim">45678</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="row ma-0">
											<div class="col-xs-5 text-center pa-0 icon-wrap-left">
												<i class="icon-doc txt-light"></i>
											</div>
											<div class="col-xs-7 text-center data-wrap-right">
												<h6 class="txt-light">Atividades Não Entregues</h6>
												<span class="txt-light counter counter-anim">15842</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-green">
										<div class="row ma-0">
											<div class="col-xs-5 text-center pa-0 icon-wrap-left">
												<i class="icon-graduation txt-light"></i>
											</div>
											<div class="col-xs-7 text-center data-wrap-right">
												<h6 class="txt-light">Acesso de Professores</h6>
												<span class="txt-light counter counter-anim">45678</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="row ma-0">
											<div class="col-xs-5 text-center pa-0 icon-wrap-left">
												<i class="icon-graduation txt-light"></i>
											</div>
											<div class="col-xs-7 text-center data-wrap-right">
												<h6 class="txt-light">Professores Não Acessaram</h6>
												<span class="txt-light counter counter-anim">15842</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-blue">
										<div class="row ma-0">
											<div class="col-xs-5 text-center pa-0 icon-wrap-left">
												<i class="icon-screen-desktop txt-light"></i>
											</div>
											<div class="col-xs-7 text-center data-wrap-right">
												<h6 class="txt-light">Aulas Publicadas</h6>
												<span class="txt-light counter counter-anim">45678</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-blue">
										<div class="row ma-0">
											<div class="col-xs-5 text-center pa-0 icon-wrap-left">
												<i class="icon-list txt-light"></i>
											</div>
											<div class="col-xs-7 text-center data-wrap-right">
												<h6 class="txt-light">Atividades Publicadas</h6>
												<span class="txt-light counter counter-anim">15842</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>	
				<!-- Row -->
			</div>
			

    
<?php include("../../includes/rodape.php"); ?>
