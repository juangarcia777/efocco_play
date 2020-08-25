<?php include("../../includes/topo.php"); ?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Relatório de Gerencial</h5>
					</div>
					<!-- Breadcrumb -->
					
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->

<div class="row">
				<div class="col-md-12">
		<form method="get" action="relatorios/gerencial" id="FormRelatorioGerencial">
		<input type="hidden" name="pesquisa">	
		<div class="panel panel-default card-view">
			<div class="row">
					

				<div class="col-md-4">					
						<select name="turma" class="form-control" required  onchange="javascript:AVAdisciplinasAulas(this.value); AVAalunoturmas(this.value);" >
						<option value="">--Turma--</option>						
						<?php 
							$id_turma = 0;
							if(isset($turma) && !empty($turma)){
								$id_turma = $turma;
								$sel = $db->select("SELECT id, nome FROM turma WHERE id='$turma' LIMIT 1");
								$row= $db->expand($sel);
								echo '<option value="'.$row['id'].'" selected>'.$row['nome'].'</option>';	
							}

							if($AdministradorAVA!=0){

								$sel = $db->select("SELECT turma.id, turma.nome 
								FROM turma WHERE id!='$id_turma' ORDER BY nome ");

							} else if($CoordenadorTurma!=0){	

								$sel = $db->select("SELECT turma.id, turma.nome 
								FROM turma 
								WHERE id!='$id_turma' AND coordenador_turma='$id_logado' ORDER BY nome ");

							} 
							
							while ($row= $db->expand($sel)) {
								echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
							}
						?>
					</select>	
				</div>	

				<div class="col-md-4">
					<select name="disciplina" id="disciplina"class="form-control" >
					<?php
						if(isset($disciplina) && !empty($disciplina)){

							$sel = $db->select("SELECT disciplinas.nome 
							FROM disciplinas
							WHERE id='$disciplina'
							LIMIT 1");
							$line = $db->expand($sel);
							echo '<option selected value="'.$disciplina.'">'.$line['nome'].'</option>';
						}
						
						if(isset($turma) && !empty($turma)){
							
							//if(isset($disciplina) && empty($disciplina)){	 	
								echo '<option value="">--Todos os módulos/disciplinas--</option>';
							//}

							$sel = $db->select("SELECT disciplinas.nome, turma_disciplinas.id_disciplina 
							FROM disciplinas
							INNER JOIN turma_disciplinas ON disciplinas.id=turma_disciplinas.id_disciplina
							WHERE turma_disciplinas.id_turma='$turma' 
							ORDER BY disciplinas.nome");

							if($db->rows($sel)){
								while($line = $db->expand($sel)){
									echo '<option value="'.$line['id_disciplina'].'">'.$line['nome'].'</option>';
								}
							} 

							
						
						} else {
							echo '<option value="">--Módulo--</option>';
						}	
					?>
						

					</select>	
				</div>

				<div class="col-md-4">
					<select class="form-control select2 input-lg" name="aluno" id="aluno">
						<?php
							$id_al = 0;
							if(isset($aluno) && !empty($aluno)){

								$id_al = $aluno;
								$show = $db->select("SELECT id, nome FROM users WHERE id='$aluno' LIMIT 1");
								$line_a = $db->expand($show);
								echo '<option selected value="'.$line_a['id'].'">'.$line_a['nome'].'</option>';
								echo '<option value="">--Todos os alunos--</option>';

							} else {

								echo '<option value="">--Todos os alunos--</option>';

							}	

							if(isset($turma) && !empty($turma)){

								$sel = $db->select("SELECT users.nome, users.id AS id_aluno, turma_alunos.id
								FROM users  
								INNER JOIN turma_alunos ON users.id=turma_alunos.id_aluno
								WHERE turma_alunos.id_turma='$turma'
								GROUP BY users.cpf
								ORDER BY users.nome
								");

								if($db->rows($sel)){
									
									
									while($row = $db->expand($sel)){

										echo '<option value="'.$row['id_aluno'].'">'.$row['nome'].'</option>';

									}

									//echo '</optgroup>';

								} else {
									echo '<option value="">Nenhum aluno encontrado.</option>';
								}

							}


						?>
						
														
					</select>
				</div>	

				<div class="col-md-2 mtop10">
					<button class="btn btn-success btn-block">FILTRAR</button>	
				</div>	
			</div>				
		</div>	
		</form>
	</div>
</div>

<?php 
	if(isset($turma)){ 


?>

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						

									<?php

										$q='';
										if(isset($disciplina) && !empty($disciplina)){
											$q = " AND turma_disciplinas.id_disciplina='$disciplina'";
										}

										$sql_disciplinas = $db->select("SELECT turma_disciplinas.id_disciplina, disciplinas.nome 
															FROM turma_disciplinas 
															INNER JOIN disciplinas ON turma_disciplinas.id_disciplina=disciplinas.id
															WHERE turma_disciplinas.id_turma='$turma' $q
															GROUP BY turma_disciplinas.id_disciplina
															ORDER BY disciplinas.nome
														");

										if($db->rows($sql_disciplinas)){
											while($line_disciplinas= $db->expand($sql_disciplinas)){

												$id_disciplina = $line_disciplinas['id_disciplina'];

												echo '
												<div class="panel panel-default card-view">						
												<div class="panel-wrapper collapse in">
												<div class="panel-body">
												';

												echo '<h6>'.$line_disciplinas['nome'].'</h6>';


												$q='';
												if(isset($aluno) && !empty($aluno)){
													$q = " AND users.id='$aluno'";
												}

												$sql_users = $db->select("SELECT users.nome, users.id AS id_aluno, turma_alunos.id
												FROM users  
												INNER JOIN turma_alunos ON users.id=turma_alunos.id_aluno
												WHERE turma_alunos.id_turma='$turma' $q
												GROUP BY users.cpf
												ORDER BY users.nome
												");

												if($db->rows($sql_users)){

													

													$sql_numero_aulas = $db->select("SELECT id
													FROM aulas_alocadas 
													WHERE aulas_alocadas.id_disciplina='$id_disciplina' AND aulas_alocadas.id_turma='$turma'
													GROUP BY aulas_alocadas.id_aula	
													");
													$total_aulas = $db->rows($sql_numero_aulas);


													echo '
														<div class="table-wrap" style="margin-bottom:30px; margin-top:20px">
														<div class="table-responsive">		
														<table class="table table-striped tabelas_data" >
													';

													echo '
														<thead>
															<tr>
													';		
															
															echo '<th ><div style="width:380px">Nome</div></th>';
															$x=1;
															if($total_aulas>0){
																while ($x<=$total_aulas) {
																	echo '<th class="text-center" style="background-color:#276b98 !important; color:#FFF !important"><div style="width:100px">AULA '.$x.'</div></th>';
																		$x++;
																}
															}
													
													echo '
															
															<th style="background-color:#276b98 !important; color:#FFF !important"><div style="width:200px">Geral</div>
															</th>

															</tr>
														</thead>		
													';


													echo '<tbody>';

													$conta_alunos =1;
													while($line_alunos = $db->expand($sql_users)){

														$nota_final=0;
														$conta_provas = 0;
														$assistidas=0;

														$id_aluno = $line_alunos['id_aluno'];

														echo '<tr>';	

														echo '<td style="text-transform:uppercase;">'.$line_alunos['nome'].'</td>';	

														// - '.$line_alunos['id_aluno'].'

														if($total_aulas>0){


																$sql_aulas = $db->select("SELECT id_aula
																FROM aulas_alocadas 
																WHERE id_disciplina='$id_disciplina' AND id_turma='$turma'
																GROUP BY id_aula ");
																
																while ($linha_aulas = $db->expand($sql_aulas)) {

																	$id_aula = $linha_aulas['id_aula'];	

																	//VERIFICA ALUNO ASSISTIU AULA//
																	$sql_assiste = $db->select("SELECT FIND_IN_SET('$id_aluno', aula_final) AS concluido
																			FROM controle_aulas_arquivos_questionarios
																			WHERE id_aula='$id_aula'
																			GROUP BY id_aula
																			LIMIT 1");
																	$assiste_aula = $db->expand($sql_assiste);


																	//VERIFICA NOTA AVALIACAO ALUNO//
																		$notas_sql = $db->select("SELECT id
																			FROM questionarios
																			WHERE id_aula='$id_aula'
																			GROUP BY id_aula
																			ORDER BY id DESC
																			LIMIT 1
																			");

																		$exibe_nota='';
																		if($db->rows($notas_sql)){

																			$notas = $db->expand($notas_sql);
																			$nota = NotaQuestionario($notas['id'],$id_aluno);	
																				
																			//NAO FEZ A PROVA	
																			if($nota==''){
																				$exibe_nota='NR';
																			} else {

																				$exibe_nota=$nota;

																				if($exibe_nota=='Aguardando Correção'){
																					$exibe_nota='AC';
																					$nota = '';
																				} 
																				
																			}

																			$conta_provas++;

																		} else {
																			$nota = 0;
																			$notas['id'] ='';
																			$exibe_nota='---';
																		}


																	echo '<td style="vertical-align:top; padding-top:0;">';
																	echo '<div class="row">';

																			echo '<div class="col-md-6 text-center" style="border-bottom:1px solid #e1e1e1; border-right:1px solid #e1e1e1; background-color:#ff8c00; color:#FFF  ">';

																				echo '<i class="fa fa-eye" aria-hidden="true"></i>';
																				
																			echo '</div>';

																			echo '<div class="col-md-6 text-center" style="border-bottom:1px solid #e1e1e1; background-color:#0275d8; color:#FFF" >';

																				echo '<i class="fa fa-pencil" aria-hidden="true"></i>';

																			echo '</div>';


																			echo '<div class="col-md-6 text-center">';

																				if($assiste_aula['concluido']!=0){
																					echo '<i class="fa fa-check" style="color:#5cb85c" aria-hidden="true"></i>';	
																					$assistidas++;
																				} else {
																					echo '---';
																				}

																			echo '</div>';


																			echo '<div class="col-md-6 text-center">';

																				echo $exibe_nota;
																				$nota_final = ($nota_final+$nota);
																				
																			echo '</div>';


																	echo '</div>';	
																	echo '</td>';		


																}//fecha o while das aulas


																//COLUNA GERAL FINAL
																echo '<td style="vertical-align:top; padding-top:0;">';
																echo '<div class="row">';

																			echo '<div class="col-md-6 text-center" style="border-bottom:1px solid #e1e1e1; border-right:1px solid #e1e1e1; background-color:#ff8c00; color:#FFF  ">';

																				echo '<i class="fa fa-eye" aria-hidden="true"></i>';
																				
																			echo '</div>';

																			echo '<div class="col-md-6 text-center" style="border-bottom:1px solid #e1e1e1; background-color:#0275d8; color:#FFF" >';

																				echo 'MÉDIA FINAL';

																			echo '</div>';

																			echo '<div class="col-md-6 text-center">';

																					echo $assistidas.'/'.$total_aulas;
																					echo '&nbsp;&nbsp;';
																					$porcentagem = (($assistidas/$total_aulas)*100);
																					
																					
																					echo '<span style="color:#5cb85c">('.round($porcentagem).'%)</span>';
																				
																			echo '</div>';

																			echo '<div class="col-md-6 text-center">';

																				echo round(($nota_final/$conta_provas), 1);
																				
																			echo '</div>';


																echo '</div>';	
																echo '</td>';		




														} //fecha o if do total de aulas	

														echo '</tr>';	

														$conta_alunos++;

													}//fecha o while de alunos

													echo '</tbody>';

													echo '
														</table>
														</div>	
													';	

													
													echo '<div class="mtop10" style="font-weight:300; font-color:#000">
														*Fator de divisão da média <strong>('.$conta_provas.')</strong> provas aplicadas.
													  </div>	
													';


													echo '
														</div>
													';

												} else {
													echo 'Nenhum aluno encontrado para essa turma.';
												}



												echo '
												</div>
												</div>
												</div>	
												';

												

											}//fecha while das disciplinas
										} else {
											echo 'Nehuma disciplina ou módulo encontrado para essa turma.';
										}
									?>
									
								
					</div>
				</div>
				<!-- /Row -->


				<div class="mtop10">
					<strong>NR =></strong> Não realizou a prova.
					<br>
					<strong>AC =></strong> Aguardando Correção da Prova (Questões Dissertativas).
					<br>
					<i class="fa fa-check" style="color:#5cb85c" aria-hidden="true"></i> O check é baseado na visualização de mais de 90% do vídeo VIMEO. Quando não há vídeo o aluno deve permanecer por mais de 30 segundos na aula.
				</div>	



<?php } else { ?>	

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<center>UTILIZE OS FILTROS ACIMA PARA PESQUISAR</center>
		</div>
	</div>
</div>			

<?php } ?>		
	
<?php include("../../includes/rodape.php"); ?>	


