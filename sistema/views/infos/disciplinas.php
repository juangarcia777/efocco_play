<?php
	
	include("../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM EDITADAS */
	$db = new DB();
	$verifica = $db->select("SELECT * FROM disciplinas WHERE id = '$id'");
	$linha = $db->expand($verifica);
	$id_disciplina = $linha['id'];

?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light"><?php echo $linha['nome']; ?></h5>
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
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form class="form-horizontal">
												<div class="form-group mb-0">
													<div class="col-sm-12">
														<div class="row">

															<?php

																$id_prof = $linha['professor'];
																$verifica_coord = $db->select("SELECT * FROM professores WHERE id = '$id_prof'");

																if ($db->rows($verifica_coord)) {
																	$linha_coord = $db->expand($verifica_coord);
																	$nome_prof = $linha_coord['nome'];
																}

																else {

																	$nome_prof='NENHUM';

																}
															

															?>

															<div class="col-sm-12">
																<label class="control-label mb-10">Professor</label>
																<input type="text" class="form-control filled-input" value="<?php echo $nome_prof; ?>" readonly>
															</div>

														</div>
													</div>	
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
				
				<!-- Row -->
				

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<h4 class="mb-0">Turmas</h4>
								
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="disciplinas" class="table table-hover display  tabelas_data pb-30" data-locale="pt-BR">
												<thead>
													<tr>
														<th>Nome</th>
														<th>Unidade</th>
														<th>Periodo Letivo</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody>

													<?php

														$verifica_turma = $db->select("SELECT turma.*, turma_disciplinas.id_turma FROM turma INNER JOIN turma_disciplinas ON turma.id = turma_disciplinas.id_turma AND turma_disciplinas.id_disciplina = '$id'");

														while ($linha_turma = $db->expand($verifica_turma)) {

															echo '<tr>';
																echo '<td>'.$linha_turma['nome'].'</td>';
																echo '<td>'.$linha_turma['unidade'].'</td>';
																echo '<td>'.$linha_turma['periodo_letivo'].'</td>';
																echo '<td>

																<a href="infos_turmas/'.$linha_turma['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

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
			
		