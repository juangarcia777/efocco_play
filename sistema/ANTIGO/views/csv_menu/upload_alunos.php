<?php
	
	include("../../includes/topo.php");
?>



        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">UPLOAD DE ARQUIVO CSV - ALUNOS</h5>
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

							<a target="_blank" href="views/csv_menu/csv_padrao/padrao_upload_aluno.xlsx" style="color: white;">
							<div class="alert alert-success alert-dismissable" style="margin-bottom: 4px">								
								<i class=" ti-download pr-5"></i><b>Clique aqui</b> para fazer o download do arquivo padrão de XLS/XLSX para upload de alunos!
								
							</div>
							</a>

							<div class="alert alert-warning alert-dismissable">								
								
								<i class="ti-info-alt pr-5"></i> A primeira linha do arquivo, deve ser o CABEÇALHO, igual no arquivo padrão.
								<br>
								<i class="ti-info-alt pr-5"></i>Seu arquivo deverá ser igual ao modelo, em colunas. Caso não tenha a informação mantenha a coluna em branco. o CPF e Nome são obrigatórios.
							</div>

							 

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
												<form method="post" action="controlers/csv/leitura_csv_alunos.php" enctype="multipart/form-data">
													<div class="form-group mb-30">
														<label class="control-label mb-10 text-left">Carregar Arquivo</label>
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
															<span class="input-group-addon fileupload btn btn-danger btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Selecionar Arquivo</span> <span class="fileinput-exists btn-text">Alterar</span>
															<input type="file" name="file" required="required">
															</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remover</span></a> 
														</div>
													</div>
													<hr>
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
		</div>

			<?php

			include("../../includes/rodape.php");

			?>


