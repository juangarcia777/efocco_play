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

														$verifica_turma = $db->select("SELECT resp_quest_aluno.id_aluno, resp_quest_aluno.data_hora, users.nome 
															FROM resp_quest_aluno 
															LEFT JOIN users ON resp_quest_aluno.id_aluno=users.id
															WHERE resp_quest_aluno.id_quest='$id' 
															GROUP BY resp_quest_aluno.id_aluno");

													
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
			