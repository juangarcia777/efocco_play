<?php
	
	include("../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM EDITADAS */
	$db = new DB();
	$verifica = $db->select("SELECT * FROM turma WHERE id = '$id'");
	$linha = $db->expand($verifica);
?>

			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
							<h5 class="txt-light">Edição de Informações de Turma</h5>
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
											<form method="post" action="controlers/edit/edita_turma.php" >
												<input type="hidden" name="id_turma" value="<?php echo $id; ?>">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Nome</label>
														<input type="text" class="form-control" name="nome" required="required"
														<?php echo '

														value="'.$linha['nome'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Unidade</label>
														<input type="text" class="form-control" name="unidade"

														<?php echo '

														value="'.$linha['unidade'].'"
														
														'; 

														?>


														>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Período Letivo</label>
														<input type="text" class="form-control" name="periodo_letivo"

														<?php echo '

														value="'.$linha['periodo_letivo'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Curso</label>
														<select class="form-control" name="id_curso">

															<?php

																$cr = $linha['id_curso'];

																$seleciona_curso = $db->select("SELECT * FROM cursos WHERE id='$cr' LIMIT 1");

																$linha_curso = $db->expand($seleciona_curso);

																	echo '<option value="'.$linha_curso['id'].'">'.$linha_curso['nome'].'</option>';

																

																

																$seleciona_curso = $db->select("SELECT * FROM cursos WHERE id!='$cr' ORDER BY nome");

																while ($linha_curso = $db->expand($seleciona_curso)) {

																	echo '<option value="'.$linha_curso['id'].'">'.$linha_curso['nome'].'</option>';

																}

															?>
														</select>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Data de Abertura</label>
														<input type="date" class="form-control" name="data_entrada"

															<?php echo '

															value="'.$linha['data_entrada'].'"
															
															'; 

															?>

														>
													</div>
												</div>


												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Coordenador da Turma</label>
														<select class="form-control" name="coordenador_turma">
															
															<?php
															echo '<option value="">-------------</option>';
															$cor_turma = $linha['coordenador_turma'];
															if($cor_turma!=0){	
																$selecionax = $db->select("SELECT * FROM professores WHERE id='$cor_turma' LIMIT 1");

																$linhax = $db->expand($selecionax);

																	echo '<option value="'.$linhax['id'].'" selected>'.$linhax['nome'].'</option>';

															} else {
																echo '<option value="">---escolha---</option>';
															}								

																$selecionax = $db->select("SELECT * FROM professores WHERE turma_coordenador!='0' AND id!='$cor_turma' ORDER BY nome");

																while ($linhax = $db->expand($selecionax)) {

																	echo '<option value="'.$linhax['id'].'">'.$linhax['nome'].'</option>';

																}

															?>
														</select>
													</div>
												</div>


												<div class="col-md-12">



													<div class="form-group">
														<label class="control-label mb-10 text-left">Disciplinas</label>
														
															
																<p class="text-muted"> Selecione as disciplinas para a turma</p>
																<div class="row mt-10">
																	<div class="col-sm-12">
																		<select multiple id="public-methods" name="disciplinas[]">

																			<?php

																				// SELECIONA AS DISCIPLINAS QUE ESTÃO CONTIDAS NAQUELA TURMA
																				$seleciona2 = $db->select("SELECT disciplinas.*, turma_disciplinas.* FROM disciplinas INNER JOIN turma_disciplinas ON disciplinas.id = turma_disciplinas.id_disciplina AND turma_disciplinas.id_turma = '$id'");

																				$turmas_cadastradas=array();

																				while ($linha2 = $db->expand($seleciona2)) {

																					echo '<option selected value="'.$linha2['id_disciplina'].'">'.$linha2['nome'].'</option>';

																					array_push($turmas_cadastradas, $linha2['id_disciplina']);

																				}

																			?>

																			<?php

																				$seleciona2 = $db->select("SELECT * FROM disciplinas ORDER BY nome");

																				while ($linha2 = $db->expand($seleciona2)) {

																					if (!in_array($linha2['id'], $turmas_cadastradas)) {
																						echo '<option value="'.$linha2['id'].'">'.$linha2['nome'].'</option>';
																					}
																					
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
				
		