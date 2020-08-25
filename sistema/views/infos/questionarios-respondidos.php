<?php
	
	include("../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM EDITADAS */
	$db = new DB();
	$verifica = $db->select("SELECT titulo FROM questionarios WHERE id='$id' LIMIT 1");
	$linha = $db->expand($verifica);


?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light"><?php echo $linha['titulo']; ?></h5>
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
								<h4 class="mb-10">Respondidos</h4>
								
							</div>

							<div class="row">
							<form method="get" action="questionarios-respondidos/<?php echo $id; ?>/<?php echo $id_aula; ?>">
								<div class="panel-heading">
								<div class="col-md-6">
									<select class="form-control" name="turma" required>
									<?php
										if(isset($turma)){
											
											$puxa = $db->select("SELECT nome, id
											FROM turma
											WHERE id='$turma'
											LIMIT 1
											");
											$line = $db->expand($puxa);
											echo '<option value="'.$line['id'].'" selected>'.$line['nome'].'</option>';	

										} else {
											$turma=0;
											echo '<option value="">-- escolha a turma --</option>';
										}

										$puxa = $db->select("SELECT aulas_alocadas.id_turma, turma.nome 
											FROM aulas_alocadas
											LEFT JOIN turma ON aulas_alocadas.id_turma=turma.id
											WHERE aulas_alocadas.id_aula='$id_aula' AND aulas_alocadas.id_turma!='$turma'
											ORDER BY turma.nome
											");
										while($line = $db->expand($puxa)){
											echo '<option value="'.$line['id_turma'].'">'.$line['nome'].'</option>';
										}
									?>	
									</select>									
								</div>	
								<div class="col-md-2">
									<button type="submit" class="btn btn-success">FILTRAR</button>
								</div>	
							</div>	
						</form>
						</div>

							<div class="panel-wrapper collapse in" >
								<div class="panel-body">

									
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="turma" class="table table-hover display pb-30">
												<thead>
													<tr>
														<th width="190">Data</th>
														<th>Aluno</th>
														<th>Nota</th>
														
														<th></th>
													</tr>
												</thead>
												
												<tbody>

													<?php
													if(isset($turma) && $turma!=0){

														$verifica_turma = $db->select("SELECT resp_quest_aluno.id_aluno, resp_quest_aluno.data_hora, users.nome 
															FROM resp_quest_aluno 
															LEFT JOIN users ON resp_quest_aluno.id_aluno=users.id
															WHERE resp_quest_aluno.id_quest='$id' 
															GROUP BY resp_quest_aluno.id_aluno");	


														$verifica_turma = $db->select("
															SELECT turma_alunos.id_aluno, users.nome, resp_quest_aluno.id_aluno, resp_quest_aluno.data_hora
															FROM turma_alunos
															LEFT JOIN users ON turma_alunos.id_aluno=users.id
															LEFT JOIN resp_quest_aluno ON users.id=resp_quest_aluno.id_aluno
															WHERE turma_alunos.id_turma='$turma' AND resp_quest_aluno.id_quest='$id'
															GROUP BY resp_quest_aluno.id_aluno
															ORDER BY users.nome");

													
														while ($linha_turma = $db->expand($verifica_turma)) {

															

															echo '<tr>';
																echo '<td>'.formata_data_hora($linha_turma['data_hora']).'</td>';
																echo '<td>'.$linha_turma['nome'].'</td>';
																
																echo '<td>'.NotaQuestionario($id, $linha_turma['id_aluno']).'</td>';

															echo '<td>	
																<a href="infos_questionario-respostas/'.$id.'/'.$linha_turma['id_aluno'].'/'.$id_aula.'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

																</td>';
															echo '</tr>';

														}


													} else {

														echo '<tr><td colspan="11">Utilize o filtro acima para pesquisar.</td></tr>';

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

			<div class=" col-sm-6">
						<a href="cadastra_quest/<?php echo $id_aula; ?>" class="btn btn-danger pull-left"><span class="btn-text">voltar</span></a>
					</div>
			
			<?php

			include("../../includes/rodape.php");

			?>
			