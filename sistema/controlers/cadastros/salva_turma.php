<?php

	require("../../config.php");
	$db = new DB();

	$disciplinas = $_POST['disciplinas'];

	// verifica se a turma já está cadastrada
	// USADO O LIKE POIS NA IMPORTAÇÃO O NOME DA TURMA VEM EM UM FORMATO DIFERENTE
	$verifica = $db->select("SELECT * FROM turma WHERE nome = '$nome'");

	if ($db->rows($verifica)) {

		// TURMA JÁ CADASTRADA

		$_SESSION['aviso-tipo-ava'] = 'error';
			$_SESSION['aviso-mensagem-ava'] = 'Ops! Já existe uma turma com este nome!';

	}

	else {

		// ADICIONA A DISCIPLINA NA TABELA
		$grava = $db->select("INSERT INTO turma (id_curso, data_entrada, nome, unidade, periodo_letivo, coordenador_turma,trava_aulas) VALUES ('$id_curso', '$data_entrada', '$nome', '$unidade', '$periodo_letivo', '$coordenador_turma','$trava_aulas')");	

		$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Informações cadastradas com sucesso!';

		
		// ADICIONO A TURMA NO RESPECTIVO CURSO
				$verifica = $db->select("SELECT * FROM turma ORDER BY id DESC LIMIT 1");
					$linha_update = $db->expand($verifica);
					$id_turma = $linha_update['id'];

					//$verifica_relacao_cursos_turmas = $db->select("SELECT * FROM cursos_turmas WHERE id_turma = '$id_turma' AND id_curso = '$id_curso' ");

					//if ($db->rows($verifica_relacao_cursos_turmas)) {
						# code...
			//		}
			//		else {

			//			if($id_curso!=0){
			//				$grava = $db->select("INSERT INTO cursos_turmas (id_turma, id_curso) VALUES ('$id_turma', '$id_curso')");
							
			//			}
						
						// VERIFICA SE AQUELA DISCIPLINA ESTÁ NA TABELA DISCIPLINAS CURSOS	
						$verifica_turmas_disciplinas = $db->select("SELECT * FROM turma_disciplinas WHERE id_turma = '$id_turma'");

						while ( $row = $db->expand($verifica_turmas_disciplinas) ) {
							$id_disciplina = $row['id_disciplina'];

							$verifica_disciplina_curso = $db->select("SELECT * FROM disciplinas_cursos WHERE id_curso = '$id_curso' AND id_disciplina = '$id_disciplina");

							if ($db->rows($verifica_disciplina_curso)) {
								# code...
							}

							else {
								$grava = $db->select("INSERT INTO disciplinas_cursos (id_curso, id_disciplina) VALUES ('$id_curso', '$id_disciplina')");
							}
							# code...
						}

					}

					

			// PARA CADA DISCIPLINA, ADICIONAR NA TABELA TURMA DISCIPLINAS QUAL DISCIPLINA AQUELA TURMA POSSUI
			for($i=0; $i<sizeof($disciplinas); $i++) {

				//AQUI TA O VALOR Q VEM DO POST
				$id_disciplina = $disciplinas[$i];

				// INSIRO A DISCIPLINA NA TURMA
				$insere = $db->select("INSERT INTO turma_disciplinas (id_turma, id_disciplina) VALUES ('$id_turma', '$id_disciplina')");
			}

	header("Location: ../../listar_turmas");
	

?>