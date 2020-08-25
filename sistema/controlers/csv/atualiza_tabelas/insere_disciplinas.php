<?php
	
	// insere o aluno na tabela de usuarios do sistema, criando um usuario e senha padrão para login
	$seleciona = $db->select("SELECT * FROM aux_csv_cursos GROUP BY disciplina ORDER BY disciplina");

	while ($linha = $db->expand($seleciona)) {

		$nome_disciplina = $linha['disciplina'];
		$nome_professor = $linha['professor'];
		$horario_disciplina = $linha['horario'];
		$turno_disciplina = $linha['turno'];

		// seleciono o id do professor a ser inserido na relação de qual professor está na disciplina
		$busca = $db->select("SELECT id FROM professores WHERE nome = '$nome_professor'");
		$linha_busca = $db->expand($busca);
		$id_professor = $linha_busca['id'];
		
		$verifica = $db->select("SELECT * FROM disciplinas WHERE nome = '$nome_disciplina'");

		if ($db->rows($verifica)) {

			$linha_update = $db->expand($verifica);
			$id_altera = $linha_update['id'];

			// REALIZA UM UPDATE NO STATUS, POIS O STATUS DO ALUNO NA TURMA PODE ALTERAR
			$grava = $db->select("UPDATE disciplinas SET horario='$horario_disciplina', turno='$turno_disciplina' WHERE id='$id_altera' LIMIT 1");
			// EXISTE REGISTRO COM ESSE NOME NA TABELA, LOGO, NÃO É INSERIDO
			
		}

		else {
			
			// NÃO EXISTE REGISTRO, LOGO, INSERI NA TABELA TURMA
			$insere = $db->select("INSERT INTO disciplinas (nome, professor, horario, turno) VALUES ('$nome_disciplina', '$id_professor', '$horario_disciplina', '$turno_disciplina')");

		}

	}
?>