<?php
ob_start();
require ("../../config.php");
$DadosAluno = $Pesquisa->DadosAluno(); 
 
$atualiza = $db->select("INSERT INTO ajuda SET nome='$nome', email='$email', telefone='$telefone', motivo='$motivo',cidade='$cidade',uf='$uf', descricao='$descricao'");

  

?>