<?php
	
	include("../../includes/topo.php");


?>


		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Alocação de Turmas em Cursos</h5>
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
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Selecione o Curso em que se deseja alocar as turmas</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form method="post" action="">
												<div class="form-group mb-30">
													<label class="control-label mb-10 text-left">Curso</label>
													<select class="form-control" name="curso">
														<?php

															if (isset($_POST['curso'])) {
																$id_curso=$_POST['curso'];
																$verifica = $db->select("SELECT * FROM cursos WHERE id = '$id_curso' LIMIT 1");
																$linha = $db->expand($verifica);
																echo '
																	<option value="'.$_POST['curso'].'">'.$linha['nome'].'</option>
																';
															}

															$verifica = $db->select("SELECT * FROM cursos ORDER BY nome");

															while ($linha = $db->expand($verifica)) {

																echo '
																	<option value="'.$linha['id'].'">'.$linha['nome'].'</option>
																';

															}

														?>
													</select>
												</div>

												<div class="row" style="margin-top: 15px;">
													<div class="col-md-12">
														<button class="btn  btn-success" type="submit" style="float: right;">Selecionar</button>
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


				<?php 

				if (isset($_POST['curso'])) {
					# code...
				?>
				
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Turmas</h6>
								</div>
								
							</div>

							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<form method="post" action="controlers/alocacao/turmas-em-cursos.php" >
											<input type="hidden" name="id_curso" <?php echo 'value="'.$id_curso.'"';?>> 
												<table id="alunos" class="table table-hover display tabelas_data pb-30" >
													<thead>
														<tr>
															<th>Nome</th>
															<th>Unidade</th>
															<th>Período Letivo</th>
															<th style="text-align: center;">Cadastrada</th>
														</tr>
													</thead>
													
													<tbody>

														<?php

														// LISTA TODOS OS ALUNOS
														$verifica = $db->select("SELECT * FROM turma ORDER BY nome");
														
														while ($linha = $db->expand($verifica)) {

															$check='';	

															$id_turma = $linha['id'];

															$bol = $db->select("SELECT id FROM cursos_turmas WHERE id_turma='$id_turma' AND id_curso='$id_curso' LIMIT 1");
															if($db->rows($bol)){
																$check='checked="checked"';
															}	



															echo '<tr>';
																echo '<td>'.$linha['nome'].'</td>';
																echo '<td>'.$linha['unidade'].'</td>';
																echo '<td>'.$linha['periodo_letivo'].'</td>';
																echo '<td style="text-align: center;">
																			<div class="checkbox checkbox-success">
																				<input onclick="addTurmaCurso('.$linha['id'].','.$id_curso.')" id="checkbox'.$linha['id'].'" type="checkbox" '.$check.' name="checkbox['.$linha['id'].']">
																				<label for="checkbox'.$linha['id'].'"></label>
																			</div>
																		</td>';
															echo '</tr>';

														}

														?>

													</tbody>
												</table>
											
										</div>
									</div>
									
									</form>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /Row -->

				<?php

				}

				?>


				
			</div>
			
			<?php

			include("../../includes/rodape.php");

			?>