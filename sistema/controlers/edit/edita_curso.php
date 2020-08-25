<?php

	require("../../config.php");
	$db = new DB();
	$descricao = base64_encode($_POST['descricao']); // This will Encodes
	// decode utilizado para ler esse conteúdo
	$ContentDecoded = base64_decode($apresentacao);  // decode the base64  

	$grava = $db->select("UPDATE cursos SET  nome='$nome', data_criacao='$data_criacao', descricao='$descricao' WHERE id='$id_curso' LIMIT 1");

	//SESSIONS DE AVISO//
	$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Informações alteradas com sucesso! ';

	header("Location: ../../listar_cursos");

?>