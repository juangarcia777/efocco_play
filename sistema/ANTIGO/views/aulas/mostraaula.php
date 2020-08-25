<?php
	
	include("../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM MOSTRADAS */
	$db = new DB();
	$verifica_turma = $db->select("SELECT * FROM turma WHERE id = '$id_turma'");
	$linha_turma = $db->expand($verifica_turma);
	$id_turma = $linha_turma['id'];

	$verifica_disciplina = $db->select("SELECT * FROM disciplinas WHERE id = '$id_disciplina'");
	$linha_disciplina = $db->expand($verifica_disciplina);
	$id_disciplina = $linha_disciplina['id'];

	$verifica_aula = $db->select("SELECT * FROM aula WHERE id = '$id_aula'");
	$linha_aula = $db->expand($verifica_aula);
	$id_aula = $linha_aula['id'];


?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h5 class="txt-light"><?php echo $linha_aula['titulo']; ?>  - <small style="color: #FFF"><?php echo $linha_turma['nome'] .' / '.$linha_disciplina['nome']; ?></h5>
					</div>
					<!-- Breadcrumb -->
					
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

				<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form class="form-horizontal">
												<div class="form-group mb-0">
													<div class="col-sm-12">
														<div class="row">
															

															<div class="col-sm-12">
																<h3 class=""><?php echo $linha_aula['titulo']; ?> </h3>
																<small>CRIADA EM: <?php echo formata_data_hora($linha_aula['data_criacao']); ?></small>
																
																	<div class="panel-wrapper collapse in">
																		<div class="panel-body">
																			

																				<?php

																				if(!empty($linha_aula['video_aula'])) {
																				
																					echo video_aula($linha_aula['video_aula'], $linha_aula['tipo_video']);
																				}

																				?>
<div class="row">

																				<?php if(!empty($linha_aula['link_aovivo']) && $linha_aula['data_final_link_aovivo']>=date("Y-m-d")){ ?>
			<div class="col-md-12 mtop30">
				<div class="texto_aula_grande">Clique no botão abaixo para acessar a aula ao vivo!</div>
			</div>	
			<div class="col-md-12 mtop10">		
				<a href="<?php echo $linha_aula['link_aovivo']; ?>" target="_blank"><button class="btn btn-success btn-lg"><i class="icofont-ui-play"></i> ASSISTIR AULA AO VIVO</button></a>
			</div>	
		<?php } ?>

	
	<?php if(!empty($linha_aula['curriculo_professor'])){ ?>	
		<div class="col-md-12 mtop20" style="color: #000; margin-top: 30px;">
			<h5 class="titulo_aula_grande">Currículo Professor</h5>	
			<?php echo base64_decode($linha_aula['curriculo_professor']); ?>
		</div>	
	<?php } ?>

	<?php if(!empty($linha_aula['objetivo_aula'])){ ?>	
		<div class="col-md-12 mtop20" style="color: #000; margin-top: 30px;">
			<h5 class="titulo_aula_grande">Objetivo da Aula</h5>	
			<?php echo base64_decode($linha_aula['objetivo_aula']); ?>
		</div>	
	<?php } ?>

	<div class="col-md-12 mtop20" style="color: #000; margin-top: 30px;">
		<?php echo base64_decode($linha_aula['apresentacao']); ?>
	</div>	

	<?php if(!empty($linha_aula['doc_complementares'])){ ?>	
		<div class="col-md-12 mtop20" style="color: #000; margin-top: 30px;">
			<h5 class="titulo_aula_grande">Documentos Complementares</h5>	
			<?php echo base64_decode($linha_aula['doc_complementares']); ?>
		</div>	
	<?php } ?>

	<?php if(!empty($linha_aula['ref_bibliograficas'])){ ?>	
		<div class="col-md-12 mtop20" style="color: #000; margin-top: 30px;">
			<h5 class="titulo_aula_grande">Referências Bibliográficas</h5>	
			<?php echo base64_decode($linha_aula['ref_bibliograficas']); ?>
		</div>	
	<?php } ?>

</div>

																			
																		</div>
																	</div>
															</div>

														</div>
													</div>	
												</div>
											</form>
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
										<h6 class="panel-title txt-dark">Clique para baixar os arquivos desta aula</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-md-12">
												<h4 class="mb-10"></h4>
												<div class="row">
													<div class="col-lg-12">
														<?php

														$verifica_arquivos = $db->select("SELECT * FROM arquivos_aula WHERE id_aula = '$id_aula'");

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
																	</div>
																';
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
			
