<?php

$id_disciplina=  $_GET['id'];


$db = new DB();    
$sel = $db->select("SELECT * FROM aula WHERE id_disciplina= '$id_disciplina' ORDER BY id DESC");

if($db->rows($sel)){

    while( $row = $db->expand($sel) ){

        ?>

<div class="panel-wrapper collapse in">
				<div class="panel-body">
						<div class="panel-group accordion-struct accordion-style-1" id="accordion_2" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
								<div class="panel-heading activestate" role="tab" id="heading_10">
										<a role="button" data-toggle="collapse" data-parent="#accordion_2" href="#collapse_10" aria-expanded="true"><div class="icon-ac-wrap pr-20"><span class="plus-ac"><i class="ti-plus"></i></span><span class="minus-ac"><i class="ti-minus"></i></span></div><?php echo $row['titulo'] ?></a> 
								</div>
					<div id="collapse_10" class="panel-collapse collapse " role="tabpanel">
							<div class="panel-body"> <?php echo base64_decode($row['apresentacao']) ?> </div>
							<a href="<?php echo SISTEMA_DIR ?>mostra_aula/<?php echo $x['id'] ?>/<?php echo $id_disciplina ?>/<?php echo $row['id'] ?>" class="btn btn-primary">Ir para Aula</a>

								</div>
							</div>
										
									
					</div>
				</div>
		</div>



    <?php
	
    }
}