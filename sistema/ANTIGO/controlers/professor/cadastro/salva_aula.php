<?php

	  require("../../../config.php");
	  	$db = new DB();
	    $apresentacao = base64_encode($_POST['apresentacao']); // This will Encodes	    
	    $glossario = base64_encode($_POST['glossario']); // This will Encodes	    
	    $curriculo_professor = base64_encode($_POST['curriculo_professor']); // This will Encodes
		 $objetivo_aula = base64_encode($_POST['objetivo_aula']); // This will Encodes
		 $doc_complementares = base64_encode($_POST['doc_complementares']); // This will Encodes
		 $ref_bibliograficas = base64_encode($_POST['ref_bibliograficas']); // This will Encodes


	    if (isset($permite_upload)) {
	    	$permite_upload = 1;
	    }
	    else {
	    	$permite_upload=0;
	    }

	    if (isset($permite_upload_atrasado)) {
	    	$permite_upload_atrasado = 1;
	    }
	    else {
	    	$permite_upload_atrasado=0;
		}
		
		$hoje= date('Y-m-d H:i:s');
		$data_limite_upload = date('Y-m-d');

	  // INSERÇÃO DA AULA
	  $grava = $db->select("INSERT INTO aula (glossario, titulo,data, data_exibicao, apresentacao, video_aula, id_turma, id_disciplina, data_limite_upload, permite_upload, permite_upload_atrasado,data_criacao, tipo_video, link_aovivo, data_final_link_aovivo, curriculo_professor, objetivo_aula, doc_complementares, ref_bibliograficas) VALUES ('$glossario', '$titulo','$hoje', '$data_liberacao', '$apresentacao', '$video_aula', '$id_turma', '$id_disciplina', '$data_limite_upload', '$permite_upload', '$permite_upload_atrasado', '$hoje', '2','$link_aovivo', '$data_aovivo', '$curriculo_professor', '$objetivo_aula', '$doc_complementares', '$ref_bibliograficas')");



	 $_SESSION['aviso-tipo-ava'] = 'success';
			$_SESSION['aviso-mensagem-ava'] = 'Informações cadastradas com sucesso! ';

	 header("Location: ../../../prof_lista_disciplina/".$id_turma.'/'.$id_disciplina);

?>