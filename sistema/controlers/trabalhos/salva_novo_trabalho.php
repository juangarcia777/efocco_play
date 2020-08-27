<?php

require("../../config.php");

$db= new DB;

$hoje= date('Y-m-d');

$insert= $db->select("INSERT INTO trabalhos SET data='$hoje',titulo='$titulo', descricao='$descricao', limite_data='$data_limite',id_aula='$aula',id_turma='$turma',id_disciplina='$disciplina'");

$_SESSION['aviso-mensagem-ava'] = 'Novo trabalho criado com sucesso! ';
$_SESSION['aviso-tipo-ava'] = 'success';

header("Location: ../../trabalhos_alunos/".$aula."/".$turma."/".$disciplina."");
exit;