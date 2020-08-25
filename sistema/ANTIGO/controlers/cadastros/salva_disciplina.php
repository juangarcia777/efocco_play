<?php

	require("../../config.php");
	$db = new DB();

	$apresentacao = base64_encode($_POST['apresentacao']); // This will Encodes
	// decode utilizado para ler esse conteúdo
	$ContentDecoded = base64_decode($apresentacao);  // decode the base64

	$turma = $_POST['turmas'];

	// verifica se a disciplian já está cadastrada
	$verifica = $db->select("SELECT * FROM disciplinas WHERE nome = '$nome'");

	if ($db->rows($verifica)) {

		// DISCIPLINA JÁ CADASTRADA

		$_SESSION['aviso-tipo-ava'] = 'error';
			$_SESSION['aviso-mensagem-ava'] = 'Ops! Já existe uma disciplina com este nome.';

	}

	else {

		// ADICIONA A DISCIPLINA NA TABELA
		$grava = $db->select("INSERT INTO disciplinas (nome, professor, horario, turno) VALUES ('$nome', '$professor', '$horario', '$turno')");	

		$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Informações cadastradas com sucesso! ';

		// ADICIONO A DISCIPLINA NAS TURMAS EM QUE FOI INSERIDA
				$verifica = $db->select("SELECT * FROM disciplinas ORDER BY id DESC LIMIT 1");
					$linha_update = $db->expand($verifica);
					$id_disciplina = $linha_update['id'];

			// PARA CADA TURMA, ADICIONAR NA TABELA TURMA DISCIPLINAS E QUAL CURSO AQUELA DISCIPLINA FAZ PARTE
			for($i=0; $i<sizeof($turma); $i++) {

				//AQUI TA O VALOR Q VEM DO POST
				$id_turma = $turma[$i];

				// INSIRO A DISCIPLINA NA TURMA
				$insere = $db->select("INSERT INTO turma_disciplinas (id_turma, id_disciplina) VALUES ('$id_turma', '$id_disciplina')");

				// RECEBO O ID DO CURSO EM QUE A TURMA ESTÁ CADASTRADA
				$verifica_curso_turma = $db->select("SELECT * FROM cursos_turmas WHERE id_turma = '$id_turma' LIMIT 1");
					$linha_verifica_curso_turma = $db->expand($verifica_curso_turma);
					$id_curso = $linha_verifica_curso_turma['id_curso'];


				// ADICIONA A DISCIPLINA NO CURSO EM QUE ELA FAZ PARTE
				$insere = $db->select("INSERT INTO disciplinas_cursos (id_curso, id_disciplina) VALUES ('$id_curso', '$id_disciplina')");

			}

	}

	header("Location: ../../listar_disciplinas");
	

?>