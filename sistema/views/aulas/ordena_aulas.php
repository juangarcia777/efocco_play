<?php include("../../includes/topo.php"); ?>

<form method="post" action="controlers/cadastros/ordena_aulas.php" >

<input type="hidden" name="id_aula" value="<?php echo $id; ?>">
<div class="container-fluid mtop80" >
<div class="row">

	<?php
		$db = new DB();
		$sel = $db->select("SELECT titulo,data_criacao FROM aula WHERE id ='$id' LIMIT 1");
		$linha = $db->expand($sel);
	?>
	
	<div class="col-md-10">	
	
		<div class="panel panel-default card-view mbottom20">			
			<h5><?php echo data_mysql_para_user(substr($linha['data_criacao'],0,10)); ?> - <?php echo $linha['titulo']; ?></h5>
		</div>	

	</div>	


	<div class="col-md-2">	
		<button class="btn btn-block btn-success btn-lg mtop5">FINALIZAR</button>
	</div>	

	<div class="col-md-12">

		<h5>Faça ordenação da aula dentro da disciplina/módulo</h5>

		<div class="row">
			<div class="panel-wrapper collapse in">
			<div class="panel-body">
			<div class="panel-group accordion-struct" id="accordion_1" role="tablist" aria-multiselectable="true">
			
				<?php 

				if($AdministradorAVA!=0 ){

					$sql = $db->select("SELECT aulas_alocadas.*, turma.nome
						FROM aulas_alocadas
						INNER JOIN turma ON aulas_alocadas.id_turma=turma.id
						WHERE aulas_alocadas.id_aula='$id'
						GROUP BY aulas_alocadas.id_turma
						ORDER BY turma.nome
						");

				} else if($CoordenadorTurma!=0){
					
					$sql = $db->select("SELECT aulas_alocadas.*, turma.nome
						FROM aulas_alocadas
						INNER JOIN turma ON aulas_alocadas.id_turma=turma.id
						WHERE aulas_alocadas.id_aula='$id' AND turma.coordenador_turma='$id_logado'
						GROUP BY aulas_alocadas.id_turma
						ORDER BY turma.nome
						");


				} else {
				

					$sql = $db->select("SELECT aulas_alocadas.*, turma.nome, turma_disciplinas.id_disciplina, disciplinas.professor
						FROM aulas_alocadas
						LEFT JOIN turma ON aulas_alocadas.id_turma=turma.id
						LEFT JOIN turma_disciplinas ON turma.id=turma_disciplinas.id_turma
						LEFT JOIN disciplinas ON turma_disciplinas.id_disciplina=disciplinas.id
						WHERE aulas_alocadas.id_aula='$id' AND disciplinas.professor='$id_logado'
						GROUP BY aulas_alocadas.id_turma
						ORDER BY turma.nome
						");
				}

				while($row = $db->expand($sql)){
					$id_turma = $row['id_turma'];
				?>								
				<div class="panel panel-default" style="margin-bottom: 20px">
					<div class="panel-heading active activestate" role="tab" id="heading_<?php echo $row['id'] ?>" style=" position: relative;">
						<a role="button"  data-toggle="collapse" data-parent="#accordion_1" href="#collapse_<?php echo $row['id'] ?>" aria-expanded="true" style="text-transform: uppercase; font-size: 17px; font-weight: 300"><?php echo $row['nome'] ?></a> 
						
					</div>
					
					<div id="collapse_<?php echo $row['id'] ?>" class="panel-collapse collapse in" role="tabpanel">
						<div class="panel-body">
							<?php
								$sql_disciplinas = $db->select("SELECT aulas_alocadas.*, disciplinas.id AS id_disciplina, disciplinas.nome
									FROM aulas_alocadas
									INNER JOIN disciplinas ON aulas_alocadas.id_disciplina=disciplinas.id
									WHERE aulas_alocadas.id_turma='$id_turma' AND id_aula='$id'
									GROUP BY aulas_alocadas.id_disciplina
									ORDER BY disciplinas.nome
									");

								$conta=1;
								if($db->rows($sql_disciplinas)){
																

									while($line = $db->expand($sql_disciplinas)){

										$id_disciplina = $line['id_disciplina'];

										if($conta==1){
										echo '
											<div class="row">
											  		<div class="col-md-2">
											  			<div class="form-group">
															<label class="control-label mb-10 text-left">Liberação da Aula:</label>	
											  				<input type="hidden" name="id_turma_libera[]" value="'.$id_turma.'">
											  				<input type="date" name="data_liberacao_aula[]" value="'.$line['data_liberacao'].'" class="form-control">
											  			</div>	
											  		</div>
											  	</div>
										';
										}

										echo '

											<div class="panel-group accordion-struct" id="accordionx'.$id_turma.'">
											  <div class="panel panel-default">

											  	
											  	

											    <div class="panel-heading">
											      <h4 class="panel-title">
											        <a data-toggle="collapse" data-parent="#accordionx'.$id_turma.'" href="#collapse_dis'.$id_disciplina.'" style="text-transform: uppercase;">
											        '.$line['nome'].'</a>
											      </h4>
											    </div>
												    <div id="collapse_dis'.$id_disciplina.'" class="panel-collapse collapse">
												      <div class="panel-body">
												';
												

														$sel_aulas = $db->select("SELECT aulas_alocadas.*, aula.titulo
															FROM aulas_alocadas
															INNER JOIN aula ON aulas_alocadas.id_aula=aula.id
															WHERE aulas_alocadas.id_disciplina='$id_disciplina' AND aulas_alocadas.id_turma='$id_turma'
															ORDER BY aulas_alocadas.ordem, aula.id
															");

														echo '
														<div class="col-md-12" >
															<div class="dd nestable" id="">
																<ol class="dd-list">
														';
														$contador = 1;

														while ($line_aula = $db->expand($sel_aulas)) {
															
															echo '
																 <li class="dd-item dd3-item" data-id="'.$contador.'">
																	  <div class="dd-handle dd3-handle"></div>
																	  <div class="dd3-content">'.$line_aula['titulo'].'</div>
																	  <input type="hidden" name="ordem_aulas[]" value="'.$line_aula['id_aula'].'&@&'.$id_disciplina.'&@&'.$id_turma.'">
																</li>
															';

															$contador++;

														}

														echo '
																</ol>
															</div>															
														</div>																
														';


												echo '      	
												      </div>
												    </div>
												  </div>											  
											</div>

										';

										$conta++;
										
									}
								
								} else {
									echo 'Nenhuma disciplina ou módulo cadastrado para a turma!';
								}

							?>
						</div>
					</div>

				</div>
				<?php
				}
				?>
											
											
											
			</div>
			</div>
			</div>

		</div>	
	</div>




</div>
</div>
</form>


<?php include("../../includes/rodape.php"); ?>	