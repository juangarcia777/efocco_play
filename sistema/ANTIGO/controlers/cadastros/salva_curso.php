<?php
require("../../config.php");
$db = new DB();
	$descricao = base64_encode($_POST['descricao']); // This will Encodes
	// decode utilizado para ler esse conteúdo
	$ContentDecoded = base64_decode($apresentacao);  // decode the base64 

// verifica se o curso já está cadastrado
$verifica = $db->select("SELECT * FROM cursos WHERE nome = '$nome'");

	if ($db->rows($verifica)) {

		// CURSO JÁ CADASTRADO

		$_SESSION['aviso-tipo-ava'] = 'error';
			$_SESSION['aviso-mensagem-ava'] = 'Ops! Já existe um curso com este nome.';


	}

	else {
		
		$grava = $db->select("INSERT INTO cursos (nome, data_criacao, descricao) VALUES ('$nome', '$data_criacao', '$descricao')");	

		$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Informações cadastradas com sucesso! ';

	}



header("Location: ../../listar_cursos");

?>