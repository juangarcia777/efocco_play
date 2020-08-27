<?php require ("../../includes/header.php"); ?>
<?php require ("../../includes/modais.php"); ?>
<?php require ("../../includes/menu.php"); ?>

<?php
$DadosCurso = $Pesquisa->DadosCurso();
?>

    <div class="container pt-80">

        <div class="row">

            <div class="col-md-12 ">

                <div class="card">
                    <div class="post-title d-flex align-items-center">
                        <div class="posted-author">
                        
                        <?php
                            $f= $_GET['disc'];
                            // Busca nome da turma
                            $bu= $db->select("SELECT nome FROM disciplinas WHERE id='$f'");
                            $nome_disciplina= $db->expand($bu);
                            $final= $nome_disciplina['nome'];
                        ?>

                            <h3 class="author">BOLETIM / <span id="materia"><?php echo $final; ?></span></h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pack de Inputs -->
            <input type="hidden" id="aluno" value="<?php echo $_SESSION['UserLogadoAVA']; ?>" />
            <input type="hidden" id="curso"  value="<?php echo $_SESSION['CursoSelecionadoAVA']; ?>" />
            <input type="hidden" id="disciplina"  value="<?php echo $_GET['disc']; ?>" />
            <!-- ---------- -->

        </div>

        


        <div class="row d-flex mt-3 mb-3" id="teste">

                <div class="col-sm-12 col-md-4">
                    <div class="card bg-success ">
                    <h5 class="text-light">Média Atual: 
                    
                    <strong id="media">
                    
                    <div class="spinner-grow text-light spinner-grow-sm load" role="status">
                                <span class="sr-only">Loading...</span>
                        </div>
                    
                    </strong></h5>
                    </div>
                </div>
            

            <div class="col-sm-12 col-md-4">
                <div class="card bg-warning">
                <h5 class="text-light">Faltas:  <strong id="faltas">
                   
                   <div class="spinner-grow text-light spinner-grow-sm load" role="status">
                            <span class="sr-only">Loading...</span>
                    </div>
                   
                   </strong></h5>
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="card bg-danger">
                <h5 class="text-light">Presenças:  <strong id="presenca">
                   
                   <div class="spinner-grow text-light spinner-grow-sm load" role="status">
                            <span class="sr-only">Loading...</span>
                    </div>
                   
                   </strong></h5>
                </div>
            </div>


            <?php if($_SESSION['infos_gerais']['ponto_media'] != 0): ?>
            <div class="col-sm-12 ">
                <div class="alert alert-danger mt-3" role="alert">
                    <strong>Atenção !</strong> Ao assistir todas as aulas você ganha 0.5 pontos, na média.
                </div>
            </div>
            <?php endif; ?>

        </div>

         
        <div class="row load" >
                <?php for($i=1;$i<=8;$i++): ?>
                <div class="col-sm-12 col-md-3 mt-3 mb-3">
                    <div class="card align-items-center">
                        <div class="spinner-border text-default spinner-grow-lg" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
        </div>

      
   
        <!-- <div class="row mt-5 mb-5">
            <div class="col-sm-12">
                <div class="card">
                    <div class="post-title">
                        <h5 class="ml-4">COMO FUNCIONA SUA MÉDIA ?</h5>

                        <div class="row mt-5">
                            <div class="col-sm-12 col-md-3 text-center border-right border-secondary">
                                <h6 class="mb-3">Soma dos questionários</h6>
                                <i class="icofont-list icons-boletim"></i>
                            </div>
                            <div class="col-sm-12 col-md-3 text-center border-right border-secondary">
                                <h6 class="mb-3">Prova final</h6>
                                <i class="icofont-law-document icons-boletim"></i>
                            </div>
                            <div class="col-sm-12 col-md-3 text-center border-right border-secondary">
                                <h6 class="mb-3">Soma dos trabalhos</h6>
                                <i class="icofont-attachment icons-boletim"></i>
                            </div>
                            <div class="col-sm-12 col-md-3 text-center">
                                <h6 class="mb-3">100% visualização de aulas</h6>
                                <i class="icofont-check-circled icons-boletim"></i>
                            </div>
                        </div>
                        <div class="row d-none">
                            <div class="col-sm-12 ml-5">

                                <h6 class="text-danger mt-3">Cálculo 1:</h6>
                                <h6 class="mt-1">SOMA DOS TRABALHOS + SOMA DOS QUESTIONÁRIOS + PROVA FINAL / 3</h6>
                                <h6 class="text-info mt-3">Cálculo 2:</h6>
                                <h6 class="mt-1">100% VISUALIZAÇÃO DE AULAS = + 0.5 PONTO</h6>
                                <h6 class="mt-3">MÉDIA = <span class="text-danger">Cálculo 1</span> + <span class="text-info">Cálculo 2</span></h6>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> -->

    </div>
    


<?php require ("../../includes/footer.php"); ?>
<script src="assets/js/boletim.js"></script>