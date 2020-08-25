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

		echo 'ID PERGUNTA: '.$pergunta = $sty[1];
		echo ' - ';
		echo 'RESPOSTA: '.$resp = $sty[0];
		echo '<br>';echo '<br>';

		$insere = $db->select("INSERT INTO resp_quest_aluno (id_aluno, id_quest, id_pergunta, resp_aluno, data_hora) VALUES ('$id_logado', '$id_questionario', '$pergunta', '$resp', '$hoje')");

		//echo 'PERGUNTA ID: '.$pergunta = $pergunta_id[$i];
		//echo ' - ';
		//echo 'RESPOSTA: '.$resposta[$pergunta_id[$i]];
		//echo '<br>';
		
	}

}

}


$materia_nome = normaliza($DadosDisciplina['nome']);

//$_SESSION['QuestionarioSelecionadoAVA'] = $id_questionario;
header("Location: materia/$id_materia/$materia_nome#aula=$id_aula&questionario=$id_questionario");	

?>