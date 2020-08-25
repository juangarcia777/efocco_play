<?php
require("../../../config.php");

$db = new DB();
$upload = new UploadArquivoSis(); 

$arquivo = $upload->Upload('../../../../arquivos/aulas','imagem',array('jpg','png', 'jpeg', 'gif'));

//MULTIPLA
if($tipo_pergunta==2){$respa=''; $respb=''; $respc=''; $respd=''; $respe=''; $respCo='';}



if($id_pergunta!=''){


	//MULT ESCOLHA
	if($tipo_pergunta==1){

		$grava = $db->select("UPDATE perguntas SET pergunta='$pergunta', resp_a='$respa', resp_b='$respb', resp_c='$respc', resp_d='$respd', resp_e='$respe', resp_correta='$respCo', peso='$peso', tipo_pergunta='$tipo_pergunta'  WHERE id='$id_pergunta' LIMIT 1");

	//DISSERTATIVA
	} else {

		$grava = $db->select("UPDATE perguntas SET pergunta='$pergunta', peso='$peso', tipo_pergunta='$tipo_pergunta' WHERE id='$id_pergunta' LIMIT 1");

	}

	$id_insert = $id_pergunta;
	$_SESSION['aviso-mensagem-ava'] = 'Informações alteradas com sucesso! ';


} else {

	// INSERÇÃO DA PERGUNTA

	//MULT ESCOLHA
	if($tipo_pergunta==1){

		$grava = $db->select("INSERT INTO perguntas (pergunta, resp_a, resp_b, resp_c, resp_d, resp_e, resp_correta, turma, disciplina,peso,tipo_pergunta) VALUES
	 ('$pergunta','$respa','$respb', '$respc', '$respd', '$respe','$respCo', '$turma', '$disciplina', '$peso','$tipo_pergunta')");

	//DISSERTATIVA
	} else {

		$grava = $db->select("INSERT INTO perguntas (pergunta, turma, disciplina, peso, tipo_pergunta) VALUES
	 ('$pergunta', '$turma', '$disciplina', '$peso', '$tipo_pergunta')");

	}

	



	$id_pergunta =  $db->last_id($grava);


	 
	// INSERÇÃO DA RELAÇÃO NAS TABELAS
	$insere= $db->select("INSERT INTO perguntas_questi (id_quest, id_pergunta) VALUES  ('$questionario', '$id_pergunta')");


	
	$_SESSION['aviso-mensagem-ava'] = 'Informações cadastradas com sucesso! ';



}

//SE TIVER IMAGEM
if(!empty($arquivo)){

	$grava = $db->select("UPDATE perguntas SET imagem='$arquivo' WHERE id='$id_pergunta' LIMIT 1");

}

$_SESSION['aviso-tipo-ava'] = 'success';

header("Location: ../../../perguntas_questionario/$questionario/$id_aula");
