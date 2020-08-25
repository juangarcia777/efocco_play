<?php include("../../includes/topo.php"); ?>

<?php
$edit=0;
if(isset($id)){
	$edit=1;
	$sel = $db->select("SELECT * FROM aula WHERE id ='$id' LIMIT 1");
	$linha = $db->expand($sel);
}
?>

<form method="post" action="controlers/professor/cadastro/salva_aula.php">

<input type="hidden" name="id_aula" value="<?php if($edit==1){echo $id;} else {echo '0';} ?>">

<div class="container-fluid mtop80" >
<div class="row">


		<div class="col-md-3">

			<div class="panel panel-default card-view mbottom10 card-aula" style="position: relative;">
				<div class="panel-heading " role="tab" id="heading_1">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_1" aria-expanded="true">
						<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;DADOS PRINCIPAIS
					</a> 
					<span class="lateral_ok_aula " id="dados1"><i class="fa fa-check"></i></span>
				</div>

			</div>	

			<div class="panel panel-default card-view mbottom10 card-aula" style="position: relative;">
				<div class="panel-heading " role="tab" id="heading_2">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_2">
						<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;GLOSSÁRIO DA AULA
					</a> 
					<span class="lateral_ok_aula" id="dados2"><i class="fa fa-check"></i></span>
				</div>
			</div>	

			<div class="panel panel-default card-view mbottom10 card-aula" style="position: relative;">
				<div class="panel-heading " role="tab" id="heading_3">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_3">
						<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;OBJETIVO DA AULA
					</a> 
					<span class="lateral_ok_aula " id="dados3"><i class="fa fa-check"></i></span>
				</div>
			</div>	

			<div class="panel panel-default card-view mbottom10 card-aula" style="position: relative;">
				<div class="panel-heading " role="tab" id="heading_4">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_4">
						<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;CONTEÚDO DA AULA
					</a> 
					<span class="lateral_ok_aula " id="dados4"><i class="fa fa-check"></i></span>
				</div>
			</div>	

			<div class="panel panel-default card-view mbottom10 card-aula" style="position: relative;">
				<div class="panel-heading " role="tab" id="heading_5">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_5">
						<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;DOCUMENTOS COMPLEMENTARES
					</a> 
					<span class="lateral_ok_aula " id="dados5"><i class="fa fa-check"></i></span>
				</div>
			</div>	

			<div class="panel panel-default card-view mbottom10 card-aula" style="position: relative;">
				<div class="panel-heading " role="tab" id="heading_6">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_6">
						<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;REFÊRENCIAS BIBLIOGRAFICAS
					</a> 
					<span class="lateral_ok_aula " id="dados6"><i class="fa fa-check"></i></span>
				</div>
			</div>	

			<button class="btn btn-block btn-success btn-lg mtop20">AVANÇAR</button>

		</div>


		<div class="col-md-9">
			
			<div class="panel-group" id="accordion">

				 		
  				
  				<div class="panel painel-coisas-aula  mbottom0">					
					<div id="collapse_1" class="panel-collapse collapse in" role="tabpanel">
					 	<div class="panel panel-default card-view">
					 		<h6 class="panel-title txt-dark">DADOS PRINCIPAIS DA AULA</h6>

							<div class="row">
								<div class="col-md-10 mtop20">
									<div class="form-group">
										<label class="control-label mb-10 text-left">Título</label>
										<input type="text" id="titulo" class="form-control" name="titulo" required="required" value="<?php if($edit==1){echo $linha['titulo']; } ?>">
									</div>
								</div>

								
								<div class="col-md-2 mtop20">
									<div class="form-group">
										<label class="control-label mb-10 text-left">Ao Vivo</label>
										<a onclick="javascript:aovivo()" class="btn btn-primary btn-block" data-toggle="collapse" href="#collapseExample" >Aula Ao vivo</a>
									</div>
								</div>


								<div class="col-md-12">
												<div class="collapse <?php if($edit==1 && !empty($linha['link_aovivo'])){echo 'in';} ?>" id="collapseExample">
													<div class="row">
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label mb-10 text-left">Link Ao Vivo (Link Completo)</label>
															<input type="text" class="form-control" name="link_aovivo" value="<?php if($edit==1){echo $linha['link_aovivo']; } ?>">
														</div>
													</div>

													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label mb-10 text-left">Data da Aula Ao Vivo</label>
															<input type="date"class="form-control" name="data_aovivo" value="<?php if($edit==1){echo $linha['data_final_link_aovivo']; } ?>">
														</div>
													</div>
													</div>
												</div>	
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label mb-10 text-left">Vídeo Aula <small>(Link Vimeo ou Youtube)</small></label>
										<input type="text" class="form-control" name="video_aula" value="<?php if($edit==1){echo $linha['video_aula']; } ?>">
									</div>
								</div>

								
							</div>	

					 	</div>						 	
					</div>					
				</div>

				<div class="panel painel-coisas-aula  mbottom0 mtop0 border0">					
					<div id="collapse_2" class="panel-collapse collapse" role="tabpanel">
					 	<div class="panel panel-default card-view border0">
					 		<h6 class="panel-title txt-dark">GLOSSÁRIO DA AULA</h6>

							<div class="row">
								<div class="col-md-12 mtop20">
									<textarea class="tinymce" id="glossario" name="glossario"><?php if($edit==1){echo base64_decode($linha['glossario']); } ?></textarea>
								</div>
							</div>		
						</div>
					</div>
				</div>

				<div class="panel painel-coisas-aula  mbottom0 mtop0 border0">					
					<div id="collapse_3" class="panel-collapse collapse" role="tabpanel">
					 	<div class="panel panel-default card-view border0">
					 		<h6 class="panel-title txt-dark">OBJETIVO DA AULA</h6>

							<div class="row">
								<div class="col-md-12 mtop20">
									<textarea class="tinymce acende_ok" id="objetivo_aula" name="objetivo_aula"><?php if($edit==1){echo base64_decode($linha['objetivo_aula']); } ?></textarea>
								</div>
							</div>		
						</div>
					</div>
				</div>

				<div class="panel painel-coisas-aula  mbottom0 mtop0 border0">					
					<div id="collapse_4" class="panel-collapse collapse" role="tabpanel">
					 	<div class="panel panel-default card-view border0">
					 		<h6 class="panel-title txt-dark">CONTEÚDO DA AULA</h6>

							<div class="row">
								<div class="col-md-12 mtop20">
									<textarea class="tinymce acende_ok" id="apresentacao" name="apresentacao"><?php if($edit==1){echo base64_decode($linha['apresentacao']); } ?></textarea>
								</div>
							</div>		
						</div>
					</div>
				</div>

				<div class="panel painel-coisas-aula  mbottom0 mtop0 border0">					
					<div id="collapse_5" class="panel-collapse collapse" role="tabpanel">
					 	<div class="panel panel-default card-view border0 ">
					 		<h6 class="panel-title txt-dark">DOCUMENTOS COMPLEMENTARES</h6>

							<div class="row">
								<div class="col-md-12 mtop20">
									<textarea class="tinymce acende_ok" id="doc_complementares" name="doc_complementares"><?php if($edit==1){echo base64_decode($linha['doc_complementares']); } ?></textarea>
								</div>
							</div>		
						</div>
					</div>
				</div>


				<div class="panel painel-coisas-aula  mbottom0 mtop0 border0">					
					<div id="collapse_6" class="panel-collapse collapse" role="tabpanel">
					 	<div class="panel panel-default card-view border0">
					 		<h6 class="panel-title txt-dark">REFERÊNCIAS BIBLIOGRAFICAS</h6>

							<div class="row">
								<div class="col-md-12 mtop20">
									<textarea class="tinymce acende_ok" id="ref_bibliograficas" name="ref_bibliograficas"><?php if($edit==1){echo base64_decode($linha['ref_bibliograficas']); } ?></textarea>
								</div>
							</div>		
						</div>
					</div>
				</div>			
				

				
			</div>	

				
				



				</div>		
			</div>	


		</div>	



	</div>
</div>
</form>		
    
<?php include("../../includes/rodape.php"); ?>
