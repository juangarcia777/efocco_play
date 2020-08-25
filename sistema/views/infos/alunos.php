<?php
	
	include("../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM EDITADAS */
	$db = new DB();
	$verifica = $db->select("SELECT * FROM users WHERE id = '$id'");
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
							<div class="panel-heading">
								<h4 class="mb-10">Turmas</h4>
								
							</div>
							<div class="panel-wrapper collapse in" >
								<div class="panel-body">
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="turma" class="table table-hover display tabelas_data pb-30" data-locale="pt-BR">
												<thead>
													<tr>
														<th>Nome</th>
														<th>Data de Entrada</th>
														<th>Unidade</th>
														<th>Período Letivo</th>
														<th style="text-align: center;">Status</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody>

													<?php

														$verifica_turma = $db->select("SELECT turma.*, turma_alunos.status FROM turma INNER JOIN turma_alunos ON turma.id = turma_alunos.id_turma AND turma_alunos.id_aluno = '$id'");

													
														while ($linha_turma = $db->expand($verifica_turma)) {

															

															echo '<tr>';
																echo '<td>'.$linha_turma['nome'].'</td>';
																echo '<td>'.data_mysql_para_user($linha_turma['data_entrada']).'</td>';
																echo '<td>'.$linha_turma['unidade'].'</td>';
																echo '<td>'.$linha_turma['periodo_letivo'].'</td>';
																echo '<td style="text-align: center;">'.StatusAluno($linha_turma['status']).'</td>';
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
								<h4 class="mb-10">Cursos</h4>
								
							</div>
							<div class="panel-wrapper collapse in" >
								<div class="panel-body">
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="cursos" class="table table-hover display tabelas_data  pb-30" data-locale="pt-BR">
												<thead>
													<tr>
														<th>Nome</th>
														<th>Data de Criação</th>
														<th></th>
													</tr>
												</thead>
											
												<tbody>

													<?php

														$verifica_turma = $db->select("SELECT turma.*, turma_alunos.status FROM turma INNER JOIN turma_alunos ON turma.id = turma_alunos.id_turma AND turma_alunos.id_aluno = '$id'");

														while ($linha_turma = $db->expand($verifica_turma)) {

															$id_turma=$linha_turma['id'];

															$verifica_disc = $db->select("SELECT cursos.*, cursos_turmas.id_turma FROM cursos INNER JOIN cursos_turmas ON cursos.id = cursos_turmas.id_curso AND cursos_turmas.id_turma = '$id_turma'");

															while ( $linha_disc = $db->expand($verifica_disc)) {
																# code...

																echo '<tr>';
																	echo '<td>'.$linha_disc['nome'].'</td>';
																	echo '<td>'.data_mysql_para_user($linha_disc['data_criacao']).'</td>';
																	echo '<td>

																	<a href="infos_cursos/'.$linha_disc['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

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
			