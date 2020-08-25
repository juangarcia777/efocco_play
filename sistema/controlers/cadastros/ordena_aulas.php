<?php
require("../../config.php");
$db = new DB(); 

$ordem_aulas = $_POST['ordem_aulas']; 
$ordem_nova=1;

for($i=0; $i<sizeof($ordem_aulas); $i++) {

	$ordem = $ordem_aulas[$i];
	
	$ex = explode('&@&', $ordem);

	$id_aula_ordem = $ex[0];
	$id_disciplina = $ex[1];
	$id_turma = $ex[2];


	$update = $db->select("UPDATE aulas_alocadas SET ordem='$ordem_nova' 
		WHERE id_aula='$id_aula_ordem' AND id_disciplina='$id_disciplina' AND id_turma='$id_turma' 
		LIMIT 1");

	$ordem_nova++;


}


$id_turma_libera = $_POST['id_turma_libera']; 
$data_liberacao_aula = $_POST['data_liberacao_aula']; 

for($i=0; $i<sizeof($id_turma_libera); $i++) {

	$id_turma_lib = $id_turma_libera[$i];
	
	$data_libera = $data_liberacao_aula[$i];
	
	$id_aula;
	
	
	$update = $db->select("UPDATE aulas_alocadas SET data_liberacao='$data_libera' 
		WHERE id_aula='$id_aula' AND id_turma='$id_turma_lib'");

}



$_SESSION['aviso-tipo-ava'] = 'success';
$_SESSION['aviso-mensagem-ava'] = 'Aula salva com sucesso! ';

header("Location: ../../lista-aulas");

?>