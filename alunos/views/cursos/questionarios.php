<?php require ("../../includes/header.php"); ?>
<?php require ("../../includes/menu.php"); ?>

<?php
$DadosCurso = $Pesquisa->DadosCurso();
$InformacoesDisciplina = $Pesquisa->InformacoesDisciplina($_SESSION['MateriaSelecionadaAVA']);
?>

<main>
<div class="main-wrapper pt-80">

    <div class="container">
        <div class="row">


                            <div class="col-md-12 ">
                                <div class="card">
                                    <div class="post-title d-flex align-items-center">
                                        <div class="posted-author" style="width: 100%">
                                            <h3 class="author" >
                                                <?php echo $InformacoesDisciplina['nome']; ?>
                                                <span class="small-info"><?php echo $DadosCurso['nome']; ?></span>
                                            </h3>

                                            

                                        </div>
                                    </div>
                                </div>
                            </div>  
    
                            
                            <?php
                                $questionarios = $Pesquisa->ListagemQuestionariosMateria($_SESSION['MateriaSelecionadaAVA']);
                                if(!empty($questionarios)){
                                    while($line = $db->expand($questionarios)){

                                    	$respondeu = $Pesquisa->AlunoRespondeuQuestionario($line['id']);
                                                                           
                            ?>

                            	<div class="col-md-12 mtop20">
                            		<a href="correcao-questionario/<?php echo $line['id']; ?>/<?php echo normaliza($line['titulo']); ?>">
                                    <div class="card card-border">
			                        
			                            <h4 class="widget-title-questionario mbottom30"><?php echo $line['titulo']; ?></h4>
			                            <div class="post-content-questionario">

			                            	<p class="cor-neutra">Questionário criado em: <b><?php echo data_mysql_para_user($line['data_criacao']); ?></b></p>
			                                
			                            	<?php
			                            		if($respondeu==''){
			                            			echo '<p class="error"><i class="icofont-warning"></i> Você ainda não respondeu a este questionário.</p>';
			                            		} else {
			                            			echo '<p class="ok"><i class="icofont-verification-check"></i> Você respondeu este questionário em <b>'.formata_data_hora($respondeu).'</b></p>';
			                            		}
			                            	?>
			                            	

			                            </div>
			                        </div>
			                    </a>
			                    </div>    

                            <?php                                           
                                }} else {
                            ?>  
                                <div class="card">
                                    <div class="post-title d-flex align-items-center">
                                        <p>Nenhuma questionário encontrado para esta disciplina.</p>
                                    </div>    
                                </div>    
                            <?php        
                                }
                            ?>  
                        


        </div>
    </div>
        

                    


                     


</div>
</main>


<?php require ("../../includes/footer.php"); ?>