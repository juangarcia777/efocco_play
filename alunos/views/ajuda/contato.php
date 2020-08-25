<?php require ("../../includes/header.php"); ?>
<?php require ("../../includes/menu.php"); ?>


<main>
<div class="main-wrapper pt-80">
<div class="container">
<div class="row">

        			<div class="col-md-12 ">
						<div class="card">
                        	<div class="post-title d-flex align-items-center">
                            	<div class="posted-author">
                            		<h3 class="author">
                                    	Entre em contato
                                    </h3>

                                </div>
                            </div>
                        </div>
                    </div>   


                    <div class="col-md-12 mtop20">
                    	
                    		<div class="card">

                    			<form class="signup-inner--form" method="POST" action="controlers/aluno/envia_contato.php">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input type="text" required name="nome" class="single-field" placeholder="Seu nome">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" required name="email" class="single-field" placeholder="E-mail">
                                                </div>
                                                <div class="col-md-6"> 
                                                    <input type="text" required name="telefone" class="single-field" placeholder="Telefone">
                                                </div>
                                                <div class="col-12">
                                                    <input type="text"  name="motivo"  class="single-field" placeholder="Motivo da solicitação">
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text"  name="cidade" class="single-field" placeholder="Cidade">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text"  name="uf" class="single-field" placeholder="UF">
                                                </div>

                                                 <div class="col-md-12">
                                                    <textarea class="single-field" required name="descricao" style="height: 180px" placeholder="Descreva sua solicitação"></textarea>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <button class="submit-btn">ENVIAR</button>
                                                </div>
                                            </div>
                                            
                                        </form>

			                </div>
			                       

			            
                    </div>	

</div>
</div>
</div>
</main>



<?php require ("../../includes/footer.php"); ?>