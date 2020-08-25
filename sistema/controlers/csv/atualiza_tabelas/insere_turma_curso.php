<?php
	
	// insere a turma da tabela aux para a tabela de turmas
	$seleciona = $db->select("SELECT * FROM aux_csv_cursos GROUP BY turma, curso ORDER BY turma");

	while ($linha = $db->expand($seleciona)) {

		$nome_turma = $linha['turma'];
		$nome_curso = $linha['curso'];

		// seleciono o id da turma a ser inserido na relação de qual turma está em qual curso
		$busca = $db->select("SELECT id FROM turma WHERE nome = '$nome_turma' ");
		$linha_busca = $db->expand($busca);
		$id_turma = $linha_busca['id'];

		// seleciono o id do curso a ser inserido na relação de qual turma está em qual curso
		$busca = $db->select("SELECT id FROM cursos WHERE nome = '$nome_curso'");
		$linha_busca = $db->expand($busca);
		$id_curso = $linha_busca['id'];

		$verifica = $db->select("SELECT * FROM cursos_turmas WHERE id_turma = '$id_turma' AND id_curso = '$id_curso'");

		if ($db->rows($verifica)) {

			// NÃO INSIRO POIS JÁ EXISTE A RELAÇÃO
			
		}

		else {
			
			// NÃO EXISTE REGISTRO, LOGO, INSERE NA TABELA
			$insere = $db->select("INSERT INTO cursos_turmas (id_turma, id_curso) VALUES ('$id_turma', '$id_curso')");

		}

	}
?>