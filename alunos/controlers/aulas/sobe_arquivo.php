<?php
require ("../../config.php");

$DadosAluno = $Pesquisa->DadosAluno();

$db= new DB;
$Images = new UploadArquivoSis();
$arquivo = $Images->Upload('../../../arquivos/upload_alunos','arquivo');

$data_hora= date('Y-m-d');

$sql= $db->select("INSERT INTO entrega_trabalhos SET id_aula='$id_aula',arquivo='$arquivo',
id_aluno='$aluno',data='$data_hora'");

