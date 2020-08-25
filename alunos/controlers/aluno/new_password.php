<?php
require('../../config.php');

$db = new DB();

if(!empty($senha)){
	$busca= $db->select("SELECT * FROM users WHERE hash_senha= '$hash'");
	
	if($db->rows($busca)){
	$n= $db->expand($busca);

	$id_aluno= $n['id'];
    $get= $db->select("UPDATE users SET senha='$senha' WHERE id='$id_aluno' ");
    $set= $db->select("UPDATE users SET hash_senha='' WHERE id='$id_aluno' ");
    
    echo '1';

}
}

?>


