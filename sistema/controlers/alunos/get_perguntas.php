<?php

$x=  $_GET['id'];

$db = new DB();    
$sel = $db->select("SELECT * FROM perguntas_questi WHERE id_quest= '$x'");

if($db->rows($sel)){

    while( $row = $db->expand($sel) ){
        
        $id_pergunta= $row['id_pergunta'];
        
        $search = $db->select("SELECT * FROM perguntas WHERE id= '$id_pergunta'");

        if($db->rows($search)){

            while( $row2 = $db->expand($search) ){

                ?>
                <div class="panel panel-primary" >
					<div class="panel-heading" role="tab" id="panel" id="heading_<?php  echo $row2['id'] ?>">
						<a role="button" data-toggle="collapse" data-parent="#accordion_<?php  echo $row2['id'] ?>" 
                        href="#collapse_<?php  echo $row2['id'] ?>" aria-expanded="false" >QUESTÃO</a> 
					</div>
					<div id="collapse_<?php  echo $row2['id'] ?>" class="panel-collapse collapse " role="tabpanel">
						<div class="panel-body"> 
							<div class="col-sm-12">
                                <h4><?php echo $row2['pergunta'] ?></h4>
                                <?php echo $row2['explicacao'] ?>
							</div>	

													<div class="col-sm-12">

                                                    <div class="form-group mb-30">
                                                    
													<div class="radio radio-primary">
														<input type="radio" name="radio" id="radio1" value="<?php echo $row2['resp_a'] ?>">
														<label for="radio1">
															<?php echo $row2['resp_a'] ?>
														</label>
													</div>

                                                    <div class="radio radio-primary">
														<input type="radio" name="radio" id="radio1"  value="<?php echo $row2['resp_b'] ?>">
														<label for="radio1">
                                                        <?php echo $row2['resp_b'] ?>
														</label>
													</div>

                                                    <div class="radio radio-primary">
														<input type="radio" name="radio" id="radio1"  value="<?php echo $row2['resp_c'] ?>" >
														<label for="radio1">
                                                        <?php echo $row2['resp_c'] ?>
														</label>
													</div>

                                                    <div class="radio radio-primary">
														<input type="radio" name="radio" id="radio1"  value="<?php echo $row2['resp_d'] ?>">
														<label for="radio1">
                                                        <?php echo $row2['resp_d'] ?>
														</label>
													</div>

                                                    <div class="radio radio-primary">
														<input type="radio" name="radio" id="radio1"  value="<?php echo $row2['resp_e'] ?>">
														<label for="radio1">
                                                        <?php echo $row2['resp_e'] ?>
														</label>
													</div>

                                                    <input type="hidden" id="logado" name="id_logado" value="<?php echo $_SESSION['user_sisconnection_adm'];  ?>">

													
												</div>
                                                <button type="submit" class="btn btn-primary" onclick="envia(<?php echo$row2['id']?>)"> Confirmar</button><br><br>
													</div>
													<br>
													<div class="col-sm-12">
													</div>
													 </div>
												</div>
											</div>
                <?php

            }
        }
    }
}
?>

<script src="../js/ajax_respostas.js"></script>