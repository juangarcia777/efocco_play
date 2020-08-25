<?php require ("../../includes/header.php"); ?>
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
			                                    <h3 class="author"><?php echo $DadosCurso['nome']; ?></h3>
			                                </div>
			                            </div>
			                            <!-- post title start -->
			                            <div class="post-content">
			                                <p class="post-desc">
			                                    <?php echo $DadosCurso['descritivo']; ?>
			                                </p>
			                                
			                                
			                            </div>
			                        </div>
			                
                    </div>	


                    


                     


</div>
</div>
</div>
</main>


<?php require ("../../includes/footer.php"); ?>