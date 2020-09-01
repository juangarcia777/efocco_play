<?php require ("../../includes/header.php"); ?>
<?php require ("../../includes/modais.php"); ?>
<?php require ("../../includes/menu.php"); 
$hoje= date('Y-m-d');
?>

<?php
$DadosCurso = $Pesquisa->DadosCurso();
?>



<main>
<div class="main-wrapper pt-80">
<div class="container">

			<div class="row">

						<?php if($_SESSION['email_existe']==0): ?>
						<div class="col-sm-12 mb-3">
							<div class="alert alert-danger" role="alert">
								Atenção ! Seu email não esta cadastrado, <a href="profile" class="alert-link">Clique aqui</a> para cadastrá-lo.
							</div>
						</div>
						<?php endif; ?>


        			<div class="col-md-12 ">

                       
						<div class="card">
                        	<div class="post-title d-flex align-items-center">
                            	<div class="posted-author d-flex align-items-center">
                                    <h3 class="author "><?php echo $DadosCurso['nome']; ?></h3>
									<?php
									$liberado= true;
									if($DadosCurso['data_entrada'] != '0000-00-00' && $DadosCurso['data_entrada'] > $hoje): ?>
										<div class="alert alert-warning ml-5" role="alert">
											<strong>Atenção !</strong> Esta turma será liberada em <strong><?php echo data_mysql_para_user($DadosCurso['data_entrada']); ?></strong>
										</div>
									<?php
									$liberado=false;
									endif;
									?>

                                </div>

                                <div class="post-settings-bar hide">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <div class="post-settings arrow-shape">
                                        <ul>
                                            <li><a href="informacoes">Informações do curso</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					
					


                    <div class="col-md-12 ">

                    	<div class="row">

                    		<?php
                            $disciplinas_curso = $Pesquisa->ListaDisciplinasCurso();
                            if(!empty($disciplinas_curso)){
                            	while($line = $db->expand($disciplinas_curso)){
                            		
                            		$DadosDisciplina = $Pesquisa->DadosDisciplina($line['id_disciplina']);

									$aulas_conc= $Pesquisa->ListaAulasDisciplina($line['id_disciplina']);
									
									$x=0;

									if(!empty($aulas_conc)){
									while($n= $db->expand($aulas_conc)){
											if($n['concluido'] != 0) {
												$x++;
											}
										}
									}

									
									$qt_aulas= $DadosDisciplina['aulas'];
									$qt_aulas_concluidas= $x;
									if($qt_aulas==0){
										$pct_final= 0;
									} else {
									$pct= ($qt_aulas_concluidas / $qt_aulas) * 100; 
									$pct_final= round($pct);
									}
								
                            ?>

                    		<div class="col-md-4 mtop20">

								<?php if($liberado==true): ?>
									<a href="materia/<?php echo $line['id_disciplina']; ?>/<?php echo normaliza($line['nome']); ?>">
								<?php else: ?>
									<a >
								<?php endif; ?>
								<div class="card card-border-bottom card-aula">

											<div aria-label="Aulas não assistidas" data-balloon-pos="up" class="bg-danger text-center views-aula">
												<?php if($pct_final != 100): ?>
													<p class="text-light"><i class="icofont-eye-blocked"></i> <?php echo ($qt_aulas-$qt_aulas_concluidas) ?></p>
												<?php endif; ?>
												
											</div>

											

											<h4 class="widget-title-materia"><?php echo $line['nome']; ?></h4>
											<div class="post-meta">
												<ul class="comment-share-meta">
														<li data-toggle="tooltip" title="Aulas Disponíveis">
															<span class="post-comment">
																<i class="icofont-read-book-alt"></i>
																<span><?php echo Numeros($DadosDisciplina['aulas']); ?></span>
															</span>
														</li>
														<li data-toggle="tooltip" title="Arquivos Complementares">
															<span class="post-share">
																<i class="icofont-file-alt"></i>
																<span><?php echo Numeros($DadosDisciplina['arquivos']); ?></span>
															</span>
														</li>
														<li data-toggle="tooltip" title="Avaliações">
															<span class="post-share">
																<i class="icofont-list"></i>
																<span><?php echo Numeros($DadosDisciplina['questionarios']); ?></span>
															</span>
														</li>
													</ul>                                 
											</div>
											
											<!-- Barra de Progresso -->
											<div class="mt-2">
												<div class="progress">
													<div class="progress-bar bg-success" role="progressbar"
													style="width: <?php echo $pct_final; ?>%;"
													aria-valuenow="25" aria-valuemin="0" 
													aria-valuemax="100">

														<?php if($pct_final==0): ?>
															<p class="text-default" style="font-weight:bold" >0%</p>
														<?php else: ?>
															<?php echo $pct_final; ?>%
														<?php endif; ?>
														
													</div>
												</div>
											</div>
											<!-- ---------------------- -->

											<?php //print_r($_SESSION['infos_gerais']); ?>

											<div class="mt-2">
												<a class="btn btn-secondary btn-sm text-light" href="boletim/<?php echo $line['id_disciplina']; ?>"><i class="icofont-law-document"></i>&nbsp;&nbsp;Acompanhamento</a>
											</div>
										
		                        </div>
		                    	</a>
		                    </div>    

		                    <?php
							}}
							
						
							?>
					

                    	</div>			
                    </div>	

			</div>
		</div>
	</div>
</main>


<?php require ("../../includes/footer.php");?>

<?php

	if(isset($_SESSION['aviso_ativo']) && $_SESSION['aviso_ativo'] == true) {
		echo "<script>$('#modal_aviso').modal();</script>";
	}

?>

<!--  AREA DO CÓDIGO DO CHAT -->
<?php
$busca= $db->select("SELECT script_chat FROM configuracoes ");
if($db->rows($busca)){
	$x= $db->expand($busca);
	echo $x['script_chat'];
}
?> 
