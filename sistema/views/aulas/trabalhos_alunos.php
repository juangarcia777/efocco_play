<?php include("../../includes/topo.php"); ?>


<div class="page-wrapper">
<div class="container-fluid mtop20" >
<div class="row">


	
								<div class="panel">
			            			<div class="table-wrap">
										<div class="table-responsive">
											<table id="aulas" class="table table-hover display  pb-30" data-locale="pt-BR">
												<thead>
													<tr>

														<th width="30%">Trabalho</th>
														<th width="30%"><a class="btn btn-success modal-novo-trabalho"><i class="fa fa-plus"></i> Novo Trabalho</a></th>

													</tr>
												</thead>

												<tbody>

												<?php
													$search_trabalhos = $db->select("SELECT * FROM trabalhos WHERE id_aula='$aula'");
													
													while($trabalhos= $db->expand($search_trabalhos)){

												?>
                              
															<tr>
																<td><?php echo $trabalhos['titulo']; ?></td>

																<td>
																<a href="exibe_trabalhos_alunos/<?php echo $trabalhos['id']; ?>/<?php echo $trabalhos['id_turma']; ?>/<?php echo $trabalhos['id_disciplina']; ?>" class="btn btn-primary btn-icon-anim btn-square" style="float: left;margin-left: 10px"><i class="fa fa-arrow-right"></i></a>

                                <a class="btn btn-info btn-icon-anim btn-square modal-edita" data-id_trabalho="<?php echo $trabalhos['id'] ?>" data-id_aula="<?php echo $trabalhos['id_aula'] ?>" data-data_limite="<?php echo $trabalhos['limite_data'] ?>" data-titulo="<?php echo $trabalhos['titulo'] ?>" data-descricao="<?php echo $trabalhos['descricao'] ?>" style="float: left;margin-left: 10px"><i class="fa fa-pencil"></i></a>

                                <a  href="controlers/trabalhos/delete_trabalho.php?id=<?php echo $trabalhos['id']; ?>&aula=<?php echo $aula ?>&turma=<?php echo $turma ?>&disciplina=<?php echo $disciplina; ?>" class="btn btn-danger btn-icon-anim btn-square" style="float: left;margin-left: 10px"><i class="fa fa-trash" ></i></a>


																</td>
															</tr>

															
													
													<?php } ?>

												</tbody>
											</table>
										</div>
                </div>
							</div>
							</div>
						</div>
					</div>

				<a href="cria-nova-aula">
				    <div class="new_aula_button"><i class="fa  fa-plus"></i></div>
				</a>


<?php include("../../includes/rodape.php"); ?>


<script src="<?php echo SISTEMA_AVA; ?>js/set_modais.js"></script>	
