<?php include("../../includes/topo.php"); ?>


<div class="page-wrapper">
<div class="container-fluid mtop20" >
<div class="row">

	<div class="col-md-12">
		<form method="get" action="lista-aulas">
		<input type="hidden" name="pesquisa">	
		<div class="panel panel-default card-view">
			<div class="row">
				
				<div class="col-md-5">					
						<select name="turma" class="form-control " required  onchange="javascript:AVAdisciplinasAulas(this.value);" >
						<option value="">--escolha a turma--</option>
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
					<select name="disciplina" id="disciplina"class="form-control ">
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

				<div class="col-md-3">
					<button class="btn btn-success">FILTRAR</button>	
					<a href="lista-aulas" class="btn btn-danger">LIMPAR</a>	
				</div>	
			</div>				
		</div>	
		</form>
	</div>	

	
			

	<?php 
	if(isset($pesquisa)){ 

		//echo '<h4>'.$row_turma['nome'].'</h4>';
			$q = '';
			if(isset($disciplina) && !empty($disciplina)){
				$q = " AND aulas_alocadas.id_disciplina='$disciplina'";	
			}

			$verifica_disciplinas = $db->select("SELECT disciplinas.id AS id_disciplina, disciplinas.nome, aulas_alocadas.id AS id_alocada  
				FROM aulas_alocadas 
				LEFT JOIN disciplinas ON aulas_alocadas.id_disciplina=disciplinas.id
				WHERE aulas_alocadas.id_turma='$turma' $q
				GROUP BY disciplinas.id
				ORDER BY disciplinas.nome
				");

			if($db->rows($verifica_disciplinas)){	
				while($row_dis = $db->expand($verifica_disciplinas)){

				$id_disciplina = $row_dis['id_disciplina'];	

				echo '
					<div class="col-md-12">
					<h5>'.$row_dis['nome'].'</h5>
					<div class="panel panel-default card-view mtop10">
				';

	?>

			<div class="table-wrap">
										<div class="table-responsive">
											<table id="aulas" class="table table-hover display  pb-30" data-locale="pt-BR">
												<thead>
													<tr>
														<th width="50%">Título</th>
														<th>Criação</th>
														<th>Liberação</th>
														<th width="30%"></th>
													</tr>
												</thead>
												
												<tbody>

													<?php

															$verifica_aula = $db->select("SELECT aula.id, aula.data, aula.titulo, aulas_alocadas.id AS id_alocada
																, aulas_alocadas.data_liberacao, COUNT(trabalhos.id) AS trabalhos FROM aulas_alocadas 
																LEFT JOIN aula ON aulas_alocadas.id_aula=aula.id
																LEFT JOIN trabalhos
																ON aulas_alocadas.id_aula = trabalhos.id_aula 
																WHERE aulas_alocadas.id_disciplina='$id_disciplina' AND aulas_alocadas.id_turma='$id_turma'
																GROUP BY aula.id
																ORDER BY aula.id DESC
															");															

													
														

														if($db->rows($verifica_aula)){

													
														while ($linha_aula = $db->expand($verifica_aula)) {

															echo '<tr>';
																echo '<td>'.$linha_aula['titulo'].'</td>';
																echo '<td>'.data_mysql_para_user($linha_aula['data']).'</td>';
																echo '<td>';

																	if($linha_aula['data_liberacao']=='0000-00-00'){
																		echo data_mysql_para_user($linha_aula['data']);
																	} else {
																		echo data_mysql_para_user($linha_aula['data_liberacao']);	
																	}

																?>
																
																</td>
																
																<td>



																<a data-id="<?php echo $linha_aula['id']; ?>" data-post="controlers/professor/deleta_aula.php" data-title="Confirma a exclusão do registro?" data-text="A ação não podera ser desfeita!" data-return="lista-aulas" data-opcao="9" onclick="javascript:void(0)" class="btn btn-danger btn-icon-anim btn-square apaga-elemento" style="float:right; margin-left: 5px;"><i class="icon-trash"></i></a>

																<a href="cadastra_quest/<?php echo $linha_aula['id'] ?>" class="btn btn-primary btn-icon-anim btn-square cadastra-questionario" style="float:right; margin-left: 5px;"><i class="fa fa-list"></i></a>	

																<a href="envia_arquivos_aula/<?php echo $linha_aula['id'] ?>" class="btn btn-warning btn-icon-anim btn-square envia-arquivos" style="float:right; margin-left: 5px;"><i class="fa fa-file"></i></a>

																<a href="edita-aula/<?php echo $linha_aula['id'] ?>" class="btn btn-default btn-icon-anim btn-square edita-aula" style="float:right; margin-left: 5px;"><i class="fa fa-pencil"></i></a>

																<a href="aloca_aula_turmas/<?php echo $linha_aula['id'] ?>" class="btn btn-info btn-icon-anim btn-square aloca" style="float: right; margin-left: 5px; "><i class="fa fa-exchange"></i></a>

																<a  href="exibe_aula/<?php echo $linha_aula['id'] ?>" class="btn btn-primary btn-icon-anim btn-square exibi" style="float: right;"><i class="icon-eye" ></i></a>

																<a  href="trabalhos_alunos/<?php echo $linha_aula['id'] ?>/<?php echo $turma; ?>/<?php echo $disciplina; ?>" class="btn btn-primary btn-icon-anim btn-square trabalhos" style="float: right;margin-right: 5px;<?php echo ($linha_aula['trabalhos']>0)?'padding-right: 50px':'' ?>">


																<i class="fa fa-book"></i>

																<?php if($linha_aula['trabalhos'] > 0): ?>
																<span class="badge badge-danger"><?php echo $linha_aula['trabalhos'] ?></span>
																<?php endif; ?>

																</a>
																

																</td>
															</tr>

														<?php

														}

													} else {

														echo '<tr>';
															echo '<td colspan="10">NENHUMA AULA ENCONTRADA.</td>';
														echo '</tr>';


													}
						
													?>
														
												</tbody>
											</table>
										</div>
		</div>


	<?php echo '</div></div>';}} ?>
	


	<?php } else { ?>
		<br><br>
		<center>
			<h6>Utilize o filtro acima para pesquisar aulas.</h6>
		</center>	
		<br><br>
	<?php }  ?>	


	

</div>
</div>	
</div>



<?php 

		$busca_desalocadas= $db->select("SELECT COUNT(*) AS total FROM aula AS t1
		WHERE NOT EXISTS (SELECT * FROM aulas_alocadas AS t2 WHERE t1.id = t2.id_aula);");

		$results= $db->expand($busca_desalocadas);

?>

<a href="aulas_desalocadas">
	<div class="aulas-desalocadas"><i class="fa fa-book"></i>
		<span class="contador-desalocadas"><span class="total-d"><?php echo $results['total'] ?></span></span>
	</div>
</a>




<a href="cria-nova-aula" class="add-aula">
    <div class="new_aula_button"><i class="fa  fa-plus"></i></div>
</a>



<?php include("../../includes/rodape.php"); ?>
