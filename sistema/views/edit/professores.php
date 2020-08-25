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
							<h5 class="txt-light">Edição de Informações do Professor</h5>
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
										<h6 class="panel-title txt-dark">Preencha o Formulário</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
									<div class="row">	
										
											<form method="post" action="controlers/edit/edita_professor.php">
												<input type="hidden" name="id_professor" value="<?php echo $id; ?>">
												<div class="col-md-9">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Nome</label>
														<input type="text" class="form-control" name="nome" required="required"
														<?php echo '

														value="'.$linha['nome'].'"
														
														'; 

														?>
														>
													</div>
												</div>

												<div class="col-md-3" >
													<div class="form-group">
														<label class="control-label mb-10 text-left">Coordenador</label>
														<select class="form-control" name="turma_coordenador">

															<?php
															$turma_coordenador = $linha['turma_coordenador'];
															if($turma_coordenador==1){
																echo '<option value="1" selected>SIM</option>';
																echo '<option value="0">NÃO</option>';
															} else {
																echo '<option value="0" selected>NÃO</option>';
																echo '<option value="1">SIM</option>';
															}
															?>

															
														</select>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">CPF</label>
														<input type="text" class="form-control cpf" name="usuario" required="required"
														<?php echo '

														value="'.$linha['usuario'].'"
														
														'; 

														?>
														>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Senha</label>
														<input type="text" class="form-control" name="senha" required="required"
														<?php echo '

														value="'.$linha['senha'].'"
														
														'; 

														?>
														>
													</div>
												</div>

												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Currículo</label>
														<textarea class="tinymce" name="curriculo"><?php echo base64_decode($linha['curriculo']); ?></textarea>
													</div>
												</div>


												<div class="col-md-12">
													<hr>
													<button class="btn  btn-success" type="submit" style="float: right;">Alterar</button>
												</div>



											</form>

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
				
			