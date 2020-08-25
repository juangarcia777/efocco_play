<?php
		
	include("../../includes/topo.php");

	/* SELECIONA AS INFORMAÇÕES PARA SEREM EDITADAS */
	$db = new DB();
	$verifica = $db->select("SELECT * FROM users WHERE id = '$id'");
	$linha = $db->expand($verifica);
?>


	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		<div class="wrapper">
			<?php

				include("../../includes/menu_topo.php");

			?>

			<?php

				include("../../includes/menu_admin.php");

			?>
			
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
							<h5 class="txt-light">Editar Perfil</h5>
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

							<?php

							if (isset($_SESSION['aviso-edicao-perfil']) && $_SESSION['aviso-edicao-perfil'] == 1) {

								echo '

								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<i class="ti-check pr-15"></i>Eba! As informações do seu perfil foram alteradas com sucesso! 
								</div>


								';								

							}

							if (isset($_SESSION['aviso-edicao-perfil']) && $_SESSION['aviso-edicao-perfil'] == 2) {

								echo '

									<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<i class="ti-na pr-15"></i>Eita! Esse CPF e/ou USUÁRIO já estão cadastrados!
									</div>

								';

							}

							unset($_SESSION['aviso-edicao-perfil']);

							?>
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Preencha o Formulário</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form enctype="multipart/form-data" method="post" <?php echo 'action="'.ADMIN_DIR.'controlers/edit/edita_perfil.php"';?>>
												<input type="hidden" name="id_usuario" value="<?php echo $id; ?>">

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Nome</label>
														<input type="text" class="form-control" name="nome_aluno" required="required" 

														<?php echo '

														value="'.$linha['nome'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Email</label>
														<input type="email" class="form-control" name="email_aluno"

														<?php echo '

														value="'.$linha['email_aluno'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Celular</label>
														<input type="text" class="form-control celular_ddd" name="celular_aluno" required="required"

														<?php echo '

														value="'.$linha['celular_aluno'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Telefone</label>
														<input type="text" class="form-control telefone_ddd" name="telefone_aluno"

														<?php echo '

														value="'.$linha['telefone_aluno'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Telefone de Trabalho</label>
														<input type="text" class="form-control telefone_ddd" name="telefone_trab_aluno"

														<?php echo '

														value="'.$linha['telefone_trab_aluno'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">CPF</label>
														<input type="text" class="form-control cpf" name="cpf_aluno" required="required"

														<?php echo '

														value="'.$linha['cpf'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">RG</label>
														<input type="text" class="form-control" name="rg_aluno"

														<?php echo '

														value="'.$linha['rg'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">CEP</label>
														<input type="text" class="form-control cep" name="cep"

														<?php echo '

														value="'.$linha['cep'].'"
														
														'; 

														?>


														>
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Município Nascimento</label>
														<input type="text" class="form-control" name="municipio_nascimento"

														<?php echo '

														value="'.$linha['municipio_nascimento'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Logradouro</label>
														<input type="text" class="form-control" name="logradouro"

														<?php echo '

														value="'.$linha['logradouro'].'"
														
														'; 

														?>


														>
													</div>
												</div>


												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Bairro</label>
														<input type="text" class="form-control" name="bairro"

														<?php echo '

														value="'.$linha['bairro'].'"
														
														'; 

														?>


														>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Município</label>
														<input type="text" class="form-control" name="municipio"

														<?php echo '

														value="'.$linha['municipio'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Estado</label>
														<input type="text" class="form-control" name="estado" maxlength="2"

														<?php echo '

														value="'.$linha['estado'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Usuário</label>
														<input type="text" class="form-control cpf" name="usuario" required="required"

														<?php echo '

														value="'.$linha['usuario'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-4">
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

												<div class="col-md-4">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Foto<small>(80x80)</small></label>
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
															<span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Selecionar Arquivo</span> <span class="fileinput-exists btn-text">Alterar</span>
															<input type="file" name="file">
															</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remover</span></a> 
														</div>
													</div>
												</div>

												<div class="col-md-12">
													<button class="btn  btn-success" type="submit" style="float: right;">Editar</button>
												</div>
											</form>
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
				
			</div>
			<!-- /Main Content -->
		</div>
		<!-- /#wrapper -->
		
		<?php

	    	include("../../includes/include_js.php");

	    ?>

	</body>
</html>