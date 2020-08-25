<?php
	
	// insere a turma da tabela aux para a tabela de turmas
	$seleciona = $db->select("SELECT * FROM aux_csv_cursos GROUP BY turma, disciplina ORDER BY turma");

	while ($linha = $db->expand($seleciona)) {

		$nome_turma = $linha['turma'];
		$nome_disciplina = $linha['disciplina'];

		// seleciono o id da turma a ser inserido na relação de qual disciplina está na turma
		$busca = $db->select("SELECT id FROM turma WHERE nome = '$nome_turma' ");
		$linha_busca = $db->expand($busca);
		$id_turma = $linha_busca['id'];

		// seleciono o id da disciplina a ser inserida na relação de qual disciplina está na turma
		$busca = $db->select("SELECT id FROM disciplinas WHERE nome = '$nome_disciplina' ");
		$linha_busca = $db->expand($busca);
		$id_disciplina = $linha_busca['id'];

		$verifica = $db->select("SELECT * FROM turma_disciplinas WHERE id_turma = '$id_turma' AND id_disciplina = '$id_disciplina'");

		if ($db->rows($verifica)) {

			// NÃO INSIRO POIS JÁ EXISTE A RELAÇÃO
			
		}

		else {
			
			// NÃO EXISTE REGISTRO, LOGO, INSERI NA TABELA TURMA
			$insere = $db->select("INSERT INTO turma_disciplinas (id_turma, id_disciplina) VALUES ('$id_turma', '$id_disciplina')");

		}

	}
?>