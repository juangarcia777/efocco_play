<?php
	
	include("../../includes/topo.php");
?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Listagem de Dúvidas de Alunos</h5>
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
							
							<div class="panel-wrapper collapse in">
								<div class="panel-body">


									
										<div  class="tab-struct custom-tab-1 mt-40">
											<ul role="tablist" class="nav nav-tabs" id="myTabs_7">
												<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#home_7">AGUARDANDO RESPOSTA</a></li>
												
												<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_7" role="tab" href="#profile_7" aria-expanded="false">ÚlTIMAS 30 RESPONDIDAS</a></li>
												
											</ul>
											<div class="tab-content" id="myTabContent_7">
												


												<div  id="home_7" class="tab-pane fade active in" role="tabpanel">
													
													<div class="table-wrap">
														<div class="table-responsive">
															<table id="turma" class="table table-hover display  pb-30 " data-locale="pt-BR">
																<thead>
																	<tr>
				                                                        <th>Nome</th>
																		<th>Turma/Discplina/Aula</th>
																		<th>Data e Hora</th>
																		<th></th>
																	</tr>
																</thead>
																
																<tbody>

																<?php

																		$verifica = $db->select("SELECT duvidas_aulas.*, aula.titulo, turma_alunos.id_turma, turma.nome AS nome_turma, disciplinas.nome AS nome_materia
																			FROM duvidas_aulas 
																			INNER JOIN aula ON duvidas_aulas.id_aula=aula.id
																			LEFT JOIN turma_alunos ON duvidas_aulas.id_aluno=turma_alunos.id_aluno
																			LEFT JOIN turma ON turma_alunos.id_turma=turma.id
																			LEFT JOIN disciplinas ON duvidas_aulas.id_disciplina=disciplinas.id
																			WHERE duvidas_aulas.resposta='' AND duvidas_aulas.data_resposta='0000-00-00 00:00:00'

																			ORDER BY duvidas_aulas.id DESC");
																		if($db->rows($verifica)){
																	
																		while ($linha = $db->expand($verifica)) {

				                                                            $data= substr($linha['data_hora'],0,10);
				                                                            $hora= substr($linha['data_hora'],11,19);

																			echo '<tr>';
																				echo '<td>'.$linha['nome_aluno'].'</td>';
																				echo '<td><strong>'.$linha['nome_turma'].'</strong><br>';

																				if(!empty($linha['nome_disciplina'])){
																					echo $linha['nome_disciplina'];
																				} else {
																					echo $linha['nome_materia'];
																				}

																				echo '<br>'.$linha['titulo'].'</td>';
																				echo '<td>'.data_mysql_para_user($data).' | '.$hora.'</td>';
																				echo '<td>


																				<a href="duvida_item/'.$linha['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

																				</td>';
																			echo '</tr>';

																		}
																	} else {
																		echo '<tr><td>Nenhuma pergunta sem resposta!</td></tr>';
																	}
										
																	?>
																		
																</tbody>
															</table>
														</div>
													</div>


												</div>
												




												<div  id="profile_7" class="tab-pane fade" role="tabpanel">
													

													<div class="table-wrap">
														<div class="table-responsive">
															<table id="turma" class="table table-hover display  pb-30 " data-locale="pt-BR">
																<thead>
																	<tr>
				                                                        <th>Nome</th>
																		<th>Turma/Discplina/Aula</th>
																		<th>Data e Hora</th>
																		<th></th>
																	</tr>
																</thead>
																
																<tbody>

																<?php

																		$verifica = $db->select("SELECT duvidas_aulas.*, aula.titulo, turma_alunos.id_turma, turma.nome AS nome_turma, disciplinas.nome AS nome_materia
																			FROM duvidas_aulas 
																			INNER JOIN aula ON duvidas_aulas.id_aula=aula.id
																			LEFT JOIN turma_alunos ON duvidas_aulas.id_aluno=turma_alunos.id_aluno
																			LEFT JOIN turma ON turma_alunos.id_turma=turma.id
																			LEFT JOIN disciplinas ON duvidas_aulas.id_disciplina=disciplinas.id
																			WHERE duvidas_aulas.resposta!='' AND duvidas_aulas.data_resposta!='0000-00-00 00:00:00'
																			ORDER BY duvidas_aulas.id DESC
																			LIMIT 30
																			");
																		if($db->rows($verifica)){
																	
																		while ($linha = $db->expand($verifica)) {

				                                                            $data= substr($linha['data_hora'],0,10);
				                                                            $hora= substr($linha['data_hora'],11,19);

																			echo '<tr>';
																				echo '<td>'.$linha['nome_aluno'].'</td>';
																				echo '<td><strong>'.$linha['nome_turma'].'</strong><br>';

																				if(!empty($linha['nome_disciplina'])){
																					echo $linha['nome_disciplina'];
																				} else {
																					echo $linha['nome_materia'];
																				}

																				echo '<br>'.$linha['titulo'].'</td>';
																				echo '<td>'.data_mysql_para_user($data).' | '.$hora.'</td>';
																				echo '<td>


																				<a href="duvida_item/'.$linha['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

																				</td>';
																			echo '</tr>';

																		}
																	} else {
																		echo '<tr><td>Nenhuma pergunta sem resposta!</td></tr>';
																	}
										
																	?>
																		
																</tbody>
															</table>
														</div>
													</div>

												</div>
												






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
			
			<?php

			include("../../includes/rodape.php");

			?>
			
	