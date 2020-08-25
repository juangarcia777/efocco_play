<?php include("../../includes/topo.php"); ?>

<form method="post" action="controlers/cadastros/aloca_aulas.php" >

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
		<button class="btn btn-block btn-success btn-lg mtop5">AVANÇAR</button>
	</div>	

	<div class="col-md-12">

		<h5>Marque em quais turmas/disciplinas ou módulos a aula será exibida</h5>

		<div class="row">
			<div class="panel-wrapper collapse in">
			<div class="panel-body">
			<div class="panel-group accordion-struct" id="accordion_1" role="tablist" aria-multiselectable="true">
			
				<?php 
				$explode = '';
				if($AdministradorAVA!=0){

					$sql = $db->select("SELECT id, nome
					FROM turma 
					ORDER BY nome");

				} else if($CoordenadorTurma!=0){


					$sql = $db->select("SELECT turma.id, turma.nome, disciplinas.professor, turma_disciplinas.id_disciplina 
								FROM turma 
								LEFT JOIN turma_disciplinas ON turma.id=turma_disciplinas.id_turma
								LEFT JOIN disciplinas ON turma_disciplinas.id_disciplina=disciplinas.id
								WHERE turma.id!='0' AND turma.coordenador_turma='$id_logado'
								GROUP BY turma.id
								ORDER BY turma.nome ");

				} else {

					$sql = $db->select("SELECT turma.id, turma.nome, disciplinas.professor, turma_disciplinas.id_disciplina 
								FROM turma 
								LEFT JOIN turma_disciplinas ON turma.id=turma_disciplinas.id_turma
								LEFT JOIN disciplinas ON turma_disciplinas.id_disciplina=disciplinas.id
								WHERE turma.id!='0' AND disciplinas.professor='$id_logado'
								GROUP BY turma.id
								ORDER BY turma.nome ");

				}


				while($row = $db->expand($sql)){
					$id_turma = $row['id'];
					$contador = 0;

					$explode .= $id_turma.',';

					$pega = $db->select("SELECT COUNT(*) AS total FROM aulas_alocadas WHERE id_aula='$id' AND id_turma='$id_turma'");
					if($db->rows($pega)){
						$raw = $db->expand($pega);
						$contador = $raw['total'];
					}

				?>								
				<div class="panel panel-default">
					<div class="panel-heading " role="tab" id="heading_<?php echo $row['id'] ?>" style=" position: relative;">
						<a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapse_<?php echo $row['id'] ?>" aria-expanded="true" style="text-transform: uppercase; font-size: 17px; font-weight: 300">- <?php echo $row['nome'] ?>
						
						</a> 
						<span class="dados_qtd_disciplinas">(<?php echo $contador; ?>)</span>		
					</div>
					
					<div id="collapse_<?php echo $row['id'] ?>" class="panel-collapse collapse" role="tabpanel">
						<div class="panel-body">
							<?php
								$sql_disciplinas = $db->select("SELECT turma_disciplinas.id_disciplina, disciplinas.nome
									FROM turma_disciplinas
									LEFT JOIN disciplinas ON turma_disciplinas.id_disciplina=disciplinas.id

									WHERE turma_disciplinas.id_turma='$id_turma'
									ORDER BY disciplinas.nome
									");

								if($db->rows($sql_disciplinas)){									

									while($line = $db->expand($sql_disciplinas)){

										$id_disciplina = $line['id_disciplina'];
										
										$check ='';
										$peq = $db->select("SELECT id FROM aulas_alocadas WHERE id_aula='$id' AND id_turma='$id_turma' AND id_disciplina='$id_disciplina' LIMIT 1");
										if($db->rows($peq)){
											$check = 'checked';
										} 

										

										echo '<div class="panel-heading " role="tab">';		
											
											echo '
												<div class="checkbox checkbox-success">
														<input '.$check.' id="checkbox'.$line['id_disciplina'].'_'.$id_turma.'" type="checkbox" name="turma_disciplinas[]" value="'.$line['id_disciplina'].'&@&'.$id_turma.'">
														<label for="checkbox'.$line['id_disciplina'].'_'.$id_turma.'" style="text-transform: uppercase;">
															'.$line['nome'].'
														</label>
													</div>
											';											
										echo '</div>';

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



	<?php 

		

			$where = '';
			$bb = explode(',', $explode);
			if(count($bb)>0){
				foreach($bb as $cat) {
					if(!empty($cat)){
						$where .= " AND id_turma!='$cat'";
					}				    
				}
			}
			

			$peq = $db->select("SELECT id_disciplina, id_turma  
				FROM aulas_alocadas 
				WHERE id_aula='$id' $where
				");

			while($linex = $db->expand($peq)){
				echo '<input checked type="checkbox" name="turma_disciplinas[]" value="'.$linex['id_disciplina'].'&@&'.$linex['id_turma'].'" class="hide">';
			}



	
	?>		




</div>
</div>
</form>


		


<?php include("../../includes/rodape.php"); ?>	