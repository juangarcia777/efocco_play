<?php	
include("../../../includes/topo.php");
$db = new DB();
	


	$verifica_aula = $db->select("SELECT * FROM questionarios WHERE id = '$id_questionario'");
	$linha_aula = $db->expand($verifica_aula);
	$g= 'Nova Questão';

	
	if(isset($id_pergunta)){
		$verifica_perguntas = $db->select("SELECT * FROM perguntas WHERE id = '$id_pergunta'");
		$linha_perguntas = $db->expand($verifica_perguntas);
		$x=1;
		$g = 'Editando';
	}
	
?>

<script type="text/javascript">
	function tipo_prova(tipo){
		if(tipo==1){
			
			$( "input[name='respa']").prop('required',true);
			$( "input[name='respb']").prop('required',true);
			$( "input[name='respCo']").prop('required',true);
			
			$(".dissertativa").hide();
			$(".multi").show();
		} else {

			$( "input[name='respa']").prop('required',false);
			$( "input[name='respb']").prop('required',false);
			$( "input[name='respCo']").prop('required',false);

			$(".multi").hide();
			$(".dissertativa").show();
		}
	}

</script>
				<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">

            
						<!-- Title -->
					<div class="row heading-bg  bg-blue">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h5 class="txt-light"><?php echo $g; ?> - <?php echo $linha_aula['titulo']; ?></h5>
						</div>
						<!-- Breadcrumb -->
						
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
				
					<div class=" col-sm-12 ">
							<div class="panel panel-primary card-view">
								<div class="row">
									<div class="col-md-12">
                            	<form method="POST" action="controlers/professor/cadastro/cadastro_perguntas.php" enctype="multipart/form-data">

                            				<input type="hidden" name="id_aula" value="<?php echo $id_aula; ?>">
                            				<input type="hidden" name="id_pergunta" value="<?php if($x==1){echo $id_pergunta;} ?>">
                                            <input type="hidden" name="questionario" value="<?php echo $id_questionario ?>">
                                            
                                           
                                           	<div class="col-md-12 ">
                                            	<div class="form-group">
													<label class="control-label mb-10 text-left">Questão:</label>
													<input type="text" name="pergunta" class="form-control" value="<?php if($x==1){echo $linha_perguntas['pergunta'];} ?>" required>
												</div>
											</div>	

											<div class="col-md-6 ">
                                            	<div class="form-group">
													<label class="control-label mb-10 text-left">Tipo de Pergunta</label>
													<select name="tipo_pergunta" required class="form-control" onchange="javascript:tipo_prova(this.value);">
														<?php 
															if($x==1){
																
																if($linha_perguntas['tipo_pergunta']==1){
																	echo '														<option value="1" selected>MÚLTIPLA ESCOLHA</option>
																		<option value="2">DISSERTATIVA</option>
																	';		
																} else if($linha_perguntas['tipo_pergunta']==2){

																	echo '														
																		<option value="2" selected>DISSERTATIVA</option>
																		<option value="1">MÚLTIPLA ESCOLHA</option>				
																	';		

																} else {
																	echo '
																	<option value="">---</option>
																	<option value="1">MÚLTIPLA ESCOLHA</option>
																	<option value="2">DISSERTATIVA</option>
																	';
																}

															} else {
																echo '
																	<option value="">---</option>
																	<option value="1">MÚLTIPLA ESCOLHA</option>
																	<option value="2">DISSERTATIVA</option>
																';
															}
														?>
														
														
													</select>
												</div>
											</div>	

											<div class="col-md-6 ">
                                            	<div class="form-group">
													<label class="control-label mb-10 text-left">Imagem: (Não obrigatório)</label>
													<input type="file" name="imagem" class="form-control">
												</div>
											</div>	


								<div class="dissertativa" <?php if($x==1 && $linha_perguntas['tipo_pergunta']=='2'){echo '';} else {echo 'style="display: none;"';} ?> >			
									 <div class="col-sm-12 mt-30">
                                            	<button class="btn btn-success btn-anim">Cadastrar</button>
                                            </div>	
								</div>	
								
								<div class="multi" <?php if($x==1 && $linha_perguntas['tipo_pergunta']=='1'){echo '';} else {echo 'style="display: none;"';} ?>>			
											<div class="col-md-12 mt-20">
												<h5>Opções de Respostas da Questão</h5>
												<span>(É obrigatório cadastrar ao menos duas opções de respostas para a questão)</span>
											</div>	
												

                                                <div class="col-md-12 mt-20">
													<label class="control-label mb-10 text-left">Resposta A:</label>
													<input type="text" name="respa" class="form-control"  value="<?php if($x==1){echo $linha_perguntas['resp_a'];} ?>">
												</div>

                                               <div class="col-md-12 mt-10">
													<label class="control-label mb-10 text-left">Resposta B:</label>
													<input type="text" name="respb" class="form-control"  value="<?php if($x==1){echo $linha_perguntas['resp_b'];} ?>">
												</div>

                                                <div class="col-md-12 mt-10">
													<label class="control-label mb-10 text-left">Resposta C:</label>
													<input type="text" name="respc" class="form-control" value="<?php if($x==1){echo $linha_perguntas['resp_c'];} ?>">
												</div>

                                                <div class="col-md-12 mt-10">
													<label class="control-label mb-10 text-left">Resposta D:</label>
													<input type="text" name="respd" class="form-control" value="<?php if($x==1){echo $linha_perguntas['resp_d'];} ?>">
												</div>

                                                <div class="col-md-12 mt-10">
													<label class="control-label mb-10 text-left">Resposta E:</label>
													<input type="text" name="respe" class="form-control" value="<?php if($x==1){echo $linha_perguntas['resp_e'];} ?>">
												</div>
												
												<div class="col-md-12 mt-20">
												<h5>Selecione a resposta correta da questão:</h5>
											</div>	
												
                                                <div class="col-md-12 mt-10">
													<label class="control-label mb-10 text-left">Escolha uma opção:</label>
													<select class="form-control" name="respCo" >
														<?php
															if($x==1){
																echo '<option value="'.$linha_perguntas['resp_correta'].'">'.$linha_perguntas['resp_correta'].'</option>';
															} else {
																echo '<option value="">------------</option>';		
															}
														?>
														
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                        <option value="D">D</option>
                                                        <option value="E">E</option>
													</select>
												</div>

												 <div class="col-sm-12 mt-30">
                                            	<button class="btn btn-success btn-anim">Cadastrar</button>
                                            </div>	

												
								</div>				
                                            
                                           
                                        	

                                
                                </form>            
</div></div>
                                
				
							</div>
						</div>


				
				<?php

				include("../../../includes/rodape.php");

				?>
				
