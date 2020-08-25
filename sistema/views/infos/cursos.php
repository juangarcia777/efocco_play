<?php
	
	include("../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM EDITADAS */
	$db = new DB();
	$verifica = $db->select("SELECT * FROM cursos WHERE id = '$id'");
	$linha = $db->expand($verifica);

?>

		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light"><?php echo $linha['nome']; ?></h5>
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
								<h4 class="mb-1">Turmas</h4>
								
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in" >
								<div class="panel-body">
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="turma" class="table table-hover display  pb-30 tabelas_data" data-locale="pt-BR">
												<thead>
													<tr>
														<th>Nome</th>
														<th>Data de Entrada</th>
														<th>Unidade</th>
														<th>Período Letivo</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody>

													<?php

														$verifica_turma = $db->select("SELECT turma.*, cursos_turmas.id_turma FROM turma INNER JOIN cursos_turmas ON turma.id = cursos_turmas.id_turma AND cursos_turmas.id_curso = '$id'");

													
														while ($linha_turma = $db->expand($verifica_turma)) {

															echo '<tr>';
																echo '<td>'.$linha_turma['nome'].'</td>';
																echo '<td>'.data_mysql_para_user($linha_turma['data_entrada']).'</td>';
																echo '<td>'.$linha_turma['unidade'].'</td>';
																echo '<td>'.$linha_turma['periodo_letivo'].'</td>';
																echo '<td>

																<a href="infos_turmas/'.$linha_turma['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

																</td>';
															echo '</tr>';

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
				<!-- /Row -->

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<h4 class="mb-0">Disciplinas</h4>
								
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="disciplinas" class="table table-hover display  pb-30 tabelas_data" data-locale="pt-BR">
												<thead>
													<tr>
														<th>Nome</th>
														<th>Professor</th>
														<th>Horário</th>
														<th>Turno</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody>

													<?php

														$verifica_disc = $db->select("SELECT disciplinas.*, disciplinas_cursos.id_curso FROM disciplinas INNER JOIN disciplinas_cursos ON disciplinas.id = disciplinas_cursos.id_disciplina AND disciplinas_cursos.id_curso = '$id'");

													
														while ($linha_disc = $db->expand($verifica_disc)) {
															$id_prof = $linha_disc['professor'];
															$verifica_prof = $db->select("SELECT * FROM professores WHERE id = '$id_prof'");
															$linha_prof = $db->expand($verifica_prof);

															echo '<tr>';
																echo '<td>'.$linha_disc['nome'].'</td>';
																echo '<td>'.$linha_prof['nome'].'</td>';
																echo '<td>'.$linha_disc['horario'].'</td>';
																echo '<td>'.$linha_disc['turno'].'</td>';
																echo '<td>

																<a href="infos_disciplinas/'.$linha_disc['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

																</td>';
															echo '</tr>';

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
				<!-- /Row -->

				

				<!-- Row -->
				<div class="row" style="display: none;">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<h4 class="mb-0">Alunos</h4>
								
							</div>
							<div class="panel-wrapper collapse in" >
								<div class="panel-body">
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="alunos" class="table table-hover display  pb-30 tabelas_data" data-locale="pt-BR">
												<thead>
													<tr>
														<th>Nome</th>
														<th>CPF</th>
														<th>Turma</th>
														<th style="text-align: center;">Status</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody>

													<?php

														$verifica_turma = $db->select("SELECT turma.id, cursos_turmas.id_turma FROM turma INNER JOIN cursos_turmas ON turma.id = cursos_turmas.id_turma AND cursos_turmas.id_curso = '$id'");

													
														while ($linha_turma = $db->expand($verifica_turma)) {
																$id_turma = $linha_turma['id'];

																$verifica_aluno = $db->select("SELECT users.*, turma_alunos.status FROM users INNER JOIN turma_alunos ON turma_alunos.id_aluno = users.id AND turma_alunos.id_turma = '$id_turma'");

															while ($linha_aluno = $db->expand($verifica_aluno)) {
																
																

																echo '<tr>';
																	echo '<td>'.$linha_aluno['nome'].'</td>';
																	echo '<td>'.$linha_aluno['cpf'].'</td>';
																	echo '<td>'.$linha_turma['nome'].'</td>';
																	echo '<td style="text-align: center;">'.StatusAluno($linha_aluno['status']).'</td>';
																	echo '<td>

																	<a href="infos_alunos/'.$linha_aluno['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

																	</td>';
																echo '</tr>';
																}
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
				<!-- /Row -->


			</div>
			
			<?php

			include("../../includes/rodape.php");

			?>
		