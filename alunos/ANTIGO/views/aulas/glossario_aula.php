<?php
require ("../../config.php");

$InformacoesAula = $Pesquisa->InformacoesAula($id);
?>

<div class="row">
	
	<div class="col-md-12">
		<h3 class="titulo_aula_grande"><?php echo $InformacoesAula['titulo']; ?></h3>		
	</div>

	<div class="col-md-12 mtop30">
		<div class="texto_aula_grande"><?php echo apresentacao_aula($InformacoesAula['glossario']); ?></div>
	</div>	

</div>	

