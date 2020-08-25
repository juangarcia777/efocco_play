<?php

	require("../../config.php");
	$db = new DB();

	$curriculo = base64_encode($_POST['curriculo']);

	$grava = $db->select("UPDATE professores SET usuario='$usuario', senha='$senha', nome='$nome', turma_coordenador='$turma_coordenador', curriculo='$curriculo' WHERE id='$id_professor' LIMIT 1");

	//SESSIONS DE AVISO//
	$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Informações alteradas com sucesso! ';
		
	header("Location: ../../listar_professores");

?>