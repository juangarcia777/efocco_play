<?php
require ("../../config.php");
$DadosAluno = $Pesquisa->DadosAluno();
?>

<div class="col-md-12 text-center mtop30">
	<h4 class="bem-vindo">Bem vindo(a), <b><?php echo $DadosAluno['nome']; ?></b></h4>
</div>

<div class="col-md-12 text-center mtop20">	
	<span class="bem-vindo-texto">
		Ficamos felizes em vê-lo(a) por aqui,<br>
		Selecione uma aula ao lado para começarmos o aprendizado.
	</span>
</div>	