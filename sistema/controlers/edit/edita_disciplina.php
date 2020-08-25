<?php

	require("../../config.php");
	$db = new DB();

	$turma = $_POST['turmas'];
	$apresentacao = base64_encode($_POST['apresentacao']); // This will Encodes
	// decode utilizado para ler esse conteúdo
	$ContentDecoded = base64_decode($apresentacao);  // decode the base64 

	$grava = $db->select("UPDATE disciplinas SET nome='$nome', professor='$professor', horario='$horario', turno='$turno', apresentacao='$apresentacao' WHERE id='$id_disciplina' LIMIT 1");

	$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Informações alteradas com sucesso! ';

		// REMOVO TODAS AS TURMAS EM QUE O ID TAVA PREVIAMENTE LIGADO, PARA RELIGAR NOVAMENTE
		$verifica = $db->select("DELETE FROM turma_disciplinas WHERE id_disciplina = '$id_disciplina'");
		$verifica = $db->select("DELETE FROM disciplinas_cursos WHERE id_disciplina = '$id_disciplina'");

		for($i=0; $i<sizeof($turma); $i++) {

			//AQUI TA O VALOR Q VEM DO POST
			$id_turma = $turma[$i];

			$insere = $db->select("INSERT INTO turma_disciplinas (id_turma, id_disciplina) VALUES ('$id_turma', '$id_disciplina')");

		}

		// VERIFICO TODAS AS TURMAS QUE AQUELA DISCIPLINA ESTÁ CADASTRADA
		$verifica = $db->select("SELECT * FROM turma_disciplinas WHERE id_disciplina = '$id_disciplina'");

		while ( $linha = $db->expand($verifica) ) {

			$id_turma = $linha['id_turma'];

			# cada turma que contem aquela disciplina, é verificado qual curso é responsavel por aquela turma, para fazer a relação
			# de disciplinas e cursos
			$verifica_id_curso = $db->select("SELECT * FROM cursos_turmas WHERE id_turma = '$id_turma' LIMIT 1");
			$linha_curso = $db->expand($verifica_id_curso);
			$id_curso = $linha_curso['id_curso'];

			$insere = $db->select("INSERT INTO disciplinas_cursos (id_curso, id_disciplina) VALUES ('$id_curso', '$id_disciplina')");

		}
		
	header("Location: ../../listar_disciplinas");

?>