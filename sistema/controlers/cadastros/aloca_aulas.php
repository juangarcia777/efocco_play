<?php
require("../../config.php");
$db = new DB(); 

$upd = $db->select("UPDATE aulas_alocadas SET aguarda_ordem=0 WHERE id_aula='$id_aula'");	

   
if(isset($_POST['turma_disciplinas']))  {
	$turma_disciplinas = $_POST['turma_disciplinas'];

	foreach($turma_disciplinas as $_valor){

		$ex = explode('&@&', $_valor);	

    	$id_disciplina = $ex[0];
    	$id_turma = $ex[1];

    	$update = $db->select("UPDATE aulas_alocadas SET aguarda_ordem=ordem WHERE id_aula='$id_aula' AND id_disciplina='$id_disciplina' AND id_turma='$id_turma' ");

    	if(!$db->exists()){
    		
    		$insert = $db->select("INSERT INTO aulas_alocadas (id_aula, id_disciplina, id_turma, ordem) VALUES ('$id_aula', '$id_disciplina', '$id_turma', (SELECT COALESCE(SUM(ordem),1) AS total FROM aulas_alocadas F1 WHERE id_disciplina='$id_disciplina' AND id_turma='$id_turma'))");

    		$update = $db->select("UPDATE aulas_alocadas SET aguarda_ordem=ordem WHERE id_aula='$id_aula' AND id_disciplina='$id_disciplina' AND id_turma='$id_turma' ");

    	}	

	}
    
}

$delete = $db->select("DELETE FROM aulas_alocadas WHERE id_aula='$id_aula' AND aguarda_ordem=0");	
$upd = $db->select("UPDATE aulas_alocadas SET aguarda_ordem=0 WHERE id_aula='$id_aula'");	

header("Location: ../../ordena_aula/$id_aula");

?>