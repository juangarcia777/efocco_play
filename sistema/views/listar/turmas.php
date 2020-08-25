<?php
	
	include("../../includes/topo.php");
?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Listagem de Turmas</h5>
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

						<a href="cadastrar_turma"><button class="btn btn-success mbottom20">Novo Cadastro</button></a>
						
						<div class="panel panel-default card-view">
							
							<div class="panel-wrapper collapse in">
								<div class="panel-body">

									
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="turma" class="table table-hover display  pb-30 tabelas_data" data-locale="pt-BR">
												<thead>
													<tr>
														<th>Nome</th>
														<th>Data Criação</th>
														<th>Unidade</th>
														<th>Coordenador</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody>

													<?php


														if($AdministradorAVA!=0){

															$verifica = $db->select("SELECT turma.*, professores.nome AS coord 
															FROM turma 
															LEFT JOIN professores ON turma.coordenador_turma=professores.id
															ORDER BY turma.nome");

														} else if($CoordenadorTurma!=0){	

															$verifica = $db->select("SELECT turma.*, professores.nome AS coord 
															FROM turma 
															LEFT JOIN professores ON turma.coordenador_turma=professores.id
															WHERE turma.coordenador_turma='$id_logado'
															ORDER BY turma.nome");



														} else {

															$verifica = $db->select("SELECT id FROM turma 
															WHERE id='0'");

														}

														
		
														while ($linha = $db->expand($verifica)) {

															echo '<tr>';
																echo '<td>'.$linha['nome'].'</td>';
																echo '<td>'.data_mysql_para_user($linha['data_entrada']).'</td>';
																echo '<td>'.$linha['unidade'].'</td>';
																echo '<td>'.$linha['coord'].'</td>';
																echo '<td>

																<a data-id="'.$linha['id'].'" data-post="controlers/delete/delete_register.php" data-opcao="5" data-title="Confirma a exclusão do registro?" data-text="A ação não podera ser desfeita!" data-return="listar_turmas" onclick="javascript:void(0)" class="btn btn-danger btn-icon-anim btn-square apaga-elemento" style="float:right; margin-left: 10px;"><i class="icon-trash"></i></a>

																<a href="editar_turma/'.$linha['id'].'" class="btn btn-default btn-icon-anim btn-square" style="margin-left: 10px; float:right;"><i class="fa fa-pencil"></i></a>

																<a href="infos_turmas/'.$linha['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float:right;"><i class="icon-eye"></i></a>

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
			
			<?php

			include("../../includes/rodape.php");

			?>
			
	