<?php
require("../../config.php");

$turma=  $_POST['turma'];
$disciplina= $_POST['disciplina'];

$db = new DB();    
$busca = $db->select("SELECT * FROM aula WHERE id_turma= '$turma' AND id_disciplina='$disciplina'");

if($db->rows($busca)){

    while( $row = $db->expand($busca) ){

        echo '<option value="'.$row['id'].'">'.$row['titulo'].'</option>';

    }
}