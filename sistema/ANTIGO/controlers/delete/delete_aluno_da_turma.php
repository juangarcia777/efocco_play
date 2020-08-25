<?php
	require("../../config.php");
	$db = new DB();

	$delete = $db->select("DELETE FROM turma_alunos WHERE id='$id' LIMIT 1");
	$_SESSION['aviso-tipo-ava'] = 'success';
	$_SESSION['aviso-mensagem-ava'] = 'Aluno removido da turma com sucesso! ';

echo 1;

?>