<?php
require("../../config.php");
$db = new DB(); 

$disciplinas = $_POST['disciplinas'];

	$grava = $db->select("UPDATE turma SET id_curso='$id_curso', coordenador_turma='$coordenador_turma', data_entrada='$data_entrada', nome='$nome', unidade='$unidade', periodo_letivo='$periodo_letivo' WHERE id='$id_turma' LIMIT 1");


	$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Informações alteradas com sucesso! ';


	// REMOVO TODOS OS CURSOS EM QUE O ID TAVA PREVIAMENTE LIGADO PARA RELIGAR NOVAMENTE
		//$verifica = $db->select("DELETE FROM cursos_turmas WHERE id_turma = '$id_turma'");
		$verifica = $db->select("DELETE FROM turma_disciplinas WHERE id_turma = '$id_turma'");
		//$insere = $db->select("INSERT INTO cursos_turmas (id_turma, id_curso) VALUES ('$id_turma', '$id_curso')");

		for($i=0; $i<sizeof($disciplinas); $i++) {

			//AQUI TA O VALOR Q VEM DO POST
			$id_disciplina = $disciplinas[$i];

			$insere = $db->select("INSERT INTO turma_disciplinas (id_turma, id_disciplina) VALUES ('$id_turma', '$id_disciplina')");

			$verifica = $db->select("SELECT * FROM disciplinas_cursos WHERE id_curso = '$id_curso' AND id_disciplina = '$id_disciplina' ");

			if ($db->rows($verifica) ) {
				# code...
			}

			else {
				
				$insere = $db->select("INSERT INTO disciplinas_cursos (id_curso, id_disciplina) VALUES ('$id_curso', '$id_disciplina')");

			}


		}

header("Location: ../../listar_turmas");

?>