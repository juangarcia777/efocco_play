<?php
require ("../../config.php");

$db= new DB;

$data= date('Y-m-d H:i:s');

$sql= $db->select("INSERT INTO bloco_notas SET id_aluno='$aluno',id_disciplina='$disciplina',
id_turma='$turma',id_aula='$aula',anotacoes='$notas',data='$data' ");



