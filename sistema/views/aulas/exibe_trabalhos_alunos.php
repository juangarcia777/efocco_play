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

                                    $search_trabalhos= $db->select("SELECT A.*,B.nota,B.arquivo AS arquivo, B.id AS id_entrega
                                                                    FROM trabalhos AS A
                                                                    LEFT JOIN entrega_trabalhos AS B
                                                                    ON A.id = B.id_trabalho
                                                                    WHERE A.id='$trabalho' AND
                                                                    A.id_turma= '$turma' AND A.id_disciplina='$disciplina'
                                                                    AND B.id_aluno= '$id_aluno'");
                                    
                                    if($db->rows($search_trabalhos)) {
                                    $trabalhos= $db->expand($search_trabalhos);

                                    // print_r($trabalhos);
                            ?>
                                        

                                            <td>
                                            <form action="controlers/trabalhos/salva_notas.php" method="POST">
                                            <input type="hidden" name="id_entrega" value="<?php echo $trabalhos['id_entrega'] ?>">
                                            <input type="hidden" name="turma" value="<?php echo $turma ?>">
                                            <input type="hidden" name="disciplina" value="<?php echo $disciplina ?>">
                                            <input type="hidden" name="trabalho" value="<?php echo $trabalho; ?>">
                                                <div class="input-group">
                                                    <input type="number" name="nota" class="form-control" value="<?php echo $trabalhos['nota'] ?>" placeholder="Sem Nota">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="submit">Salvar</button>
                                                    </span>
                                                </div>
                                            </form>
                                            </td>

                                            <td>
                                            <a  href="../arquivos/upload_alunos/<?php echo $trabalhos['arquivo'] ?>" target="_blank" class="btn btn-primary btn-icon-anim btn-square" style="float: left;margin-left: 30px"><i class="fa fa-eye" ></i></a>
                                            </td>
                                        
                                
                                <?php } else { ?>


                                    <td>
                                    <span class="alert alert-danger">Esse Aluno ainda não entregou o trabalho !</span>        
                                    </td>

                                    <td>
                                    <a disabled class="btn btn-primary btn-icon-anim btn-square" style="float: left;margin-left: 30px"><i class="fa fa-eye" ></i></a>
                                    </td>



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
