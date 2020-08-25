<?php
require("../../config.php");

$db = new DB();


//APAGA A AULA
$grava = $db->select("DELETE FROM aula WHERE id='$id' LIMIT 1");
$grava = $db->select("DELETE FROM aulas_alocadas WHERE id_aula='$id'");
$grava = $db->select("DELETE FROM controle_aulas_arquivos_questionarios WHERE id_aula='$id'");

$_SESSION['aviso-mensagem-ava'] = 'Registro excluido com sucesso! ';
$_SESSION['aviso-tipo-ava'] = 'success';


?>