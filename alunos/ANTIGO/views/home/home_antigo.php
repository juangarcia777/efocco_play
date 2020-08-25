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

                                <div class="post-settings-bar">
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


                    <div class="col-md-8 ">

                    	<div class="row">

                    		<?php
                            $disciplinas_curso = $Pesquisa->ListaDisciplinasCurso();
                            if(!empty($disciplinas_curso)){
                            	while($line = $db->expand($disciplinas_curso)){

                            		$DadosDisciplina = $Pesquisa->DadosDisciplina($line['id']);

                            ?>

                    		<div class="col-md-6 mtop20">
								<a href="materia/<?php echo $line['id']; ?>/<?php echo normaliza($line['nome']); ?>">
								<div class="card card-border">
		                        	<h4 class="widget-title-materia"><?php echo $line['nome']; ?></h4>
		                            <div class="post-meta">
		                                <ul class="comment-share-meta">
		                                        <li>
		                                            <span class="post-comment">
		                                                <i class="icofont-video-alt"></i>
		                                                <span><?php echo Numeros($DadosDisciplina['videos']); ?></span>
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


                    <div class="col-md-4 mtop20">
                    	<div class="card card-profile widget-item p-0">
                                <div class="profile-banner">
                                    <figure class="profile-banner-small">
                                        <a href="profile.html">
                                            <img src="images/aviso.png" alt="">
                                        </a>
                                        
                                    </figure>
                                    <div class="profile-desc">
                                        <h6 class="author"><a href="profile.html">Novo Questionário adicionado</a></h6>
                                        <p>Foi adicionado um questionário de perguntas, que deverá ser entregue até o dia 12/12/2020.</p>
                                        <small class="desc cor-neutra">12/12/2020 às 15:30h</small>
                                        <hr>
                                    </div>

                                    <div class="profile-desc">
                                        <h6 class="author"><a href="profile.html">Novo Questionário adicionado</a></h6>
                                        <p>Foi adicionado um questionário de perguntas, que deverá ser entregue até o dia 12/12/2020.</p>
                                        <small class="desc cor-neutra">12/12/2020 às 15:30h</small>
                                        <hr>
                                    </div>

                                    <div class="profile-desc pad-bottom20">
                                        <h6 class="author"><a href="profile.html">Novo Questionário adicionado</a></h6>
                                        <p>Foi adicionado um questionário de perguntas, que deverá ser entregue até o dia 12/12/2020.</p>
                                        <small class="desc cor-neutra">12/12/2020 às 15:30h</small>
                                       
                                    </div>
                                </div>
                            </div>
                    </div>	


                     


</div>
</div>
</div>
</main>


<?php require ("../../includes/footer.php"); ?>