<?php
	
	include("../../includes/topo.php");
?>



        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">

				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">CADASTRO DE AVISOS</h5>
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
										<h6 class="panel-title txt-dark">CADASTRO DE AVISOS</h6>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
												<form method="post" action="controlers/avisos/salva_aviso.php" enctype="multipart/form-data">
													
													<div class="col-md-12 mb-30">
														<div class="form-group">
															<label class="control-label mb-10 text-left">Turmas</label>
													
														
															<p class="text-muted"> Selecione as turmas em que a disciplina irá participar</p>
															<div class="row mt-10">
																<div class="col-sm-12">
																	<select multiple id="public-methods" name="turmas[]">
																		<option value="0">TODAS AS TURMAS (AVISO GERAL)</option>
																		<?php

																			$seleciona = $db->select("SELECT * FROM turma ORDER BY nome");

																			while ($linha = $db->expand($seleciona)) {

																				echo '<option value="'.$linha['id'].'">'.$linha['nome'].'</option>';

																			}

																		?>
																		

																	</select>
																	<div class="button-box"> 
																		<a id="select-all" class="btn btn-success  mr-10 mt-15" href="#">selecionar todos</a> 
																		<a id="deselect-all" class="btn btn-danger btn-outline mr-10 mt-15" href="#">remover todos</a>
																	</div>
																</div>
															</div>
														</div>
													</div>													

													<div class="form-group mb-10">

														<label class="control-label mb-10 text-left">Carregar Arquivo</label>
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
															<span class="input-group-addon fileupload btn btn-danger btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Selecionar Arquivo</span> <span class="fileinput-exists btn-text">Alterar</span>
															<input type="file" name="file" required="required">
															</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remover</span></a> 
														</div>
													</div>

													<br>

													<div class="form-group mb-30">
													<label class="control-label mb-10 text-left">Texto breve do aviso</label>
													<input type="text" name="aviso" class="form-control" />
												</div>

													<hr>
												<button class="btn  btn-success" type="submit" style="float: right;">Enviar</button>
											</form>
										</div>
									</div>
								</div>

							</div>
						</div>

						

					</div>
					<!-- /Row -->



				<!-- /Row -->
			</div>
		</div>

			<?php

			include("../../includes/rodape.php");

			?>


