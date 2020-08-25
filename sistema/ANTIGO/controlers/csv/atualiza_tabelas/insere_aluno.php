<?php
	
	// insere o aluno na tabela de usuarios do sistema, criando um usuario e senha padrão para login
	$seleciona = $db->select("SELECT * FROM aux_csv_cursos GROUP BY id_aluno_sist ORDER BY nome_aluno");

	while ($linha = $db->expand($seleciona)) {

		$usuario = $linha['id_aluno_sist'];
		$senha = '123456';
		$tipo = 3;
		$nome_aluno = $linha['nome_aluno'];
		$id_aluno_sist = $linha['id_aluno_sist'];
		$email_aluno = $linha['email_aluno'];
		$telefone_aluno = $linha['telefone_aluno'];
		$celular_aluno = $linha['celular_aluno'];
		$telefone_trab_aluno = $linha['telefone_trab_aluno'];
		$cpf = $linha['id_aluno_sist'];

		$verifica = $db->select("SELECT * FROM users WHERE nome = '$nome_aluno'");

		if ($db->rows($verifica)) {
			// EXISTE REGISTRO COM ESSE NOME NA TABELA, LOGO, NÃO É INSERIDO
			
		}

		else {
			
			// NÃO EXISTE REGISTRO, LOGO, INSERI NA TABELA TURMA
			$insere = $db->select("INSERT INTO users (usuario, senha, tipo, nome, id_aluno_sist, email_aluno, telefone_aluno, celular_aluno, telefone_trab_aluno, cpf) VALUES ('$usuario', '$senha' , '$tipo', '$nome_aluno', '$id_aluno_sist', '$email_aluno', '$telefone_aluno', '$celular_aluno', '$telefone_trab_aluno', '$cpf')");

		}

	}
?>