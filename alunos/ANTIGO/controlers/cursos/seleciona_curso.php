<?php
ob_start();
require ("../../config.php");
$_SESSION['CursoSelecionadoAVA'] = $curso;

if(isset($altera_curso)){
	header("Location: ../../home");
} else {
	header("Location: home");	
}


?>