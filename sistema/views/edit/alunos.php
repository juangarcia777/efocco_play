<?php
include("../../includes/topo.php");
$db = new DB();
$verifica = $db->select("SELECT * FROM users WHERE id = '$id'");
$linha = $db->expand($verifica);
?>



<div class="page-wrapper">
<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
							<h5 class="txt-light">Edição de Informações do Aluno</h5>
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
					
					
					<div class="panel panel-default card-view">
					<div class="panel-body">



						
						<form method="post" action="controlers/edit/edita_aluno.php">
												
							<input type="hidden" name="id_aluno" value="<?php echo $id; ?>">

							<div class="row">

												

												<div class="col-md-4">
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

												<div class="col-md-4">
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

												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Status</label>
														<select class="form-control" name="situacao">

														<?php 
															echo '<option value="'.$linha['situacao'].'" selected>'.$linha['situacao'].'</option>';

															if($linha['situacao']=='Ativo'){
																echo '<option value="Evadido">Evadido</option>';
																echo '<option value="Trancado">Trancado</option>';
																echo '<option value="Cancelado">Cancelado</option>';
																echo '<option value="Transferido">Transferido</option>';
															} else {

																echo '<option value="Ativo">Ativo</option>';
																echo '<option value="Evadido">Evadido</option>';
																echo '<option value="Trancado">Trancado</option>';
																echo '<option value="Cancelado">Cancelado</option>';
																echo '<option value="Transferido">Transferido</option>';
															

															}




														?>	

														
														</select>
													</div>
												</div>

												<div class="col-md-2">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Data de Cadastro</label>
														<input type="date" class="form-control" name="data_cadastro"

														<?php echo '

														value="'.$linha['data_cadastro'].'"
														
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
														<label class="control-label mb-10 text-left">SENHA</label>
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
														<label class="control-label mb-10 text-left">RG</label>
														<input type="text" class="form-control" name="rg_aluno"

														<?php echo '

														value="'.$linha['rg'].'"
														
														'; 

														?>

														>
													</div>
												</div>

												<div class="col-md-2">
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
												
												<div class="col-md-5">
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

												<div class="col-md-5">
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


												<div class="col-md-12">



													<div class="form-group">
														<label class="control-label mb-10 text-left">Manutenção de Turmas</label>
														
															
																<p class="text-muted"> Selecione as turmas em que o aluno esta matriculado</p>
																<div class="row mt-10">
																	<div class="col-sm-12">
																		<select multiple id="public-methods" name="turmas[]">

																			<?php

																				// SELECIONA AS TURMAS QUE ELE ESTÁ CADASTRADO
																				$seleciona2 = $db->select("SELECT * FROM turma_alunos WHERE id_aluno='$id'");

																				$turmas_cadastradas=array();

																				while ($linha2 = $db->expand($seleciona2)) {
																					// SELECIONO O ID DA TURMA E FAÇO A BUSCA PELO NOME DELA
																					$busca_turma = $linha2['id_turma'];
																					$seleciona_turma = $db->select("SELECT * FROM turma WHERE id='$busca_turma'");
																					$linha3 = $db->expand($seleciona_turma);

																					echo '<option selected value="'.$linha3['id'].'">'.$linha3['nome'].'</option>';

																					array_push($turmas_cadastradas, $linha3['id']);

																				}

																			?>

																			<?php

																				$seleciona2 = $db->select("SELECT * FROM turma ORDER BY nome");

																				while ($linha2 = $db->expand($seleciona2)) {

																					if (!in_array($linha2['id'], $turmas_cadastradas)) {
																						echo '<option value="'.$linha2['id'].'">'.$linha2['nome'].'</option>';
																					}
																					
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


												<div class="col-md-12">
													<hr>
													<button class="btn  btn-success" type="submit" style="float: right;">SALVAR</button>
												</div>
								</div>
						</form>


						


								
	
		</div>		
		</div>						

</div>		
</div>


<?php include("../../includes/rodape.php"); ?>	
