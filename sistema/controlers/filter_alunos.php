<?php

require("../config.php");


$turma=  $_POST['turma'];


$db = new DB();    
$sel = $db->select("SELECT * FROM users WHERE turma LIKE '%$turma%'");

if($db->rows($sel)){

    while( $row = $db->expand($sel) ){
        echo '<tr>';
                
                echo '<td>'.$row['nome'].'</td>';
				echo '<td>'.$row['telefone_aluno'].'</td>';
				echo '<td>'.$row['celular_aluno'].'</td>';
				echo '<td>'.$row['cpf'].'</td>';
				echo '<td>'.$row['rg'].'</td>';
				echo '<td>

				<a onclick="delete_registro('.$row['id'].',2)" class="btn btn-danger btn-icon-anim btn-square" style="float:right; margin-left: 10px;"><i class="icon-trash"></i></a>

			    <a href="editar_alunos/'.$row['id'].'" class="btn btn-default btn-icon-anim btn-square" style="float:right; margin-left: 10px;"><i class="fa fa-pencil"></i></a>

				<a href="infos_alunos/'.$row['id'].'" class="btn btn-primary btn-icon-anim btn-square" style="float: right;"><i class="icon-eye"></i></a>

                </td>';
                
		echo '</tr>';

    }
}
