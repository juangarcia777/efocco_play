<?php include("../../includes/topo.php"); ?>


<div class="page-wrapper">
<div class="container-fluid mtop20" >
<div class="row">

	<div class="col-md-12">
		<div class="panel panel-default card-view">
			<div class="row">

            <div class="col-md-12">
                        <div class="table-wrap">
										<div class="table-responsive">
											<table id="aulas" class="table table-hover display  pb-30" data-locale="pt-BR">
												<thead>
													<tr>
														<th width="50%">Título</th>
														<th>Criação</th>
														<th>Liberação</th>
														<th width="30%"></th>
													</tr>
												</thead>
												
												<tbody>

                                                <?php
                                                    $search_aulas_desalocadas= $db->select("SELECT * FROM aula AS t1
                                                    WHERE NOT EXISTS (SELECT * FROM aulas_alocadas AS t2 WHERE t1.id = t2.id_aula) ORDER BY id DESC");

                                                    if($db->rows($search_aulas_desalocadas)){
                                                        while($aulas_desalocadas= $db->expand($search_aulas_desalocadas)){
                                                            
                                                            echo '<tr>';
                                                            echo '<td>'.$aulas_desalocadas['titulo'].'</td>';
                                                            echo '<td>'.data_mysql_para_user($aulas_desalocadas['data']).'</td>';
                                                            echo '<td>';

                                                                if($aulas_desalocadas['data_liberacao']=='0000-00-00'){
                                                                    echo data_mysql_para_user($aulas_desalocadas['data']);
                                                                } else {
                                                                    echo data_mysql_para_user($aulas_desalocadas['data_liberacao']);	
                                                                }

                                                            ?>
                                                            
                                                            </td>
																

																<td>

																<a data-id="<?php echo $aulas_desalocadas['id']; ?>" data-post="controlers/professor/deleta_aula.php" data-title="Confirma a exclusão do registro?" data-text="A ação não podera ser desfeita!" data-return="aulas_desalocadas" data-opcao="9" onclick="javascript:void(0)" class="btn btn-danger btn-icon-anim btn-square apaga-elemento" style="float:right; margin-left: 5px;"><i class="icon-trash"></i></a>

																<a href="edita-aula/<?php echo $aulas_desalocadas['id'] ?>" class="btn btn-default btn-icon-anim btn-square edita-aula" style="float:right; margin-left: 5px;"><i class="fa fa-pencil"></i></a>

																<a href="aloca_aula_turmas/<?php echo $aulas_desalocadas['id'] ?>" class="btn btn-info btn-icon-anim btn-square aloca" style="float: right; margin-left: 5px; "><i class="fa fa-exchange"></i></a>

																<a  href="exibe_aula/<?php echo $aulas_desalocadas['id'] ?>" class="btn btn-primary btn-icon-anim btn-square exibi" style="float: right;"><i class="icon-eye" ></i></a>

																

																</td>
                                                            </tr>
                                                            
                                                            <?php
                                                            }
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
</div>	
</div>





<?php include("../../includes/rodape.php"); ?>
