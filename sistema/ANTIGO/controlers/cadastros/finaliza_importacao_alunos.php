<?php

	require("../../config.php");
	$db = new DB();

	$users_update = 0;
			$users_insert = 0;

	// verifica se o professor já está cadastrado na tabela users
	$sel = $db->select("SELECT * FROM aux_csv_alunos ORDER BY id");
	if($db->rows($sel)){

		while($row = $db->expand($sel)){
			
			$nome = $row['nome'];
			$nascimento = $row['$nascimento'];
			$municipio_nascimento = $row['municipio_nascimento'];
			$cpf = $row['cpf'];
			$rg = $row['rg'];		
			$telefone = $row['telefone'];
			$celular = $row['celular'];
			$logradouro = $row['logradouro'];
			$numero = $row['numero'];
			$bairro = $row['bairro'];
			$municipio = $row['municipio'];
			$estado = $row['estado'];
			$cep = $row['cep'];
			$situacao = $row['situacao'];		

			$usuario = $row['cpf'];
			$senha = '123456';
			$tipo = 3;


			

			$pega = $db->select("SELECT id FROM users WHERE cpf='$cpf' LIMIT 1");
			if($db->rows($pega)){
				$achado = $db->expand($pega);
				$id_grave = $achado['id'];

				$grava = $db->select("UPDATE users SET usuario='$usuario', nome='$nome', telefone_aluno='$telefone', celular_aluno='$celular', rg='$rg', municipio_nascimento='$municipio_nascimento', logradouro='$logradouro', bairro='$bairro', municipio='$municipio', estado='$estado', cep='$estado', situacao='$situacao' WHERE id='$id_grave' LIMIT 1");	

				$users_update++;

			} else {

				$grava = $db->select("INSERT INTO users (usuario, senha, tipo, nome, telefone_aluno, celular_aluno, cpf, rg, municipio_nascimento, logradouro, bairro, municipio, estado, cep, situacao) VALUES ('$usuario', '$senha', '$tipo', '$nome', '$telefone', '$celular', '$cpf', '$rg', '$municipio_nascimento', '$logradouro', '$bairro', '$municipio', '$estado', '$cep', '$situacao')");		
				$id_grave = $db->last_id($grava);

				$users_insert++;

			}


			//COLOCA NA TURMA//
			$turma_insere = $db->select("SELECT id FROM turma_alunos WHERE id_turma = '$turma' AND id_aluno = '$id_grave' ORDER BY id DESC LIMIT 1");

				// verifica se o aluno já não está na turma
				if (!$db->rows($turma_insere)) {

					$insere = $db->select("INSERT INTO turma_alunos (id_turma, id_aluno, status) VALUES ('$turma', '$id_grave', 'Ativo')");

				}

			


		}


	}


	$apaga = $db->select("TRUNCATE TABLE aux_csv_alunos");

	$_SESSION['aviso-tipo-ava'] = 'success';
	$_SESSION['aviso-mensagem-ava'] = 'Importação finalizada: '.$users_insert.' registros inseridos e '.$users_update.' atualizados.';
	
	header("Location: ../../infos_turmas/$turma");
	
?>