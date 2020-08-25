<?php
	
	include("../../includes/topo.php");
?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Listagem de Dúvidas de Alunos</h5>
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

									
									
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="turma" class="table table-hover display  pb-30 " data-locale="pt-BR">
												<thead>
													<tr>
                                                        <th>Nome</th>
														<th>Discplina</th>
														<th>Data e Hora</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody>

												<?php

														$verifica = $db->select("SELECT * FROM duvidas_aulas WHERE resposta='' ORDER BY id DESC");
														if($db->rows($verifica)){
													
														while ($linha = $db->expand($verifica)) {

                                                            $data= substr($linha['data_hora'],0,10);
                                                            $hora= substr($linha['data_hora'],11,19);

															echo '<tr>';
																echo '<td>'.$linha['nome_aluno'].'</td>';
																echo '<td>'.$linha['nome_disciplina'].'</td>';
																echo '<td>'.data_mysql_para_user($data).' | '.$hora.'</td>';
																echo '<td>


																<a href="duvida_item/'.$linha['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

																</td>';
															echo '</tr>';

														}
													} else {
														echo '<tr><td>Nenhuma pergunta sem resposta!</td></tr>';
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
			
	