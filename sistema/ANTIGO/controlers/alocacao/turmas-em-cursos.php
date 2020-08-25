<?php 
	require("../../config.php");

	$db = new DB();

	// data1 = idturma
	// data2 = idcurso
	// data3 = opcao -- delete ou insere

	if ($data3 == 1) {
		$insere = $db->select("INSERT INTO cursos_turmas (id_turma, id_curso) VALUES ('$data1', '$data2')");
	}

	else {
		$delete = $db->select("DELETE FROM cursos_turmas WHERE id_curso='$data2' AND id_turma='$data1' ");
	}

	


?>