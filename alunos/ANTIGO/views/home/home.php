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
                                    <h3 class="author"><?php echo $DadosCurso['nome']; ?></h3>
                                </div>

                                <div class="post-settings-bar hide">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <div class="post-settings arrow-shape">
                                        <ul>
                                            <li><a href="informacoes">Informações do curso</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   


                    <div class="col-md-12 ">

                    	<div class="row">

                    		<?php
                            $disciplinas_curso = $Pesquisa->ListaDisciplinasCurso();
                            if(!empty($disciplinas_curso)){
                            	while($line = $db->expand($disciplinas_curso)){

                            		$DadosDisciplina = $Pesquisa->DadosDisciplina($line['id_disciplina']);

                            		

                            ?>

                    		<div class="col-md-4 mtop20">
								<a href="materia/<?php echo $line['id_disciplina']; ?>/<?php echo normaliza($line['nome']); ?>">
								<div class="card card-border-bottom">
		                        	<h4 class="widget-title-materia"><?php echo $line['nome']; ?></h4>
		                            <div class="post-meta">
		                                <ul class="comment-share-meta">
		                                        <li>
		                                            <span class="post-comment">
		                                                <i class="icofont-read-book-alt"></i>
		                                                <span><?php echo Numeros($DadosDisciplina['aulas']); ?></span>
		                                            </span>
		                                        </li>
		                                        <li>
		                                            <span class="post-share">
		                                                <i class="icofont-file-alt"></i>
		                                                <span><?php echo Numeros($DadosDisciplina['arquivos']); ?></span>
		                                            </span>
		                                        </li>
		                                        <li>
		                                            <span class="post-share">
		                                                <i class="icofont-list"></i>
		                                                <span><?php echo Numeros($DadosDisciplina['questionarios']); ?></span>
		                                            </span>
		                                        </li>
		                                    </ul>                                 
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