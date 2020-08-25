<?php
require ("../../config.php");
$session = new SESSION();

$login = array(
    "usuario" => $usuario,
    "senha" => $password,
    "ativo" => '1' 

    //1 - ADMINISTRADOR
    //2 - PROFESSOR
    //3 - ALUNO
);

$tabela = 'professores';
$autenticador = 'id';


$session->Login($login,$tabela,$autenticador);

?>

