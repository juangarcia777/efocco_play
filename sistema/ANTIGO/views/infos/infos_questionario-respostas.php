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
                        	
                        	$correcao = $db->select("SELECT perguntas.*, resp_quest_aluno.resp_aluno FROM perguntas
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
			                        
			                            <h6 class="mb-10"><?php echo $i.') '.$line['pergunta']; ?></h6>
			                            <div class="post-content-questionario">

			                          

			                                	<?php
			                                		if($line['resp_aluno']==$line['resp_correta']){			                                			
			                                	?>
				                                	<div class="col-md-12 alert alert-success mtop10">
					                                <label style="margin-bottom: 0 !important">
					                                	<i class="fa fa-check" aria-hidden="true"></i>
					                                	<?php echo $resp_correta; ?>
					                                </label>
					                            </div>
				                            	
				                            	<?php
			                                		} else {
			                                	?>

			                                		

				                            		<div class="col-md-12 alert alert-danger mtop10">
					                                <label style="margin-bottom: 0 !important">
					                                	<i class="fa fa-times" aria-hidden="true"></i>
					                                	<?php echo $resp_aluno; ?>
					                                </label>
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
			