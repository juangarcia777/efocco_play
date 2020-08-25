<?php
		
		// insere o aluno na tabela de usuarios do sistema, criando um usuario e senha padrão para login
	$seleciona = $db->select("SELECT * FROM aux_csv_alunos");


	while ($linha = $db->expand($seleciona)) {

		$nome_turma = $linha['turma'];
		$nome_aluno = $linha['nome'];
		$cpf_aluno = $linha['cpf'];
		$situacao = $linha['situacao'];

		// seleciono o id da turma a ser inserido na relação de qual aluno está na turma
		$busca = $db->select("SELECT id FROM turma WHERE nome = '$nome_turma' ");
		$linha_busca = $db->expand($busca);
		$id_turma = $linha_busca['id'];

		// seleciono o id do aluno a ser inserido na relação de qual aluno está na turma
		$busca = $db->select("SELECT id FROM users WHERE nome = '$nome_aluno' OR cpf='$cpf_aluno'");
		$linha_busca = $db->expand($busca);
		$id_aluno = $linha_busca['id'];

		$verifica = $db->select("SELECT * FROM turma_alunos WHERE id_turma = '$id_turma' AND id_aluno = '$id_aluno' LIMIT 1");

		if ($db->rows($verifica)) {
			// EXISTE REGISTRO COM ESSE NOME NA TABELA, LOGO, NÃO É INSERIDO, APENAS ATUALIZADO

			$linha_update = $db->expand($verifica);
			$id_altera = $linha_update['id'];

			$grava = $db->select("UPDATE turma_alunos SET status='$situacao', id_aluno='$id_aluno', id_turma='$id_turma' WHERE id='$id_altera' LIMIT 1");
			
		}

		else {
			
			// NÃO EXISTE REGISTRO, LOGO, INSERE NA TABELA
			$insere = $db->select("INSERT INTO turma_alunos (id_turma, id_aluno, status) VALUES ('$id_turma', '$id_aluno', '$situacao')");

		}

	}
	

?>