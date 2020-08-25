<?php
	
	// insere o aluno na tabela de usuarios do sistema, criando um usuario e senha padrão para login
	$seleciona = $db->select("SELECT * FROM aux_csv_cursos GROUP BY professor ORDER BY professor");

	while ($linha = $db->expand($seleciona)) {

		$nome_professor = $linha['professor'];
		
		$verifica = $db->select("SELECT * FROM users WHERE nome = '$nome_professor'");

		if ($db->rows($verifica)) {
			// EXISTE REGISTRO COM ESSE NOME NA TABELA, LOGO, NÃO É INSERIDO
			
		}

		else {

			$arr = explode(' ',trim($nome_professor));
			$usuario = '222.222.222-22';
			$senha = end($arr);
			
			// NÃO EXISTE REGISTRO, LOGO, INSERE NA TABELA USERS
			$insere = $db->select("INSERT INTO users (nome, tipo, usuario, senha, cpf) VALUES ('$nome_professor', 2, '$usuario', '$senha', '$usuario' )");
			$verifica = $db->select("SELECT * FROM users ORDER BY id DESC LIMIT 1");
			$row = $db->expand($verifica);
			$id_tabela_user = $row['id'];
		}

		$verifica = $db->select("SELECT * FROM professores WHERE nome = '$nome_professor'");

		if ($db->rows($verifica)) {
			// EXISTE REGISTRO COM ESSE NOME NA TABELA, LOGO, NÃO É INSERIDO
			
		}

		else {
			
			// NÃO EXISTE REGISTRO, LOGO, INSERE NA TABELA PROFESSORES
			$insere = $db->select("INSERT INTO professores (nome, id_tabela_user) VALUES ('$nome_professor', '$id_tabela_user')");

		}

	}
?>