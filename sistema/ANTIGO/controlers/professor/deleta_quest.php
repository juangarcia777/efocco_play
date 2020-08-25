<?php
require("../../config.php");

$db = new DB();

$peg = $db->select("SELECT id_aula FROM questionarios WHERE id='$questionario' LIMIT 1");
$line = $db->expand($peg);
$id_aula = $line['id_aula'];

$pega = $db->select("SELECT * FROM perguntas_questi WHERE id_quest='$questionario'");
while ($line = $db->expand($pega)) {
	
	$id_p = $line['id_pergunta'];	
	$apaga = $db->select("DELETE FROM perguntas WHERE id='$id_p' LIMIT 1");


}


$grava = $db->select("DELETE FROM resp_quest_aluno WHERE id_quest='$questionario'");
$grava = $db->select("DELETE FROM perguntas_questi WHERE id_quest='$questionario'");
$grava = $db->select("DELETE FROM questionarios WHERE id='$questionario' LIMIT 1");



$_SESSION['aviso-mensagem-ava'] = 'Informações alteradas com sucesso! ';
$_SESSION['aviso-tipo-ava'] = 'success';

 header("Location: ../cadastra_quest/$id_aula");

?>