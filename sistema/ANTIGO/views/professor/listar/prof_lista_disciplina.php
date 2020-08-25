<?php
	
	include("../../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM MOSTRADAS */

	$db = new DB();
	$verifica_turma = $db->select("SELECT * FROM turma WHERE id = '$id_turma'");
	$linha_turma = $db->expand($verifica_turma);
	$id_turma = $id_turma;
	

	$verifica_disciplina = $db->select("SELECT disciplinas.*, professores.nome AS nome_professor 
	FROM disciplinas
	LEFT JOIN professores ON disciplinas.professor=professores.id
	WHERE disciplinas.id = '$id_disciplina' LIMIT 1");
	$linha_disciplina = $db->expand($verifica_disciplina);
	$id_disciplina = $linha_disciplina['id'];


?>
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h5 class="txt-light"><?php echo $linha_turma['nome'] .' / '.$linha_disciplina['nome']; ?></h5>
					</div>
					<!-- Breadcrumb -->
					
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
															<div class="col-sm-6 pb-30">
																<label class="control-label mb-10">Turma</label>
																<input type="text" class="form-control filled-input" value="<?php echo $linha_turma['nome']; ?>" readonly>
															</div>

															<div class="col-sm-6 pb-30">
																<label class="control-label mb-10">Professor Responsável</label>
																<input type="text" class="form-control filled-input" value="<?php echo $linha_disciplina['nome_professor']; ?>" readonly>
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

								<a <?php echo 'href="nova_aula/'.$linha_turma['id'].'/'.$linha_disciplina['id'].'"'; ?> class="btn btn-success btn-anim pull-right"><i class="icon-plus"></i><span class="btn-text">nova aula</span></a>
								
								<h4 class="mb-10">Aulas</h4>
								
							</div>
							<div class="panel-wrapper collapse in" >
								<div class="panel-body">
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="aulas" class="table table-hover display  pb-30" data-locale="pt-BR">
												<thead>
													<tr>
														<th width="50%">Título</th>
														<th>Data de Criação</th>
														<th>Data de Liberação</th>
														<th width="30%"></th>
													</tr>
												</thead>
												
												<tbody>

													<?php

														$verifica_aula = $db->select("SELECT * FROM aula WHERE id_turma = '$id_turma' AND id_disciplina = '$id_disciplina'");

													
														while ($linha_aula = $db->expand($verifica_aula)) {

															echo '<tr>';
																echo '<td>'.$linha_aula['titulo'].'</td>';
																echo '<td>'.data_mysql_para_user($linha_aula['data']).'</td>';
																echo '<td>'.data_mysql_para_user($linha_aula['data_exibicao']).'</td>';
																echo '<td>


																<a data-id="'.$linha_aula['id'].'" data-post="controlers/professor/deleta_aula.php" data-title="Confirma a exclusão do registro?" data-text="A ação não podera ser desfeita!" data-return="prof_lista_disciplina/'.$id_turma.'/'.$id_disciplina.'" data-opcao="9" onclick="javascript:void(0)" class="btn btn-danger btn-icon-anim btn-square apaga-elemento" style="float:right; margin-left: 10px;"><i class="icon-trash"></i></a>

																
																<a href="cadastra_quest/'.$linha_aula['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float:right; margin-left: 10px;"><i class="fa fa-list"></i></a>	

																<a href="envia_arquivos_aula/'.$id_turma.'/'.$id_disciplina.'/'.$linha_aula['id'].'" class="btn btn-warning btn-icon-anim btn-square" style="float:right; margin-left: 10px;"><i class="fa fa-file"></i></a>

																<a href="editar_aula/'.$id_turma.'/'.$id_disciplina.'/'.$linha_aula['id'].'" class="btn btn-default btn-icon-anim btn-square" style="float:right; margin-left: 10px;"><i class="fa fa-pencil"></i></a>

																<a href="exibe_aula/'.$id_turma.'/'.$id_disciplina.'/'.$linha_aula['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

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
								<h4 class="mb-10">Alunos</h4>
								
							</div>
							<div class="panel-wrapper collapse in" >
								<div class="panel-body">
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="turma" class="table table-hover display  pb-30" data-locale="pt-BR">
												<thead>
													<tr>
														<th>Nome</th>
														<th>Celular</th>
														<th>Status</th>
														
														<th style="text-align: center;"></th>
													</tr>
												</thead>
												
												<tbody>

													<?php

														$verifica_aluno = $db->select("SELECT users.*, turma_alunos.status FROM users INNER JOIN turma_alunos ON users.id = turma_alunos.id_aluno AND turma_alunos.id_turma = '$id_turma'");

													
														while ($linha_aluno = $db->expand($verifica_aluno)) {

															

															echo '<tr>';
																echo '<td>'.$linha_aluno['nome'].'</td>';
																echo '<td>'.$linha_aluno['celular_aluno'].'</td>';
																echo '<td style="text-align:center">'.StatusAluno($linha_aluno['situacao']).'</td>';
																echo '<td>

																<a style="display:none" href="notas/'.$id_turma.'/'.$linha_aluno['id'].'/'.$id_disciplina.'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

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

			include("../../../includes/rodape.php");

			?>
			
		