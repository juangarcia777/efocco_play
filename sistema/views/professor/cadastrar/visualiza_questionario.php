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

					

					<div class=" col-sm-12 ">
							<div class="panel panel-primary card-view">
								<div class="row">	
                                                      <div class=" col-sm-12 ">

									<?php
                                                $sea = $db->select("SELECT perguntas_questi.*, perguntas.* FROM perguntas_questi 
                                                	INNER JOIN perguntas ON perguntas_questi.id_pergunta=perguntas.id
                                                	WHERE perguntas_questi.id_quest='$id_questionario' 
                                                	ORDER BY perguntas_questi.id");
                                                    if($db->rows($sea)){
                                                    	$x=1;
                                                        while( $row = $db->expand($sea) ){ 
                                     ?>
												 <div class=" col-sm-12 mt-10 ">
                                                  <h5><?php echo $x.') '.$row['pergunta'] ?></h5>
                                                 </div> 	
                                                 


                                                 <?php if(!empty($row['resp_a'])){ ?>	
                                                 <div class=" col-sm-12 mt-10">
                                                 	<span style="font-weight: 300; font-size: 15px">
                                                 	
                                                 	 &nbsp;&nbsp;a) <?php echo $row['resp_a']; ?>
                                                 	 
                                                 	 <?php 
                                                 		if($row['resp_correta']=='A'){ 
                                                 			echo ' <span class="text-success"><i class="fa fa-check" aria-hidden="true"></i></span>'; 
                                                 		} else {
                                                 			echo ' <span class="text-danger"><i class="fa fa-times" aria-hidden="true"></i></span>'; 
                                                 		}
                                                 	?>	

                                                 	 </span>		
                                                 </div>	
                                                 <?php } ?>	

                                                 <?php if(!empty($row['resp_b'])){ ?>	
                                                 <div class=" col-sm-12 mt-10">
                                                 	<span style="font-weight: 300; font-size: 15px">
                                                 	
                                                 	 &nbsp;&nbsp;b) <?php echo $row['resp_b']; ?>
                                                 	 
                                                 	 <?php 
                                                 		if($row['resp_correta']=='B'){ 
                                                 			echo ' <span class="text-success"><i class="fa fa-check" aria-hidden="true"></i></span>'; 
                                                 		} else {
                                                 			echo ' <span class="text-danger"><i class="fa fa-times" aria-hidden="true"></i></span>'; 
                                                 		}
                                                 	?>	

                                                 	 </span>		
                                                 </div>	
                                                 <?php } ?>	


                                                 <?php if(!empty($row['resp_c'])){ ?>	
                                                 <div class=" col-sm-12 mt-10">
                                                 	<span style="font-weight: 300; font-size: 15px">
                                                 	
                                                 	 &nbsp;&nbsp;c) <?php echo $row['resp_c']; ?>
                                                 	 
                                                 	 <?php 
                                                 		if($row['resp_correta']=='C'){ 
                                                 			echo ' <span class="text-success"><i class="fa fa-check" aria-hidden="true"></i></span>'; 
                                                 		} else {
                                                 			echo ' <span class="text-danger"><i class="fa fa-times" aria-hidden="true"></i></span>'; 
                                                 		}
                                                 	?>	

                                                 	 </span>		
                                                 </div>	
                                                 <?php } ?>	


                                                 <?php if(!empty($row['resp_d'])){ ?>	
                                                 <div class=" col-sm-12 mt-10">
                                                 	<span style="font-weight: 300; font-size: 15px">
                                                 	
                                                 	 &nbsp;&nbsp;d) <?php echo $row['resp_d']; ?>
                                                 	 
                                                 	 <?php 
                                                 		if($row['resp_correta']=='D'){ 
                                                 			echo ' <span class="text-success"><i class="fa fa-check" aria-hidden="true"></i></span>'; 
                                                 		} else {
                                                 			echo ' <span class="text-danger"><i class="fa fa-times" aria-hidden="true"></i></span>'; 
                                                 		}
                                                 	?>	

                                                 	 </span>		
                                                 </div>	
                                                 <?php } ?>	


                                                 <?php if(!empty($row['resp_e'])){ ?>	
                                                 <div class=" col-sm-12 mt-10">
                                                 	<span style="font-weight: 300; font-size: 15px">
                                                 	
                                                 	 &nbsp;&nbsp;e) <?php echo $row['resp_e']; ?>
                                                 	 
                                                 	 <?php 
                                                 		if($row['resp_correta']=='E'){ 
                                                 			echo ' <span class="text-success"><i class="fa fa-check" aria-hidden="true"></i></span>'; 
                                                 		} else {
                                                 			echo ' <span class="text-danger"><i class="fa fa-times" aria-hidden="true"></i></span>'; 
                                                 		}
                                                 	?>	

                                                 	 </span>		
                                                 </div>	
                                                 <?php } ?>	
                                                






                                                 <div class=" col-sm-12 mt-20 "></div>

                                                    <?php $x++;}} else { ?>    

                                                    	<div class=" col-sm-12 mt-10">
                                                  			<h5>Nenhuma questão cadastrada para essse questionário.</h5>
                                                 </div> 	
                                                  		
                                                    <?php } ?>  
                            


                                                </div>
							</div>
				
							</div>
						</div>

						<div class=" col-sm-6">
						<a <?php echo 'href="cadastra_quest/'.$linha_aula['id_aula'].'"'; ?> class="btn btn-danger pull-left"><span class="btn-text">voltar</span></a>
					</div>	
				
				<?php

				include("../../../includes/rodape.php");

				?>
				
