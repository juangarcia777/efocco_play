<?php include("../../includes/topo.php"); ?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Relatório de Avaliações de Aulas</h5>
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
		<form method="get" action="relatorios/avaliacao">
		<input type="hidden" name="pesquisa">	
		<div class="panel panel-default card-view">
			<div class="row">
					

				<div class="col-md-6">					
						<select name="turma" class="form-control input-lg" required  onchange="javascript:AVAdisciplinasAulas(this.value);" >
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

				<div class="col-md-4">
					<select name="disciplina" id="disciplina"class="form-control input-lg">
					<?php
						if(isset($disciplina) && !empty($disciplina)){

							$sel = $db->select("SELECT disciplinas.nome 
							FROM disciplinas
							WHERE id='$disciplina'
							LIMIT 1");
							$line = $db->expand($sel);
							echo '<option selected value="'.$line['id_disciplina'].'">'.$line['nome'].'</option>';
						}
						
						if(isset($turma) && !empty($turma)){
							 	
							echo '<option value="">-------------------------</option>';

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
							echo '<option value="">-------------------------</option>';
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
														<th>ID</th>
														<th>Aula</th>
														<th>QTD Votos</th>
														<th>Avaliação</th>														
														
													</tr>
												</thead>
												
												<tbody id="doc">

													<?php

														$q2 = '';
														if($turma!=0){
															$q2 = " WHERE aulas_alocadas.id_turma='$turma'";	
														}

														$q = '';
														if(isset($disciplina) && !empty($disciplina)){
															$q = " AND aulas_alocadas.id_disciplina='$disciplina'";	
														}

														$verifica = $db->select("SELECT avaliacao_aulas.*, aula.titulo, aulas_alocadas.id_turma
															FROM avaliacao_aulas
															LEFT JOIN aula ON avaliacao_aulas.id_aula=aula.id		
															INNER JOIN aulas_alocadas ON avaliacao_aulas.id_aula=aulas_alocadas.id_aula
															$q2 $q
															GROUP BY aulas_alocadas.id_aula			
															ORDER BY aula.titulo
														");

														
														while ($linha = $db->expand($verifica)) {
															$nota = 0;
															$ex = explode(',', $linha['notas']);
															$total = count($ex);

															foreach($ex as $not) {
															    if(!empty($not)){
															    	$nota = ($nota+$not);
															    }
															}

															$media = ($nota/$total);
															$media = ceil($media);
															if($media>5){$media=5;}

															echo '<tr>';
																
																echo '<td>'.$linha['id_aula'].'</td>';	

																echo '<td style="text-transform:uppercase">'.$linha['titulo'].'</td>';								
																echo '<td>'.$total.'</td>';								
																
																echo '<td>';

																	if($media>0){
																		$x=1;
																		while($x<=$media){
																			echo '<i class="fa fa-star" aria-hidden="true"></i>&nbsp;';
																			$x++;
																		}
																	}

																echo '</td>';								

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
			<center>SELECIONE UMA TURMA ACIMA PARA EXIBIR AS AVALIAÇÕES</center>
		</div>
	</div>
</div>			

<?php } ?>		
	
<?php include("../../includes/rodape.php"); ?>	


