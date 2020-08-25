<?php 
require ("../../includes/header.php"); 
$DadosAluno = $Pesquisa->DadosAluno();
?>

<main class="escolha" style="background-image: url(../images/<?php echo BACKGROUND; ?>);">
<div class="main-wrapper pt-80">
<div class="container h-100">
<div class="row h-100 justify-content-center align-items-center">


			    <div class="col-md-6">
			      	<div class="card pbottom40">
		            <form method="post" action="marca-selecao-curso" class="formulario-form">            	
			      		<div class="row h-100 justify-content-center align-items-center">

			      			<div class="col-md-12 text-center">
			      				<img src="../images/<?php echo LOGO_LOGIN; ?>" style="max-height: 70px">
			      			</div>	


			      			<?php if($DadosAluno['situacao']=='Ativo'){ ?>

			      			<div class="col-md-12 mtop30 text-center ">
			      				<p class="texto-comum">Bem vindo(a), <strong><?php echo $DadosAluno['nome']; ?></strong><br>escolha um curso para continuar.</strong></p>
			      			</div>	

			      			<div class="col-md-10 text-center mtop20" >
				            	<select class="nice-select" name="curso" required>		                           	
		                           	<?php
		                            	$turmas_aluno = $Pesquisa->TurmasAluno();
		                            	if(!empty($turmas_aluno)){
		                            		echo '<option value="">--Selecione uma turma--</option>';
		                            		while($line = $db->expand($turmas_aluno)){
		                            			echo '<option value="'.$line['id_turma'].'">'.$line['nome'].'</option>';
		                            		}
		                            	} else {
		                            		echo '<option value="">Nenhum curso encontrado!</option>';
		                            	}
		                            ?>
		                        </select>                        
			            	</div>

			            			
			            	
			            	<div class="col-md-10 text-center mtop20" >
		                        <button type="submit" class="submit-btn">
		                        	 <i class="icofont-spinner icon-button-form-post hide"></i>		
		                        	 <i class="icofont-ui-play"></i>                        	 
		                        	Selecionar
		                        </button>
		                    </div>

		                  <?php } else { ?>

		                  	<div class="col-md-12 mtop30 text-center ">
		                  		<h4>Ops, ocorreu algum erro!</h4>
		                  		<br>
			      				<p class="texto-comum">Entre em contato com a administração da instituição<br> para maiores informações.</p>
			      			</div>

		                  <?php } ?>	

		                  <div class="col-md-12 mtop30 text-center ">
		                  	<a href="logout"><b>SAIR</b></a>
		                  </div>	

						</div>			                    
			    </div>   
			  </div>
               


</div>
</div>
</div>
</main>


<?php require ("../../includes/footer.php"); ?>