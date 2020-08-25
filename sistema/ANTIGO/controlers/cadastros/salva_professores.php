<?php

	require("../../config.php");
	$db = new DB();

	// verifica se o professor já está cadastrado na tabela users
	$verifica = $db->select("SELECT * FROM professores WHERE nome = '$nome' OR usuario='$usuario'");

	if ($db->rows($verifica)) {

		// PROFESSOR JÁ CADASTRADO

		$_SESSION['aviso-tipo-ava'] = 'error';
			$_SESSION['aviso-mensagem-ava'] = 'Ops! Já existe um professor com este nome ou usuário!';

	}

	else {

		
		$curriculo = base64_encode($_POST['curriculo']); // This will Encodes	

		$grava = $db->select("INSERT INTO professores (nome, turma_coordenador, usuario, senha, curriculo) VALUES ('$nome', '$turma_coordenador', '$usuario', '$senha', '$curriculo')");

		$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Informações cadastradas com sucesso! ';

	}
	
	header("Location: ../../listar_professores");
	
?>