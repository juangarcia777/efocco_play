<?php 
	require("../../config.php");

	$db = new DB();

	// data1 = iddisciplina
	// data2 = idturma
	// data3 = opcao -- delete ou insere

	if ($data3 == 1) {
		$insere = $db->select("INSERT INTO turma_disciplinas (id_turma, id_disciplina) VALUES ('$data2', '$data1')");
	}

	else {
		$delete = $db->select("DELETE FROM turma_disciplinas WHERE id_disciplina='$data1' AND id_turma='$data2' ");
	}


?>