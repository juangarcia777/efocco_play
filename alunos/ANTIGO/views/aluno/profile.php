<?php require ("../../includes/header.php"); ?>
<?php 
$DadosAluno = $Pesquisa->DadosAluno(); require ("../../includes/menu.php"); 
$DadosAluno = $Pesquisa->DadosAluno(); 
?>




<main>
<div class="main-wrapper pt-80">
<div class="container"> 
<div class="row">

        			<div class="col-md-12 ">
						<div class="card">
                        	<div class="post-title d-flex align-items-center">
                            	<div class="posted-author">
                            		<h3 class="author">
                                    	Altere seus dados
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>   


                    <div class="col-md-12 mtop20">
                    	

                    			<form class="signup-inner--form" method="POST" action="controlers/aluno/update_user.php">

                    				<input type="hidden" name="id_aluno" class="single-field" value="<?php echo $DadosAluno['id'] ?>">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" disabled class="single-field" value="<?php echo $DadosAluno['nome'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" disabled class="single-field" value="<?php echo $DadosAluno['usuario'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="tel_aluno" placeholder="Telefone" class="single-field" value="<?php echo $DadosAluno['telefone_aluno'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="cel_aluno"  placeholder="Celular" class="single-field" value="<?php echo $DadosAluno['celular_aluno'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="logradouro"  placeholder="Logradouro" class="single-field" value="<?php echo $DadosAluno['logradouro'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="bairro"  placeholder="Bairro" class="single-field" value="<?php echo $DadosAluno['bairro'] ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="cidade"  placeholder="Cidade Atual" class="single-field" value="<?php echo $DadosAluno['municipio'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="cep"  placeholder="CEP" class="single-field" value="<?php echo $DadosAluno['cep'] ?>">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" name="estado"  class="single-field" value="<?php echo $DadosAluno['estado'] ?>" placeholder="UF">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="senha"  class="single-field" placeholder="Senha">
                                                </div>
                                                
                                                <div class="col-12">
                                                    <button class="submit-btn">ALTERAR</button>
                                                </div>
                                            </div>
                                            
                                        </form>

			               

			            
                    </div>	

</div>
</div>
</div>
</main>



<?php require ("../../includes/footer.php"); ?>