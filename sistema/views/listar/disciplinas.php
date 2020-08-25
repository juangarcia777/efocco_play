<?php
	
	include("../../includes/topo.php");
?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Listagem de Disciplinas</h5>
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

						<a href="cadastrar_disciplinas"><button class="btn btn-success mbottom20">Novo Cadastro</button></a>
						
						<div class="panel panel-default card-view">
							
							<div class="panel-wrapper collapse in">
								<div class="panel-body">

								
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="disciplinas" class="table table-hover display tabelas_data pb-30" data-locale="pt-BR">
												<thead>
													<tr>
														<th width="30%">Nome</th>
														<th width="30%">Professor</th>
														<th>Horas</th>
														<th>Turno</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody>

													<?php

														$verifica = $db->select("SELECT * FROM disciplinas ORDER BY nome");

													
														while ($linha = $db->expand($verifica)) {

															$id_professor = $linha['professor'];

															$verifica_professor = $db->select("SELECT * FROM professores WHERE id = '$id_professor' LIMIT 1 ");
															$linha2 = $db->expand($verifica_professor);

															echo '<tr>';
																echo '<td>'.$linha['nome'].'</td>';
																echo '<td>'.$linha2['nome'].'</td>';
																echo '<td>'.$linha['horario'].'</td>';
																echo '<td>'.$linha['turno'].'</td>';
																echo '<td>

																<a data-id="'.$linha['id'].'" data-post="controlers/delete/delete_register.php" data-opcao="4" data-title="Confirma a exclusão do registro?" data-text="A ação não podera ser desfeita!" data-return="listar_disciplinas" onclick="javascript:void(0)" class="btn btn-danger btn-icon-anim btn-square apaga-elemento" style="float:right; margin-left: 10px;"><i class="icon-trash"></i></a>

																<a href="editar_disciplinas/'.$linha['id'].'" class="btn btn-default btn-icon-anim btn-square" style="margin-left: 10px; float:right;"><i class="fa fa-pencil"></i></a>

																<a href="infos_disciplinas/'.$linha['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float:right;"><i class="icon-eye"></i></a>


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
			
		