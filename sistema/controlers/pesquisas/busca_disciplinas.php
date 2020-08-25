<?php
require ("../../config.php");
$db = new DB();
$sel = $db->select("SELECT disciplinas.nome, turma_disciplinas.id_disciplina 
	FROM disciplinas
	INNER JOIN turma_disciplinas ON disciplinas.id=turma_disciplinas.id_disciplina
	WHERE turma_disciplinas.id_turma='$id' 
	ORDER BY disciplinas.nome");

if($db->rows($sel)){
	
	echo '<option value="">escolha a disciplina/módulo</option>';

	while($row = $db->expand($sel)){

		echo '<option value="'.$row['id_disciplina'].'">'.$row['nome'].'</option>';

	}
} else {
	echo '<option value="">Nenhuma disciplina/módulo encontrado.</option>';
}

?>