<?php
require ("../../config.php");



if($tipo=='arquivo'){



	///MARCA COMO FEITO O CHECK VERDE
$update = $db->select("UPDATE controle_aulas_arquivos_questionarios 
		SET id_arquivo = CONCAT(id_arquivo, ',$arquivo-$id_logado')
		WHERE NOT FIND_IN_SET('$arquivo-$id_logado', id_arquivo)  AND id_aula='$aula' 
		LIMIT 1");	

		if(!$db->exists()){

			$sel = $db->select("SELECT id FROM controle_aulas_arquivos_questionarios WHERE id_aula='$id_aula' LIMIT 1");

			if(!$db->rows($sel)){
				$insere = $db->select("INSERT INTO controle_aulas_arquivos_questionarios (id_aula, id_arquivo) VALUES ('$aula', '$arquivo-$id_logado')");		
			}
		}
	
	

}

if($tipo=='aula'){

	$update = $db->select("UPDATE controle_aulas_arquivos_questionarios 
		SET aula_final = CONCAT(aula_final, ',$id_logado')   
		WHERE NOT FIND_IN_SET('$id_logado', aula_final)  AND id_aula='$aula' 
		LIMIT 1");	

	if(!$db->exists()){

		$sel = $db->select("SELECT id FROM controle_aulas_arquivos_questionarios WHERE id_aula='$aula' LIMIT 1");
		
		if(!$db->rows($sel)){
			$insere = $db->select("INSERT INTO controle_aulas_arquivos_questionarios (aula_final, id_aula) VALUES ('$id_logado', '$aula')");		
		}
	    
	} 

}


?>