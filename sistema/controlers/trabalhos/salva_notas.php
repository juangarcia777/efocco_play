<?php

require("../../config.php");

$db= new DB;

$insert= $db->select("UPDATE entrega_trabalhos SET nota='$nota' WHERE id='$id_entrega'");

$_SESSION['aviso-mensagem-ava'] = 'Nota do Aluno atualizada com sucesso! ';
$_SESSION['aviso-tipo-ava'] = 'success';

header("Location: ../../trabalhos_alunos/".$aula."/".$turma."/".$disciplina."");
exit;