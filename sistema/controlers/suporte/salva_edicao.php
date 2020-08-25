<?php

require("../../config.php");

$db= new DB;

$insert= $db->select("UPDATE suporte_prontas SET pergunta='$new_pergunta',resposta='$resposta' WHERE id='$id'");

$_SESSION['aviso-mensagem-ava'] = 'Pergunta e reposta atualizada com sucesso! ';
$_SESSION['aviso-tipo-ava'] = 'success';

header("Location: ../../suporte");
exit;