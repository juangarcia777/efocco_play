<?php
require ("../../config.php");
$session = new SESSION();

$login = array(
    "usuario" => $cpf,
    "senha" => $password


);

$tabela = 'users';
$autenticador = 'id';


$session->Login($login,$tabela,$autenticador);

?>