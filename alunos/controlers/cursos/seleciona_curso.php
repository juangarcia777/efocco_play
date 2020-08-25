<?php
ob_start();
require ("../../config.php");
$_SESSION['CursoSelecionadoAVA'] = $curso;

unset($_SESSION['aviso_ativo']);
unset($_SESSION['travadas']);

$db= new DB;

$sql= $db->select("SELECT * FROM avisos 
WHERE FIND_IN_SET($curso, turmas) OR 
turmas = 0 ORDER BY id DESC LIMIT 1");

	if($db->rows($sql)) {
	$n=$db->expand($sql);

		$_SESSION['aviso_ativo']= true;
		$_SESSION['aviso_texto'] = $n['aviso'];
		$_SESSION['aviso_imagem'] = $n['imagem'];
	}

$busca= $db->select("SELECT trava_aulas FROM turma WHERE id='$curso'");
if($db->rows($busca)){
	$a= $db->expand($busca);
	print_r($a);
	if($a['trava_aulas']==1){
	$_SESSION['travadas'] = true;
	}
}

	if(isset($altera_curso)){
		
		header("Location: ../../home");
	} else {
		header("Location: home");	
	}


?>