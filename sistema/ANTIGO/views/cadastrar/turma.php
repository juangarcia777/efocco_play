<?php
	
	include("../../includes/topo.php");
?>
	
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
							<h5 class="txt-light">Cadastro de Turma</h5>
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
											<form method="post" action="controlers/cadastros/salva_turma.php">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Nome</label>
														<input type="text" class="form-control" name="nome" required="required">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Unidade</label>
														<input type="text" class="form-control" name="unidade">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Período Letivo</label>
														<input type="text" class="form-control" name="periodo_letivo">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Curso</label>
														<select class="form-control" name="id_curso" required>
															<option>--escolha--</option>
															<?php

																$seleciona = $db->select("SELECT * FROM cursos ORDER BY nome");

																while ($linha = $db->expand($seleciona)) {

																	echo '<option value="'.$linha['id'].'">'.$linha['nome'].'</option>';

																}

															?>
														</select>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Data de Abertura</label>
														<input type="date" class="form-control" name="data_entrada">
													</div>
												</div>


												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Coordenador da Turma</label>
														<select class="form-control" name="coordenador_turma">
															<option value="">---escolha---</option>
															<?php

																$seleciona = $db->select("SELECT * FROM professores WHERE turma_coordenador!='0' ORDER BY nome");

																while ($linha = $db->expand($seleciona)) {

																	echo '<option value="'.$linha['id'].'">'.$linha['nome'].'</option>';

																}

															?>
														</select>
													</div>
												</div>



												<div class="col-md-12">



													<div class="form-group">
														<label class="control-label mb-10 text-left">Disciplinas</label>
														
															
																<p class="text-muted"> Selecione as disciplinas que para a turma</p>
																<div class="row mt-10">
																	<div class="col-sm-12">
																		<select multiple id="public-methods" name="disciplinas[]">
																			<?php

																				$seleciona = $db->select("SELECT * FROM disciplinas ORDER BY nome");

																				while ($linha = $db->expand($seleciona)) {

																					echo '<option value="'.$linha['id'].'">'.$linha['nome'].'</option>';

																				}

																			?>
																		</select>
																		<div class="button-box"> 
																			<a id="select-all" class="btn btn-success  mr-10 mt-15" href="#">selecionar todos</a> 
																			<a id="deselect-all" class="btn btn-danger btn-outline mr-10 mt-15" href="#">remover todos</a>
																		</div>
																	</div>
																</div>
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
				
		