
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


 <!-- ATENÇÃO ! ESTE MODAL FOI IMPLEMENTADO AQUI POR CONTA DO PRAZO, NA PRÓXIMA MANUTENÇÃO ESTUDAR MANEIRA DE SEPARÁ-LO -->

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

            <input type="hidden" name="id_trabalho" value="">
            <input type="hidden" name="aula" value="">
            <input type="hidden" name="turma" value="">
            <input type="hidden" name="disciplina" value="">

            <div class="container" style="max-width: 100%">
                <div class="row">
                        <div class="col-sm-12 input-novo-trabalho">
                            <label for="">Titulo:</label>
                            <input type="text" name="titulo" value=""  class="form-control" />
                        </div>
                        
                        <div class="col-sm-12 input-novo-trabalho">
                            <label for="">Descrição:</label>
                            <textarea type="text" name="descricao" class="form-control"></textarea>
                        </div>

                        <div class="col-sm-6 input-novo-trabalho">
                            <label for="">Data limite para entrega:</label>
                            <input type="date" value=""  name="data_limite" class="form-control" />
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