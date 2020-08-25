<?php
	
	include("../../../includes/topo.php");

	$db = new DB();
	$verifica_turma = $db->select("SELECT * FROM turma WHERE id = '$id_turma'");
	$linha_turma = $db->expand($verifica_turma);
	$id_turma = $id_turma;
	

	$verifica_disciplina = $db->select("SELECT disciplinas.*, professores.nome AS nome_professor 
	FROM disciplinas
	LEFT JOIN professores ON disciplinas.professor=professores.id
	WHERE disciplinas.id = '$id_disciplina' LIMIT 1");
	$linha_disciplina = $db->expand($verifica_disciplina);
	$id_disciplina = $linha_disciplina['id'];
?>
	
			
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h5 class="txt-light">Nova Aula - <small style="color: #FFF"><?php echo $linha_turma['nome'] .' / '.$linha_disciplina['nome']; ?></small></h5>
							
						</div>
						<!-- Breadcrumb -->
						
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
											<form method="post" action="controlers/professor/cadastro/salva_aula.php" >
												<input type="hidden" name="id_disciplina" value="<?php echo $id_disciplina ?>">
												<input type="hidden" name="id_turma" value="<?php echo $id_turma ?>">
												<div class="col-md-7">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Título</label>
														<input type="text" class="form-control" name="titulo" required="required">
													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Data de Liberação da Aula</label>
														<input type="date"class="form-control" name="data_liberacao">
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Ao vivo&nbsp;</label>
														<a onclick="javascript:aovivo()" class="btn btn-primary" data-toggle="collapse" href="#collapseExample" >
													    Aula Ao vivo
													</a>
													</div>
													
												</div>	

												<div class="col-md-12">
												<div class="collapse" id="collapseExample">
													<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label mb-10 text-left">Link Ao Vivo (Link Completo)</label>
															<input type="text" class="form-control" name="link_aovivo" >
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label mb-10 text-left">Data da Aula Ao Vivo</label>
															<input type="date"class="form-control" name="data_aovivo">
														</div>
													</div>
													</div>
												</div>	
												</div>


												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Vídeo Aula <small>(Link Vimeo)</small></label>
														<input type="text" class="form-control" name="video_aula"  style="text-transform: initial !important;">
													</div>
												</div>

											
												<div class="col-md-6" style="display: none;">
													<div class="form-group">
														<label class="control-label mb-10 text-left"></label>
														<div class="checkbox checkbox-primary">
															<input id="checkbox2" type="checkbox" name="permite_upload">
															<label for="checkbox2">Alunos poderão subir arquivos nesta aula</label>
														</div>
														<div class="checkbox checkbox-success">
															<input id="checkbox3" type="checkbox" name="permite_upload_atrasado">
															<label for="checkbox3">Alunos poderão subir arquivos depois da data máxima de upload </label>
														</div>
													</div>
												</div>

												<div class="col-md-6" style="display: none;">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Data Máxima Upload Arquivos Alunos</label>
														<input type="date" class="form-control" name="data_limite_upload">
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
													<textarea class="tinymce" name="glossario"></textarea>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_2">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_2" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> Currículo Professor</a>
												</div>
												<div id="collapse_2" class="panel-collapse collapse" role="tabpanel">
													<textarea class="tinymce" name="curriculo_professor"></textarea>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_3">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_3" aria-expanded="false" ><i class="glyphicon glyphicon-plus"></i> Objetivo da Aula</a>
												</div>
												<div id="collapse_3" class="panel-collapse collapse" role="tabpanel">
													<textarea class="tinymce" name="objetivo_aula"></textarea>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_4">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_4" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> Conteúdo da Aula</a>
												</div>
												<div id="collapse_4" class="panel-collapse collapse" role="tabpanel">
													<textarea class="tinymce" name="apresentacao"></textarea>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_5">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_5" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> Documentos Complementares</a>
												</div>
												<div id="collapse_5" class="panel-collapse collapse" role="tabpanel">
													<textarea class="tinymce" name="doc_complementares"></textarea>
												</div>
											</div>
											<div class="panel panel-default">
												<div class="panel-heading" role="tab" id="heading_6">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_6" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i> Referências Bibliograficas</a>
												</div>
												<div id="collapse_6" class="panel-collapse collapse" role="tabpanel">
													<textarea class="tinymce" name="ref_bibliograficas"></textarea>
												</div>
											</div>

										</div>
									</div>
								</div>												


</div>
</div>




												<div class="col-sm-12" style="margin-top:10px;margin-bottom:10px">
												<div class="alert alert-warning alert-dismissable">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													<i class="ti-alert pr-15"></i>Você pode disponibilizar arquivos para esta aula depois do cadastro.
												</div>
												</div>

												<div class="col-md-12">													
													<button class="btn  btn-success" type="submit" style="float: right;">Adicionar</button>
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

				include("../../../includes/rodape.php");

				?>
		