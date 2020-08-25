<?php
	require("../../config.php");
	$db = new DB();

	$id_exclusao = $id;
	$opcao_exclusao = $opcao;

	// VERIFICA DE QUAL LISTA VEIO O DESEJO DE EXCLUSAO
	/*
		1 - PROFESSOR
		2 - ALUNO
		3 - CURSO
		4 - DISCIPLINA
		5 - TURMA
		6 - ADMINISTRADOR
		9 - ALUNOS

	*/

	switch ($opcao_exclusao) {

		case 1:
			# exclue o professor
			$delete = $db->select("DELETE FROM professores WHERE id='$id_exclusao'");
			
			$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Registro excluido com sucesso! ';

			

		case 2:
			# exclue o aluno
			$delete = $db->select("DELETE FROM users WHERE id='$id_exclusao'");
			
			# exclue a relação do aluno com as turmas em que está cadastrado
			$delete = $db->select("DELETE FROM turma_alunos WHERE id_aluno='$id_exclusao'");

			# exclue as respostas de questionarios
			$delete = $db->select("DELETE FROM resp_quest_aluno WHERE id_aluno='$id_exclusao'");
			

			$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Registro excluido com sucesso! ';
			

		case 3:
			# exclue o curso
			$delete = $db->select("DELETE FROM cursos WHERE id='$id_exclusao'");
			
			# exclue a relação do curso com as turmas e disciplinas que estão vinculados nele
			$delete = $db->select("DELETE FROM cursos_turmas WHERE id_curso='$id_exclusao'");
			$delete = $db->select("DELETE FROM disciplinas_cursos WHERE id_curso='$id_exclusao'");

			$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Registro excluido com sucesso! ';
			

		case 4:
			# exclue a disciplina
			$delete = $db->select("DELETE FROM disciplinas WHERE id='$id_exclusao'");
			
			# exclue a relação da disciplina com as turmas e cursos que estão vinculados nela
			$delete = $db->select("DELETE FROM disciplinas_cursos WHERE id_disciplina='$id_exclusao'");
			$delete = $db->select("DELETE FROM turma_disciplinas WHERE id_disciplina='$id_exclusao'");


			//APAGA AULAS E MAIS			
			$show = $db->select("SELECT id FROM aula WHERE id_disciplina='$id_exclusao'");
			while($linex = $db->expand($show)){

				$id = $linex['id'];

				//APAGA AULA
				$grava = $db->select("DELETE FROM aula WHERE id='$id' LIMIT 1");


				//APAGA OS ARQUIVOS DA AULA
				$grava = $db->select("DELETE FROM arquivos_aula WHERE id_aula='$id'");


				//APAGA OS QUESTIONARIOS DA AULA
				$sel = $db->select("SELECT id FROM questionarios WHERE id_aula='$id'");
				while($row = $db->expand($sel)){
					$questionario = $row['id'];

					$pega = $db->select("SELECT * FROM perguntas_questi WHERE id_quest='$questionario'");
					while ($line = $db->expand($pega)) {
						
						$id_p = $line['id_pergunta'];	
						$apaga = $db->select("DELETE FROM perguntas WHERE id='$id_p' LIMIT 1");

					}

					$grava = $db->select("DELETE FROM resp_quest_aluno WHERE id_quest='$questionario'");
					$grava = $db->select("DELETE FROM perguntas_questi WHERE id_quest='$questionario'");
					$grava = $db->select("DELETE FROM questionarios WHERE id='$questionario' LIMIT 1");
				}


				


			}






			$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Registro excluido com sucesso! ';
			

		case 5:
			# exclue a turma
			$delete = $db->select("DELETE FROM turma WHERE id='$id_exclusao'");

			$som = $db->select("SELECT id_aluno FROM turma_alunos WHERE id_turma='$id_exclusao'");
			while($nn = $db->expand($som)){
				$id_al = $nn['id_aluno'];
				$del = $db->select("DELETE FROM users WHERE id='$id_al' LIMIT 1");	
			}
			
			# exclue a relação da turma com os alunos, disciplinas e cursos que estão vinculados nela
			$delete = $db->select("DELETE FROM turma_alunos WHERE id_turma='$id_exclusao'");
			$delete = $db->select("DELETE FROM turma_disciplinas WHERE id_turma='$id_exclusao'");
			$delete = $db->select("DELETE FROM cursos_turmas WHERE id_turma='$id_exclusao'");

			$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Registro excluido com sucesso! ';
			

		case 6:
			# exclue o administrador
			$delete = $db->select("UPDATE professores SET turma_coordenador='0' WHERE id='$id_exclusao'");
			$delete = $db->select("UPDATE turma SET coordenador_turma='0' WHERE coordenador_turma='$id_exclusao'");

			$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Coordenador removido com sucesso! ';


		
			
	}



?>