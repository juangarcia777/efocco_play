<?php 
	require("../../config.php");

$user= $_POST['user'];
$resp= $_POST['resp'];
$id_quest= $_POST['id_quest'];


$db = new DB();


$select = $db->select("SELECT * FROM resp_quest_aluno WHERE id_aluno='$user' AND id_quest='$id_quest'");

if($db->rows($select)){
    
    $update = $db->select("UPDATE resp_quest_aluno SET id_aluno='$user', id_quest='$id_quest', resp_aluno='$resp' WHERE id_aluno='$user' AND id_quest='$id_quest'");

} else {
    $insert = $db->select("INSERT INTO resp_quest_aluno (id_aluno, id_quest,resp_aluno ) VALUES ('$user', '$id_quest', '$resp')");

}


if($insert == false) {
}

echo $user."....".$resp.".....".$id_quest;