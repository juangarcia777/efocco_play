<?php

require("../../config.php");

$nota= $_POST['nota'];
$id_turma= $_POST['turma'];
$disciplina= $_POST['disciplina'];
$aluno= $_POST['id_aluno'];
$metodo= $_POST['metodo'];
$descricao= $_POST['descricao'];
$data_insercao= date('Y-m-d');

$db = new DB();    
$s = $db->select("INSERT INTO notas SET nota='$nota', id_turma='$id_turma', id_aluno='$aluno',
 nome_metodo='$metodo', descricao='$descricao', data_insercao='$data_insercao', id_disciplina='$disciplina'");

 header("Location:".SISTEMA_DIR."notas/".$id_turma."/".$aluno."/".$disciplina."");
