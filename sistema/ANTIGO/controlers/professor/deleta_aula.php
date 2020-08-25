<?php
require("../../config.php");

$db = new DB();


//APAGA A AULA
$grava = $db->select("DELETE FROM aula WHERE id='$id' LIMIT 1");


//APAGA OS ARQUIVOS DA AULA
//$grava = $db->select("DELETE FROM arquivos_aula WHERE id_aula='$id'");


//APAGA OS QUESTIONARIOS DA AULA
//$sel = $db->select("SELECT id FROM questionarios WHERE id_aula='$id'");
//while($row = $db->expand($sel)){
//$questionario = $row['id'];


//$peg = $db->select("SELECT id_aula FROM questionarios WHERE id='$questionario' LIMIT 1");
//$line = $db->expand($peg);
//$id_aula = $line['id_aula'];

//$pega = $db->select("SELECT * FROM perguntas_questi WHERE id_quest='$questionario'");
//while ($line = $db->expand($pega)) {
	
//	$id_p = $line['id_pergunta'];	
	//$apaga = $db->select("DELETE FROM perguntas WHERE id='$id_p' LIMIT 1");


//}


//$grava = $db->select("DELETE FROM resp_quest_aluno WHERE id_quest='$questionario'");
//$grava = $db->select("DELETE FROM perguntas_questi WHERE id_quest='$questionario'");
//$grava = $db->select("DELETE FROM questionarios WHERE id='$questionario' LIMIT 1");


//}

$_SESSION['aviso-mensagem-ava'] = 'Registro excluido com sucesso! ';
$_SESSION['aviso-tipo-ava'] = 'success';


?>