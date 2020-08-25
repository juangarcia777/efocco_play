<?php
require ("../../config.php");
	
	if(!isset($rate)){$rate=0;}

	$update = $db->select("UPDATE avaliacao_aulas 
		SET notas = CONCAT(notas, ',$rate')   
		WHERE id_aula='$id_aula' 
		LIMIT 1");	
	
	
	if(!$db->exists()){

		$insere = $db->select("INSERT INTO avaliacao_aulas (id_aula, notas) VALUES ('$id_aula', '$rate')");		
		
	} 



?>