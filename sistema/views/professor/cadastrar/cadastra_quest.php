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

					<?php
					$sl = $db->select("SELECT id FROM questionarios WHERE id_aula='$id_aula' LIMIT 1");
					if(!$db->rows($sl)){
					?>
					<div class=" col-sm-12">
						<a <?php echo 'href="novo_questionario/'.$id_aula.'"'; ?> class="btn btn-success btn-anim pull-right"><i class="icon-plus"></i><span class="btn-text">novo questionário</span></a>
					</div>	
					<?php
					}
					?>

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
                                                  <td>
                                                  	
                                                  	<?php 
                                                  	$verifica_aula_alocada = $db->select("SELECT aulas_alocadas.data_liberacao,
                                                  	 turma.nome 	
                                                  	 FROM aulas_alocadas 
                                                  	 INNER JOIN turma ON aulas_alocadas.id_turma=turma.id
                                                  	 WHERE aulas_alocadas.id_aula = '$id_aula'");
													while($linha_aula_alocada = $db->expand($verifica_aula_alocada)){

														echo '<span style="font-weight: 500; color: #333; font-size: 12px">'.$linha_aula_alocada['nome'].'</span><br>';

                                                  		if($row['somente_dia']!='0000-00-00'){



															echo data_mysql_para_user($row['somente_dia']);
															//if($row['tempo1']!='00:00:00' && $row['tempo2']!='00:00:00'){	 
																echo 'h das '.substr($row['tempo1'], 0,5);
																echo ' às '.substr($row['tempo2'], 0,5).'h';
															//}

                                                  			echo '<br><span style="font-weight: 300; color: #333; font-size: 12px">(Liberado no periodo)</span>';                                                  			

                                                  		} else {

                                                  			if($linha_aula_alocada['data_liberacao']!='0000-00-00'){

                                                  				echo date('d/m/Y', strtotime('+7 days', strtotime($linha_aula_alocada['data_liberacao']))); 
                                                  				echo '<br><span style="font-weight: 300; color: #333; font-size: 12px">(7 Dias a partir da liberação da aula)</span>';

                                                  			} else {

																echo '
																<span style="font-weight: 300; color: #333; font-size: 12px">Aula sem data de liberação definida.</span>
																<br><span style="font-weight: 300; color: #333; font-size: 12px">Questionário liberado indefinidamente</span>';                                                  				

                                                  			}

                                                  		}  

                                                  		echo '<br><br>';

                                                  	}                                                		
                                                  	?> 

                                                  		

                                                  </td>
                                                  <td><?php echo $row['titulo'] ?></td>
                                                  <td>


                                                  		<a data-id="<?php echo $row['id']; ?>" data-post="controlers/professor/deleta_quest.php" data-title="Confirma a exclusão do registro?" data-text="Todos os questionários respondidos serão apagados" data-return="cadastra_quest/<?php echo $id_aula; ?>" data-opcao="0" onclick="javascript:void(0)" class="btn btn-danger btn-icon-anim btn-square apaga-elemento pull-right mr-10" ><i class="icon-trash"></i></a>

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
						<a href="lista-aulas" class="btn btn-danger pull-left"><span class="btn-text">voltar</span></a>
					</div>	


				
				<?php

				include("../../../includes/rodape.php");

				?>
				
