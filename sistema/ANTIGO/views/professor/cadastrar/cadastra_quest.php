<?php	
include("../../../includes/topo.php");
$db = new DB();
	$verifica_aula = $db->select("SELECT * FROM aula WHERE id = '$id_aula'");
	$linha_aula = $db->expand($verifica_aula);
	
?>
				<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">

            
						<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h5 class="txt-light">Questionários da Aula - <?php echo $linha_aula['titulo']; ?></h5>
						</div>
						<!-- Breadcrumb -->
						
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					<div class=" col-sm-12">
						<a <?php echo 'href="novo_questionario/'.$id_aula.'"'; ?> class="btn btn-success btn-anim pull-right"><i class="icon-plus"></i><span class="btn-text">novo questionário</span></a>
					</div>	

					<div class=" col-sm-12 mt-10">
							<div class="panel panel-primary card-view">
								
                            


                                <div class="table-wrap ">
										<div class="table-responsive">
											<table class="table mb-0">
												<thead>
												  <tr>
                                                    <th>DATA CRIAÇÃO</th>
                                                    <th>DATA LIMITE P/ RESPOSTA</th>
                                                    <th>QUESTIONARIO</th>
                                                    <th></th>
												  </tr>
												</thead>
												<tbody>
                                                <?php
                                                $sea = $db->select("SELECT * FROM questionarios WHERE id_aula='$id_aula' ORDER BY id DESC");
                                                    if($db->rows($sea)){
                                                        while( $row = $db->expand($sea) ){ ?>
												  <tr>
                                                  <td><?php echo data_mysql_para_user($row['data_criacao']); ?></td>
                                                  <td><?php echo data_mysql_para_user($row['data_entrega']); ?></td>
                                                  <td><?php echo $row['titulo'] ?></td>
                                                  <td>

                                                  		<a href="deleta_questionario/<?php echo $row['id'] ?>" class="btn btn-danger btn-icon-anim btn-square pull-right"><i class="fa fa-trash"></i></a>

                                                  		<a href="edita_cadastra_quest/<?php echo $id_aula; ?>/<?php echo $row['id'] ?>" class="btn btn-default btn-icon-anim btn-square pull-right mr-10"><i class="fa fa-pencil"></i></a>

                                                  		<a href="visualiza_questionario/<?php echo $row['id'] ?>" class="btn btn-primary btn-icon-anim btn-square pull-right mr-10"><i class="fa fa-eye"></i></a>

                                                  		<a href="questionarios-respondidos/<?php echo $row['id'] ?>/<?php echo $id_aula; ?>" class="btn btn-warning btn-icon-anim btn-square pull-right mr-10"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                  
                                                  </td>
												  </tr>
                                                    <?php }} else { ?>    

                                                    	<tr>
                                                  			<td >Nenhum questionário cadastrado para essa aula.</td>
                                                  		</tr>	

                                                    <?php } ?>    	

												
												</tbody>
											</table>
										</div>
									</div>
				
							</div>
						</div>

						<div class=" col-sm-6">
						<a <?php echo 'href="prof_lista_disciplina/'.$linha_aula['id_turma'].'/'.$linha_aula['id_disciplina'].'"'; ?> class="btn btn-danger pull-left"><span class="btn-text">voltar</span></a>
					</div>	


				
				<?php

				include("../../../includes/rodape.php");

				?>
				
