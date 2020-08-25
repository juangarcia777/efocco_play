<?php require ("../../includes/header.php"); ?>
<?php require ("../../includes/menu.php"); ?>

<?php
unset($_SESSION['MateriaSelecionadaAVA']);
$_SESSION['MateriaSelecionadaAVA'] = $id;
$DadosCurso = $Pesquisa->DadosCurso();
$DadosDisciplina = $Pesquisa->DadosDisciplina($id);
$InformacoesDisciplina = $Pesquisa->InformacoesDisciplina($id);
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


                    <div class="col-md-9 mtop20">
                    	
                    		<?php
                                $listagem_aulas = $Pesquisa->ListaAulasDisciplina($id);
                                if(!empty($listagem_aulas)){
                                    while($line = $db->expand($listagem_aulas)){
                                           
                                        $DadosAula = $Pesquisa->DadosAula($line['id']);                                     
                    		?>
                    			
                    				<div class="card card-border">
			                        <a href="aula/<?php echo $line['id']; ?>/<?php echo normaliza($line['titulo']); ?>">    
			                            <div class="post-title d-flex align-items-center">
			                                
			                                <div class="posted-author">
			                                    <h3 class="author"><?php echo $line['titulo']; ?></h3>
			                                    <span class="post-time cor-neutra"><?php echo formata_data_hora($line['data_criacao']); ?></span>
			                                </div>
			                            </div>
			                            <!-- post title start -->
			                            <div class="post-content">

                                            <?php if(!empty($line['apresentacao'])){ ?>
			                                <div class="post-desc">
			                                    <?php echo apresentacao_aula($line['apresentacao'], 1); ?>
			                                </div>
                                            <?php } ?>
			                                
                                            <?php if(!empty($DadosAula['videos']) || !empty($DadosAula['arquivos']) || !empty($DadosAula['questionarios'])){ ?>
			                                <div class="post-meta">
			                                    <ul class="comment-share-meta">
                                                    <?php if(!empty($DadosAula['videos'])) { ?>
                                                    <li>
                                                        <span class="post-share">
                                                            <i class="icofont-video-alt"></i>
                                                            <span><?php echo Numeros($DadosAula['videos']); ?></span>
                                                        </span>
                                                    </li>
                                                    <?php } ?>

                                                    <?php if(!empty($DadosAula['arquivos'])) { ?>
			                                        <li>
			                                            <span class="post-comment">
			                                                <i class="icofont-file-alt"></i>
			                                                <span><?php echo Numeros($DadosAula['arquivos']); ?></span>
			                                            </span>
			                                        </li>
                                                    <?php } ?>                                                    

                                                    <?php if(!empty($DadosAula['questionarios'])) { ?>
                                                    <li>
                                                        <span class="post-share">
                                                            <i class="icofont-list"></i>
                                                            <span><?php echo Numeros($DadosAula['questionarios']); ?></span>
                                                        </span>
                                                    </li>
                                                    <?php } ?>
			                                    </ul>
			                                </div>
                                            <?php } ?>


			                            </div>
			                        </div>
			                       </a> 

                    		<?php		                    				
                    			}} else {
                            ?>  
                                <div class="card">
                                    <div class="post-title d-flex align-items-center">
                                        <p>Nenhuma aula encontrada para esta disciplina.</p>
                                    </div>    
                                </div>    
                            <?php        
                                }
                    		?>	
			
                    </div>	


                    <div class="col-md-3 mtop20">

                    		<div class="card card-small">
	                    		
	                                <div class="share-content-box ">
	                                    <form class="share-text-box">
	                                        <input name="share" class="share-text-field" aria-disabled="true" placeholder="Pesquisar"  id="email">
	                                        <button class="btn-share" type="submit"><i class="icofont-search-1"></i></button>
	                                    </form>
	                                </div>

	                            
	                        </div>    

                            <div class="card  widget-item">
                                <h4 class="widget-title-materia mbottom30">
                                    Informações sobre a Disciplina
                                </h4>
                                <div class="about-me">
                                    <ul class="nav flex-column about-author-menu">
                                        <li>
                                        	<a href="javascript:void(0)"  >
                                        		<i class="icofont-paperclip"></i>
                                        		Aulas: <?php echo Numeros($DadosDisciplina['aulas']); ?>
                                        	</a>
                                        </li>
                                        <li>
                                        	<a href="videos" >
                                        		<i class="icofont-video-alt"></i>
                                        		Vídeos: <?php echo Numeros($DadosDisciplina['videos']); ?>
                                        	</a>
                                        </li>
                                        <li>
                                        	<a href="arquivos" >
                                        		<i class="icofont-file-alt"></i>
                                        		Arquivos: <?php echo Numeros($DadosDisciplina['arquivos']); ?>
                                        	</a>
                                        </li>
                                        <li>
                                        	<a href="questionarios" >
                                        		<i class="icofont-list"></i>
                                        		Questionários: <?php echo Numeros($DadosDisciplina['questionarios']); ?>
                                        	</a>
                                        </li>
                                        <li>
                                        	 <button class="submit-btn"><i class="icofont-ghost"></i> Timeline</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>


                     


</div>
</div>
</div>
</main>




<?php require ("../../includes/footer.php"); ?>