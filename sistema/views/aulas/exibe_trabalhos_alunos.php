<?php include("../../includes/topo.php"); ?>


<div class="page-wrapper">
<div class="container-fluid mtop20" >
<div class="row">

            <div class="panel">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table id="aulas" class="table table-hover display pb-30" data-locale="pt-BR">
                            <thead>
                                <tr>
                                    <th width="25%">Trabalho</th>
                                    <th width="25%">Nota</th>
                                    <th width="30%">Visualizar Trabalhos</th>
                                </tr>
                            </thead>

                            <tbody>

                            <?php
                                $search_alunos = $db->select("SELECT A.id_turma,A.id_aluno, B.nome AS aluno
                                                                FROM turma_alunos AS A
                                                                LEFT JOIN users AS B
                                                                ON A.id_aluno = B.id
                                                                WHERE A.id_turma='$turma'");
                                
                                while($alunos= $db->expand($search_alunos)){ ?>
                                    <tr>
                                        <td><?php echo $alunos['aluno']; ?></td>

                            <?php

                                    $id_aluno= $alunos['id_aluno'];

                                    $search_trabalhos= $db->select("SELECT A.*,B.nota,B.arquivo AS arquivo
                                                                    FROM trabalhos AS A
                                                                    LEFT JOIN entrega_trabalhos AS B
                                                                    ON A.id_aula = B.id_aula
                                                                    WHERE A.id_aula='$aula' AND
                                                                    A.id_turma= '$turma' AND A.id_disciplina='$disciplina'
                                                                    AND B.id_aluno= '$id_aluno'");
                                    
                                    if($db->rows($search_trabalhos)) {
                                    $trabalhos= $db->expand($search_trabalhos);
                            ?>
                                        

                                            <td>
                                                <div class="input-group">
																<input type="text" class="form-control" value="<?php echo $trabalhos['nota']; ?>" placeholder="Username">
																<button class="btn btn-primary">Enviar</button>
															</div>
                                            </td>

                                            <td>
                                            <a  href="../arquivos/upload_alunos/<?php echo $trabalhos['arquivo'] ?>" target="_blank" class="btn btn-primary btn-icon-anim btn-square" style="float: left;margin-left: 30px"><i class="fa fa-eye" ></i></a>
                                            </td>
                                        
                                
                                <?php } else { ?>



                                <?php }} ?>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
							</div>
							</div>
						</div>
					</div>

				<a href="cria-nova-aula">
				    <div class="new_aula_button"><i class="fa  fa-plus"></i></div>
				</a>


<?php include("../../includes/rodape.php"); ?>
