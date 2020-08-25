<?php
	require("../../../config.php");
	$db = new DB();

	
	*/

	switch ($opcao_exclusao) {

		case 1:
			# exclue a aula
			

		case 2:
			# exclue o arquivo da aula
			$delete = $db->select("DELETE FROM arquivos_aula WHERE id='$id_exclusao'");
			$_SESSION['exclusao-realizada-aula'] = 1;
			header("Location: ".ADMIN_DIR."editar_aula/".$id_turma.'/'.$id_disciplina.'/'.$id_aula);
			break;
	}



?>