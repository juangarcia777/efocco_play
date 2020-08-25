<?php require ("../../includes/header.php"); ?>
<?php require ("../../includes/menu.php"); ?>

<?php
$DadosCurso = $Pesquisa->DadosCurso();
$id_logado= $_SESSION['UserLogadoAVA'];
$id_turma=$_SESSION['CursoSelecionadoAVA'];
?>

<main>
    <div class="main-wrapper pt-80">
        <div class="container">
            <div class="row">

                <div class="col-md-12 ">

                    <div class="card">
                        <div class="post-title d-flex align-items-center">
                            <div class="posted-author">
                                <h3 class="author">ANOTAÇÕES GERAIS</h3>
                            </div>

                        </div>
                    </div>
                </div>

           




    <div class="col-md-12 ">

    <div class="row">


        <?php
        $db= new DB;
        
        $sql= $db->select("SELECT A.id,A.id_disciplina,B.nome AS disciplina
                            FROM bloco_notas AS A
                            LEFT JOIN disciplinas AS B
                            ON A.id_disciplina= B.id
                            WHERE A.id_aluno='$id_logado' 
                            AND A.id_turma='$id_turma'
                            GROUP BY A.id_disciplina
                            ORDER BY A.id DESC");

        if($db->rows($sql)) {
        while($n= $db->expand($sql)):
        ?>

       
                <div class="col-md-12 mtop10">
                    <a data-toggle="collapse" href="#collapseExample<?php echo $n['id'] ?>">
                    <div class="card card-border-bottom">
                        <h6>
                        <?php echo $n['disciplina'] ?>
                            <i class="icofont-arrow-down"></i>
                            
                        </h6>	
                        <span>
                    
                        </span>	

                        <div class="collapse" id="collapseExample<?php echo $n['id'] ?>">
                        <div class="mtop10">
                        <hr>
                        <?php
                            $id_disciplina= $n['id_disciplina'];
                            $search= $db->select("SELECT A.anotacoes,A.data,B.titulo AS aula
                            FROM bloco_notas AS A
                            LEFT JOIN aula AS B
                            ON A.id_aula = B.id
                            WHERE A.id_disciplina='$id_disciplina'
                            ORDER BY A.data DESC");

                            while($y= $db->expand($search)){
                        ?>
                        
                        <strong><?php echo $y['aula'] ?>&nbsp;&nbsp;<span class="badge badge-default"><?php echo data_mysql_para_user($y['data']); ?></span></strong>
                        <br>
                        <p><?php echo $y['anotacoes'] ?></p>

                        <hr>

                        <?php } ?>

                        
                        </div>
                        </div>

                    </div>
                    </a>
                </div>
        
        <?php 
        endwhile;
        } else {?>

        <div class="col-md-12 mtop20">
            <div class="card card-border-bottom">
                <h6>
                    Nenhum Resultado Encontrado !                                        
                </h6>	
            
            </div>
        </div>

        <?php } ?>
    


    </div>			
    </div>	

    </div>
        </div>
    </div>
</main>


<?php require ("../../includes/footer.php"); ?>