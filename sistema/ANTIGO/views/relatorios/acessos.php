<?php include("../../includes/topo.php"); ?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Listagem de Alunos</h5>
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

									
									<div class="table-wrap">
										<div class="table-responsive">
											<table class="table table-hover display  pb-30 tabelas_data" data-locale="pt-BR">
												
												<thead>
													<tr>
														<th>Nome</th>
														<th>Turma</th>
														<th>Último Acesso</th>
														
														<th style="text-align:center">Status</th>
														
													</tr>
												</thead>
												
												<tbody id="doc">

													<?php

														$verifica = $db->select("SELECT users.*, turma_alunos.id, turma.nome AS nome_turma 
															FROM users  
															LEFT JOIN turma_alunos ON users.id=turma_alunos.id_aluno
															LEFT JOIN turma ON turma_alunos.id_turma=turma.id
															ORDER BY turma.nome, users.ultima_visita ASC, users.nome
														");

													
														while ($linha = $db->expand($verifica)) {

															echo '<tr>';
																echo '<td>'.$linha['nome'].'</td>';								
																
																echo '<td>'.$linha['nome_turma'].'</td>';								
																echo '<td>'.data_mysql_para_user($linha['ultima_visita']).'</td>';
																
																echo '<td style="text-align:center">'.StatusAluno($linha['situacao']).'</td>';
																
																

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
	</div>		
	
<?php include("../../includes/rodape.php"); ?>	


