<?php require ("../../includes/header.php"); ?>
<?php require ("../../includes/modais.php"); ?>
<?php require ("../../includes/menu.php"); ?>

<?php
$DadosCurso = $Pesquisa->DadosCurso();
?>

<main>
<div class="main-wrapper pt-80">
<div class="container">
<div class="row">


        			<div class="col-md-12 ">

                       

						<div class="card">
                        	<div class="post-title d-flex align-items-center">
                            	<div class="posted-author">
                                    <h3 class="author">Minhas Dúvidas</h3>
                                </div>

                            </div>
                        </div>
                    </div>   


                    <div class="col-md-12 ">

                    	<div class="row">



                    		<?php

                            $lista_duvidas = $Pesquisa->ListaDuvidas();
                            if(!empty($lista_duvidas)){
                            	while($line = $db->expand($lista_duvidas)){                          
                            ?>

                    		<div class="col-md-12 mtop20">
								<a data-toggle="collapse" href="#collapseExample<?php echo $line['id']; ?>">
								<div class="card card-border-bottom">
		                        	<span><?php echo formata_data_hora($line['data_hora']); ?></span>	
		                        	<h6>
		                        		<?php echo $line['nome_disciplina']; ?><br>
		                        		<?php echo $line['nome_aula']; ?>
		                        	</h6>	
		                        	<span>
		                        		<?php echo $line['duvida']; ?>
		                        	</span>	

		                        	<div class="collapse show" id="collapseExample<?php echo $line['id']; ?>">
									  <div class="mtop20">
									    <?php
									    	if(!empty($line['resposta'])){
									    		echo '<b>'.formata_data_hora($line['data_resposta']).'</b>';
									    		echo '<br>';
									    		echo '<span class="texto-padrao">'.$line['resposta'].'</span>';
									    	} else {
									    		echo '<span class="texto-padrao">Aguardando resposta!</span>';
									    	}
									    ?>
									  </div>
									</div>

		                        </div>
		                    	</a>
		                    </div>    

		                    <?php
                            }}
                            ?>


                    	</div>			
                    </div>	


                   


                     


</div>
</div>
</div>
</main>


<?php require ("../../includes/footer.php"); ?>