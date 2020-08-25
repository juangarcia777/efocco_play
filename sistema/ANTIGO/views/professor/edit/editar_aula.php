<?php
	
	include("../../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM MOSTRADAS */
	$db = new DB();
	$verifica_aula = $db->select("SELECT * FROM aula WHERE id = '$id_aula'");
	$linha_aula = $db->expand($verifica_aula);
	$id_aula = $linha_aula['id'];

	$verifica_disciplina = $db->select("SELECT * FROM disciplinas WHERE id = '$id_disciplina'");
	$linha_disciplina = $db->expand($verifica_disciplina);
	$id_disciplina = $linha_disciplina['id'];

	$verifica_turma = $db->select("SELECT * FROM turma WHERE id = '$id_turma'");
	$linha_turma = $db->expand($verifica_turma);
	$id_turma = $linha_turma['id'];
?>
	
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg  bg-blue">
						
						<h5 class="txt-light"><?php echo $linha_aula['titulo']; ?> - <small style="color: #FFF"><?php echo $linha_turma['nome'] .' / '.$linha_disciplina['nome']; ?></small></h5>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 style="font-size:18px" class="panel-title txt-dark">Preencha o Formulário</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<div class="row">
											<form method="post" enctype="multipart/form-data" action="controlers/professor/edit/edita_aula.php" >
												<input type="hidden" name="id_disciplina" value="<?php echo $id_disciplina ?>">
												<input type="hidden" name="id_turma" value="<?php echo $id_turma ?>">
												<input type="hidden" name="id_aula" value="<?php echo $id_aula ?>">

												<div class="col-md-8">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Título</label>
														<input type="text" class="form-control" name="titulo" required="required"

														<?php
														echo 'value="'.$linha_aula['titulo'].'"';
														?>

														>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Data de Liberação</label>
														<input type="date" class="form-control" name="data_liberacao"

														<?php

														echo 'value="'.$linha_aula['data_exibicao'].'"';

														?>

														>
													</div>
												</div>

												<div class="col-md-8">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Link Ao Vivo</label>
														<input type="text" class="form-control" value="<?php echo $linha_aula['link_aovivo'] ?>" name="link_aovivo">
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Data da Aula Ao Vivo</label>
														<input type="date" class="form-control" name="data_aovivo" 
														<?php

														echo 'value="'.$linha_aula['data_final_link_aovivo'].'"';

														?>

														>
													</div>
												</div>

												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Vídeo Aula</label>
														<input type="text" class="form-control" name="video_aula"

														<?php

														echo 'value="'.$linha_aula['video_aula'].'"';

														?>

														>
													</div>
												</div>

												<div class="col-md-4" style="display: none;">
													<div class="form-group">
														<label class="control-label mb-10 text-left"></label>
														<div class="checkbox checkbox-primary">
															<input id="checkbox2" type="checkbox" name="permite_upload"
															<?php

																if ($linha_aula['permite_upload'] == 1) {
																	 echo 'checked';
																}

															 ?>

															>
															<label for="checkbox2">Alunos poderão subir arquivos nesta aula</label>
														</div>
														<div class="checkbox checkbox-success">
															<input id="checkbox3" type="checkbox" name="permite_upload_atrasado" 
															<?php

																if ($linha_aula['permite_upload_atrasado'] == 1) {
																	 echo 'checked';
																}

															 ?>

															>
															<label for="checkbox3">Alunos poderão subir arquivos depois da data máxima de upload </label>
														</div>
													</div>
												</div>

												<div class="col-md-4" style="display: none;">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Data Máxima Upload Arquivos Alunos</label>
														<input type="date" class="form-control" <?php echo 'value="'.$linha_aula['data_limite_upload'].'"'; ?> name="data_limite_upload">
													</div>
												</div>



<div class="row">
<div class="col-md-12">
							<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="panel-group accordion-struct" id="accordion_1" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default">
												<div class="panel-heading " role="tab" id="heading_1">
													<a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_1" aria-expanded="true"><i class="glyphicon glyphicon-plus"></i> Glossário da Aula</a> 
												</div>
												<div id="collapse_1" class="panel-collapse collapse" role="tabpanel">
													<textarea class="tinymce" name="glossario"><?php echo base64_decode($linha_aula['glossario']); ?></textarea>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_2">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_2" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> Currículo Professor</a>
												</div>
												<div id="collapse_2" class="panel-collapse collapse" role="tabpanel">
													<textarea class="tinymce" name="curriculo_professor"><?php echo base64_decode($linha_aula['curriculo_professor']);?></textarea>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_3">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_3" aria-expanded="false" ><i class="glyphicon glyphicon-plus"></i> Objetivo da Aula</a>
												</div>
												<div id="collapse_3" class="panel-collapse collapse" role="tabpanel">
													<textarea class="tinymce" name="objetivo_aula"><?php echo base64_decode($linha_aula['objetivo_aula']);?></textarea>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_4">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_4" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> Conteúdo da Aula</a>
												</div>
												<div id="collapse_4" class="panel-collapse collapse" role="tabpanel">
													<textarea class="tinymce" name="apresentacao"><?php echo base64_decode($linha_aula['apresentacao']);?></textarea>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_5">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_5" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> Documentos Complementares</a>
												</div>
												<div id="collapse_5" class="panel-collapse collapse" role="tabpanel">
													<textarea class="tinymce" name="doc_complementares"><?php echo base64_decode($linha_aula['doc_complementares']);?></textarea>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_6">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_6" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> Referências Bibliograficas</a>
												</div>
												<div id="collapse_6" class="panel-collapse collapse" role="tabpanel">
													<textarea class="tinymce" name="ref_bibliograficas"><?php echo base64_decode($linha_aula['ref_bibliograficas']);?></textarea>
												</div>
											</div>

										</div>
									</div>
								</div>												


</div>
</div>



												<div class="col-md-12">
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

					
				
				<?php

				include("../../../includes/rodape.php");

				?>
				
			