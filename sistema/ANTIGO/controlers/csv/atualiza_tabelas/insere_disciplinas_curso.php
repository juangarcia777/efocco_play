<?php
	
	// insere a turma da tabela aux para a tabela de turmas
	$seleciona = $db->select("SELECT * FROM aux_csv_cursos GROUP BY curso, disciplina ORDER BY curso");

	while ($linha = $db->expand($seleciona)) {

		$nome_curso = $linha['curso'];
		$nome_disciplina = $linha['disciplina'];

		// seleciono o id do curso a ser inserido na relação de qual disciplina está no curso
		$busca = $db->select("SELECT id FROM cursos WHERE nome = '$nome_curso' ");
		$linha_busca = $db->expand($busca);
		$id_curso = $linha_busca['id'];

		// seleciono o id da disciplina a ser inserida na relação de qual disciplina está no curso
		$busca = $db->select("SELECT id FROM disciplinas WHERE nome = '$nome_disciplina' ");
		$linha_busca = $db->expand($busca);
		$id_disciplina = $linha_busca['id'];

		$verifica = $db->select("SELECT * FROM disciplinas_cursos WHERE id_curso = '$id_curso' AND id_disciplina = '$id_disciplina'");

		if ($db->rows($verifica)) {

			// NÃO INSIRO POIS JÁ EXISTE A RELAÇÃO
			
		}

		else {
			
			// NÃO EXISTE REGISTRO, LOGO, INSERI NA TABELA TURMA
			$insere = $db->select("INSERT INTO disciplinas_cursos (id_curso, id_disciplina) VALUES ('$id_curso', '$id_disciplina')");

		}

	}
?>