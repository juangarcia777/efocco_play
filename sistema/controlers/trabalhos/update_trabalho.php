<?php

require("../../config.php");

$db= new DB;

$hoje= date('Y-m-d');

$insert= $db->select("UPDATE trabalhos SET titulo='$titulo', descricao='$descricao',
limite_data='$data_limite' WHERE id='$id_trabalho'");

$_SESSION['aviso-mensagem-ava'] = 'Trabalho atualizado com sucesso! ';
$_SESSION['aviso-tipo-ava'] = 'success';

header("Location: ../../cadastra_trabalhos/".$aula."/".$turma."/".$disciplina."");
exit;