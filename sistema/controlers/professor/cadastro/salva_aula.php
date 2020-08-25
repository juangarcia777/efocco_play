<?php

require("../../../config.php");

$db = new DB();
$apresentacao = base64_encode($_POST['apresentacao']); // This will Encodes	    
$glossario = base64_encode($_POST['glossario']); // This will Encodes	    	    
$objetivo_aula = base64_encode($_POST['objetivo_aula']); // This will Encodes
$doc_complementares = base64_encode($_POST['doc_complementares']); // This will Encodes
$ref_bibliograficas = base64_encode($_POST['ref_bibliograficas']); // This will Encodes

$hoje= date('Y-m-d H:i:s');		

$tipo_video = 2;
if(strpos($video_aula,'vimeo')) {
    $tipo_video = 2;
} else {
    $tipo_video = 1;
}

echo "inicio";

if($id_aula=='0'){
	

	  // INSERÇÃO DA AULA
	  $grava = $db->select("INSERT INTO aula (glossario, titulo, data, apresentacao, video_aula, data_criacao, tipo_video, link_aovivo, data_final_link_aovivo, objetivo_aula, doc_complementares, ref_bibliograficas) VALUES ('$glossario', '$titulo','$hoje', '$apresentacao', '$video_aula', '$hoje', '$tipo_video','$link_aovivo', '$data_aovivo', '$objetivo_aula', '$doc_complementares', '$ref_bibliograficas')");

	  $id_aula = $db->last_id($grava); // ATENÇÃO ESSA FUNÇÃO ESTAVA COM PROBLEMA


} else {

	  // UPDATE DA AULA
	  $grava = $db->select("UPDATE aula SET glossario='$glossario', titulo='$titulo', apresentacao='$apresentacao', video_aula='$video_aula', tipo_video='$tipo_video',  link_aovivo='$link_aovivo', data_final_link_aovivo='$data_aovivo', objetivo_aula='$objetivo_aula', doc_complementares='$doc_complementares', ref_bibliograficas='$ref_bibliograficas' WHERE id='$id_aula' LIMIT 1");

}

	$_SESSION['aviso-tipo-ava'] = 'success';
	$_SESSION['aviso-mensagem-ava'] = 'Aula cadastradas/alterada com sucesso! ';


	header("Location: ../../../aloca_aula_turmas/".$id_aula);

?>