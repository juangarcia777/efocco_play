<?php
	
	include("../../includes/topo.php");


?>


        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Alocação de Alunos em Turmas</h5>
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
<form method="post" action="controlers/cadastros/finaliza_importacao_alunos.php">
				<!-- Row -->
					<div class="row">

						<?php if(isset($_SESSION['aviso-upload_users-sucesso'])){ ?>
						<div class="col-sm-12">

									<div class="alert alert-success alert-dismissable">
										 
										<i class=" ti-check-box pr-15"></i>Pronto, você fez upload dos alunos, mas ainda <b>NÃO</b> finalizou o cadastro. Selecione a turma abaixo para cadastra-los.
										<br>
										<i class="ti-help-alt pr-15"></i>Caso, você não tenha cadastrado a turma, faça o cadastro e volte aqui clicando no menu: <b>ALOCAÇÕES -> ALUNOS EM TURMAS</b>
									</div>


							</div>	
						<?php } unset($_SESSION['aviso-upload_users-sucesso']);?>	

						
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Selecione a turma em que se deseja cadastrar os alunos</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											
												<div class="form-group mb-10">
													<label class="control-label mb-10 text-left">Turma</label>
													<select class="form-control" name="turma" required>
														<option value="">--escolha a turma--</option>
														<?php

															$verifica = $db->select("SELECT * FROM turma ORDER BY nome");

															while ($linha = $db->expand($verifica)) {

																echo '
																	<option value="'.$linha['id'].'">'.$linha['nome'].'</option>
																';

															}

														?>
													</select>
												</div>

												
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->


			
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Alunos aguardando cadastro</h6>
								</div>
								<div class="clearfix"></div>
							</div>

							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											
												<table  class="table table-hover  pb-30" >
													<thead>
														<tr>
															<th width="10">
																<div class="checkbox checkbox-success">
																	<input checked id="checkboxcf" class="checkbox-all" type="checkbox">
																		<label for="checkboxcf"></label>
																</div>
															</th>
															<th>Nome</th>
															<th>CPF</th>
															<th>Já possui cadastro em alguma turma</th>
															
														</tr>
													</thead>
													
													<tbody>

														<?php

														// VERIFICA QUAIS ALUNOS FAZEM PARTE DAQUELA TURMA
														$verifica_turma = $db->select("SELECT * FROM aux_csv_alunos ORDER BY nome");
														$x=1;
														
														while ($linha = $db->expand($verifica_turma)) {
															
															$cpf_aguarde = $linha['cpf'];
															
															$verifica_cad = $db->select("SELECT users.id, turma_alunos.id_turma, turma.nome 
																FROM users 
																LEFT JOIN turma_alunos ON users.id = turma_alunos.id_aluno 
																LEFT JOIN turma ON turma_alunos.id_turma=turma.id
																WHERE users.cpf='$cpf_aguarde'
																");

															
															$array='';
															$array= array();
															if($db->rows($verifica_cad)){
																
																while ($fg = $db->expand($verifica_cad)) {																	
																	$array[] = array('turma' => $fg['nome']);
																}
															} else {
																$array='';	
															}
														
															echo '<tr>';
																echo '<td>
																<div class="checkbox checkbox-success">
																				<input checked id="checkbox'.$linha['id'].'" type="checkbox" class="select-checkbox"  name="checkbox[]" value="'.$linha['id'].'">
																				<label for="checkbox'.$linha['id'].'"></label>
																			</div>
																</td>
																<td>			
																'.$x.' - '.$linha['nome'].'</td>';
																echo '<td>'.$linha['cpf'].'</td>';

																echo '<td>';
																	if(!empty($array)){
																		if(is_array($array)){
																			foreach ($array as $value) {
																				echo $value['turma'].'<br>';
																			}
																		}
																	} else {
																		echo '<span class="text-danger">NÃO</span>';
																	}
																echo '</td>';

																
															echo '</tr>';
															$x++;

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

				

				<div class="row">
					<div class="col-md-6">
						<div class="button-box"> 
							<button type="submit" class="btn btn-success  mr-10">Cadastrar Selecionados</button> 
							<a class="btn btn-danger mr-10 " href="controlers/delete/cancela_importacao_alunos.php">Descartar Todos</a>
						</div>
					</div>
				</div>

				</form>

				
			</div>
			
			<?php

			include("../../includes/rodape.php");

			?>
			
		

