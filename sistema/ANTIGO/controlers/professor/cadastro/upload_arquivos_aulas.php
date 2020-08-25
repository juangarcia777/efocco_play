<?php
require("../../../config.php");
		$db = new DB(); 
		$upload = new UploadArquivoSis(); 
		
	    $arquivo = $upload->Upload('../../../../arquivos/aulas','file');


	    if(!empty($arquivo)){
	    	
	    	$hoje = date("Y-m-d");	
	    	$insert = $db->select("INSERT INTO arquivos_aula (id_aula, arquivo, data_upload, nome) VALUES ('$id_aula', '$arquivo', '$hoje', '$arquivo')");

		    
		    
			$_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Arquivo inserido com sucesso na aula!';
			
			header("Location: ../../../envia_arquivos_aula/".$id_turma.'/'.$id_disciplina.'/'.$id_aula);

			echo 1;

			exit();
	    } else {
	    	$_SESSION['aviso-tipo-ava'] = 'error';
			$_SESSION['aviso-mensagem-ava'] = 'Erro ao inserir arquivo!';
	    	header("Location: ../../../envia_arquivos_aula/".$id_turma.'/'.$id_disciplina.'/'.$id_aula);
				exit();
	    }
?>