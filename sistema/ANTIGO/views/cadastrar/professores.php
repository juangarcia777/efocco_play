<?php
	
	include("../../includes/topo.php");
?>
	
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
							<h5 class="txt-light">Cadastro de Professor</h5>
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

							
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Preencha o Formulário</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<div class="row">
											<form method="post" action="controlers/cadastros/salva_professores.php">
												<div class="col-md-9">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Nome</label>
														<input type="text" class="form-control" name="nome" required="required">
													</div>
												</div>


												<div class="col-md-3">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Coordenador</label>
														<select class="form-control" name="turma_coordenador">
															<option value="0">NÃO</option>
															<option value="1">SIM</option>
														</select>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">CPF</label>
														<input type="text" class="form-control cpf" name="usuario" required="required">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Senha</label>
														<input type="text" class="form-control" name="senha" required="required">
													</div>
												</div>


												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Currículo</label>
														<textarea class="tinymce" name="curriculo"></textarea>
													</div>
												</div>

												<div class="col-md-12">
													<hr>
													<button class="btn  btn-success" type="submit" style="float: right;">Enviar</button>
												</div>
											</form>
										</div>
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
				
		