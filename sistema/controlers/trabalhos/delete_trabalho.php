<?php

require("../../config.php");

$db= new DB;

$hoje= date('Y-m-d');

$insert= $db->select("DELETE FROM trabalhos WHERE id='$id' LIMIT 1");

$_SESSION['aviso-mensagem-ava'] = 'Trabalho exluido com sucesso! ';
$_SESSION['aviso-tipo-ava'] = 'success';

header("Location: ../../trabalhos_alunos/".$aula."/".$turma."/".$disciplina."");
exit;