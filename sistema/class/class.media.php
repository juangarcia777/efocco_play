<?php

        require_once '../../../alunos/class/class.pesquisas.php';

        function CalculaMedia($id_disciplina, $curso, $turma, $aluno) {


        $Pesquisa = new PESQUISAS();

        $db= new DB;

        $hoje= date('Y-m-d');



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
            
            $search_aulasAlocadas= $db->select("SELECT * FROM aulas_alocadas WHERE id_turma='$turma' AND id_disciplina='$id_disciplina'");
            $qt_aulas= $db->rows($search_aulasAlocadas);
            
            if($db->rows($search_aulasAlocadas)) {
            $divisao++;

                while($aulasAlocadas= $db->expand($search_aulasAlocadas)) {

                $aula= $aulasAlocadas['id_aula'];

                // PESQUISA SE ALUNO JA ASSISTIU A AULA
                $search_views= $db->select("SELECT * FROM controle_aulas_arquivos_questionarios
                WHERE id_aula='$aula' AND FIND_IN_SET($aluno, aula_final)");

                    if($db->rows($search_views)){
                        while($views= $db->expand($search_views)){
                            $aluno_assistiu++;
                        }
                    } // FIM CONFERIMENTO SE ALUNO ASSISTIU


                    // --------------------------------------------------------------//

                    $search_questionarios= $db->select("SELECT * FROM questionarios WHERE id_aula='$aula'");
                            
                            if($db->rows($search_questionarios)) {
                    
                                while($questionarios= $db->expand($search_questionarios)) {
                    
                                    $id_questionario= $questionarios['id'];
                                    
                                    $search_respondeu = $db->select("SELECT data_hora FROM resp_quest_aluno 
                                    WHERE id_quest='$id_questionario' AND
                                    id_aluno='$aluno' ORDER BY id DESC LIMIT 1");
                                
                                    if($db->rows($search_respondeu)){
                                        $row = $db->expand($search_respondeu);		
                                        $respondeu = $row['data_hora'];
                                    } else {
                                        $respondeu = '';
                                    }

                    
                                     //ALUNO RESPONDEU
                                    if(!empty($respondeu)){
                                        $dados_aluno_questionario= $Pesquisa->NotaQuestionario(0,$questionarios['id']);
                    
                    
                                        if(is_numeric($dados_aluno_questionario['nota_aluno'])) {
                    
                                            // CONFERE SE É UMA PROVA FINAL 
                                            if($questionarios['final_test'] == 1) {
                                                $is_finalTest++;
                                                $materia_valida--;
                                                $divisao++;
                                            }
                                            
                                            // SE FOR PROVA FINAL, PEGA NOTA DA PROVA FINAL
                                            if($questionarios['final_test'] == 1) {
                                                $prova_final= $dados_aluno_questionario['nota_aluno'];
                                            }
                                        
                                            $nota += $dados_aluno_questionario['nota_aluno'];
                    
                                            if($questionarios['final_test'] == 1){
                                                $soma_notas = $soma_notas + 0;
                                            } else {
                                                $soma_notas = $soma_notas + $dados_aluno_questionario['nota_aluno'];
                                            }
                    
                                            $materia_valida++;
                                        }
                    
                    
                                    // NÃO RESPONDEU
                                    } else {
                    
                                        $respondeu['data_liberacao'].' - ';
                    
                                        $data_final= date('Y-m-d', strtotime('+7 days', strtotime($key['data_liberacao'])));
                    
                    
                                        //PROVA VENCIDA - NAO PODE MAIS RESPONDER
                                        if($hoje>$data_final){
                    
                                            $nota = 0;
                                            $soma_notas = $soma_notas+0;
                                            $materia_valida++;
                    
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
                                        
                                        }
                    
                    
                                    } // FIM DO NÃO RESPONDEU
                                    
                                } // FIM DO LOOP DE CONFERIMENTO DOS QUESTIONÁRIOS
                    
                            } // FIM DO CONFERIMENTO SE EXISTE QUESTIONÁRIOS



                        // -------------------------------------------//
            }

        }


                $state_job='';

                // echo "Curso: ".$turma;
                // echo "Disc.: ".$id_disciplina;

                 $search_jobs = $db->select("SELECT * FROM trabalhos
                                        WHERE id_turma= '$turma'
                                        AND id_disciplina='$id_disciplina'");

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
                        
                    }
                }

                            
                // AREA DE CALCULO DO VALOR DOS TRABALHOS
                if($soma_trabalhos == 0) {
                    $valor_final_trabalhos=0;
                } else {
                    $valor_final_trabalhos= $soma_trabalhos / $trabalho_qt;
                }

                // ---------------------------------------------------

                // AREA DE VERIFICAÇÃO SE ALUNO ASSISTIU TODAS AS AULAS
                if($qt_aulas == $aluno_assistiu && $qt_aulas != 0){
                    $bonus= 0.5;
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
                // // echo "Disciplina:".$name_disciplina."<br>";
                // echo "Bônus:".$bonus."<br>";

                $array= Array(
                    "faltas"=> ($qt_aulas - $aluno_assistiu), 
                    "media"=> $n,
                );

                return $array;

                        
                // echo "Presenças:".$aluno_assistiu."<br>";
                // echo "Faltas:".($qt_aulas - $aluno_assistiu)."<br>";
                    

            }