<?php
require ("../../config.php");

$db= new DB;

$sql= $db->select("SELECT * FROM bloco_notas WHERE id_aluno='$aluno' 
AND id_disciplina='$disciplina' AND id_turma='$turma' AND id_aula='$aula' ORDER BY id DESC ");

if($db->rows($sql)) {
while($n= $db->expand($sql)) { ?>

    <div class="anotacoes">
        <strong><?php echo data_mysql_para_user($n['data']); ?></strong>
        <p class=""><?php echo $n['anotacoes']; ?></p>
    </div>
    <hr>

<?php
}
} else { ?>

    <div class="anotacoes text-center">
        <h6>Não ha notas atualmente para esta aula !</h6>
    </div>

<?php
}
