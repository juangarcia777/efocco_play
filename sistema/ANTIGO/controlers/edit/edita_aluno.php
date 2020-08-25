<?php
require("../../config.php");
$db = new DB(); 

$turma = $_POST['turmas'];

// VERIFICA SE O CPF ALTERADO JÁ NÃO EXISTE
	 $grava = $db->select("SELECT id FROM users WHERE id != '$id_aluno' AND cpf = '$cpf_aluno' ");
	 $linha = $db->expand($grava);
	 $id_aula = $linha['id'];
	
	if ($db->rows($grava)) {
		# CPF OU USUÁRIO JÁ EXISTENTE
		//SESSIONS DE AVISO//
		$_SESSION['aviso-tipo-ava'] = 'error';
		$_SESSION['aviso-mensagem-ava'] = 'Ops! Esse CPF já está cadastrado.';

	}

	else {

		$grava = $db->select("UPDATE users SET senha='$senha', situacao='$situacao', nome='$nome_aluno', email_aluno='$email_aluno', celular_aluno='$celular_aluno', telefone_aluno='$telefone_aluno', telefone_trab_aluno='$telefone_trab_aluno', cpf='$cpf_aluno', rg='$rg_aluno', cep='$cep', municipio_nascimento='$municipio_nascimento', logradouro='$logradouro', bairro='$bairro', municipio='$municipio', estado='$estado' WHERE id='$id_aluno' LIMIT 1");


		//SESSIONS DE AVISO//
		$_SESSION['aviso-aluno-alterado'] = 1;


		// REMOVO TODOS OS CURSOS EM QUE O ID TAVA PREVIAMENTE LIGADO PARA RELIGAR NOVAMENTE
			$verifica = $db->select("DELETE FROM turma_alunos WHERE id_aluno = '$id_aluno'");

			for($i=0; $i<sizeof($turma); $i++) {

				//AQUI TA O VALOR Q VEM DO POST
				$id_turma = $turma[$i];

				$insere = $db->select("INSERT INTO turma_alunos (id_turma, id_aluno, status) VALUES ('$id_turma', '$id_aluno', 'Ativo')");

			}

			$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Informações alteradas com sucesso! ';

	}



header("Location: ../../listar_alunos");

?>