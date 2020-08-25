<?php	
include("../../../includes/topo.php");
$db = new DB();

	$verifica_aula_alocada = $db->select("SELECT data_liberacao FROM aulas_alocadas WHERE id_aula = '$id_aula' LIMIT 1");
	$linha_aula_alocada = $db->expand($verifica_aula_alocada);


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

<script type="text/javascript">
function clear_inputs(){
	$(".clear").val('');
}	
</script>

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
											<div class="col-sm-6">
												<div class="form-group">
                                                	<label for="">Data Limite para resposta:</label>
                                                	<p style="color: #333">7 dias a partir da liberação da aula para responder o questionário.</p>
                                                	<input type="hidden" name="entrega" class="form-control" value="<?php if($linha_aula_alocada['data_liberacao']=='0000-00-00'){echo $linha_aula_alocada['data_liberacao'];} else { echo date('Y-m-d', strtotime('+7 days', strtotime($linha_aula_alocada['data_liberacao']))); } ?>">
                                            	</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
                                                	<label for="">É uma prova final ?</label>
                                                	<select name="final_test" class="form-control"
													onchange="final(this.value)" required>
													
														<option value="">SELECIONE</option>
														<option <?php echo ($linha_quest['final_test']==1)?'selected':''; ?> value="1">SIM</option>
														<option <?php echo ($linha_quest['final_test']==0)?'selected':''; ?>  value="0">NÃO</option>


													</select>
                                            	</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
                                                	<label for="">Escolha o período para realização:</label>
                                                	<div class="row">

                                                		<div class="col-sm-4">
                                                			<input type="date" name="somente_dia" class="form-control clear" value="<?php if($x==1){echo $linha_quest['somente_dia'];} ?>"
															<?php echo ($linha_quest['final_test']!=1)?'disabled':''; ?> >

                                                		</div>
                                                		
                                                		<div class="col-sm-4">
                                                			<input type="time" name="tempo1" class="form-control clear" value="<?php if($x==1){echo $linha_quest['tempo1'];} ?>"
															<?php echo ($linha_quest['final_test']!=1)?'disabled':''; ?>>
                                                		</div>	

                                                		<div class="col-sm-4">
                                                			<input type="time" name="tempo2" class="form-control clear" value="<?php if($x==1){echo $linha_quest['tempo2'];} ?>"
															<?php echo ($linha_quest['final_test']!=1)?'disabled':''; ?>>


                                                		</div>	

                                                		<div class="col-md-12">
                                                			<a href="javascript:clear_inputs();" style="color: blue; font-size: 12px; text-decoration: underline;">Limpar campos</a>
                                                		</div>	

                                                	</div>	
                                               
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
				

		<script>
			function final(value) {
				var clear = $('.clear');
				if(value == 0) {
					clear.attr("disabled", "disabled");
				} else {
					clear.attr("disabled", false);
				}
			}
		</script>