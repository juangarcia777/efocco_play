<?php
	
	include("../../includes/topo.php");
?>
	
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					
					<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
							<h5 class="txt-light">Dúvida do Aluno</h5>
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

                    <?php 
                    
                    


                    $get = $db->select("SELECT * FROM suporte_plataforma WHERE id='$id'
											LIMIT 1");

                    while ($linha = $db->expand($get)):

                    	$inativo=0;
                    	if($linha['resposta']!=''){$inativo=1;}

                    	?>
					
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">

                       
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h5 class="panel-title txt-dark">
											<strong>Nome do Aluno: </strong><?php echo $linha['nome_aluno'] ?><br>
										</h5>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
                                        
											<div class="row">
											<form method="post" action="controlers/duvida/responde_suporte.php">
												<div class="col-md-12">
													<div class="form-group">
                            	<h6><strong>Dúvida: </strong><?php echo $linha['pergunta'] ?></h6>
													</div>
												</div>

                        <input type="hidden" name="id" value="<?php echo $id ?>">

												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label mb-10 text-left">Resposta</label>
														<textarea <?php if($inativo==1){echo 'disabled';} ?> required class="form-control" name="resposta" style="height: 280px"><?php if($inativo==1){echo $linha['resposta'];} ?></textarea>
													</div>
												</div>
												
												<?php if($inativo==0){ ?>
												<div class="col-md-12">
													<hr>
													<button class="btn  btn-success" type="submit" style="float: right;">Enviar</button>
												</div>
												<?php } ?>
											</form>

										</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->

                    <?php endwhile; ?>

							
				</div>
				
				<?php

				include("../../includes/rodape.php");

				?>
				
S