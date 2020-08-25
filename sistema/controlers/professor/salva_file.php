<?php

require("../../config.php");

$db= new DB();	

$id_turma= $_POST['id_turma'];
$id_disciplina= $_POST['id_disciplina'];
$id_aula= $_POST['id_aula'];
$nome= $_POST['nome'];
$descricao= $_POST['descricao'];
$id_logado= $_POST['id_logado'];
$data_upload= date('Y-m-d');
$hora_upload= date('H:i:s');

$filename_original = $_FILES['file']['name'];
$rand = rand(00000,99999).time();
$filename = $filename_original;
                                 
$str_nome_arquivo = $rand.$filename;
                                 
                                                  
// Upload file
 move_uploaded_file($_FILES['file']['tmp_name'],'../../arquivos/alunos/'.$str_nome_arquivo);

 $grava = $db->select("INSERT INTO arquivos_alunos SET id_aula= '$id_aula', arquivo= '$str_nome_arquivo',nome= '$nome'
 , descricao= '$descricao', id_aluno='$id_logado', data_upload= '$data_upload', hora_upload='$hora_upload', disciplina='$id_disciplina',turma='$id_turma'");

 header("Location:".SISTEMA_DIR."mostra_aula/".$id_turma."/".$id_disciplina."/".$id_aula."");
													
