<?php
	
	include("../../includes/topo.php");

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
										<h6 style="font-size:18px" class="panel-title txt-dark">ENVIO DE ARQUIVOS</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<div class="row">
											<form method="post" enctype="multipart/form-data" action="controlers/professor/cadastro/upload_arquivos_aulas.php" >
												<input type="hidden" name="id_disciplina" value="<?php echo $id_disciplina ?>">
												<input type="hidden" name="id_turma" value="<?php echo $id_turma ?>">
												<input type="hidden" name="id_aula" value="<?php echo $id_aula ?>">

												<div class="col-md-12">
													<div class="form-group mb-30">
														<label class="control-label mb-10 text-left">Carregar Arquivo</label>
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
															<span class="input-group-addon fileupload btn btn-danger btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Selecionar Arquivo</span> <span class="fileinput-exists btn-text">Alterar</span>
															<input type="file" name="file" required="required">
															</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remover</span></a> 
														</div>
													</div>
												</div>

												<div class="col-md-12">
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

					<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 style="font-size:18px" class="panel-title txt-dark">ARQUIVOS ENVIADOS PARA A AULA</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<div class="col-lg-12">
														

														<?php

														$verifica_arquivos = $db->select("SELECT * FROM arquivos_aula WHERE id_aula = '$id_aula'");
														if($db->rows($verifica_arquivos)){
														while ($linha_arquivos = $db->expand($verifica_arquivos)) {

															
																echo '
																	<div class="file-box">
																		<a target="_blank" href="'.LINK_ARQUIVOS_AULAS.$linha_arquivos['arquivo'].'" download>
																			<div class="file">
																				
																				<div class="icon">
																					<i class="fa fa-files-o"></i>
																				</div>
																				<div class="file-name">
																					'.$linha_arquivos['nome'].'
																					<br>
																					<span>Data Upload: '.data_mysql_para_user($linha_arquivos['data_upload']).'</span>
																				</div>
																			</div>
																		</a>
																		<div>
																			<a href="apaga_arquivo_aula/'.$linha_arquivos['id'].'/'.$id_aula.'">
																			<button class="btn btn-danger btn-anim"><i class="fa fa-trash-o"></i><span class="btn-text">apagar</span></button>
																			</a>
																		</div>
																	</div>

																';

														}} else {

															echo 'Nenhum arquivo adicionado para esta aula.';

														}

														?>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
							
				</div>

				<div class=" col-sm-6">
						<a <?php echo 'href="prof_lista_disciplina/'.$linha_aula['id_turma'].'/'.$linha_aula['id_disciplina'].'"'; ?> class="btn btn-danger pull-left"><span class="btn-text">voltar</span></a>
					</div>	
				
				<?php

				include("../../includes/rodape.php");

				?>
				
			