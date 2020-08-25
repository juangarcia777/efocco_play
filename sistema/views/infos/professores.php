<?php
	
	include("../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM EDITADAS */
	$db = new DB();
	$verifica = $db->select("SELECT * FROM professores WHERE id = '$id'");
	$linha = $db->expand($verifica);

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
								<div class="panel-heading">
									<h4 class="mb-10">Disciplinas em que atua</h4>
									
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										
										<div class="table-wrap">
											<div class="table-responsive">
												<table id="disciplinas" class="table table-hover display  pb-30 tabelas_data" data-locale="pt-BR" >
													<thead>
														<tr>
															<th>Nome</th>
															<th>Horário</th>
															<th>Turno</th>
															<th></th>
														</tr>
													</thead>
													
													<tbody>

														<?php

															$verifica_disc = $db->select("SELECT professores.*, disciplinas.* FROM professores INNER JOIN disciplinas ON professores.id = disciplinas.professor AND professores.id = '$id'");

														
															while ($linha_disc = $db->expand($verifica_disc)) {

																echo '<tr>';
																	echo '<td>'.$linha_disc['nome'].'</td>';
																	echo '<td>'.$linha_disc['horario'].'</td>';
																	echo '<td>'.$linha_disc['turno'].'</td>';
																	echo '<td>

																	<a href="infos_disciplinas/'.$linha_disc['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

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
	