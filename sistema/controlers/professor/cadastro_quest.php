<?php
require("../../config.php");

$db = new DB();
$hoje = date("Y-m-d");

if($questionario!=''){

	$grava = $db->select("UPDATE questionarios SET titulo='$titulo',data_entrega='$entrega', somente_dia='$somente_dia', tempo1='$tempo1', tempo2='$tempo2',final_test='$final_test' WHERE id='$questionario' LIMIT 1");

	$id_insert = $questionario;


} else {

	$grava = $db->select("INSERT INTO questionarios (id_aula, data_criacao, titulo, data_entrega, id_turma, id_disciplina, prof_criador, somente_dia, tempo1, tempo2, final_test) VALUES ('$aula','$hoje','$titulo','$entrega', '$turma', '$disciplina', '$id_logado', '$somente_dia', '$tempo1', '$tempo2','$final_test')");

	$id_insert = $db->last_id($grava);
	$_SESSION['aviso-tipo-ava'] = 'success';
	$_SESSION['aviso-mensagem-ava'] = 'Informações cadastradas com sucesso! ';
}


header("Location: ../../perguntas_questionario/$id_insert/$aula");