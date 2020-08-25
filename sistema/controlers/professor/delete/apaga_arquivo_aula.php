<?php
	require("../../../config.php");
	$db = new DB();

	
	$peg = $db->select("SELECT * FROM aula WHERE id='$aula' LIMIT 1");
	$line = $db->expand($peg);
	$id_turma = $line['id_turma'];
	$id_disciplina = $line['id_disciplina'];

	
	$sel = $db->select("SELECT arquivo FROM arquivos_aula WHERE id='$id'");	
	$line_arq = $db->expand($sel);
	$arquivo = $line_arq['arquivo'];


	//APAGA O ARQUIVO//
	if(file_exists(PASTA_ARQUIVOS_AULAS.$arquivo)){		
		unlink(PASTA_ARQUIVOS_AULAS.$arquivo);
	}


	$delete = $db->select("DELETE FROM arquivos_aula WHERE id='$id'");

	$_SESSION['aviso-mensagem-ava'] = 'Informações alteradas com sucesso! ';
	$_SESSION['aviso-tipo-ava'] = 'success';


	header("Location: ../../envia_arquivos_aula/".$aula);
	

?>