<h4 class="widget-title-aulas mbottom30 mtop10"><i class="icofont-ui-play"></i>&nbsp;&nbsp;Aulas da Disciplina</h4>

<div class="share-content-box mbottom10">
	<form class="share-text-box">
	<input name="pesquisa-aulas" class="share-text-field pesquisa-aulas"  placeholder="Pesquisar" >
	<button class="btn-share" type="submit"><i class="icofont-search-1"></i></button>
	</form>
</div>

<div id="myGroup">
<?php
	$listagem_aulas = $Pesquisa->ListaAulasDisciplina($id);
    if(!empty($listagem_aulas)){
    	$i=1;
    	$count = $db->rows($listagem_aulas);
    	while($line = $db->expand($listagem_aulas)){
        	//$DadosAula = $Pesquisa->DadosAula($line['id']);                                            		
?>


	
	<div class="card aulas-materia" data-name="<?php echo strtolower($line['titulo']); ?>">
		<div class="card-body-aulas">
    		<small class="cor-neutra-aulas"><?php echo Numeros($i); ?>/<?php echo Numeros($count); ?></small>

    		<label class="label-checkbox">
			  <input type="checkbox" id="aula-completa-check-<?php echo $line['id']; ?>" disabled>
			  <span class="checkmark"></span>
			</label>

			<div class="nome-aula-click">
	    		<a data-name="<?php echo $line['titulo']; ?>" data-toggle="collapse" href="#expand-aulas<?php echo $line['id']; ?>" aria-expanded="false" aria-controls="expand-aulas<?php echo $line['id']; ?>" class="nome-aula-click assisti-aula" data-id="<?php echo $line['id']; ?>">	    			
	    			<h4><i class="icofont-ui-play"></i> <?php echo $line['titulo']; ?></h4>
	    		</a>
    		</div>
    		


    	</div>

    	<?php
    	/////ARQUIVOS OU QUESTIONARIOS///////
		$arquivos = $Pesquisa->ArquivosAula($line['id']);
		$questionarios = $Pesquisa->QuestionariosAula($line['id']);
		

        	if(!empty($arquivos) || !empty($questionarios) || !empty($line['glossario'])){
        		echo '
        			<div class="coisas-aula collapse "  id="expand-aulas'.$line['id'].'" data-parent="#myGroup" data-expand="'.strtolower($line['titulo']).'">
    					<ul class="itens-aula">
        		';


        		if(!empty($line['glossario'])){
        		?>
        			
        			<li>    				
	    				<label class="label-checkbox">
						  <input type="checkbox" data-id="<?php echo $line['id']; ?>" class="check-files-aula"  id="aula_completa_check_9999999999999_<?php echo $line['id']; ?>">
						  <span class="checkmark"></span>
						</label>
						<a href="javascript:void(0)"  class="check-files-aula assisti-aula" data-id="<?php echo $line['id']; ?>" data-aula="9999999999999_<?php echo $line['id']; ?>" data-glossario="glossario">
							<i class="icofont-badge"></i> Glossário da Aula   
						</a>
	    			</li>  

        		<?php	
        		}


        		/////ARQUIVOS ANEXOS///////
        		if(!empty($arquivos)){
        			$contador_arquivos=1;
        		while($line_arquivos = $db->expand($arquivos)){				
        ?>     
        
    			<li>    				
    				<label class="label-checkbox">
					  <input type="checkbox" data-id="<?php echo $line['id']; ?>" class="check-files-aula"  id="aula_completa_check_<?php echo $line_arquivos['id']; ?>">
					  <span class="checkmark"></span>
					</label>
					<a href="views/aulas/download.php?file=<?php echo LINK_ARQUIVOS_AULAS.$line_arquivos['arquivo']; ?>" target="_blank"   class="check-files-aula" data-id="<?php echo $line['id']; ?>" data-aula="<?php echo $line_arquivos['id']; ?>">
						<i class="icofont-clip"></i> <?php echo $line_arquivos['nome']; ?>   
					</a>
    			</li>    			
    				
    	<?php
			$contador_arquivos++;	}}

			/////QUESTIONARIOS///////
			if(!empty($questionarios)){
        	while($line_questionarios = $db->expand($questionarios)){	
		?>	

			<li >    				
    				<label class="label-checkbox">
					  <input type="checkbox" data-id="<?php echo $line['id']; ?>" class="check-files-aula"  id="questionario_completo_check_<?php echo $line_questionarios['id']; ?>">
					  <span class="checkmark"></span>
					</label>
					<a data-name="Questionário" href="javascript:void(0)"  class="check-files-aula abre-questionario" data-id="<?php echo $line['id']; ?>" data-questionario="<?php echo $line_questionarios['id']; ?>">
						<i class="icofont-ui-clip-board"></i> AVALIAÇÃO <?php echo $line_questionarios['titulo']; ?>  
					</a>
    		</li>   	


		<?php
			}}	
			echo '</ul>
			 </div>';
		}
        ?> 


	</div>   	
	

<?php
	$i++;		                    				
}} else {
?>  
<div class="card ">
	<div class="post-title d-flex align-items-center">
    	<p>Nenhuma aula encontrada para esta disciplina.</p>
    </div>    
</div>    
<?php        
}
?>	

</div>