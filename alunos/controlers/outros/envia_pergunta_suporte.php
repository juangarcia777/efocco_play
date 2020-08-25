<?php

ob_start();
require ("../../config.php");
$data_hora = date("Y-m-d H:i:s");
$DadosAluno = $Pesquisa->DadosAluno();


$id_aluno = $DadosAluno['id'];
$nome_aluno = $DadosAluno['nome'];


$insere = $db->select("INSERT INTO suporte_plataforma (id_aluno, nome_aluno, pergunta, data_pergunta) VALUES ('$id_aluno', '$nome_aluno', '$pergunta', '$data_hora')");


?>