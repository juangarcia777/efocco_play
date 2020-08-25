<?php include("../../includes/topo.php"); ?>
<?php
$Pesquisa = new PESQUISAS();
$DadosProfessor = $Pesquisa->DadosProfessor();
?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				<div class="row">


					<div class="col-md-12 mt-20">						
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<h4>
										Bem vindo(a)
										<?php  
										if($AdministradorAVA!=0){
											echo 'Administrador';
										} else {
											echo $DadosProfessor['nome'];
										}
										?>
									</h4>
																		
								</div>
							</div>	
						</div>			
					</div>	



					<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">GERENCIAMENTO DE AULAS</h6>
									</div>
									
								</div>
								
									
									<div class="panel-body">
										<div class="form-wrap">
											
												<div class="row">
												<form method="post" action="home">
													<div class="col-md-6 mt-10">
													
															<select class="form-control " name="turma" required>
																<option value="">-- SELECIONE UMA TURMA --</option>
																<?php

																	if(isset($turma) && $turma!=0){
																		$verifica = $db->select("SELECT id, nome FROM turma WHERE id='$turma' LIMIT 1");
																		$linha = $db->expand($verifica);
																		echo '<option selected value="'.$linha['id'].'">'.$linha['nome'].'</option>';

																		echo '<option value="0">Todas as turmas</option>';
																	} else if(isset($turma) && $turma==0){
																		echo '<option value="0" selected>Todas as turmas</option>';
																	} else {
																		echo '<option value="0">Todas as turmas</option>';
																	}
																	

																	$verifica = $db->select("SELECT id, nome FROM turma ORDER BY nome");

																	while ($linha = $db->expand($verifica)) {

																		echo '
																			<option value="'.$linha['id'].'">'.$linha['nome'].'</option>
																		';

																	}

																?>
															</select>


													</div>

													<div class="col-md-1 mt-10">
															<select class="form-control " name="registros">
																<?php
																	if(isset($registros)){
																		echo '<option value="'.$registros.'" selected>'.$registros.'</option>';		
																	} else {
																		echo '<option value="5" selected>5</option>';		
																	}
																?>
																<option value="5">5</option>
																<option value="10">10</option>
																<option value="20">20</option>
																<option value="Todas">Todas</option>
															</select>
													</div>		
													<div class="col-md-2 mt-10">
														<button type="submit" class="btn btn-primary">FILTRAR</button>
													</div>	
												</form>
												</div>

										</div>
										</div>		
									</div>
					</div>	



					
					<?php if(isset($_POST['turma'])){ ?>	
						<div class="row">
						<div class="col-md-12 ">
							

							<?php
							if($turma==0){	
								$tpp = $db->select("SELECT id, nome FROM turma ORDER BY nome");
							} else {
								$tpp = $db->select("SELECT id, nome FROM turma WHERE id='$turma' LIMIT 1");	
							}
							
							
							if($registros == 'Todas'){
								$registros= ''; 
							} else {
								$registros = 'LIMIT '.$registros; 
							}


							while($row_line = $db->expand($tpp)){

								$id_turma = $row_line['id'];

								echo '<div class="col-sm-12">';
								echo '<div class="panel panel-default card-view">';

								echo '<h5><strong>'.$row_line['nome'].'</strong></h5>';

								$verifica_dis = $db->select("SELECT disciplinas.*, turma_disciplinas.id_disciplina AS idd  
								FROM disciplinas 
								LEFT JOIN turma_disciplinas ON disciplinas.id=turma_disciplinas.id_disciplina					
								WHERE turma_disciplinas.id_turma='$id_turma'
								GROUP BY turma_disciplinas.id_disciplina
								");	
							
								while($line = $db->expand($verifica_dis)){

									$id_dis = $line['id'];
									$verifica_aula = $db->select("SELECT aula.*, arquivos_aula.id AS arquivos, questionarios.id AS questionario
										FROM aula 
										LEFT JOIN arquivos_aula ON aula.id=arquivos_aula.id_aula
										LEFT JOIN questionarios ON aula.id=questionarios.id_aula
										WHERE aula.id_disciplina='$id_dis' AND aula.id_turma='$id_turma'
										GROUP BY aula.id
										ORDER BY aula.data_exibicao DESC 
										$registros
										");
										
										if($db->rows($verifica_aula)){


							?>			

								

									<div class="table-wrap mb-10">
									<div class="table-responsive">
										<h6><strong><?php echo $line['nome']; ?></strong></h6>
									<table id="aulas" class="table table-hover  pb-30 mt-10">
										<thead>
											<tr>
												<th width="2%">ID</th>
												<th width="20%">Aulas</th>
												<th>Criação</th>
												<th>Liberação</th>
												<th align="center">Vídeo</th>
												<th align="center">Glossário</th>
												<th align="center">Objetivo</th>
												<th align="center">Conteúdo</th>
												<th align="center">Doc. Comp.</th>
												<th align="center">Referências</th>
												<th align="center">Arquivos</th>
												<th align="center">Questionário</th>
											</tr>
										</thead>
																				
										<tbody>
											<?php		
												
												$x = $db->rows($verifica_aula);
												while ($linha_aula = $db->expand($verifica_aula)) {

												echo '<tr>';
													echo '<td>'.$x.'</td>';
													echo '<td>'.$linha_aula['titulo'].'</td>';

													echo '<td>'.data_mysql_para_user($linha_aula['data']).'</td>';
													echo '<td>'.data_mysql_para_user($linha_aula['data_exibicao']).'</td>';
													echo '<td align="center">';
														if(!empty($linha_aula['video_aula'])){
															echo '<i class="fa fa-check verde" aria-hidden="true"></i>';
														}
													echo '</td>';
													echo '<td align="center">';
														if(!empty($linha_aula['glossario'])){
															echo '<i class="fa fa-check verde" aria-hidden="true"></i>';
														}
													echo '</td>';
													echo '<td align="center">';
														if(!empty($linha_aula['objetivo_aula'])){
															echo '<i class="fa fa-check verde" aria-hidden="true"></i>';
														}
													echo '</td>';
													echo '<td align="center">';
														if(!empty($linha_aula['apresentacao'])){
															echo '<i class="fa fa-check verde" aria-hidden="true"></i>';
														}
													echo '</td>';
													echo '<td align="center">';
														if(!empty($linha_aula['doc_complementares'])){
															echo '<i class="fa fa-check verde" aria-hidden="true"></i>';
														}
													echo '</td>';
													echo '<td align="center">';
														if(!empty($linha_aula['ref_bibliograficas'])){
															echo '<i class="fa fa-check verde" aria-hidden="true"></i>';
														}
													echo '</td>';

													echo '<td align="center">';
														if(!empty($linha_aula['arquivos'])){
															echo '<i class="fa fa-check verde" aria-hidden="true"></i>';
														}
													echo '</td>';

													echo '<td align="center">';
														if(!empty($linha_aula['questionario'])){
															echo '<i class="fa fa-check verde" aria-hidden="true"></i>';
														}
													echo '</td>';
												echo '</tr>';
												
												$x--;
												}
											?>
										</tbody>
									</table>
									</div>
									</div>

								
								
								<?php		
									}
									}
								?>
								
								</div>
								</div>											
											
						

					<?php }

						echo '</div>';
						echo '</div>';

					} 
					?>		
											
										
								


					
				</div>	
			</div>			
		</div>        

    
<?php include("../../includes/rodape.php"); ?>
