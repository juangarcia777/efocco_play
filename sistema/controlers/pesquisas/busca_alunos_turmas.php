<?php
require ("../../config.php");
$db = new DB();
$sel = $db->select("SELECT users.nome, users.id AS id_aluno, turma_alunos.id
FROM users  
INNER JOIN turma_alunos ON users.id=turma_alunos.id_aluno
WHERE turma_alunos.id_turma='$id'
GROUP BY users.cpf
ORDER BY users.nome
");

if($db->rows($sel)){
	
	echo '<option value="">escolha o aluno</option>';
	//echo '<optgroup label="'.$row['nome_turma'].'">';

	while($row = $db->expand($sel)){

		echo '<option value="'.$row['id_aluno'].'">'.$row['nome'].'</option>';

	}

	//echo '</optgroup>';

} else {
	echo '<option value="">Nenhum aluno encontrado.</option>';
}

?>