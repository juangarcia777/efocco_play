<?php
		
		// insere o aluno na tabela de usuarios do sistema, criando um usuario e senha padrão para login
	$seleciona = $db->select("SELECT * FROM aux_csv_alunos GROUP BY turma");
	$data_entrada = date("Y-m-d");
	while ($linha = $db->expand($seleciona)) {

		$nome_turma = $linha['turma'];

		$verifica = $db->select("SELECT * FROM turma WHERE nome LIKE '%$nome_turma%' LIMIT 1");

		if ($db->rows($verifica)) {
			// EXISTE REGISTRO COM ESSE NOME NA TABELA, LOGO, NÃO É INSERIDO, APENAS ATUALIZADO

			$linha_update = $db->expand($verifica);
			$id_altera = $linha_update['id'];

			$grava = $db->select("UPDATE turma SET nome='$nome_turma', data_entrada='$data_entrada' WHERE id='$id_altera' LIMIT 1");
			
		}

		else {
			
			// NÃO EXISTE REGISTRO, LOGO, INSERE NA TABELA USERS
			$insere = $db->select("INSERT INTO turma (nome, data_entrada) VALUES ('$nome_turma', '$data_entrada')");

		}

	}
	

?>