<?php
	
	include("../../includes/topo.php");
?>

			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
							<h5 class="txt-light">Cadastro de Aluno</h5>
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


											<form method="post" action="controlers/cadastros/salva_aluno.php">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Nome</label>
														<input type="text" class="form-control" name="nome_aluno" required="required">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Email</label>
														<input type="email" class="form-control" name="email_aluno">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Celular</label>
														<input type="text" class="form-control celular_ddd" name="celular_aluno" required="required">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Telefone</label>
														<input type="text" class="form-control telefone_ddd" name="telefone_aluno">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Telefone de Trabalho</label>
														<input type="text" class="form-control telefone_ddd" name="telefone_trab_aluno">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">CPF</label>
														<input type="text" class="form-control cpf" name="cpf_aluno" required="required">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">RG</label>
														<input type="text" class="form-control" name="rg_aluno">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">CEP</label>
														<input type="text" class="form-control cep" name="cep">
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Município Nascimento</label>
														<input type="text" class="form-control" name="municipio_nascimento">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Logradouro</label>
														<input type="text" class="form-control" name="logradouro">
													</div>
												</div>


												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Bairro</label>
														<input type="text" class="form-control" name="bairro">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Município</label>
														<input type="text" class="form-control" name="municipio">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Estado</label>
														<input type="text" class="form-control" name="estado" maxlength="2">
													</div>
												</div>

												<div class="col-md-12">



													<div class="form-group">
														<label class="control-label mb-10 text-left">Manutenção de Turmas</label>
														
															
																<p class="text-muted"> Selecione as turmas em que o aluno esta matriculado</p>
																<div class="row mt-10">
																	<div class="col-sm-12">
																		<select multiple id="public-methods" name="turmas[]">

																			<?php

																				$seleciona = $db->select("SELECT * FROM turma ORDER BY nome");

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
