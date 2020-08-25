<?php
ob_start();
require ("../../config.php");
$data_hora = date("Y-m-d H:i:s");
$DadosAluno = $Pesquisa->DadosAluno();


$select = $db->select("SELECT titulo FROM aula WHERE id='$id_aula' LIMIT 1");
$line = $db->expand($select);

$nome_aula = $line['titulo'];
$nome_aluno = $DadosAluno['nome'];


$nome_disciplina = $line['nome_disciplina'];
$id_disciplina = $id_materia_final;


$insere = $db->select("INSERT INTO duvidas_aulas (id_aula, id_aluno, nome_aula, nome_aluno, data_hora, id_disciplina, nome_disciplina, duvida) VALUES ('$id_aula', '$id_logado', '$nome_aula', '$nome_aluno', '$data_hora', '$id_disciplina', '$nome_disciplina', '$duvida')");


?>