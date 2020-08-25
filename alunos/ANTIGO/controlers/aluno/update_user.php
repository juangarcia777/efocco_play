<?php
ob_start();
require ("../../config.php");
$DadosAluno = $Pesquisa->DadosAluno(); 
 
    

        if($senha == '') {
            $senha= $DadosAluno['senha'];
        }

        $atualiza = $db->select("UPDATE users SET senha= '$senha', telefone_aluno='$tel_aluno', celular_aluno='$cel_aluno', logradouro='$logradouro', bairro='$bairro', municipio='$cidade', estado='$estado', cep='$cep', senha='$senha' WHERE id='$id_aluno' LIMIT 1");
        
    
	

header("Location: ../../profile");

?>