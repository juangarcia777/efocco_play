<?php include("../../includes/topo.php"); ?>


<div class="page-wrapper">
<div class="container-fluid mtop20" >
<div class="row">


	
								<div class="panel">
			            			<div class="table-wrap">
										<div class="table-responsive">
											<table id="aulas" class="table table-hover display  pb-30" data-locale="pt-BR">
												<thead>
													<tr>

														<th width="30%">Trabalho</th>
														<th width="30%">Visualizar Trabalhos</th>
														<th width="30%"><a href="" data-toggle="modal" data-target="#novo_trabalho" class="btn btn-success"><i class="fa fa-plus"></i> Novo Trabalho</a></th>

													</tr>
												</thead>

												<tbody>

												<?php
													$search_trabalhos = $db->select("SELECT * FROM trabalhos WHERE id_aula='$aula'");
													
													while($trabalhos= $db->expand($search_trabalhos)){

												?>
															<tr>
																<td><?php echo $trabalhos['titulo']; ?></td>

																<td>
																<a  href="exibe_trabalhos_alunos/<?php echo $trabalhos['id']; ?>/<?php echo $trabalhos['id_turma']; ?>/<?php echo $trabalhos['id_disciplina']; ?>" class="btn btn-primary btn-icon-anim btn-square" style="float: left;margin-left: 30px"><i class="fa fa-arrow-right" ></i></a>
																</td>
															</tr>

															
													
													<?php } ?>

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



<!-- ESTE MODAL FOI INSERIDO AQUI POR PRECAUÇÃO DE ERROS, A PRÓXIMA MANUTENÇÃO ESTUDAR JEITO DE SEPARÁ-LO EM ARQUIVO DE MODAL -->

<style>
.input-novo-trabalho{
    margin-bottom: 1.2rem;
}
</style>

<div class="modal fade" id="novo_trabalho" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h5 class="modal-title" id="myLargeModalLabel">Novo Trabalho</h5>
        </button>
      </div>
      <div class="modal-body body-modal-info">

      <form action="controlers/trabalhos/salva_novo_trabalho.php" method="POST">

        <input type="hidden" name="aula" value="<?php echo $aula; ?>">
        <input type="hidden" name="turma" value="<?php echo $turma; ?>">
        <input type="hidden" name="disciplina" value="<?php echo $disciplina; ?>">

        <div class="container" style="max-width: 100%">
            <div class="row">
                    <div class="col-sm-12 input-novo-trabalho">
                        <label for="">Titulo:</label>
                        <input type="text" name="titulo" class="form-control" />
                    </div>
                    
                    <div class="col-sm-12 input-novo-trabalho">
                        <label for="">Descrição:</label>
                        <textarea type="text" name="descricao" class="form-control"></textarea>
                    </div>

                    <div class="col-sm-6 input-novo-trabalho">
                        <label for="">Data limite para entrega:</label>
                        <input type="date" name="data_limite" class="form-control" />
                    </div>

                    <div class="col-sm-12 input-novo-trabalho">
                        <button class="btn btn-success" type="submit">Cadastrar</button>
                    </div>
            
            </div>
        </div>
      </form>
          
      </div>      
    </div>
  </div>
</div>
<!-- ------------------------------------------------------------------- -->