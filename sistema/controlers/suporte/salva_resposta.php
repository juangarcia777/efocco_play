<?php

require("../../config.php");

$db= new DB;

$insert= $db->select("INSERT INTO suporte_prontas SET pergunta='$new_pergunta',resposta='$resposta',ajudou='0',nao_ajudou='0'");

$_SESSION['aviso-mensagem-ava'] = 'Pergunta e reposta salvas com sucesso! ';
$_SESSION['aviso-tipo-ava'] = 'success';

header("Location: ../../suporte");
exit;