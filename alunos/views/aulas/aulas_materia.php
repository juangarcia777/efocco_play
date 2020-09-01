<h4 class="widget-title-aulas mbottom30 mtop10"><i class="icofont-ui-play"></i>&nbsp;&nbsp;Aulas da Disciplina</h4>

<div class="share-content-box mbottom10">
	
	<form class="share-text-box">
	<input name="pesquisa-aulas" class="share-text-field pesquisa-aulas"  placeholder="Pesquisar" >
	<button class="btn-share" type="submit"><i class="icofont-search-1"></i></button>
	</form>
</div>

<div id="myGroup">

<?php

	$trava= 0;
	$listagem_aulas = $Pesquisa->ListaAulasDisciplina($id);

    if(!empty($listagem_aulas)){
    	$i=1;
    	$count = $db->rows($listagem_aulas);
    	while($line = $db->expand($listagem_aulas)){
			
			
			if($line['concluido']== 0 && isset($_SESSION['travadas']) && $_SESSION['travadas'] == true){
				$trava++;
			} 

			?>
	
	<div class="card aulas-materia" data-name="<?php echo strtolower($line['titulo']); ?>" id="box_<?php echo $line['id'] ?>">
		<div class="card-body-aulas">
    		<small class="cor-neutra-aulas"><?php echo Numeros($i); ?>/<?php echo Numeros($count); ?></small>

    		<label class="label-checkbox">
			  <input type="checkbox" id="aula-completa-check-<?php echo $line['id']; ?>" disabled <?php if($line['concluido']>0){echo 'checked';}; ?>>
			  <span class="checkmark"></span>
			</label>

			<div class="nome-aula-click ">
				<a data-name="<?php echo $line['titulo']; ?>" data-toggle="collapse" href="#expand-aulas<?php echo $line['id']; ?>" aria-expanded="false" aria-controls="expand-aulas<?php echo $line['id']; ?>" 
				class="nome-aula-click <?php echo ($trava<=1)?'assisti-aula':''; ?> <?php echo ($trava>1)?'travada':''; ?>"
				<?php echo ($trava>1)?'onclick="chamaTrava()"':''; ?>
				data-id="<?php echo $line['id']; ?>">	    			
	    			<h4><i class="icofont-ui-play"></i> <?php echo $line['titulo']; ?> </h4>
	    		</a>
    		</div>
    		
		</div>
		
		

    	<?php
    	/////ARQUIVOS OU QUESTIONARIOS///////
		$arquivos = $Pesquisa->ArquivosAula($line['id']);
		$questionarios = $Pesquisa->QuestionariosAula($line['id']);
		$trabalhos = $Pesquisa->TrabalhosAula($line['id']);
		// print_r($line);
		

        	if(!empty($arquivos) || !empty($questionarios) || !empty($line['glossario'] || !empty($trabalhos))){
        		?>
        			<div class="coisas-aula collapse " id="expand-aulas<?php echo ($trava<=1)?$line['id']:''; ?>" data-parent="#myGroup" data-expand="<?php echo strtolower($line['titulo']) ?>">
				
				<ul class="itens-aula">
				
				<?php


        		if(!empty($line['glossario'])){
        		?>
        			
        			<li>    				
	    				<label class="label-checkbox" style="display: none;">
						  <input type="checkbox" data-id="<?php echo $line['id']; ?>" class=""  id="aula_completa_check_9999999999999_<?php echo $line['id']; ?>" disabled>
						  <span class="checkmark"></span>
						</label>

						<a href="javascript:void(0)"  class="check-files-aula assisti-aula" data-id="<?php echo $line['id']; ?>" data-aula="9999999999999_<?php echo $line['id']; ?>" data-glossario="glossario">
							<i class="icofont-badge"></i> Glossário da Aula   
						</a>
	    			</li>  

        		<?php } ?>
				
				<?php
				if(!empty($trabalhos)){
					while($jobs= $db->expand($trabalhos)){
						// print_r($jobs);
				?>

					
					<li>    				
	    				<label class="label-checkbox">
						  <input type="checkbox" <?php echo (!empty($jobs['existe']))?'checked' : ''; ?>>
						  <span class="checkmark"></span>
						</label>

						<a data-name="<?php echo $line['titulo']; ?>" href="javascript:void(0);" aria-expanded="false" aria-controls="expand-aulas<?php echo $line['id']; ?>" class="nome-aula-click assisti-aula"
						data-id="<?php echo $line['id']; ?>" data-trabalho="<?php echo $jobs['id']; ?>">

							<i class="icofont-book"></i> <?php echo $jobs['titulo']; ?>
						</a>
	    			</li>  

					

				<?php } } ?>

			<?php
        		/////ARQUIVOS ANEXOS///////
        		if(!empty($arquivos)){
        			$contador_arquivos=1;
        		while($line_arquivos = $db->expand($arquivos)){				
        ?>     
        
    			<li>    				
    				<label class="label-checkbox">
					  <input disabled type="checkbox" data-id="<?php echo $line['id']; ?>" class="check-files-aula"  id="arquivo_visualizado_check_<?php echo $line_arquivos['id']; ?>" <?php if($line_arquivos['concluido']>0){echo 'checked';}; ?>>
					  <span class="checkmark"></span>
					</label>
					<a href="views/aulas/download.php?file=<?php echo LINK_ARQUIVOS_AULAS.$line_arquivos['arquivo']; ?>" target="_blank"   class="check-files-aula" data-id="<?php echo $line_arquivos['id']; ?>" data-aula="<?php echo $line['id']; ?>">
						<i class="icofont-clip"></i> <?php echo 'Anexo Complementar '.$contador_arquivos; ?>   
					</a>
    			</li>    			
    				
    	<?php
			$contador_arquivos++;	}}

			/////QUESTIONARIOS///////
			if(!empty($questionarios)){
			$contador_questionarios=1;	
        	while($line_questionarios = $db->expand($questionarios)){	        		

              

        		$sand = '';
                
                //echo $line_questionarios['data_entrega'];
        		if($line_questionarios['concluido']==0){
                    
                    if($line['data_liberacao']!='0000-00-00'){

                        
                        
                        $data_entrega_final = date('Y-m-d', strtotime('+7 days', strtotime($line['data_liberacao'])));

                        if($line_questionarios['somente_dia']!='0000-00-00'){
                             if($line_questionarios['somente_dia']>date("Y-m-d")){                                
                                    $data_entrega_final =  $line_questionarios['somente_dia'];       
                             }   
                        }                    

                        

                        $diferenca = strtotime($data_entrega_final) - strtotime(date("Y-m-d"));
                        $dias = floor($diferenca / (60 * 60 * 24));

                        if($dias>0){
                            $sand = '&nbsp;&nbsp;<span class="badge badge-warning" style="font-size:11px; font-weight:400">Restam '.$dias.' dia(s)</span>';
                        }

                        if($dias==0){
                            $sand = '&nbsp;&nbsp;<span class="badge badge-danger" style="font-size:11px; font-weight:400">Último dia</span>';
                        }

                    }    
        			

        		}

        		if($line_questionarios['somente_dia']!='0000-00-00' && $line_questionarios['somente_dia']<=date("Y-m-d")){
        			$sand = '';                    
        		}



		?>	

			<li >    				
    				<label class="label-checkbox">
					  <input disabled type="checkbox" data-id="<?php echo $line['id']; ?>" class=""  id="questionario_completo_check_<?php echo $line_questionarios['id']; ?>" <?php if($line_questionarios['concluido']>0){echo 'checked';}; ?>>
					  <span class="checkmark"></span>
					</label>
					<a data-name="Questionário" href="javascript:void(0)"  class="abre-questionario" data-id="<?php echo $line['id']; ?>" data-questionario="<?php echo $line_questionarios['id']; ?>">
						<i class="icofont-ui-clip-board"></i> Avaliação <?php echo $contador_questionarios; ?>  <?php echo $sand; ?>
					</a>
    		</li>   	


		<?php
			$contador_questionarios++; }}	
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

