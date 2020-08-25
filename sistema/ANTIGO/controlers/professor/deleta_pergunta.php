<?php
require("../../config.php");

$db = new DB();

$peg = $db->select("SELECT id_quest FROM perguntas_questi WHERE id_pergunta='$pergunta' LIMIT 1");
$line = $db->expand($peg);
$id_quest = $line['id_quest'];

// INSERÇÃO DA PERGUNTA
$grava = $db->select("DELETE FROM perguntas WHERE id='$pergunta' LIMIT 1");
$grava = $db->select("DELETE FROM perguntas_questi WHERE id_pergunta='$pergunta' LIMIT 1");

$_SESSION['aviso-mensagem-ava'] = 'Informações alteradas com sucesso! ';
$_SESSION['aviso-tipo-ava'] = 'success';


header("Location: ../perguntas_questionario/$id_quest");