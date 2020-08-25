<?php
require ("../../config.php");
//$_SESSION['QuestionarioSelecionadoAVA'] = $id;
$DadosAluno = $Pesquisa->DadosAluno();
$DadosQuestionario = $Pesquisa->DadosQuestionario($id);
$respondeu = $Pesquisa->AlunoRespondeuQuestionario($id);
$invalido =0;
$NotaQuestionario['dissertativas']=0;
if(!empty($respondeu)){$NotaQuestionario = $Pesquisa->NotaQuestionario(0,$id);}
$DadosQuestionario['data_entrega'];
$frase = '';
$exibe =1;
?>

<form method="post" action="save-questionario" id="FormPostQuestionarioResponde">

<input type="hidden" name="id_questionario" value="<?php echo $id; ?>">
<input type="hidden" name="id_aula" value="<?php echo $DadosQuestionario['id_aula']; ?>">
<input type="hidden" name="id_materia" value="<?php echo $DadosQuestionario['id_materia']; ?>">


<div class="row">

					<?php 
                    if(!empty($respondeu)){
                    ?>
                    	<div class="col-md-12 mbottom20">
                    		<div class="alert alert-info">
                    			<i class="icofont-verification-check"></i> Você respondeu este questionário em <b><?php echo formata_data_hora($respondeu); ?></b>. Confira sua nota abaixo.
                    			
                    		</div>	
                    	</div>	
                    <?php		
                    	} else {
                    		

                    		if($DadosQuestionario['data_liberacao_aula']!='0000-00-00'){


                    			$DadosQuestionario['data_entrega'] = date('Y-m-d', strtotime('+7 days', strtotime($DadosQuestionario['data_liberacao_aula'])));
                    			
                    			
                    		}

                    		if($DadosQuestionario['data_entrega']!='0000-00-00' && $DadosQuestionario['data_entrega']<date("Y-m-d")){  
                    			$invalido = 1;	
                    			

                    		}   

                    		

                    		if($DadosAluno['data_cadastro']!='0000-00-00' ){   
                    			
                    			$soma_data = date('Y-m-d', strtotime('+10 days', strtotime($DadosAluno['data_cadastro'])));
                    			$DadosQuestionario['data_entrega'] = $soma_data;

                    			if($soma_data>=date("Y-m-d")){
                    				$invalido=0;                    				                    				
                    			}    

                    		   				
                    			

                    		}    

                    		
                    ?>

                    	
                   	
                   	<?php		
                    	}
                    ?>	 		
                    

                    <?php 

                    	$frase = ' A data limite para resposta deste questionário foi <b>'.data_mysql_para_user($DadosQuestionario['data_entrega']).'</b>';
                    	
                    	if($DadosQuestionario['somente_dia']!='0000-00-00'){
                    		$DadosQuestionario['data_entrega'] = $DadosQuestionario['somente_dia'];
                    		
                    		$frase = ' A data limite para resposta deste questionário foi <b>'.data_mysql_para_user($DadosQuestionario['data_entrega']).'</b>';	

                    		if($DadosQuestionario['somente_dia']>date("Y-m-d")){
                    		
                    			$frase = ' O questionário somente pode ser respondido em <b>'.data_mysql_para_user($DadosQuestionario['data_entrega']).' das '.substr($DadosQuestionario['tempo1'],0,5).'h às '.substr($DadosQuestionario['tempo2'],0,5).'h </b>';	

                    		} 

                    		
                    		if($DadosQuestionario['somente_dia']==date("Y-m-d")){
                    			$invalido=0;     
                    			$exibe =1;               			
                    			
                    			if($DadosQuestionario['tempo1']>date("H:i:s")){
                    				$invalido=1; $exibe =0;                     				
                    			} 		
                    			
                    			if($DadosQuestionario['tempo2']<date("H:i:s")){
                    				$invalido=1; $exibe =0;
                    				                 				
                    			}  

                    			$frase = ' Este questionário somente pode ser respondido em <b>'.data_mysql_para_user($DadosQuestionario['data_entrega']).' das '.substr($DadosQuestionario['tempo1'],0,5).'h às '.substr($DadosQuestionario['tempo2'],0,5).'h </b>';

                    		} else {
                    			$invalido=1;
                    			$exibe =1;
                    			
                    		}	
                    	}


                    	
                    ?>		


                    <?php if($invalido==1 && empty($respondeu)){ ?>
                    	<div class="col-md-12 mbottom20">
                    		<div class="alert alert-warning">
                    			<i class="icofont-warning"></i><?php echo $frase; ?>. 
                    		</div>	
                    	</div>
                    <?php } ?>

                    
	
	<div class="col-md-12">

						
                    		
						<?php
						if(!empty($respondeu)){	 $exibe=1;						
						?>
							<div class="col-md-12 text-center">                        
								<h3 class="nota mtop10"><?php echo $NotaQuestionario['nota_aluno']; ?></h3>
							</div>

							<div class="col-md-12 text-center mbottom30">                        
								<span class="nota_aviso">
								<?php if($NotaQuestionario['dissertativas']==0){ ?>	
									Você acertou <b><?php echo Numeros($NotaQuestionario['acertos']); ?></b> questões 
									de um total de <b><?php echo Numeros($NotaQuestionario['total_perguntas']); ?></b>.
									<br>
									Confira o gabarito de erros e acertos abaixo.
								<?php } else { ?>		
									A avaliação contém uma ou mais questões dissertativas.<br>
									<b><i class="icofont-warning"></i>  Aguarde a correção dessas questões pelo professor</b>, para saber a sua nota.<br>
									Confira abaixo o gabarito de respostas.
									<br><br>
								<?php } ?>			
								</span>                                    
							</div>
						<?php	
						}
						?>




<?php if($exibe==1){?>

						<h4 class="mbottom30"><?php echo $DadosQuestionario['titulo']; ?></h4>

                    	<?php
                    		if(empty($respondeu)){
                    			$questionario = $Pesquisa->QuestoesQuestionario($id);
                    			
                    		} else {
                    			$questionario = $Pesquisa->NotaQuestionario(1,$id);	

                    		}
                        	
                        	if(!empty($questionario)){

                        		

                        		$x=1;
                            	while($line = $db->expand($questionario)){

                            		if(!empty($respondeu) && $line['tipo_pergunta']!=2){
                            			$resp_correta = '';
                            			$line['resp_correta'] = strtolower($line['resp_correta']);
										$line['resp_aluno'] = strtolower($line['resp_aluno']);
									}

			                      

                        ?>
                    			
                    				<div class="card">
			                        
			                            <h4 class="widget-title-questionario mbottom30">
			                            	<?php echo $x.') '.$line['pergunta']; ?>
			                            </h4>

			                            
			                            <?php if(!empty($respondeu) && $NotaQuestionario['dissertativas']==0){?>

			                            	<?php if($line['tipo_pergunta']!=2){ ?>	
			                            		
			                            		<h7> Resposta Correta: <?php echo strtoupper($line['resp_correta']); ?></h7>
			                            		<?php if($line['resp_correta']==$line['resp_aluno']){ ?>
				                            		<span class="responde_correto">Você acertou essa questão.</span>
				                            	<?php } else { ?>
				                            		<span class="responde_errado">Você errou essa questão.</span>
				                            	<?php } ?>	

			                            	<?php } else { ?>		

			                            		<?php if($line['resp_correta_dissertativa']==1){ ?>
				                            		<span class="responde_correto">Você acertou essa questão.</span>
				                            	<?php } else if($line['resp_correta_dissertativa']==2){ ?>
				                            		<span class="responde_errado"><i class="icofont-error"></i> Você errou essa questão.</span>
				                            	<?php } ?>	

			                            	<?php } ?>			
			                          
			                            <?php } ?>


			                            <div class="post-content-questionario mtop10">

			                            	<?php if(!empty($line['imagem'])) { ?>
			                            		<img src="../arquivos/aulas/<?php echo $line['imagem']; ?>" class="img-fluid mbottom20">
			                            	<?php } ?>


			                            	<input type="hidden" class="qtd-perguntas-quest" name="pergunta_id[]" value="<?php echo $line['id']; ?>">
			                                
			                            

			                            <?php if($line['tipo_pergunta']==2){ ?>	

			                            	<?php if(!empty($respondeu)){?>
			                            		<span class="resposta_dissertativa"><?php echo nl2br($line['resp_aluno']); ?></span>
			                            	<?php } else { ?>	
			                            		<textarea <?php if(!empty($invalido)){echo 'disabled';} ?> required name="resposta[<?php echo $line['id']; ?>]" class="form-control" style="height: 210px" ></textarea>
			                            	<?php }  ?>		

			                        	<?php } ?>	


			                            <?php  if($line['tipo_pergunta']!=2){ ?>	

			                            <div class="row">


			                                	<?php if(!empty($line['resp_a'])){ ?>
				                                <div class="col-md-12">
					                                <label>
					                                	<?php if(empty($respondeu)){ ?>
					                                		<input type="radio" name="resposta[<?php echo $line['id']; ?>]" value="a&@&<?php echo $line['id']; ?>" required <?php if(!empty($invalido)){echo 'disabled';} ?>>
					                                	<?php } ?>

					                                	<?php
					                                	if(!empty($respondeu) && $NotaQuestionario['dissertativas']==0){
					                                		if($line['resp_aluno']=='a'){

					                                			if($line['resp_aluno']==$line['resp_correta']){
					                                				echo '<i class="icofont-verification-check resp_correta"></i>';
					                                			} else {

					                                				echo '<i class="icofont-error resp_errada"></i>';

					                                			}

					                                		} 	
					                                	}
					                                	?>

					                                	&nbsp;a) <?php echo $line['resp_a']; ?>
					                                </label>
				                            	</div>
				                            	<?php } ?>

				                            	<?php if(!empty($line['resp_b'])){ ?>
				                                <div class="col-md-12">
					                                <label>
					                                	<?php if(empty($respondeu) && $NotaQuestionario['dissertativas']==0){ ?>
					                                		<input type="radio" name="resposta[<?php echo $line['id']; ?>]" value="b&@&<?php echo $line['id']; ?>" required <?php if(!empty($invalido)){echo 'disabled';} ?>>
					                                	<?php } ?>

					                                	<?php
					                                	if(!empty($respondeu)){
					                                		if($line['resp_aluno']=='b'){

					                                			if($line['resp_aluno']==$line['resp_correta']){
					                                				echo '<i class="icofont-verification-check resp_correta"></i>';
					                                			} else {

					                                				echo '<i class="icofont-error resp_errada"></i>';

					                                			}

					                                		} 	
					                                	}
					                                	?>
					                                	

					                                	&nbsp;b) <?php echo $line['resp_b']; ?>
					                                </label>
				                            	</div>
				                            	<?php } ?>

				                            	<?php if(!empty($line['resp_c'])){ ?>
				                                <div class="col-md-12">
					                                <label>
					                                	<?php if(empty($respondeu) && $NotaQuestionario['dissertativas']==0){ ?>
					                                		<input type="radio" name="resposta[<?php echo $line['id']; ?>]" value="c&@&<?php echo $line['id']; ?>" required <?php if(!empty($invalido)){echo 'disabled';} ?>>
					                                	<?php } ?>	

					                                	<?php
					                                	if(!empty($respondeu)){
					                                		if($line['resp_aluno']=='c'){

					                                			if($line['resp_aluno']==$line['resp_correta']){
					                                				echo '<i class="icofont-verification-check resp_correta"></i>';
					                                			} else {

					                                				echo '<i class="icofont-error resp_errada"></i>';

					                                			}

					                                		} 	
					                                	}
					                                	?>

					                                	&nbsp;c) <?php echo $line['resp_c']; ?>
					                                </label>
				                            	</div>
				                            	<?php } ?>

				                            	<?php if(!empty($line['resp_d'])){ ?>
				                                <div class="col-md-12">
					                                <label>
					                                	<?php if(empty($respondeu)  && $NotaQuestionario['dissertativas']==0){ ?>	
					                                		<input type="radio" name="resposta[<?php echo $line['id']; ?>]" value="d&@&<?php echo $line['id']; ?>" required <?php if(!empty($invalido)){echo 'disabled';} ?>>
					                                	<?php } ?>
					                                		
					                                	<?php
					                                	if(!empty($respondeu)){
					                                		if($line['resp_aluno']=='d'){

					                                			if($line['resp_aluno']==$line['resp_correta']){
					                                				echo '<i class="icofont-verification-check resp_correta"></i>';
					                                			} else {

					                                				echo '<i class="icofont-error resp_errada"></i>';

					                                			}

					                                		} 
					                                	}	
					                                	?>

					                                	&nbsp;d) <?php echo $line['resp_d']; ?>
					                                </label>
				                            	</div>
				                            	<?php } ?>

				                            	<?php if(!empty($line['resp_e'])){ ?>
				                                <div class="col-md-12">
					                                <label>
					                                	<?php if(empty($respondeu) && $NotaQuestionario['dissertativas']==0){ ?>		
					                                		<input type="radio" name="resposta[<?php echo $line['id']; ?>]" value="e&@&<?php echo $line['id']; ?>" required <?php if(!empty($invalido)){echo 'disabled';} ?>>
					                                	<?php } ?>

					                                	<?php
					                                	if(!empty($respondeu)){
					                                		if($line['resp_aluno']=='e'){

					                                			if($line['resp_aluno']==$line['resp_correta']){
					                                				echo '<i class="icofont-verification-check resp_correta"></i>';
					                                			} else {

					                                				echo '<i class="icofont-error resp_errada"></i>';

					                                			}

					                                		} 	
					                                	}
					                                	?>

					                                	&nbsp;e) <?php echo $line['resp_e']; ?>
					                                </label>
				                            	</div>
				                            	<?php } ?>

				                                

				                            </div>	

				                        	<?php } ?>	
			                                



			                                
			                            </div>
			                        </div>
			                       

			            <?php
                        	$x++; }}
						?>          
                    	
			
                    </div>	

                    <?php if(empty($respondeu) && empty($invalido)){?>
                    <div class="col-md-12 mtop20 text-center">
                    	<button type="button" class="finaliza-btn botao-responde-questionario"><i class="icofont-verification-check"></i> Finalizar </button>                    	
                    </div>	
                	<?php } ?>

</div>	


<?php } ?>

</form>


