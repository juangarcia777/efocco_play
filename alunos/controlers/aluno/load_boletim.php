<?php
require ("../../config.php");
$db= new DB;

$aluno= $_SESSION['UserLogadoAVA'];
$hoje= date('Y-m-d');

 // BUSCA NOME DA DISCIPLINA
 $bu= $db->select("SELECT nome FROM disciplinas WHERE id='$disciplina'");
 $nome_disciplina= $db->expand($bu);
 $name_disciplina= $nome_disciplina['nome'];

$busca1= $db->select("SELECT * FROM aulas_alocadas WHERE id_turma='$curso' AND id_disciplina='$disciplina'");

$qt_aulas= $db->rows($busca1);

// PACK DE VARIÁVEIS DE LÓGICA
$presenca= 0;
$soma_notas= 0;
$materia_valida= 0;
$is_finalTest=0;
$prova_final=0;
$trabalho_qt=0;
$soma_trabalhos=0;
$divisao=0;
$aluno_assistiu=0;
// ----------------//

if($db->rows($busca1)) {
 $divisao++;
while($key= $db->expand($busca1)) {

    $aviso= '';
    $nota= 0;
    $aula= $key['id_aula'];
    $assistida= false;

    // PESQUISA SE ALUNO JA ASSISTIU A AULA
    $watch= $db->select("SELECT * FROM controle_aulas_arquivos_questionarios
    WHERE id_aula='$aula' AND FIND_IN_SET($aluno, aula_final)");
    
    if($db->rows($watch)){
        $assistida= true;
        while($is_watched= $db->expand($watch)){
            $aluno_assistiu++;
        }
    }
    

    $busca_nomes= $db->select("SELECT titulo FROM aula WHERE id='$aula'");
    $nome_aula= $db->expand($busca_nomes);
    $titulo_aula= $nome_aula['titulo'];

    $busca2= $db->select("SELECT * FROM questionarios WHERE id_aula='$aula'");

    //  echo $aula;

if($db->rows($busca2)){

    while($x= $db->expand($busca2)){

        $respondeu = $Pesquisa->AlunoRespondeuQuestionario($x['id']);
       
        //ALUNO RESPONDEU
        if(!empty($respondeu)){

            $n= $Pesquisa->NotaQuestionario(0,$x['id']);

            if(is_numeric($n['nota_aluno'])) {

                 // CONFERE SE É UMA PROVA FINAL 
                 if($x['final_test'] == 1) {
                    $is_finalTest++;
                    $materia_valida--;
                    $divisao++;
                }
                
                // SE FOR PROVA FINAL, PEGA NOTA DA PROVA FINAL
                if($x['final_test'] == 1) {
                    $prova_final= $n['nota_aluno'];
                }

            
                $nota += $n['nota_aluno'];

                if($x['final_test'] == 1){
                    $soma_notas = $soma_notas + 0;
                } else {
                    $soma_notas = $soma_notas + $n['nota_aluno'];
                }

                $materia_valida++;
                $aviso= '<span class="badge badge-success badge-custom">Prova realizada.</span>';

            } else {
                $nota= '---';
                $aviso= '<span class="badge badge-info badge-custom">Aguardando Correção.</span>';
            }

        //NAO RESPONDEU    
        } else {

            $key['data_liberacao'].' - ';
            
            $data_final= date('Y-m-d', strtotime('+7 days', strtotime($key['data_liberacao'])));


            //PROVA VENCIDA - NAO PODE MAIS RESPONDER
            if($hoje>$data_final){

                $nota = 0;
                $soma_notas = $soma_notas+0;
                $materia_valida++;
                $aviso= '<span class="badge badge-danger badge-custom">Prova não realizada.</span>';

                 // CONFERE SE É UMA PROVA FINAL 
                 if($x['final_test'] == 1) {
                    $is_finalTest++;
                    $materia_valida--;
                    $divisao++;
                }
                
                // SE FOR PROVA FINAL, PEGA NOTA DA PROVA FINAL
                if($x['final_test'] == 1) {
                    $prova_final= 0;
                }

                
            //PROVA AINDA DENTRO DA VALIDADE
            } else {

                $data1 = new DateTime( $data_final );
                $data2 = new DateTime( $hoje );

                $intervalo = $data1->diff( $data2 );

                $nota = '---';
                $aviso= '<span class="badge badge-warning badge-custom">Restam '.$intervalo->d.' dias para realizar a prova.</span>';
              
            }
        }
        
    }

}else {
        
    $nota = '---';
    $aviso= '<span class="badge badge-default badge-custom">Aula sem questionário.</span>';
}

        // Bloco de pesquisa de faltas
        $busca3= $db->select("SELECT id FROM controle_aulas_arquivos_questionarios 
        WHERE id_aula= '$aula' AND FIND_IN_SET($aluno, aula_final)");


        if($r= $db->rows($busca3)){
            $presenca= $presenca + 1;
        } else {
            $presenca= $presenca + 0;
        }

        ?>

        
        <div class="col-sm-12 col-md-3 text-center mb-3 mt-3">
            <div class="card">
                <div aria-label="<?php echo $titulo_aula; ?>" data-balloon-pos="up">
                <h6 class="text-boletim-title"><?php echo $titulo_aula; ?></h6>
                </div>
                <hr>
                <?php if($assistida==true): ?>
                <div class="row">
                    <div class="col-sm-6 text-center align-items-center">
                        <h6>Nota</h6>
                        <h2 style="height:45px;line-height:45px"><?php echo (is_string($nota))?'<p style="font-size:16px">'.$nota.'</p>': $nota; ?></h2>
                    </div>
                    <div class="col-sm-6 d-flex align-items-center justify-content-center">
                        <i class="icofont-check-circled" style="font-size: 50px;color: green"></i>
                    </div>

                </div>
                <?php else: ?>
                <div class="row">
                    <div class="col-sm-6 text-center align-items-center">
                        <h6>Nota</h6>
                        <h2 style="height:45px;line-height:45px">
                        <?php echo (is_string($nota))?'<p style="font-size:16px">'.$nota.'</p>': $nota; ?>
                        </h2>
                    </div>
                    <div class="col-sm-6 d-flex align-items-center justify-content-center">
                        <a href="<?php echo SITE_AVA."materia/".$disciplina."/".normaliza($name_disciplina)."#aula=".$aula; ?>">
                        <i class="icofont-play-alt-2 text-default" style="font-size: 50px"></i>
                        </a>
                    </div>
                </div>
                <?php endif; ?>

                <?php echo $aviso; ?>
                
            </div>
        </div>

<?php
    }
}

$state_job='';

$search_jobs = $db->select("SELECT * FROM trabalhos
                            WHERE id_turma= '$curso'
                            AND id_disciplina='$disciplina'");

    // VERIFICA OS TRABALHOS PRA AQUELA TURMA
    if($db->rows($search_jobs)){
        $divisao++;
        while($jobs_found= $db->expand($search_jobs)){

            $nota_loop= '---';

            $trabalho_qt++;

            $id_trabalho= $jobs_found['id'];
            $verified= $db->select("SELECT * FROM entrega_trabalhos WHERE id_trabalho='$id_trabalho'");
            
            // ALUNO FEZ O TRABALHO
            if($db->rows($verified)) {
                $state_job='<span class="badge badge-warning badge-custom">Em correção.</span>';
                $verified1= $db->expand($verified);

                // ALUNO FEZ O TRABALHO E JA FOI CORRIGIDO
                if($verified1['nota'] != ''){
                    $state_job='<span class="badge badge-success badge-custom">Trabalho entregue.</span>';
                    $soma_trabalhos= $soma_trabalhos + $verified1['nota'];
                    $nota_loop= $verified1['nota'];
                }

            // ALUNO NÃO FEZ O TRABALHO 
            } else {
                
                // ALUNO PERDEU O PRAZO
                if($jobs_found['limite_data'] < $hoje){
                    $state_job='<span class="badge badge-danger badge-custom">Trabalho expirado.</span>';
                    $soma_trabalhos= $soma_trabalhos + 0;
                    $nota_loop= 0;
                }else {
                    $state_job='<span class="badge badge-danger badge-custom">Não entregue.</span>';
                }

            }
            
    ?>

    <div class="col-sm-12 col-md-3 text-center mb-3 mt-3">
                <div class="card border border-default border-trabalho" aria-label="<?php echo $jobs_found['titulo']; ?>" data-balloon-pos="bottom">
                    <h6 class="text-boletim-title">TRABALHO / <?php echo $jobs_found['titulo']; ?></h6>
                    <hr>
                
                    <h6>Nota</h6>
                        <h2 style="height:45px;line-height:45px">
                        <?php
                            if(!is_numeric($nota_loop)){
                                echo '---';
                            } else {
                                echo $nota_loop;
                            }
                            ?>
                        </h2>
                        <?php echo $state_job; ?>
                </div>
            </div>
        
            

    <?php
        }
    }

// ----------------------------------------------------

require 'calculos_boletim.php';

// ------------------------------------------------

echo "<script>
    $('#faltas').html(".$i.");
</script>";

echo "<script>
    $('#media').html(".$n.");
</script>";

echo "<script>
    $('#presenca').html(".$presenca.");
</script>";

?>