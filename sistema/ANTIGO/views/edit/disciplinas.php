<?php
	
	include("../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM EDITADAS */
	$db = new DB();
	$verifica = $db->select("SELECT * FROM disciplinas WHERE id = '$id'");
	$linha = $db->expand($verifica);
?>
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
							<h5 class="txt-light">Edição de Informações de Disciplina</h5>
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
											<form method="post" action="controlers/edit/edita_disciplina.php" >
												<input type="hidden" name="id_disciplina" value="<?php echo $id; ?>">

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
														<label class="control-label mb-10 text-left">Horário</label>
														<input type="text" class="form-control" name="horario"

														<?php echo '

														value="'.$linha['horario'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Turno</label>
														<input type="text" class="form-control" name="turno"

														<?php echo '

														value="'.$linha['turno'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Professor</label>
														<select class="form-control" name="professor">
															<?php

																$prof = $linha['professor'];
																$seleciona_nomeprof = $db->select("SELECT * FROM professores WHERE id = '$prof'");
																$linha3 = $db->expand($seleciona_nomeprof);


																echo '<option value="'.$linha3['id'].'">'.$linha3['nome'].'</option>';

																$seleciona2 = $db->select("SELECT * FROM professores WHERE id != '$prof' ORDER BY nome");

																while ($linha2 = $db->expand($seleciona2)) {

																	echo '<option value="'.$linha2['id'].'">'.$linha2['nome'].'</option>';

																}

															?>
														</select>
													</div>
												</div>

												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Apresentação</label>
														<textarea class="tinymce" name="apresentacao">
															<?php
																echo $ContentDecoded = base64_decode($linha['apresentacao']);
															?>
														</textarea>
													</div>
												</div>

												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label text-left">Turmas</label>
														<div class="panel-wrapper collapse in">
															<div class="panel-body">
																<p class="text-muted"> Selecione as turmas, caso haja, em que a disciplina está contida</p>
																<div class="row mt-40">
																		<select multiple id="public-methods" name="turmas[]">

																			<?php

																				// SELECIONA AS TURMAS QUE A DISCIPLINA ESTÁ CADASTRADA
																				$seleciona2 = $db->select("SELECT * FROM turma_disciplinas WHERE id_disciplina='$id'");

																				$turmas_cadastradas=array();

																				while ($linha2 = $db->expand($seleciona2)) {
																					// SELECIONO O ID DA TURMA E FAÇO A BUSCA PELO NOME DELA
																					$busca_turma = $linha2['id_turma'];
																					$seleciona_turma = $db->select("SELECT * FROM turma WHERE id='$busca_turma'");
																					$linha3 = $db->expand($seleciona_turma);

																					echo '<option selected value="'.$linha3['id'].'">'.$linha3['nome'].'</option>';

																					array_push($turmas_cadastradas, $linha3['id']);

																				}

																			?>


																			<?php

																				$seleciona2 = $db->select("SELECT * FROM turma ORDER BY nome");

																				while ($linha2 = $db->expand($seleciona2)) {

																					if (!in_array($linha2['id'], $turmas_cadastradas)) {
																						echo '<option value="'.$linha2['id'].'">'.$linha2['nome'].'</option>';
																					}
																				}

																			?>
																		</select>
																		<div class="button-box"> 
																			<a id="select-all" class="btn btn-danger btn-outline mr-10 mt-15" href="#">selecionar todos</a> 
																			<a id="deselect-all" class="btn btn-info btn-outline mr-10 mt-15" href="#">remover todos</a>
																		</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												

												<div class="col-md-12">
													<hr>
													<button class="btn  btn-success" type="submit" style="float: right;">Alterar</button>
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
			