<?php
	
	include("../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM EDITADAS */
	$db = new DB();
	$verifica = $db->select("SELECT titulo FROM questionarios WHERE id='$id' LIMIT 1");
	$linha = $db->expand($verifica);

	$verifica_aluno = $db->select("SELECT nome FROM users WHERE id='$id_aluno' LIMIT 1");
	$linha_aluno = $db->expand($verifica_aluno);

	$verifica_quest = $db->select("SELECT data_hora FROM resp_quest_aluno WHERE id_aluno='$id_aluno' AND id_quest='$id' LIMIT 1");
	$linha_quest = $db->expand($verifica_quest);

?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light"><?php echo $linha['titulo']; ?></h5>
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
								<h6 ><strong>Nota:</strong> <?php echo NotaQuestionario($id, $id_aluno); ?></h6>
								<h6><strong>Aluno:</strong> <?php echo $linha_aluno['nome']; ?></h6>
								<h6 class="mb-10"><strong>Data Resposta:</strong> <?php echo formata_data_hora($linha_quest['data_hora']); ?></h6>		

							</div>
							<div class="panel-wrapper collapse in" >
								<div class="panel-body">
									
									
									<?php
                        	
                        	$correcao = $db->select("SELECT perguntas.*, resp_quest_aluno.resp_aluno, resp_quest_aluno.resp_correta_dissertativa, resp_quest_aluno.id AS id_correcao 
                        	FROM perguntas
							INNER JOIN resp_quest_aluno ON perguntas.id=resp_quest_aluno.id_pergunta
							WHERE resp_quest_aluno.id_quest = '$id' AND id_aluno='$id_aluno'
							");$i=1;
                            	while($line = $db->expand($correcao)){
                            		

                            		$resp_correta = '';
                            		$line['resp_correta'] = strtolower($line['resp_correta']);
									$line['resp_aluno'] = strtolower($line['resp_aluno']);

			                        if($line['resp_correta']=='a'){$resp_correta=$line['resp_a'];}
			                        if($line['resp_correta']=='b'){$resp_correta=$line['resp_b'];}
			                        if($line['resp_correta']=='c'){$resp_correta=$line['resp_c'];}
			                        if($line['resp_correta']=='d'){$resp_correta=$line['resp_d'];}
			                        if($line['resp_correta']=='e'){$resp_correta=$line['resp_e'];}	

			                        $resp_aluno = '';
			                        if($line['resp_aluno']=='a'){$resp_aluno=$line['resp_a'];}
			                        if($line['resp_aluno']=='b'){$resp_aluno=$line['resp_b'];}
			                        if($line['resp_aluno']=='c'){$resp_aluno=$line['resp_c'];}
			                        if($line['resp_aluno']=='d'){$resp_aluno=$line['resp_d'];}
			                        if($line['resp_aluno']=='e'){$resp_aluno=$line['resp_e'];}			                                			
                        ?>
                    			
                    				<div class="">
			                        
			                            <h6 class="mb-10"><strong><?php echo $i.') '.$line['pergunta']; ?></strong></h6>
			                            <div class="post-content-questionario">

			                          	<?php
			                            	if($line['tipo_pergunta']!=2){	
			                           	?>


			                                	<?php if($line['resp_aluno']==$line['resp_correta']){ ?>
				                                	<div class="col-md-12 alert alert-success mtop10">
					                                <label style="margin-bottom: 0 !important">
					                                	<i class="fa fa-check" aria-hidden="true"></i>
					                                	<?php echo $resp_correta; ?>
					                                </label>
					                            </div>
				                            	
				                            	<?php } else { ?>

					                            	<div class="col-md-12 alert alert-danger mtop10">
						                                <label style="margin-bottom: 0 !important">
						                                	<i class="fa fa-times" aria-hidden="true"></i>
						                                	<?php echo $resp_aluno; ?>
						                                </label>
					                            	</div>

			                                	<?php } ?>

										
										<?php 
											} else {
										?>

											<div class="row mbottom20">
											<div class="col-md-12">

												<?php if($line['resp_correta_dissertativa']==1){ ?>
													<span class="resp_correta"><i class="fa fa-check" aria-hidden="true"></i> Resposta correta.</span><br>
												<?php } else if($line['resp_correta_dissertativa']==2){ ?>	
													<span class="resp_errada"><i class="fa fa-times" aria-hidden="true"></i> Resposta errada.</span><br>
												<?php } ?>	

												<span class="resposta_dissertativa_aluno">
													<?php echo nl2br($line['resp_aluno']); ?>
												</span>

											</div>

											<?php if($line['resp_correta_dissertativa']==0){ ?>
												
												<div class="col-md-12 mtop10">
													<form method="post" action="controlers/professor/cadastro/salva_correcao_questionario.php">	
														
														<input type="hidden" value="<?php echo $line['id_correcao']; ?>" name="id_correcao">

														<input type="hidden" value="<?php echo $id_aluno; ?>" name="id_aluno">
														<input type="hidden" value="<?php echo $id_aula; ?>" name="id_aula">
														<input type="hidden" value="<?php echo $id; ?>" name="id_questionario">


														<button class="btn btn-success" name="correcao" value="1">CORRETO</button>
														<button class="btn btn-danger" name="correcao" value="2">ERRADO</button>
													</form>	
												</div>	

											<?php } ?>	

											</div>


										<?php 
											}
										?>				             
			                                
			                                
			                            </div>
			                        </div>
			                       

			            <?php
                        	$i++; 
                        }
						?>  	


								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /Row -->

				


			</div>

			<div class=" col-sm-6">
						<a href="questionarios-respondidos/<?php echo $id; ?>/<?php echo $id_aula; ?>" class="btn btn-danger pull-left"><span class="btn-text">voltar</span></a>
					</div>
			
			<?php

			include("../../includes/rodape.php");

			?>
			