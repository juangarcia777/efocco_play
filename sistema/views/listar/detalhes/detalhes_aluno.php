<?php
require ("../../../config.php");
$db = new DB();
?>
<div  class="pills-struct">
	
	<ul role="tablist" class="nav nav-pills" id="myTabs_9">
		
		<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_9" href="#home_9">Cursos Realizados</a></li>

	</ul>
	

	<div class="tab-content" id="myTabContent_9">
		
			<div  id="home_9" class="tab-pane fade active in" role="tabpanel">
				<div class="table-responsive">
					<table class="table table-hover display  pb-30 tabelas_data" data-locale="pt-BR">
						<thead>
							<tr>
								<th>CURSO REALIZADO</th>	
								<th>STATUS</th>								
							</tr>
						</thead>
						<tbody>
						<?php
							$select = $db->select("SELECT turma.nome, turma.id, turma_alunos.status FROM turma INNER JOIN turma_alunos ON turma.id = turma_alunos.id_turma AND turma_alunos.id_aluno = '$id'");

							if($db->rows($select)){
								while ($line = $db->expand($select)) {								
							?>		
							<tr>
								<td><?php echo $line['nome']; ?></td>	
								<td><?php echo StatusAluno($line['status']); ?></td>									
							</tr>
							<?php 
								}
							} else {
							?>
							<tr>
								<td colspan="10">Nenhum registro encontrado.</td>									
							</tr>
							<?php 
							}
							?>		
						</tbody>
					</table>	
				</div>
			</div>


	</div>
	
	

</div>