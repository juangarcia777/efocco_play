<?php include("../../includes/topo.php"); ?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Listagem de Coordenadores</h5>
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

						<a href="cadastrar_professores"><button class="btn btn-success mbottom20">Novo Cadastro</button></a>
						
						<div class="panel panel-default card-view">
							
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="alunos" class="table table-hover display  pb-30 tabelas_data" data-locale="pt-BR">
												<thead>
													<tr>
														<th>Nome</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody>

													<?php

														$verifica = $db->select("SELECT nome,id  FROM professores WHERE turma_coordenador != '0' ORDER BY nome");

													
														while ($linha = $db->expand($verifica)) {

															echo '<tr>';
																echo '<td>'.$linha['nome'].'</td>';
																echo '<td>

																<a data-id="'.$linha['id'].'" data-post="controlers/delete/delete_register.php" data-opcao="6" data-title="Confirma a exclusão do registro?" data-text="A ação não podera ser desfeita!" data-return="listar_adm" onclick="javascript:void(0)" class="btn btn-danger btn-icon-anim btn-square apaga-elemento" style="float:right; margin-left: 10px;"><i class="icon-trash"></i></a>

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
			

<?php include("../../includes/rodape.php"); ?>
			
	