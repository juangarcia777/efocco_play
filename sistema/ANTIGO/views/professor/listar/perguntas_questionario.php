<?php	
include("../../../includes/topo.php");
$db = new DB();
	$verifica_aula = $db->select("SELECT * FROM questionarios WHERE id = '$id_questionario'");
	$linha_aula = $db->expand($verifica_aula);
	
?>
				<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">

            
						<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h5 class="txt-light"><?php echo $linha_aula['titulo']; ?></h5>
						</div>
						<!-- Breadcrumb -->
						
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->

					

					<div class=" col-sm-12">
						<a <?php echo 'href="nova_questao/'.$id_questionario.'"'; ?> class="btn btn-success btn-anim pull-right"><i class="icon-plus"></i><span class="btn-text">Nova Questão</span></a>
					</div>	

					<div class=" col-sm-12 mt-10">
							<div class="panel panel-primary card-view">
								
                            


                                <div class="table-wrap ">
										<div class="table-responsive">
											<table class="table mb-0">
												<thead>
												  <tr>                                                   
                                                    <th>QUESTÕES CADASTRADAS</th>
                                                    
                                                    <th width="200"></th>
												  </tr>
												</thead>
												<tbody>
                                                <?php
                                                $sea = $db->select("SELECT perguntas_questi.*, perguntas.*, perguntas.id AS id_perg, perguntas.pergunta, perguntas.peso FROM perguntas_questi 
                                                	INNER JOIN perguntas ON perguntas_questi.id_pergunta=perguntas.id
                                                	WHERE perguntas_questi.id_quest='$id_questionario' 
                                                	ORDER BY perguntas_questi.id");
                                                    if($db->rows($sea)){
                                                    	$x=1;
                                                        while( $row = $db->expand($sea) ){ ?>
												  <tr>
                                                  <td>
                                                  		<span style="font-size: 16px; font-weight: 600"><?php echo $x.') '.$row['pergunta'] ?>
                                                  			
                                                  			<?php if(!empty($row['imagem'])){echo ' <a style="color:#276b98" target="_blank" href="../arquivos/aulas/'.$row['imagem'].'">(Ver Imagem)</a>';} ?>
                                                  		</span>


                                                  		<div class="row">

						                                	<?php if(!empty($row['resp_a'])){ ?>
							                                <div class="col-md-12 mt-10">
								                                <label style="font-size: 14px; font-weight: 300">
								                                &nbsp;&nbsp;&nbsp;&nbsp;
								                                <?php if($row['resp_correta']=='A'){ ?>
								                                	<i class="fa fa-check" aria-hidden="true"></i>
								                                <?php } else { ?>	
								                                	<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								                                <?php }  ?>	
								                                &nbsp;a)&nbsp;<?php echo $row['resp_a']; ?>
								                                </label>
							                            	</div>
							                            	<?php } ?>

							                            	<?php if(!empty($row['resp_b'])){ ?>
							                                <div class="col-md-12 mt-10">
								                                <label style="font-size: 14px; font-weight: 300">
								                                &nbsp;&nbsp;&nbsp;&nbsp;
								                                <?php if($row['resp_correta']=='B'){ ?>
								                                	<i class="fa fa-check" aria-hidden="true"></i>
								                                <?php } else { ?>	
								                                	<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								                                <?php }  ?>		
								                                &nbsp;b)&nbsp;<?php echo $row['resp_b']; ?>
								                                </label>
							                            	</div>
							                            	<?php } ?>

							                            	<?php if(!empty($row['resp_c'])){ ?>
							                                <div class="col-md-12 mt-10">
								                               	<label style="font-size: 14px; font-weight: 300">
								                               	&nbsp;&nbsp;&nbsp;&nbsp;
								                                <?php if($row['resp_correta']=='C'){ ?>
								                                	<i class="fa fa-check" aria-hidden="true"></i>
								                                <?php } else { ?>	
								                                	<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								                                <?php }  ?>	
								                               	&nbsp;c)&nbsp;<?php echo $row['resp_c']; ?>
								                                </label>
							                            	</div>
							                            	<?php } ?>

							                            	<?php if(!empty($row['resp_d'])){ ?>
							                                <div class="col-md-12 mt-10">
								                                <label style="font-size: 14px; font-weight: 300">
								                                &nbsp;&nbsp;&nbsp;&nbsp;
								                                <?php if($row['resp_correta']=='D'){ ?>
								                                	<i class="fa fa-check" aria-hidden="true"></i>
								                                <?php } else { ?>	
								                                	<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								                                <?php }  ?>		
								                                &nbsp;d)&nbsp;<?php echo $row['resp_d']; ?>
								                                </label>
							                            	</div>
							                            	<?php } ?>

							                            	<?php if(!empty($row['resp_e'])){ ?>
							                                <div class="col-md-12 mt-10">
							                                	<label style="font-size: 14px; font-weight: 300">
							                                	&nbsp;&nbsp;&nbsp;&nbsp;
								                                <?php if($row['resp_correta']=='E'){ ?>
								                                	<i class="fa fa-check" aria-hidden="true"></i>
								                                <?php } else { ?>	
								                                	<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
								                                <?php }  ?>	
								                                &nbsp;e)&nbsp;<?php echo $row['resp_e']; ?>
								                                </label>
							                            	</div>
							                            	<?php } ?>

							                                

							                            </div>

                                                  </td>
                                               
                                                  <td >

                                                  		<a href="deleta_pergunta/<?php echo $row['id_perg'] ?>" class="btn btn-danger btn-icon-anim btn-square pull-right"><i class="fa fa-trash"></i></a>

                                                  		<a href="edita_questao/<?php echo $id_questionario ?>/<?php echo $row['id_perg'] ?>" class="btn btn-default mr-10 btn-icon-anim btn-square pull-right"><i class="fa fa-pencil"></i></a>
                                               		
                                               		   
                                              	</td>
												  </tr>
                                                    <?php $x++; }} else { ?>    

                                                    	<tr>
                                                  			<td >Nenhuma questão cadastrada para essse questionário.</td>
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
				
