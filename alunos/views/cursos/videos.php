<?php require ("../../includes/header.php"); ?>
<?php require ("../../includes/menu.php"); ?>

<?php
$DadosCurso = $Pesquisa->DadosCurso();
$InformacoesDisciplina = $Pesquisa->InformacoesDisciplina($_SESSION['MateriaSelecionadaAVA']);
?>

<main>
<div class="main-wrapper pt-80">

    <div class="container">
        <div class="row">


                            <div class="col-md-12 ">
                                <div class="card">
                                    <div class="post-title d-flex align-items-center">
                                        <div class="posted-author" style="width: 100%">
                                            <h3 class="author" >
                                                <?php echo $InformacoesDisciplina['nome']; ?>
                                                <span class="small-info"><?php echo $DadosCurso['nome']; ?></span>
                                            </h3>

                                            

                                        </div>
                                    </div>
                                </div>
                            </div> 
    

                <?php
                $id_materia = $_SESSION['MateriaSelecionadaAVA'];
                $id_curso = $_SESSION['CursoSelecionadoAVA'];
                $sel = $db->select("SELECT id, titulo, video_aula, data_criacao FROM aula WHERE video_aula!='' AND id_turma='$id_curso' AND id_disciplina='$id_materia' ORDER BY id DESC");
                if($db->rows($sel)){
                    while($line = $db->expand($sel)){
                ?>

                                        <div class="col-md-6">
                                            <div class="photo-group">
                                                
                                                    <?php echo video_aula($line['video_aula']); ?>
                                                    <div class="photo-gallery-caption">
                                                        <a href="aula/<?php echo $line['id']; ?>/<?php echo normaliza($line['titulo']); ?>"><h3 class="photos-caption"><?php echo $line['titulo']; ?></h3></a>
                                                        <p class="cor-neutra"><?php echo formata_data_hora($line['data_criacao']); ?></p>
                                                        
                                                    </div>
                                                
                                            </div>
                                        </div>

                <?php       
                    }}
                ?>


        </div>
    </div>
        

                    


                     


</div>
</main>



<?php require ("../../includes/footer.php"); ?>