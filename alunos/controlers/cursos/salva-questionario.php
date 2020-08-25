<?php
ob_start();
require ("../../config.php");
//$session = new SESSION();
//$session->UserLogado();

$DadosDisciplina = $Pesquisa->InformacoesDisciplina($id_materia);

unset($_SESSION['QuestionarioSelecionadoAVA']);
$hoje = date("Y-m-d H:i:s");

if(isset($_POST['resposta'])){

	$pergunta_id = $_POST['pergunta_id'];
	$resposta = $_POST['resposta']; 


if($id_logado!=0 && $id_logado!=''){

	for($i=0; $i<sizeof($pergunta_id); $i++) {
	//for($i=0; $i<sizeof($resposta); $i++) {

		
		if(!array_key_exists($pergunta_id[$i], $resposta)){
			$resposta[$pergunta_id[$i]] = '&@&'.$pergunta_id[$i];
		}

		$sty = explode('&@&', $resposta[$pergunta_id[$i]]);


		//echo 'ID PERGUNTA: '.$pergunta = $sty[1];
		//echo ' - ';
		//echo 'RESPOSTA: '.$resp = $sty[0];
		//echo '<br>';echo '<br>';

		if(count($sty)>1) {
			$pergunta = $sty[1];
			$resp = $sty[0];
		} else {
			$pergunta = $pergunta_id[$i];
			$resp = $resposta[$pergunta_id[$i]];
		}

		$insere = $db->select("INSERT INTO resp_quest_aluno (id_aluno, id_quest, id_pergunta, resp_aluno, data_hora) VALUES ('$id_logado', '$id_questionario', '$pergunta', '$resp', '$hoje')");

		
	}

}

}


///MARCA COMO FEITO O CHECK VERDE
$update = $db->select("UPDATE controle_aulas_arquivos_questionarios 
		SET id_questionario = CONCAT(id_questionario, ',$id_questionario-$id_logado') 
		WHERE NOT FIND_IN_SET('$id_questionario-$id_logado', id_questionario)  AND id_aula='$id_aula' 
		LIMIT 1");	

if(!$db->exists()){

	$sel = $db->select("SELECT id FROM controle_aulas_arquivos_questionarios WHERE id_aula='$id_aula' LIMIT 1");

	if(!$db->rows($sel)){
		$insere = $db->select("INSERT INTO controle_aulas_arquivos_questionarios (id_aula, id_questionario) VALUES ('$id_aula', '$id_questionario-$id_logado')");		
	}
}

$materia_nome = normaliza($DadosDisciplina['nome']);

//echo $id_materia;

//$_SESSION['QuestionarioSelecionadoAVA'] = $id_questionario;
header("Location: materia/$id_materia/$materia_nome#aula=$id_aula&questionario=$id_questionario");	

?>