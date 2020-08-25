<?php

$id_disci=  $x['id'];


$db = new DB();    
$sel = $db->select("SELECT * FROM questionarios WHERE id_turma= '$id_disci' ORDER BY id DESC");

if($db->rows($sel)){

    while( $row = $db->expand($sel) ){
        $w=$row['id_disciplina'];

$search = $db->select("SELECT * FROM disciplinas WHERE id= '$w'");

if($db->rows($search)){
    $d= $db->expand($search);
}
      
        echo '
        <tr>
        <td>'.$row['titulo'].'</td>
        <td>'.$d['nome'].'</td>
        <td>20/04/2020</td>
      </tr>
        ';

    }
}