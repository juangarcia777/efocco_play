<?php

$turma= $_GET['turma'];
$aluno=  $_GET['aluno'];
$disciplina= $_GET['disciplina'];

$db = new DB();    
$s = $db->select("SELECT * FROM notas WHERE id_turma= '$turma' AND id_aluno='$id_aluno' AND id_disciplina='$disciplina'");

if($db->rows($s)){

    while( $row = $db->expand($s) ){

        echo '<td>'.$row['nome_metodo'].'</td>';

    }
}