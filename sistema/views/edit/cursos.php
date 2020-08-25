<?php
	
	include("../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM EDITADAS */
	$db = new DB();
	$verifica = $db->select("SELECT * FROM cursos WHERE id = '$id'");
	$linha = $db->expand($verifica);
?>

			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
							<h5 class="txt-light">Edição de Informações do Curso</h5>
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

										<div class="form-wrap">
											<form method="post" action="controlers/edit/edita_curso.php" >
												<input type="hidden" name="id_curso" value="<?php echo $id; ?>">

												<div class="col-md-6">
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

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Data de Abertura</label>
														<input type="date" class="form-control" name="data_criacao"

														<?php echo '

														value="'.$linha['data_criacao'].'"
														
														'; 

														?>


														>
													</div>
												</div>

												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Descrição</label>
														<textarea class="tinymce" name="descricao">
															<?php
																echo $ContentDecoded = base64_decode($linha['descricao']);
															?>
														</textarea>
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
				
		