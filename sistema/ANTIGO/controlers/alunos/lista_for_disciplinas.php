<?php
$id_disciplina= $_GET['id'];


$db = new DB();    
$sel = $db->select("SELECT * FROM questionarios WHERE id_disciplina= '$id_disciplina'");

if($db->rows($sel)){

   while( $row = $db->expand($sel) ){
    
    echo '
    <tr>

    <td>'.$row['titulo'].'</td>
    <td>'.$row['data_entrega'].'</td>
    <td id="eye"><a href="../atividade/'.$row['id'].'">
    <i class="fa fa-eye"></i></a></td>

  </tr>
    ';
}


}