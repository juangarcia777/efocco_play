<div class="modal fade" id="ModalDuvidasAula" aria-labelledby="textbox">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header modal-header-transform">
            	<h5 class="modal-title">Está com dúvidas?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body ">
            	<form method="post" action="controlers/aulas/salva_duvidas.php" id="FormDuvidasPost">
            	<div class="col-md-12  mtop20">
	            	<h5>Envie sua pergunta direto a nossos professores!</h5>
	            	<span>Responderemos o mais breve possível!</span>
	            	<div class="row">		            		           
		            	<div class="col-md-12 text-center mtop20" >
		            		<input type="hidden" name="id_materia_final" value="<?php echo $id ?>">
		            		<input type="hidden" name="id_turma_final" value="<?php if(isset($_SESSION['CursoSelecionadoAVA'])){	echo $_SESSION['CursoSelecionadoAVA'];	} else{echo 0;} ?>">
			            	<textarea required class="form-control" name="duvida" style="height: 170px" placeholder="Explique aqui sua dúvida."></textarea>                    
		            	</div>
		            	<div class="col-md-12 text-center mtop20" >
	                        <button type="submit" class="submit-btn" id="btn-envia">ENVIAR</button>
	                    </div>	
	                    <div class="col-md-12 text-center mtop20 hide" id="sucesso-msg">
	                        <span class="aviso-envio-sucesso"><i class="icofont-check"></i> Mensagem enviada com sucesso!</span>
	                    </div>	
	                </div>                        
	            </div>
	            </form>	
            </div>
                                            
		</div>
    </div>
</div>



<div class="modal fade" id="ModalUploadAula" aria-labelledby="textbox">
	<div class="modal-dialog">
    	<div class="modal-content">
			
			<div class="modal-header modal-header-transform">
            	<h5 class="modal-title">Upload de Arquivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
            	<form method="post" id="ModalUploadArquivo" enctype="multipart/formdata">
            	<div class="col-md-12  mtop20">
	            	<h5>Faça upload do seu arquivo!</h5>
	            	<div class="row">

						<input type="hidden" name="id_trabalho" id="id_trabalho">

		            	<div class="col-md-12 text-center mtop20">
			            	<input type="file" name="arquivo" class="form-control">                  
		            	</div>
		            	<div class="col-md-12 text-center mtop20">
	                        <button type="submit" class="submit-btn" id="btn-arquivo">ENVIAR</button>
	                    </div>	
	                    <div class="col-md-12 text-center mtop20 hide" id="sucesso-msg-arq">
	                        <span class="aviso-envio-sucesso"><i class="icofont-check"></i> Upload realizado com sucesso ! Aguarde a correção.</span>
	                    </div>	
	                </div>                        
	            </div>
	            </form>	
            </div>
                                            
		</div>
    </div>
</div>


<div class="modal fade" id="ModalAnotacoes" aria-labelledby="textbox">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header modal-header-transform">
            	<h5 class="modal-title">Bloco de Notas</h5>
                <button type="button" id="fechaModal" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">

				<div class="col-md-12">

					<div class="anotacoes_pai"></div>

					<div class="text-center hide mt-5 mb-5" id="loadNotas">
						<div class="spinner-border text-default" role="status">
							<span class="sr-only">Loading...</span>
						</div>
					</div>

				</div>


				<hr>

            	<form method="post" action="controlers/aulas/salva_duvidas.php" >
            	<div class="col-md-12  mtop20">
	            	<h5>Escreva sua Anotação !</h5>
	            	<div class="row">		            		           
		            	<div class="col-md-12 text-center mtop20">
			            	<textarea name="notas" id="notas" placeholder="Escreva sua Nota..." class="form-control" rows="4"></textarea>             
		            	</div>
		            	<div class="col-md-12 text-center mtop20" >
	                        <button type="button" onclick="salvaNotas()" class="submit-btn" id="btn-envia-nota">ENVIAR</button>
	                    </div>	
	                    <div class="col-md-12 text-center mtop20 hide" id="sucesso-msg-nota">
	                        <span class="aviso-envio-sucesso"><i class="icofont-check"></i> Nota adicionada com sucesso!</span>
	                    </div>	
	                </div>                        
	            </div>
	            </form>	
            </div>
                                            
		</div>
    </div>
</div>




<div class="modal fade" id="ModalAvaliaAula" aria-labelledby="textbox">
	<div class="modal-dialog modal-sm">
    	<div class="modal-content">
        	<div class="modal-header modal-header-transform">
            	<h5 class="modal-title">Avalie nossa aula!</h5>          
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>      
            </div>
            
            <div class="modal-body ">
            	<form method="post" action="controlers/aulas/salva_avaliacao_aula.php" id="FormAvaliaAula">
            	<div class="col-md-12 text-center  mtop20">
	            	<h5>De 1 a 5 qual sua nota para nossa aula?</h5>
	            	
	            	<div class="row">		            		           
		            	<div class="col-md-12 text-center mtop30" >
		            		<div class="rate">
							    <input type="radio" id="star5" name="rate" value="5" />
							    <label for="star5" title="text">5 stars</label>
							    <input type="radio" id="star4" name="rate" value="4" />
							    <label for="star4" title="text">4 stars</label>
							    <input type="radio" id="star3" name="rate" value="3" />
							    <label for="star3" title="text">3 stars</label>
							    <input type="radio" id="star2" name="rate" value="2" />
							    <label for="star2" title="text">2 stars</label>
							    <input type="radio" id="star1" name="rate" value="1" />
							    <label for="star1" title="text">1 star</label>
							  </div>		            				            	
		            	</div>		            		       

		            	<div class="col-md-12 text-center mtop20 mbottom20" >
		            		<span>As informações são sigilosas!</span>
		            	</div>

		            	<div class="col-md-12 text-center" >
	                        <button type="submit" class="submit-btn">AVALIAR</button>
	                    </div>             
	                </div>                        
	            </div>
	            </form>	
            </div>
                                            
		</div>
    </div>
</div>


<div class="modal fade" id="ModalInformacoes" aria-labelledby="textbox">
	<div class="modal-dialog modal-md">
    	<div class="modal-content">
        	<div class="modal-header modal-header-transform">
            	<h5 class="modal-title">Aviso!</h5>          
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>      
            </div>
            
            <div class="modal-body ">            	
            	<div class="col-md-12 text-left  mtop20">
	            	<h4>Atenção, aluno!</h4>
	            	
	            	<div class="row">		            		           

		            	<div class="col-md-12 text-left mtop30" >
							

							<b>Para visualizar notas, conferir presenças ou gerar boletos de pagamentos</b>, acesse o botão <b>“Área do aluno”</b>, preencha seus dados do WPensar e confira suas informações.
<br><br>
<b>Para demandas relacionadas à plataforma Efocco Play</b>, entre em contato com a nossa secretária, Aline. Ela estará pronta para atendê-lo! <br>
Somente de segunda-feira a sexta-feira das 15h às 21h e aos sábados das 8h às 12h.<br>
Whatsapp: (14) 99676-4234
<br><br>
<b>Para demandas relacionadas ao departamento financeiro</b>, entre em contato com a Escola e pergunte sobre o financeiro (Clau). 
Segunda-feira a sexta-feira das 18h às 20h na Efocco.<br>
Telefone: (14) 32643000

<br><br>
<b>Assuntos de âmbito pedagógico devem ser dirigidos aos coordenadores, que estarão de plantão para atendê-los nos seguintes dias e horários:</b><br><br>

Coordenação - Curso Técnico em Enfermagem: Rosangela<br>
Segunda-feira e quarta-feira 19h às 22h30<br><br>

Coordenação - Cursos Técnicos em Química e Celulose e Papel: Rodrigo<br>
Quarta-feira e quinta-feira 19h às 22h30<br><br>

Coordenação - Curso Técnico em Segurança do Trabalho: Anderson<br>
Segunda e quarta-feira 19h às 22h30<br><br>

Diretora Pedagógica<br>
Segunda-feira a sexta-feira das 18:00 às 20:00. <br><br>

<b>Para solicitação de declaração e outros assuntos relacionados à documentação,</b> falar com Giovanna:<br>
Telefone – (14) 3264-3000
	 <br><br>


		            	</div>		            		       

		            	
		            	<div class="col-md-12 text-center" >
	                        <button data-dismiss="modal" type="button" class="submit-btn">FECHAR</button>
	                    </div>             
	                </div>                        
	            </div>	            
            </div>
                                            
		</div>
    </div>
</div>



<div class="modal fade" id="ModalDuvidasSistema" aria-labelledby="textbox">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header modal-header-transform">
            	<h5 class="modal-title">Dúvida sobre a plataforma?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body ">
            	<form method="post"  id="FormPerguntaPost">
            	<div class="col-md-12  mtop20">
	            	<h5>Envie sua pergunta direto a nossos atendentes!</h5>
	            	<span>Responderemos o mais breve possível!</span>
	            	<div class="row">		            		           
		            	<div class="col-md-12 text-center mtop20">
			            	<textarea required class="form-control" name="pergunta" style="height: 170px" placeholder="Explique aqui sua dúvida."></textarea>                    
		            	</div>
		            	<div class="col-md-12 text-center mtop20" >
	                        <button type="submit" class="submit-btn" id="btn-send">ENVIAR</button>
	                    </div>	
	                    <div class="col-md-12 text-center mtop20 hide" id="sucesso-msg2">
	                        <span class="aviso-envio-sucesso"><i class="icofont-check"></i> Mensagem enviada com sucesso!</span>
	                    </div>	
	                </div>                        
	            </div>
	            </form>	
            </div>
                                            
		</div>
    </div>
</div>



<div class="modal fade" id="modal_aula" aria-labelledby="textbox">
	<div class="modal-dialog modal-sm">
    	<div class="modal-content">
        	<div class="modal-header modal-header-transform">
            	<h5 class="modal-title">Ops !</h5>
                <button type="button" id="fechaModal" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">

				<div class="row">
					<div class="col-sm-12 text-center">
						<h5>Ainda esta assistindo ?</h5>
						<hr>

						<button class="btn btn-default" data-dismiss="modal" aria-label="Close">Sim</button>
					</div>
				</div>
            	
            </div>
                                            
		</div>
    </div>
</div>

<?php
if(isset($_SESSION['aviso_ativo']) && $_SESSION['aviso_ativo'] == true) { ?>

<div class="modal fade" id="modal_aviso" aria-labelledby="textbox">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header modal-header-transform">
				<h5 class="modal-title">Aviso !</h5>
				<button type="button" id="fechaModal" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">

				<div class="row">

					<div class="col-sm-12 text-center">
						<?php if(!empty($_SESSION['aviso_imagem'])): ?>
						<img src="../images/avisos/<?php echo $_SESSION['aviso_imagem'] ?>">
						<?php endif; ?>

						<hr>
					</div>

					<div class="col-sm-12">
						<?php if(!empty($_SESSION['aviso_texto'])): ?>
							<h4>Aviso:</h4> <br>
						<p><?php echo $_SESSION['aviso_texto'] ?></p>
						<?php endif; ?>
						
						<hr>

						<button class="btn btn-default" data-dismiss="modal" aria-label="Close">Ok</button>
					</div>
					
				</div>
				
			</div>
											
		</div>
	</div>
</div>

<?php
}
?>

<div class="modal fade" id="modal_trava_aula" aria-labelledby="textbox">
	<div class="modal-dialog modal-sm">
    	<div class="modal-content">
        	<div class="modal-header modal-header-transform">
            	<h5 class="modal-title">Aviso !</h5>
                <button type="button" id="fechaModal" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
				<div class="container">

				<div class="row">
					<div class="col-sm-12 text-center">
						<h6>Você deve assistir a aula anterior, para liberar as próximas.</h6>
					<hr>

					</div>


					<div class="col-sm-12 text-center">
					<button class="btn btn-default" data-dismiss="modal" aria-label="Close">Ok</button>

					</div>

					</div>
				</div>

				</div>

            </div>
		</div>
    </div>
</div>



<div class="modal fade" id="modal_turma_fechada" aria-labelledby="textbox">
	<div class="modal-dialog modal-sm">
    	<div class="modal-content">
        	<div class="modal-header modal-header-transform">
            	<h5 class="modal-title">Aviso !</h5>
                <button type="button" id="fechaModal" class="close" data-dismiss="modal" aria-label="Close">
                	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
				<div class="container">

				<div class="row">
					<div class="col-sm-12 text-center">
						<h6>Esta turma ainda não esta liberada.</h6>
					<hr>

					</div>


					<div class="col-sm-12 text-center">
					<button class="btn btn-default" data-dismiss="modal" aria-label="Close">Ok</button>

					</div>

					</div>
				</div>

				</div>

            </div>
		</div>
    </div>
</div>