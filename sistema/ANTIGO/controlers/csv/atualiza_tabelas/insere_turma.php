<?php
	
	// insere a turma da tabela aux para a tabela de turmas
	$seleciona = $db->select("SELECT * FROM aux_csv_cursos GROUP BY turma");

	$data_hoje = date("Y-m-d");

	while ($linha = $db->expand($seleciona)) {

		$nome_turma = $linha['turma'];
		$unidade_turma = $linha['unidade'];
		$periodo_turma = $linha['periodo'];

		$verifica = $db->select("SELECT * FROM turma WHERE nome LIKE '%$nome_turma%' LIMIT 1");

		if ($db->rows($verifica)) {
			// EXISTE REGISTRO COM ESSE NOME NA TABELA, LOGO, NÃO É INSERIDO

			$linha_update = $db->expand($verifica);
			$id_altera = $linha_update['id'];

			$grava = $db->select("UPDATE turma SET nome='$nome_turma', data_entrada='$data_hoje', unidade='$unidade_turma', periodo_letivo='$periodo_turma' WHERE id='$id_altera' LIMIT 1");
			
		}

		else {
			
			// NÃO EXISTE REGISTRO, LOGO, INSERI NA TABELA TURMA
			$insere = $db->select("INSERT INTO turma (nome, unidade, periodo_letivo, data_entrada) VALUES ('$nome_turma', '$unidade_turma' , '$periodo_turma', '$data_hoje' )");

		}

	}
?>