<?php
	
	include("../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM EDITADAS */
	$db = new DB();
	$verifica = $db->select("SELECT * FROM turma WHERE id = '$id'");
	$linha = $db->expand($verifica);

?>

        <!-- Main Content -->
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
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form class="form-horizontal">
												<div class="form-group mb-0">
													<div class="col-sm-12">
														<div class="row">

															<?php
																$id_cord = $linha['id_curso'];
																$verifica_curso = $db->select("SELECT nome FROM cursos WHERE id = '$id_cord' LIMIT 1");
																$linha_curso = $db->expand($verifica_curso);
																$nome_curso = $linha_curso['nome'];

															?>

															<div class="col-sm-6">
																<label class="control-label mb-10">Curso</label>
																<input type="text" class="form-control filled-input" value="<?php echo $nome_curso; ?>" readonly>
															</div>

															<?php

																$id_cord = $linha['coordenador_turma'];

																$verifica_coord = $db->select("SELECT nome FROM professores WHERE id = '$id_cord'");

																if ($db->rows($verifica_coord)) {
																	$linha_coord = $db->expand($verifica_coord);
																	$nome_prof = $linha_coord['nome'];
																}

																else {

																	$nome_prof='NENHUM';

																}
															

															?>

															<div class="col-sm-6">
																<label class="control-label mb-10">Coordenador</label>
																<input type="text" class="form-control filled-input" value="<?php echo $nome_prof; ?>" readonly>
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
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<h4 class="mb-0">Alunos</h4>
								
							</div>
							<div class="panel-wrapper collapse in" >
								<div class="panel-body">
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="turma" class="table table-hover display  tabelas_data pb-30" data-locale="pt-BR">
												<thead>
													<tr>
														<th>Nome</th>
														<th>CPF</th>
														<th style="text-align:center">Status</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody>

													<?php

														$verifica_aluno = $db->select("SELECT users.*, turma_alunos.status, turma_alunos.id AS id_delete  FROM users INNER JOIN turma_alunos ON users.id = turma_alunos.id_aluno AND turma_alunos.id_turma = '$id'");

													
														while ($linha_aluno = $db->expand($verifica_aluno)) {

															

															echo '<tr>';
																echo '<td>'.$linha_aluno['nome'].'</td>';
																echo '<td>'.$linha_aluno['cpf'].'</td>';
																echo '<td style="text-align:center">'.StatusAluno($linha_aluno['situacao']).'</td>';
																echo '<td>

																<a data-id="'.$linha_aluno['id_delete'].'" data-post="controlers/delete/delete_aluno_da_turma.php" data-opcao="0" data-title="Confirma a exclusão do registro?" data-text="A ação não podera ser desfeita!" data-return="infos_turmas/'.$id.'" onclick="javascript:void(0)" class="btn btn-danger btn-icon-anim btn-square apaga-elemento" style="float:right; margin-left: 10px;"><i class="icon-trash"></i></a>

																<a href="editar_alunos/'.$linha_aluno['id'].'" class="btn btn-default btn-icon-anim btn-square" style="float:right; margin-left: 10px;"><i class="fa fa-pencil"></i></a>

																<a href="infos_alunos/'.$linha_aluno['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float:right;"><i class="icon-eye"></i></a>
																
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
											<table id="disciplinas" class="table table-hover display tabelas_data pb-30" data-locale="pt-BR">
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

														$verifica_disc = $db->select("SELECT disciplinas.*, turma_disciplinas.id_disciplina FROM disciplinas INNER JOIN turma_disciplinas ON disciplinas.id = turma_disciplinas.id_disciplina AND turma_disciplinas.id_turma = '$id'");

													
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


			</div>
			
			<?php

			include("../../includes/rodape.php");

			?>
			