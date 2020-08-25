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


				<div class="row">
				<div class="col-md-12">
		<form method="get" action="relatorios/acessos">
		<input type="hidden" name="pesquisa">	
		<div class="panel panel-default card-view">
			<div class="row">
					

				<div class="col-md-6">					
						<select name="turma" class="form-control input-lg" required  >
						<option value="">--escolha a turma--</option>
						<option value="0">*TODAS AS TURMAS</option>
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

							} else {


								$sel = $db->select("SELECT turma.id, turma.nome, disciplinas.professor, turma_disciplinas.id_disciplina 
								FROM turma 
								LEFT JOIN turma_disciplinas ON turma.id=turma_disciplinas.id_turma
								LEFT JOIN disciplinas ON turma_disciplinas.id_disciplina=disciplinas.id
								WHERE turma.id!='$id_turma' AND disciplinas.professor='$id_logado'
								GROUP BY turma.id
								ORDER BY turma.nome ");


							}
							
							while ($row= $db->expand($sel)) {
								echo '<option value="'.$row['id'].'">'.$row['nome'].'</option>';
							}
						?>
					</select>	
				</div>	

		

				<div class="col-md-2">
					<button class="btn btn-success btn-block">FILTRAR</button>	
				</div>	
			</div>				
		</div>	
		</form>
	</div>
</div>


<?php if(isset($turma)){ ?>
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

														$q2 = '';
														if($turma!=0){
															$q2 = " WHERE turma_alunos.id_turma='$turma'";	
														}

														$verifica = $db->select("SELECT users.*, turma_alunos.id, turma.nome AS nome_turma 
															FROM users  
															LEFT JOIN turma_alunos ON users.id=turma_alunos.id_aluno
															LEFT JOIN turma ON turma_alunos.id_turma=turma.id
															$q2
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

<?php } else { ?>	

<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<center>SELECIONE UMA TURMA ACIMA PARA FILTRAR</center>
		</div>
	</div>
</div>			

<?php } ?>			
	
<?php include("../../includes/rodape.php"); ?>	


