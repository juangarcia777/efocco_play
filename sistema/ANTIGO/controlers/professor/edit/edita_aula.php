<?php

	

		 require("../../../config.php");
		$db = new DB();

		 $apresentacao = base64_encode($_POST['apresentacao']); // This will Encodes
		 $glossario = base64_encode($_POST['glossario']); // This will Encodes
		 $curriculo_professor = base64_encode($_POST['curriculo_professor']); // This will Encodes
		 $objetivo_aula = base64_encode($_POST['objetivo_aula']); // This will Encodes
		 $doc_complementares = base64_encode($_POST['doc_complementares']); // This will Encodes
		 $ref_bibliograficas = base64_encode($_POST['ref_bibliograficas']); // This will Encodes
		 

	    // decode utilizado para ler esse conteúdo
	    $ContentDecoded = base64_decode($apresentacao);  // decode the base64

	    if (isset($permite_upload)) {
	    	$permite_upload = 1;
	    } else {
	    	$permite_upload=0;
	    }

	    if (isset($permite_upload_atrasado)) {
	    	$permite_upload_atrasado = 1;
	    }
	    else {
	    	$permite_upload_atrasado=0;
	    }

		$grava = $db->select("UPDATE aula SET curriculo_professor='$curriculo_professor', objetivo_aula='$objetivo_aula', doc_complementares='$doc_complementares', ref_bibliograficas='$ref_bibliograficas', glossario='$glossario', titulo='$titulo', data_exibicao='$data_liberacao', video_aula='$video_aula', apresentacao='$apresentacao', id_turma='$id_turma', id_disciplina='$id_disciplina', data_limite_upload='$data_limite_upload', permite_upload='$permite_upload', permite_upload_atrasado='$permite_upload_atrasado', tipo_video= '2', link_aovivo= '$link_aovivo', data_final_link_aovivo= '$data_aovivo' WHERE id='$id_aula' LIMIT 1");

	

		 $_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Alterações efetuadas com sucesso! ';
			
			header("Location: ../../../prof_lista_disciplina/".$id_turma."/".$id_disciplina."");

?>