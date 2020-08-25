<?php
	
	// insere a turma da tabela aux para a tabela de turmas
	$seleciona = $db->select("SELECT * FROM aux_csv_cursos GROUP BY turma, id_aluno_sist ORDER BY nome_aluno");

	while ($linha = $db->expand($seleciona)) {

		$nome_turma = $linha['turma'];
		$situacao_aluno = $linha['situacao'];
		$nome_aluno = $linha['nome_aluno'];

		// seleciono o id do aluno a ser inserido na relação de qual aluno está na turma
		$busca = $db->select("SELECT id FROM users WHERE nome = '$nome_aluno' ");
		$linha_busca = $db->expand($busca);
		$id_aluno = $linha_busca['id'];

		// seleciono o id da turma a ser inserida na relação de qual aluno está na turma
		$busca = $db->select("SELECT id FROM turma WHERE nome = '$nome_turma' ");
		$linha_busca = $db->expand($busca);
		$id_turma = $linha_busca['id'];

		$verifica = $db->select("SELECT * FROM turma_alunos WHERE id_turma = '$id_turma' AND id_aluno = '$id_aluno'");

		if ($db->rows($verifica)) {

			$linha_update = $db->expand($verifica);
			$id_altera = $linha_update['id'];

			// REALIZA UM UPDATE NO STATUS, POIS O STATUS DO ALUNO NA TURMA PODE ALTERAR
			$grava = $db->select("UPDATE turma_alunos SET status='$situacao_aluno', id_aluno='$id_aluno', id_turma='$id_turma' WHERE id='$id_altera' LIMIT 1");
			
		}

		else {
			
			// NÃO EXISTE REGISTRO, LOGO, INSERI NA TABELA TURMA
			$insere = $db->select("INSERT INTO turma_alunos (id_turma, id_aluno, status) VALUES ('$id_turma', '$id_aluno', '$situacao_aluno')");

		}

	}
?>