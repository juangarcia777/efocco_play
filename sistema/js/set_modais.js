
$(document).on('click','.modal-novo-trabalho', function(e) {
	e.preventDefault();

	var id_trabalho= $('#id_trabalho').val();
	$('#input_id_trabalho').val(id_trabalho);
	$('#novo_trabalho').modal();
})

$(document).on('click','.modal-edita', function(e) {
  e.preventDefault();

  var id_trabalho= $(this).attr('data-id_trabalho');
  var titulo= $(this).attr('data-titulo');
  var descricao= $(this).attr('data-descricao');
  var data_limite= $(this).attr('data-data_limite');
  
  $('#input_edit_id_trabalho').val(id_trabalho);
  $('#titulo').val(titulo);
  $('#descricao').val(descricao);
  $('#data_limite').val(data_limite);
  

	$('#update_trabalho').modal();
})