<?php
		
		// insere o aluno na tabela de usuarios do sistema, criando um usuario e senha padrão para login
	$seleciona = $db->select("SELECT * FROM aux_csv_alunos GROUP BY nome ORDER BY nome");

	while ($linha = $db->expand($seleciona)) {

		$nome = $linha['nome'];
		$usuario = $linha['cpf'];
		$senha = '123456';
		$tipo = 3;
		$municipio_nascimento = $linha['municipio_nascimento'];
		$cpf = $linha['cpf'];
		$rg = $linha['rg'];
		$telefone = $linha['telefone'];
		$celular = $linha['celular'];
		$logradouro = $linha['logradouro'];
		$bairro = $linha['bairro'];
		$municipio = $linha['municipio'];
		$estado = $linha['estado'];
		$cep = $linha['cep'];
		$situacao = $linha['situacao'];
		$turma = $linha['turma'];

		$verifica = $db->select("SELECT * FROM users WHERE nome = '$nome' OR cpf = '$cpf'");

		if ($db->rows($verifica)) {
			// EXISTE REGISTRO COM ESSE NOME NA TABELA, LOGO, NÃO É INSERIDO, APENAS ATUALIZADO

			$linha_update = $db->expand($verifica);
			$id_altera = $linha_update['id'];

			$grava = $db->select("UPDATE users SET usuario='$usuario', senha='$senha', tipo='$tipo', nome='$nome', telefone_aluno='$telefone', celular_aluno='$celular', cpf = '$cpf', rg = '$rg', situacao='$situacao', municipio_nascimento='$municipio_nascimento', logradouro='$logradouro', bairro='$bairro', municipio='$municipio', estado='$estado', cep='$cep', turma='$turma' WHERE id='$id_altera' LIMIT 1");
			
		}

		else {
			
			// NÃO EXISTE REGISTRO, LOGO, INSERI NA TABELA TURMA
			$insere = $db->select("INSERT INTO users (usuario, senha, tipo, nome, telefone_aluno, celular_aluno, cpf, rg, situacao, municipio_nascimento, logradouro, bairro, municipio, estado, cep, turma) VALUES ('$usuario', '$senha' , '$tipo', '$nome', '$telefone', '$celular', '$cpf', '$rg', '$situacao', '$municipio_nascimento', '$logradouro', '$bairro', '$municipio', '$estado', '$cep', '$turma')");

		}

	}
	

?>