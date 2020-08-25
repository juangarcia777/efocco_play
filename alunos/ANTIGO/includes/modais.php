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
			            	<textarea required class="form-control" name="duvida" style="height: 170px" placeholder="Explique aqui sua dúvida."></textarea>                    
		            	</div>
		            	<div class="col-md-12 text-center mtop20" >
	                        <button type="submit" class="submit-btn" id="btn-enviar">ENVIAR</button>
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