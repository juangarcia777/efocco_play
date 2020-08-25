<?php	
include("../../../includes/topo.php");
$db = new DB();
	$verifica_aula = $db->select("SELECT * FROM aula WHERE id = '$id_aula'");
	$linha_aula = $db->expand($verifica_aula);
	$g= 'Novo';
	$x=0;
	if(isset($id_questionario)){
		$verifica_quest = $db->select("SELECT * FROM questionarios WHERE id = '$id_questionario'");
		$linha_quest = $db->expand($verifica_quest);
		$x=1;
		$g = 'Editando';
	}
	
?>
				<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">

            
						<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h5 class="txt-light"><?php echo $g; ?> Questionário Aula - <?php echo $linha_aula['titulo']; ?></h5>
						</div>
						<!-- Breadcrumb -->
						
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
				
					<div class=" col-sm-12 ">
							<div class="panel panel-primary card-view">
								
                            	<form method="POST" action="controlers/professor/cadastro_quest.php">

                                            
                            				<input type="hidden" name="questionario" value="<?php if($x==1){echo $id_questionario;} ?>">
                                            <input type="hidden" name="aula" value="<?php echo $id_aula ?>">
                                            <input type="hidden" name="turma" value="<?php echo $linha_aula['id_turma']; ?>">
                                            <input type="hidden" name="disciplina" value="<?php echo $linha_aula['id_disciplina']; ?>">

											<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
                                                	<label for="">Data Limite para resposta:</label>
                                                	<input type="date" name="entrega" class="form-control" value="<?php if($x==1){echo $linha_quest['data_entrega'];} else { echo date('Y-m-d', strtotime('+7 days', strtotime(date("d-m-Y")))); } ?>">
                                            	</div>
											</div>
											</div>

                                            <div class="form-group mt-10">
                                                <label for="">Titulo do Questionário:</label>
                                                <input type="text" name="titulo" class="form-control" value="<?php if($x==1){echo $linha_quest['titulo'];} ?>" required>
                                            </div>

                                            <div class="row">
                                            	<div class="col-sm-12 ">
                                            		<button class="btn btn-success btn-anim">Avançar</button>
                                            	</div>	
                                        	</div>

                                
                                </form>            

                                
				
							</div>
						</div>


				
				<?php

				include("../../../includes/rodape.php");

				?>
				
