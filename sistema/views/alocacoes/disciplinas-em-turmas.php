<?php
	
	include("../../includes/topo.php");


?>

<?php

if (isset($_GET['turma'])) {
	$id_turma=$_GET['turma'];
	$verifica = $db->select("SELECT * FROM turma WHERE id = '$id_turma' LIMIT 1");
	$linha = $db->expand($verifica);
	$name = $linha['nome'];																
}
?>


        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">
						<?php if (isset($_GET['turma'])) { echo $name; ?>
							
						<?php } else { ?>	
							Alocação de Disciplinas em Turmas
						<?php }  ?>		
						</h5>
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
						<div class="col-sm-12 <?php if (isset($_GET['turma'])) {echo 'hide';} ?>">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Selecione a Turma em que se deseja alocar as disciplinas</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form method="get" action="">
												<div class="form-group mb-30">
													<label class="control-label mb-10 text-left">Turma</label>
													<select class="form-control" name="turma" required>
														<?php

															if (isset($_GET['turma'])) {
																$id_turma=$_GET['turma'];
																$verifica = $db->select("SELECT * FROM turma WHERE id = '$id_turma' LIMIT 1");
																$linha = $db->expand($verifica);
																echo '
																	<option value="'.$_GET['turma'].'">'.$linha['nome'].'</option>
																';
															}

															$verifica = $db->select("SELECT * FROM turma ORDER BY nome");
															echo '<option value="">--escolha--</option>';
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

				if (isset($_GET['turma'])) {
					# code...
				?>
				
				<form method="post" action="controlers/alocacao/disciplinas-em-turmas.php">
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h5 class="panel-title txt-dark">Escolha as disciplinas para alocar na turma:<br> <strong><?php echo $name; ?></strong></h5>
								</div>

							<div class="row">
								<div class="col-md-12" style="margin-top: 20px">

									<div class="checkbox checkbox-success">
										<input type="checkbox" name="aloca_tudo" value="1" id="checkboxx" checked>
										<label for="checkboxx"> <strong>ALOCAR TUDO (AULAS, QUESTIONÁRIOS E ARQUIVOS) JUNTO COM A DISCIPLINA</strong></label>
									</div>
									
								</div>	
							</div>
								
							</div>

							<div class="panel-wrapper collapse in " style="margin-top: 40px">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<input type="hidden" name="id_turma" <?php echo 'value="'.$id_turma.'"';?>> 
												<table id="alunos" class="table table-hover display   pb-30" >
													<thead>
														<tr>
															<th>Nome</th>
															<th>Professor</th>
															
															<th></th>
														</tr>
													</thead>
													
													<tbody>

														<?php

														// VERIFICA QUAIS DISCIPLINAS FAZEM PARTE DAQUELA TURMA
														$verifica_turma = $db->select("SELECT disciplinas.id, turma_disciplinas.id_turma FROM disciplinas INNER JOIN turma_disciplinas ON disciplinas.id = turma_disciplinas.id_disciplina AND turma_disciplinas.id_turma='$id_turma'");

														//ALOCO EM UM ARRAY
														$array_disciplina = array();
														while ($linha_turma = $db->expand($verifica_turma)) {
															array_push($array_disciplina,$linha_turma['id']);
														}

														// LISTA TODAS AS DISCIPLINAS
														$verifica = $db->select("SELECT * FROM disciplinas ORDER BY nome");
														
														while ($linha = $db->expand($verifica)) {

															$id_professor = $linha['professor'];

															$verifica_professor = $db->select("SELECT * FROM professores WHERE id = '$id_professor' LIMIT 1 ");
															$linha2 = $db->expand($verifica_professor);

															$check='';	



															// VERIFICA SE A DISCIPLINA JÁ ESTÁ NA TURMA
															if (in_array($linha['id'], $array_disciplina))
															  {
															  $check='1';
															  }


															echo '<tr>';
																echo '<td>'.$linha['nome'].'</td>';
																echo '<td>'.$linha2['nome'].'</td>';
																
																echo '<td style="text-align: center;">';

																	if($check==''){
																		echo '<button class="btn btn-success" value="'.$linha['id'].'" name="alocar">Alocar</button>';
																	} else {
																		echo '<a href="controlers/alocacao/disciplinas-em-turmas.php?id_disciplina='.$linha['id'].'&id_turma='.$id_turma.'&apaga_alocacao=1"><span style="color:#990000"><strong>JÁ  ALOCADA</strong></span></a>';
																		echo '';
																	}

																echo '</td>';
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
				</form>
			
				<!-- /Row -->

				<?php

				}

				?>


				
			</div>

			
			
			<?php

			include("../../includes/rodape.php");

			?>
		