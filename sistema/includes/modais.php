
<div class="modal fade" id="ModalDetailInfo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h5 class="modal-title" id="myLargeModalLabel">Informações</h5>
        </button>
      </div>
      <div class="modal-body body-modal-info">
        
      </div>      
    </div>
  </div>
</div>


 <!-- ESTE MODAL É USADO PARA FAZER ATUALIZAÇÃO -->

 <div class="modal fade" id="update_trabalho" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 class="modal-title" id="myLargeModalLabel">Atualizar Trabalho</h5>
            </button>
        </div>
        <div class="modal-body body-modal-info">

        <form action="controlers/trabalhos/update_trabalho.php" method="POST">

            <input type="hidden" id="input_edit_id_trabalho" name="id_trabalho">
            <input type="hidden" name="aula" value="<?php echo $aula; ?>">
            <input type="hidden" name="turma" value="<?php echo $turma; ?>">
            <input type="hidden" name="disciplina" value="<?php echo $disciplina; ?>">

            <div class="container" style="max-width: 100%">
                <div class="row">
                        <div class="col-sm-12 input-novo-trabalho">
                            <label for="">Titulo:</label>
                            <input type="text" id="titulo" name="titulo" class="form-control" />
                        </div>
                        
                        <div class="col-sm-12 input-novo-trabalho">
                            <label for="">Descrição:</label>
                            <textarea type="text" id="descricao" name="descricao" class="form-control"></textarea>
                        </div>

                        <div class="col-sm-6 input-novo-trabalho">
                            <label for="">Data limite para entrega:</label>
                            <input type="date" id="data_limite" name="data_limite" class="form-control" />
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





    
<!-- ESTE MODAL É USADO PARA FAZER A INSERÇÃO -->

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


        <!-- <input type="text" id="input_id_trabalho" name="input_id_trabalho"> -->

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