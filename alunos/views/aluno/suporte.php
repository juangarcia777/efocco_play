<?php require ("../../includes/header.php"); ?>
<?php require ("../../includes/modais.php"); ?>
<?php require ("../../includes/menu.php"); ?>

<?php
$DadosCurso = $Pesquisa->DadosCurso();
?>

<main>
<div class="main-wrapper pt-80">
<div class="container">
<div class="row">

        			<div class="col-md-12 ">

						<div class="card">
                        	<div class="post-title d-flex align-items-center">
                            	<div class="posted-author">
                                    <h3 class="author">SUPORTE A PLATAFORMA</h3>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 mt-2">
                        <form method="post">

                            <div class="card">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="icofont-ui-search"></i></span>
                                    </div>
                                        <input type="text" name="busca" class="form-control busca" placeholder="Busca..." aria-label="Username" aria-describedby="basic-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-default" type="submit" id="button-addon2">Buscar</button>
                                        </div>
                                    

                                    </div>
                                </div>
                        </form>

                    </div>


                    <div class="col-md-12 mt-2">
                        <div class="card">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Perguntas Frequentes</a>
                            </li>

                            <li class="nav-item">
                                <a onclik="visualizaDuvida()" class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Suas Dúvidas</a>
                            </li>
                           
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <!-- AREA DE PERGUNTAS FREQUENTES -->
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                    <div class="row mt-3">

                                    <?php
                                    $id_logado= $_SESSION['UserLogadoAVA'];

                                    $db= new DB;

                                    // ESSE BLOCO MARCA TODAS AS DUVIDAS COMO VISTAS

                                    $atualiza= $db->select("UPDATE suporte_plataforma SET lido=1 
                                    WHERE id_aluno='$id_logado'");
                                    
                                    unset($_SESSION['perguntas']);

                                    // ---------------------------  //

                                    if(!empty($_POST['busca'])) {
                                        $q= "WHERE pergunta LIKE '%".$busca."%' ";
                                    } else {
                                        $q='';
                                    }
                                    $sql= $db->select("SELECT * FROM suporte_prontas $q ORDER BY id DESC");
                                    if($db->rows($sql)) {
                                    while($n= $db->expand($sql)):
                                    ?>


                                    <div class="col-md-12 mtop10">
                                        <a data-toggle="collapse" href="#collapseExample<?php echo $n['id'] ?>">
                                        <div class="card card-border-bottom">
                                            <h6>
                                            <?php echo $n['pergunta'] ?>
                                                <i class="icofont-arrow-down"></i>
                                                
                                            </h6>	
                                            <span>
                                        
                                            </span>	

                                            <div class="collapse" id="collapseExample<?php echo $n['id'] ?>">
                                            <div class="mtop10">
                                            <?php echo $n['resposta'] ?>
                                            <br>
                                            <hr>
                                            <div class="">
                                                <a href="javascript:void(0)" onClick="$(this).css('color','green')"><i class="icofont-thumbs-up"></i>
                                                Me Ajudou ! &nbsp; &nbsp; &nbsp;
                                                </a>
                                                
                                                <a href="javascript:void(0)" class="text-danger" data-toggle="modal" data-target="#ModalDuvidasSistema"><i class="icofont-thumbs-down"></i>  Tenho uma dúvida específica.</a>
                                            </div>
                                            
                                            </div>
                                            </div>

                                        </div>
                                        </a>
                                    </div>

                                    <?php endwhile;
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
                                <!-- AREA DE SUAS DÚVIDAS -->
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                <div class="row mt-3">

                                    <?php
                                    $db= new DB;
                                    $sql= $db->select("SELECT * FROM suporte_plataforma 
                                    WHERE id_aluno='$id_logado' ORDER BY id DESC");
                                    if($db->rows($sql)) {
                                    while($n= $db->expand($sql)):
                                    ?>


                                    <div class="col-md-12 mtop10">
                                        <a data-toggle="collapse" href="#collapseExample<?php echo $n['id'] ?>">
                                        <div class="card card-border-bottom">
                                            <h6>
                                            <?php echo $n['pergunta'] ?>
                                                <i class="icofont-arrow-down"></i>
                                                <?php if(!empty($n['resposta'])): ?>
                                                    <span class="badge badge-default">Respondida</span>
                                                <?php else: ?>
                                                    <span class="badge badge-info">Aguardando</span>
                                                <?php endif; ?>
                                            </h6>	
                                            <span>
                                        
                                            </span>	

                                            <div class="collapse" id="collapseExample<?php echo $n['id'] ?>">
                                                <div class="mtop10">
                                                    <?php echo $n['resposta'] ?>
                                                       
                                                        
                                                </div>
                                            </div>

                                        </div>
                                        </a>
                                    </div>

                                    <?php endwhile;
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

                

</div>
</div>
</div>
</main>


<?php require ("../../includes/footer.php"); ?>