<?php 
	require("../../config.php");

	$db = new DB();

	// data1 = idaluno
	// data2 = idturma
	// data3 = opcao -- delete ou insere

	if ($data3 == 1) {
		$insere = $db->select("INSERT INTO turma_alunos (id_turma, id_aluno, status) VALUES ('$data2', '$data1', 'Ativo')");
	}

	else {
		$delete = $db->select("DELETE FROM turma_alunos WHERE id_aluno='$data1' AND id_turma='$data2' ");
	}

	


?>