<?php
require("../../config.php");
$db = new DB(); 
$data = date("Y-m-d");

$usuario = $cpf_aluno;
$senha = '123456';
$tipo = 3;
$turma = $_POST['turmas'];

// verifica se o aluno já está cadastrado
$verifica = $db->select("SELECT * FROM users WHERE cpf = '$cpf_aluno' OR nome = '$nome_aluno'");

		if ($db->rows($verifica)) {

 			# ja há um aluno cadastrado com esse cpf ou nome
			//SESSIONS DE AVISO//
			$_SESSION['aviso-tipo-ava'] = 'error';
			$_SESSION['aviso-mensagem-ava'] = 'Ops! Esse CPF já está cadastrado.';
 		}

 		else {

 			// O registro não foi encontrado, logo será adicionado na tabela de alunos
 			$grava = $db->select("INSERT INTO users (usuario, senha, tipo, nome, email_aluno, telefone_aluno, celular_aluno, telefone_trab_aluno, cpf, rg, municipio_nascimento, logradouro, bairro, municipio, estado, cep, situacao) VALUES ('$usuario', '$senha', '$tipo', '$nome_aluno', '$email_aluno', '$telefone_aluno', '$celular_aluno', '$telefone_trab_aluno', '$cpf_aluno', '$rg_aluno', '$municipio_nascimento', '$logradouro', '$bairro', '$municipio', '$estado', '$cep', 'Ativo')");	

			$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Informações cadastradas com sucesso! ';


			// ADICIONA O ALUNO NOS CURSOS EM QUE ELE ESTÁ CADASTRADO
				$verifica = $db->select("SELECT * FROM users ORDER BY id DESC LIMIT 1");
					$linha_update = $db->expand($verifica);
					$id_aluno = $linha_update['id'];


			for($i=0; $i<sizeof($turma); $i++) {

				//AQUI TA O VALOR Q VEM DO POST
				$id_turma = $turma[$i];

				$verifica = $db->select("SELECT * FROM turma_alunos WHERE id_turma = '$id_turma' AND id_aluno = '$id_aluno'");

				// verifica se o aluno já não está na turma
				if ($db->rows($verifica)) {


				}

				else {

					// NÃO EXISTE REGISTRO, LOGO, INSERI NA TABELA TURMA
					$insere = $db->select("INSERT INTO turma_alunos (id_turma, id_aluno, status) VALUES ('$id_turma', '$id_aluno', 'Ativo')");

				}

			}

 		} 		

header("Location: ../../listar_alunos");


?>