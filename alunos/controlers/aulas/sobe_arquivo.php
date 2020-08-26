<?php
require ("../../config.php");

$DadosAluno = $Pesquisa->DadosAluno();

$db= new DB;

$Images = new UploadArquivoSis();
$arquivo = $Images->Upload('../../../arquivos/upload_alunos','arquivo');

$data_hora= date('Y-m-d');

$id_aluno= $_SESSION['UserLogadoAVA'];

$sql= $db->select("INSERT INTO entrega_trabalhos SET id_trabalho='$id_trabalho',arquivo='$arquivo',
id_aluno='$id_aluno',data='$data_hora'");