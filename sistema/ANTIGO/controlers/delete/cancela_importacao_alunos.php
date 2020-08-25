<?php
	require("../../config.php");
	$db = new DB();

	$delete = $db->select("DELETE FROM aux_csv_alunos");
	$_SESSION['aviso-tipo-ava'] = 'success';
	$_SESSION['aviso-mensagem-ava'] = 'Importação cancelada com sucesso! ';

	header("Location: ../../csv_alunos");



?>