<?php
require("../../../config.php");
$db = new DB();
	    

$grava = $db->select("UPDATE resp_quest_aluno SET resp_correta_dissertativa='$correcao' WHERE id='$id_correcao' LIMIT 1");



$_SESSION['aviso-tipo-ava'] = 'success';
$_SESSION['aviso-mensagem-ava'] = 'Correção realizada com sucesso! ';

header("Location: ../../../infos_questionario-respostas/$id_questionario/$id_aluno/$id_aula");

?>