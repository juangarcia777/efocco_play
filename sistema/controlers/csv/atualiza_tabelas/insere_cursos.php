<?php
	
	// insere o aluno na tabela de usuarios do sistema, criando um usuario e senha padrão para login
	$seleciona = $db->select("SELECT * FROM aux_csv_cursos GROUP BY curso ORDER BY curso");

	$data_hoje = date("Y-m-d");

	while ($linha = $db->expand($seleciona)) {

		$nome_curso = $linha['curso'];
		
		$verifica = $db->select("SELECT * FROM cursos WHERE nome = '$nome_curso'");

		if ($db->rows($verifica)) {
			// EXISTE REGISTRO COM ESSE NOME NA TABELA, LOGO, NÃO É INSERIDO
			
		}

		else {
			
			// NÃO EXISTE REGISTRO, LOGO, INSERI NA TABELA TURMA
			$insere = $db->select("INSERT INTO cursos (nome, data_criacao) VALUES ('$nome_curso', '$data_hoje')");

		}

	}
?>