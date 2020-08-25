<?php
require("../../config.php");
$db = new DB(); 

$data=  new DateTime();
$agora= $data->format('Y-m-d H:i:s');


$sel = $db->select("SELECT nome FROM professores WHERE id='$id_logado' LIMIT 1");
$line = $db->expand($sel);
$nome_professor_resposta = $line['nome'];	


$grava = $db->select("UPDATE duvidas_aulas SET resposta= '$resposta',data_resposta= '$agora',nome_professor_resposta = '$nome_professor_resposta' WHERE id= '$id' LIMIT 1");

//SESSIONS DE AVISO//
$_SESSION['aviso-tipo-ava'] = 'success';
$_SESSION['aviso-mensagem-ava'] = 'Aluno respondido com sucesso! ';

header("Location: ../../duvidas");


