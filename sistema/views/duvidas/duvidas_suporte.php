<?php
	
	include("../../includes/topo.php");


	if(isset($edit)) {
		$edit= $db->select("SELECT * FROM suporte_prontas WHERE id='$edit'");
		$edicao= $db->expand($edit);
	}

	if(isset($delete)) {
		$del= $db->select("DELETE FROM suporte_prontas WHERE id='$delete'");
		$_SESSION['aviso-mensagem-ava'] = 'Pergunta e reposta apagada com sucesso! ';
		$_SESSION['aviso-tipo-ava'] = 'success';
	}

?>

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg  bg-blue">
					<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
						<h5 class="txt-light">Listagem de Dúvidas da Plataforma</h5>
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


									
										<div  class="tab-struct custom-tab-1 mt-40">
											<ul role="tablist" class="nav nav-tabs" id="myTabs_7">

												<li class="<?php echo (!isset($aba))?'active':'';?>" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_7" href="#home_7">AGUARDANDO RESPOSTA</a></li>
												
												<li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_7" role="tab" href="#profile_7" aria-expanded="false">ÚlTIMAS 30 RESPONDIDAS</a></li>

												<li role="presentation" class="<?php echo (isset($aba) && $aba==3)?'active':'';?>"><a  data-toggle="tab" id="nova_tab_7" role="tab" href="#new_tab_7" aria-expanded="false">NOVA PERGUNTA</a></li>

												
											</ul>
											<div class="tab-content" id="myTabContent_7">
												


												<div  id="home_7" class="tab-pane fade <?php echo (!isset($aba))?'active':'';?> in" role="tabpanel">
													
													<div class="table-wrap">
														<div class="table-responsive">
															<table id="turma" class="table table-hover display  pb-30 " data-locale="pt-BR">
																<thead>
																	<tr>
				                            <th>Dúvida</th>
																		<th>Nome do Aluno</th>
																		<th>Data e Hora</th>
																		<th></th>
																	</tr>
																</thead>
																
																<tbody>

																<?php

																		$verifica = $db->select("SELECT * FROM suporte_plataforma WHERE resposta = '' ORDER BY id DESC");
																		if($db->rows($verifica)){
																	
																		while ($linha = $db->expand($verifica)) {

				                                                            $data= substr($linha['data_pergunta'],0,10);
				                                                            $hora= substr($linha['data_pergunta'],11,19);

																			echo '<tr>';
																			echo '<td>'.$linha['pergunta'].'</td>';
																			echo '<td>'.$linha['nome_aluno'].'<br>';
																			echo '<td>'.data_mysql_para_user($data).' | '.$hora.'</td>';
																			echo '<td>


																				<a href="pergunta_suporte/'.$linha['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

																				</td>';
																			echo '</tr>';

																		}
																	}else {
																		echo '<tr><td>Nenhuma pergunta sem resposta!</td></tr>';
																	}
										
																	?>
																		
																</tbody>
															</table>
														</div>
													</div>


												</div>
												




												<div  id="profile_7" class="tab-pane fade" role="tabpanel">
													

													<div class="table-wrap">
														<div class="table-responsive">
															<table id="turma" class="table table-hover display  pb-30 " data-locale="pt-BR">
																<thead>
																	<tr>
				                            							<th>Dúvida</th>
																		<th>Nome do Aluno</th>
																		<th>Data e Hora</th>
																		<th>Data da resposta</th>
																		<th></th>
																	</tr>
																</thead>
																
																<tbody>

																<?php

																		$verifica = $db->select("SELECT * FROM suporte_plataforma WHERE resposta != '' ORDER BY id DESC LIMIT 30");
																		if($db->rows($verifica)){
																	
																		while ($linha = $db->expand($verifica)) {

				                                                            $data= substr($linha['data_pergunta'],0,10);
				                                                            $hora= substr($linha['data_pergunta'],11,19);
				                                                            $data1= substr($linha['data_resposta'],0,10);
				                                                            $hora1= substr($linha['data_resposta'],11,19);
																			echo '<tr>';
																			echo '<td>'.$linha['pergunta'].'</td>';
																			echo '<td>'.$linha['nome_aluno'].'<br>';
																			echo '<td>'.data_mysql_para_user($data).' | '.$hora.'</td>';
																			echo '<td>'.data_mysql_para_user($data1).' | '.$hora1.'</td>';
																			echo '<td>


																				<a href="pergunta_suporte/'.$linha['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

																				</td>';
																			echo '</tr>';

																		}
																	}else {
																		echo '<tr><td>Nenhuma pergunta sem resposta!</td></tr>';
																	}
										
																	?>
																		
																</tbody>
															</table>
														</div>
													</div>

												</div>


												<div id="new_tab_7" class="tab-pane fade <?php echo (isset($aba))?'active in':'';?>" role="tabpanel">
													<!-- CADASTRAR PERGUNTAS -->
														<div class="col-sm-12">
															<form
															<?php if(isset($edit)): ?>
																action="controlers/suporte/salva_edicao.php"
															<?php else: ?>
																action="controlers/suporte/salva_resposta.php"
															<?php endif; ?>
															method="POST">

															<?php if(isset($edit)): ?>
																<input type="hidden" name="id" value="<?php echo $edicao['id']; ?>">
															<?php else: ?>

															<?php endif; ?>

																<div class="form-group">
																	<label class="control-label mb-10 text-left">Nova Pergunta:</label>
																	<input
																	<?php if(isset($edicao)): ?>
																		value="<?php echo $edicao['pergunta'] ?>"
																	<?php endif; ?>
																	type="text"
																	class="form-control"
																	name="new_pergunta"
																	required="required">
																</div>
														</div>
														<div class="col-sm-12">
																<div class="form-group">
																	<label class="control-label mb-10 text-left">Resposta:</label>
																	<input
																	<?php if(isset($edicao)): ?>
																		value="<?php echo $edicao['resposta'] ?>"
																	<?php endif; ?>
																	type="text"
																	class="form-control"
																	name="resposta"
																	required="required">
																</div>
																<button type="submit" class="btn btn-success">Cadastrar</button>
																<hr>
															</form>
														</div>
													<!-------->


													<!-- PERGUNTAS CADASTRADAS -->
													<div class="col-sm-12">

														<?php 
														$search= $db->select("SELECT * FROM suporte_prontas ORDER BY id DESC");
														if($db->rows($search)){
														while($n= $db->expand($search)){
														?>

														<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
															<div class="panel panel-default">
																<div class="panel-heading" role="tab" id="headingOne">
																<h4 class="panel-title">
																	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $n['id']; ?>" aria-expanded="true" aria-controls="collapse">
																	<?php echo $n['pergunta']; ?>
																	</a>
																</h4>
																</div>
																<div id="collapse<?php echo $n['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
																	<div class="panel-body">
																		<?php echo $n['resposta']; ?>
																	</div>

																		<div class="well">
																			<a href="suporte?edit=<?php echo $n['id']; ?>&aba=3" class="btn btn-default btn-icon-anim btn-square text text-primary" ><i class="fa fa-pencil"></i></a>

																			<a href="suporte?delete=<?php echo $n['id']; ?>" class="btn btn-danger btn-icon-anim btn-square text text-primary"><i class="fa fa-trash"></i></a>
																		</div>
																		
																</div>
																
															</div>
														</div>
														<?php }} ?>
													</div>
													<!----------->


												</div>
												
											</div>
										</div>
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
			
	