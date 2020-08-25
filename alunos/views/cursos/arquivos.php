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
                                $arquivos = $Pesquisa->ListagemArquivosDisciplina($_SESSION['MateriaSelecionadaAVA']);
                                if(!empty($arquivos)){
                                    while($line = $db->expand($arquivos)){
                                                                           
                            ?>

                                        <div class="col-lg-4 col-sm-6 recently request">

                                        <div class="friend-list-view" style="position: relative;">
                                            <!-- profile picture end -->
                                            <div class="profile-thumb file-icone-grande">
                                                <a href="<?php echo LINK_ARQUIVOS_AULAS.$line['arquivo']; ?>" target="_blank">
                                                    <?php 
                                                        $tamanho = TamanhoArquivo($line['arquivo']); 
                                                        echo $tamanho['extensao']; 
                                                    ?>                                                    
                                                </a>
                                            </div>
                                            <!-- profile picture end -->

                                            <div class="posted-author">
                                                <h6 class="author"><a href="<?php echo LINK_ARQUIVOS_AULAS.$line['arquivo']; ?>" target="_blank"><?php echo $line['nome']; ?></a></h6>	
                                                <a href="<?php echo LINK_ARQUIVOS_AULAS.$line['arquivo']; ?>" target="_blank"><i class="icofont-download-alt download-arquivo-aula"></i></a>                                                
                                                <span class="add-frnd"><?php echo data_mysql_para_user($line['data_upload']); ?></span>
                                            </div>
                                        </div>
                                    </div>

                            <?php                                           
                                }} else {
                            ?>  
                                <div class="card">
                                    <div class="post-title d-flex align-items-center">
                                        <p>Nenhuma arquivo encontrado para esta disciplina.</p>
                                    </div>    
                                </div>    
                            <?php        
                                }
                            ?>  


        </div>
    </div>
        

                    


                     


</div>
</main>


<?php require ("../../includes/footer.php"); ?>