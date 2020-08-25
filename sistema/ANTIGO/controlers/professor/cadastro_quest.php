<?php
require("../../config.php");

$db = new DB();
$hoje = date("Y-m-d");

if($questionario!=''){

	$grava = $db->select("UPDATE questionarios SET titulo='$titulo',data_entrega='$entrega' WHERE id='$questionario' LIMIT 1");

	$id_insert = $questionario;


} else {

	$grava = $db->select("INSERT INTO questionarios (id_aula, data_criacao, titulo, data_entrega, id_turma, id_disciplina, prof_criador) VALUES ('$aula','$hoje','$titulo','$entrega', '$turma', '$disciplina', '$id_logado')");

	$id_insert = $db->last_id($grava);
	$_SESSION['aviso-tipo-ava'] = 'success';
	$_SESSION['aviso-mensagem-ava'] = 'Informações cadastradas com sucesso! ';
}


header("Location: ../../perguntas_questionario/$id_insert");