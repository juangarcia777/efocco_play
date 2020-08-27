<?php

// AREA DE CALCULO DO VALOR DOS TRABALHOS
if($soma_trabalhos == 0) {
    $valor_final_trabalhos=0;
} else {
    $valor_final_trabalhos= $soma_trabalhos / $trabalho_qt;
}

// ---------------------------------------------------

// AREA DE VERIFICAÇÃO SE ALUNO ASSISTIU TODAS AS AULAS
if($qt_aulas == $aluno_assistiu && $qt_aulas != 0){
    $bonus= $_SESSION['infos_gerais']['ponto_media'];
} else {
    $bonus= 0;
}

// --------------------------------------------------------

// SE NÃO TIVER AULAS, NEM PROVAS NEM TRABALHOS
if($divisao == 0) {
    $divisao=1;
}

// AREA DE CALCULO DO VALOR DA MÉDIA
$i= $qt_aulas - $presenca;
if($soma_notas==0){
    
    $e= 0;
    $n= ($e + $prova_final + $valor_final_trabalhos) / $divisao;
    $f= number_format($n ,1);
    $n = number_format(($n + $bonus),1);
    
} else {
    $e= $soma_notas / $materia_valida;
    $n= ($e + $prova_final + $valor_final_trabalhos) / $divisao;
    $f= number_format($n ,1);
    $n = number_format(($n + $bonus),1);
}

if(($n + $bonus) > 10 ){
    $n + $bonus = 10;
}


// echo "Soma das notas: ".$soma_notas."<br>";
// echo "Qtd params: ".$materia_valida."<br>";
// echo "nota prova final:".$prova_final."<br>";
// echo "Qtd. de trabalhos:".$trabalho_qt."<br>";
// echo "Soma das notas do trabalho:".$soma_trabalhos."<br>";
// echo "Valor final dos trabalhos:".$valor_final_trabalhos."<br>";
// echo "Divisão:".$divisao."<br>";
// echo "Disciplina:".$name_disciplina."<br>";
// echo "Bônus:".$bonus."<br>";

// ----------------------------------------------------