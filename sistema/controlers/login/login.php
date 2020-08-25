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

//$db = new DB();
//$unidades = '';
//$sel = $db->select("SELECT * FROM unidades ORDER BY unidade");
//if($db->rows($sel)){
//	while($row = $db->expand($sel)){
	//	$unidades .= $row['id'].'-'.$row['unidade'].','; 
//	}
//	$_SESSION['UnidadesAVA'] = $unidades;
//}

$session->Login($login,$tabela,$autenticador);

?>

