<?php
require ("../../config.php");

$id = $_SESSION['QuestionarioSelecionadoAVA'];
$NotaQuestionario = $Pesquisa->NotaQuestionario();
$DadosQuestionario = $Pesquisa->DadosQuestionario($id);

?>

<div class="row">	
	<div class="col-md-12 text-center">
    	 <span class="nota_aviso">Confira sua nota abaixo:</span>
    </div>

    <div class="col-md-12 text-center">                        
		<h3 class="nota mtop10"><?php echo $NotaQuestionario['nota_aluno']; ?></h3>
	</div>		                            
			                    
	<div class="col-md-12 text-center">                        
		<span class="nota_aviso">
			Você acertou <b><?php echo Numeros($NotaQuestionario['acertos']); ?></b> questões de um total de <b><?php echo Numeros($NotaQuestionario['total_perguntas']); ?></b>.<br>
			Confira o gabarito de erros e acertos abaixo.
		</span>                                    
	</div>	


	<div class="col-md-12 mtop40">
                    	
                    	<?php
                        	$correcao = $Pesquisa->NotaQuestionario(1);                        	
                        	if(!empty($correcao)){                        		
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
                    			
                    				<div class="card">
			                        
			                            <h4 class="widget-title-questionario mbottom30"><?php echo $line['pergunta']; ?></h4>
			                            <div class="post-content-questionario">

			                            	
			                                <div class="row">

			                                	<?php
			                                		if($line['resp_aluno']==$line['resp_correta']){			                                			
			                                	?>
				                                <div class="col-md-12 alert alert-success">
					                                <label style="margin-bottom: 0 !important">
					                                	<i class="icofont-verification-check resp_correta"></i>
					                                	<input type="radio" disabled checked>
					                                	&nbsp;<?php echo $resp_correta; ?>
					                                </label>
				                            	</div>
				                            	<?php
			                                		} else {
			                                	?>

			                                		<div class="col-md-12 alert alert-success">
						                                <label style="margin-bottom: 0 !important">
						                                	<i class="icofont-verification-check resp_correta"></i>
						                                	<input type="radio" disabled>
						                                	&nbsp;<?php echo $resp_correta; ?>
						                                </label>
				                            		</div>

				                            		<div class="col-md-12 alert alert-danger mtop10">
					                                <label style="margin-bottom: 0 !important">
					                                	<i class="icofont-error resp_correta"></i>
					                                	<input type="radio" disabled checked>
					                                	&nbsp;
					                                	<?php  
					                                		if(empty($resp_aluno)){
					                                			echo 'Você não respondeu a essa questão.';
					                                		} else {
					                                			echo $resp_aluno;
					                                		}
					                                	?>
					                                </label>
				                            	</div>

			                                	<?php
			                                		}
			                                	?>

				                            	
				                                

				                            </div>	
			                                
			                                
			                            </div>
			                        </div>
			                       

			            <?php
                        	}}
						?>          
                    	
			
                    </div>

</div>

